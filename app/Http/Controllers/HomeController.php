<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use App\Models\User;
use App\Models\CodeMaster;
use App\Models\Interester;
use App\Models\Newsletter_subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use DB;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['signUpAsCoach', 'saveCoachInfo', 'code', 'BecomeInsider',
            'successfullysigningup', 'goalreached', 'Thankyouforregistering', 'RegisteryourInterest',
            'saveInterestInfo','check_code','CheckInviteCode','CheckEmailImageCode','CheckTrailerCounterCode',
            'NewsletterResubscribe', 'NewsletterUnsubscribe','saveNewsletterUnsubscribe',
            'saveNewsletterResubscribe','saveBecomeInsider','CheckLoginCodeList']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return redirect()->route('coach.dashboard');
    }

    public function signUpAsCoach(Request $request)
    {
        $data['code'] = $request->session()->get('code');
        $request->session()->forget('code');

        $data['nationality'] = Nationality::all();
        $data['nationality_currency'] = get_nationality_currency();
        $data['title'] = 'Signup as Coach';
        return view('coach.signup', $data);
    }

    public function saveCoachInfo(Request $request)
    {

        $rules = [
            'social_media_username' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'nationality' => 'required|string',
            //'user_passport_id_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'username' => 'required|string|unique:users,username',
            'passport' => 'required|string',
            'phoneno' => 'required|string|numeric',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'terms' => 'required|string',
            'subscriber_fee' => 'required|string',
        ];
        $customs = [
            'firstname.required' => 'First Name is required',
            'lastname.required' => 'Last Name is required',
            'phoneno.required' => 'Phone is required',
            'phoneno.min' => 'Phone Number must be 10 Digits',
            'email.required' => 'Email is required',
            'social_media_username.required' => 'Socian Media Username is required',
            'terms.required' => 'Terms and Conditions is required',
            'email.unique' => 'Sorry, Email Already Exists',
            'email.email' => 'The Email must be a valid email address',
            'username.unique' => 'Sorry, Username Already Exists',
            'password.confirmed' => 'Password are not match',
            'subscriber_fee.required' => 'Monthly Subscription Fee  is required',
        ];

        $validator = Validator::make($request->input(), $rules, $customs);
        //dd($validator);

        if ($validator->fails()) {
            if ($validator->errors()->first('terms')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('terms'));
            }
            if ($validator->errors()->first('password')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('password'));
            }
            if ($validator->errors()->first('phoneno')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('phoneno'));
            }
            if ($validator->errors()->first('email')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('email'));
            }
            if ($validator->errors()->first('username')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('username'));
            }
            $res = array("status" => false, 'error' => $validator->errors()->first());
        } else {

            $tmpfile = $_FILES['user_passport_id_image']['tmp_name'];
            $filename = basename($_FILES['user_passport_id_image']['name']);
            $curl_data = array(
                "user_passport_id_image" => curl_file_create($tmpfile, $_FILES['user_passport_id_image']['type'], $filename),
                "type"=>"user_passport_id_image"
            );

            $curl = curl_init();
            $admin_api_url = getenv("admin_coach_image_url");

            curl_setopt_array($curl, array(
                CURLOPT_URL =>  $admin_api_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $curl_data,
                CURLOPT_HTTPHEADER => array(
                    // Set here requred headers
                    "Accept: application/json",
                ),
            ));

            $response = json_decode(curl_exec($curl));

            $err = curl_error($curl);

            curl_close($curl);

            if(isset($response->errors))
            {
                $res = array("status" => false, 'error' => $response->message);
            }
            else
            {

                $user_passport_id_image = $response->data->user_image;

                $user = User::create([
                    'username' => $request['username'],
                    'first_name' => $request['firstname'],
                    'last_name' => $request['lastname'],
                    'date_of_birth' => $request['birthdaydate'],
                    'nationality' => $request['nationality'],
                    'passport_number' => $request['passport'],
                    'currency_symbol' => $request['currency_symbol'],
                    'phonecode' => $request['phonecode'],
                    'phoneno' => $request['phoneno'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']),
                    'user_passport_id_image' => $user_passport_id_image,
                    'username_verified' => '1',
                    'coach_banner_file' => '',
                    'coach_trailer_file' => '',
                    'role' => 'coach',
                    'status' => '1',
                    'social_username' => $request['social_media_username'],
                    'social_type' => $request['socialmedia'],
                    'base_currency'=> $request['currency_symbol'],
                    'monthly_subscription_fee' => $request['subscriber_fee'],
                    'google_id' =>'',
                    'facebook_id' =>'',
                    'login_type' => '0',
                ]);

                if ($user->id) {
                    if(isset($request['newsletter']))
                    {
                        Newsletter_subscribe::create([
                            'email' => $request['email'],
                        ]);
                    }
                    if($request['used_code'])
                    {
                        $code_check1 = CodeMaster::where(['code' => $request['used_code'],'code_flag' => '0'])->get();
                        $count1 = $code_check1->count();
                        if($count1 > 0)
                        {
                            $update = DB::table('code_master')->where('code',$request['used_code'])
                                ->update(['code_flag'=>'1','user_id'=>$user->id]);

                        }
                    }
                    $res = array("status" => true, 'success' => "Coach registration successfully");

                    // echo  json_encode(array('status' => true, 'success' => "Coach registration successfully"));
                } else {
                    $res = array("status" => false, 'error' => "Coach registration failed");
                    //echo  json_encode(array('status' => false, 'error' => "Coach registration failed"));
                }
            }
        }

        echo json_encode($res);
    }

    public function saveInterestInfo(Request $request)
    {

        $rules = [
            'social_media_username' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:interesters,email',
            'phoneno' => 'required|string|min:10|numeric|unique:interesters,phoneno',
            'terms' => 'required'
        ];
        $customs = [
            'firstname.required' => 'First Name is required',
            'lastname.required' => 'Last Name is required',
            'phoneno.required' => 'Phone is required',
            'phoneno.min' => 'Phone Number must be 10 Digits',
            'email.required' => 'Email is required',
            'social_media_username.required' => 'Socian Media Username is required',
            'terms.required' => 'Terms and Conditions is required',
            'phoneno.unique' => 'Sorry, Phone Number Already Exists',
            'email.unique' => 'Sorry, Email Already Exists',
            'email.email' => 'The Email must be a valid email address',

        ];
        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
            if ($validator->errors()->first('terms')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('terms'));
            }
            if ($validator->errors()->first('phoneno')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('phoneno'));
            }
            if ($validator->errors()->first('email')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('email'));
            }
        } else {
            $user = Interester::create(
                [
                    'first_name' => $request['firstname'],
                    'last_name' => $request['lastname'],
                    'email' => $request['email'],
                    'social_type' => $request['socialmedia'],
                    // 'currency_symbol' => $request['currency_symbol'],
                    'phonecode' => $request['phonecode'],
                    'phoneno' => $request['phoneno'],
                    'social_username' => $request['social_media_username'],
                ]
            );
            if ($user->id) {
                if(isset($request['newsletter']))
                {
                    $newsletter_check = Newsletter_subscribe::where(['email' => $request['email']])->get();
                    $newsletter_count = $newsletter_check->count();
                    if($newsletter_count == 0)
                    {
                        Newsletter_subscribe::create([
                            'email' => $request['email'],
                        ]);

                    }

                }
                $res = array("status" => true, 'success' => "Coach Interest registration successfully");
                // echo  json_encode(array('status' => true, 'success' => "Coach Interest registration successfully"));
            } else {
                $res = array("status" => false, 'error' => "Coach Interest registration failed");
                // echo  json_encode(array('status' => false, 'error' => "Coach Interest registration failed"));
            }
        }
        echo json_encode($res);
    }

    public function code()
    {
        //$count = User::where('id', '>', '0')->get();
        //$count = User::where('id', '>', '0')->where('role', '=', 'coach')->get();
        $count = User::where('role', '=', 'coach')->get();
        $wordCount = $count->count();
        if($wordCount > 0)
        {
            $total = ($wordCount * 100) / 5000;
        } else {
            $total = 0;
        }
        $data['goal_count'] = $total;

        // $temp = (1.639921+(log10((50+$wordCount)/20000))/2)*100; // change 24-5-2022
        // $temp = (1.646215+(log10((20+$wordCount)/20000))/2); // change 24-5-2022
        $temp = (1.646215+(log10((20+$wordCount)/20000))/2)*100; // change 24-5-2022
        // $temp = number_format($temp, 1, '.', '');

        $data['goal_temp'] = number_format($temp, 1, ".", "");

        // (1.646215 + (log10((20+coachnumber)/20000))/2)

        // return $data['goal_count'];
        // die;
        if($total == 100)
        {
            $data['title'] = 'Goal Reached';
            $path = 'coach.goalreached';
        } else {
            $data['title'] = 'Invite Only';
            $path = 'coach.code';
        }
        return view($path, $data);
    }



    public function successfullysigningup()
    {
        $data['title'] = 'Successfully signing up';
        return view('coach.successfullysigningup', $data);
    }
    public function goalreached()
    {
        $data['title'] = 'Goal reached';
        $count = User::where('id', '>', '0')->get();
        $wordCount = $count->count();
        $total = ($wordCount * 100) / 5000;
        $data['goal_count'] = $total;
        // return $data['goal_count'];
        // die;
        return view('coach.goalreached', $data);
    }
    public function Thankyouforregistering()
    {
        $data['title'] = 'Thank you for registering';
        return view('coach.Thankyouforregistering', $data);
    }
    public function RegisteryourInterest()
    {
        $data['title'] = 'Register your Interest';
        return view('coach.RegisteryourInterest', $data);
    }

    public function check_code(Request $request)
    {
        $code1 = $request['code'];
        $code2 = $request['digit-2'];
        $code3 = $request['digit-3'];
        $code4 = $request['digit-4'];
        $code5 = $request['digit-5'];
        $code6 = $request['digit-6'];
        $code7 = $request['digit-7'];
        $code8 = $request['digit-8'];

        $combine = $code1.$code2.$code3.$code4.$code5.$code6.$code7.$code8;
        // dd($request->all());
        $code_check = CodeMaster::where(['code' => $combine])->get();
        $count = $code_check->count();

        if($count > 0)
        {

            $get_code_data = CodeMaster::where('code',$combine)->first();
            $signup_form_counter=  $get_code_data['signup_form_counter']+1;
            $update = DB::table('code_master')->where('id',$get_code_data['id'])->update(['signup_form_counter'=> $signup_form_counter]);

            $code_check1 = CodeMaster::where(['code' => $combine,'code_flag' => '0'])->get();
            $count1 = $code_check1->count();

            if($count1 > 0)
            {
                $data['result'] = 1;
                $request->session()->put('code',$combine);
                // $update = DB::table('code_master')->where('code',$combine)->update(['code_flag'=>'1']);
            } else {
                $data['msg'] = 'Code Expired.';
                $data['result'] = 0;
            }
        } else {
            $data['msg'] = 'Code Invalid.';
            $data['result'] = 0;
        }
        return $data;

    }


    public function CheckInviteCode(Request $request)
    {
        $code= request()->code;
        $data = CodeMaster::where('code',$code)->where('code_flag',0)->first();
        if($data)
        {
            $request->session()->put('code',$code);
            $get_code_data = CodeMaster::where('code',$code)->first();
            $signup_form_counter=  $get_code_data['signup_form_counter']+1;
            $update = DB::table('code_master')->where('id',$get_code_data['id'])->update(['signup_form_counter'=> $signup_form_counter]);

            return redirect('sign-up-as-coach');
        }
        else{
            // return redirect('invite-only');
            $check_code = CodeMaster::where('code',$code)->where('code_flag',1)->first();
            if($check_code)
            {
                $get_code_data = CodeMaster::where('code',$code)->first();
                $signup_form_counter=  $get_code_data['signup_form_counter']+1;
                $update = DB::table('code_master')->where('id',$get_code_data['id'])->update(['signup_form_counter'=> $signup_form_counter]);

                return redirect()->route('code')->with('error','Code Expired.');

            }else{

                return redirect()->route('code')->with('error','Code Invalid.');
            }
        }
    }

    public function CheckEmailImageCode(Request $request)
    {
        $code= request()->code;
        $data = CodeMaster::where('code',$code)->first();
        if($data)
        {
            $email_image_counter=  $data['email_image']+1;
            $update = DB::table('code_master')->where('id',$data['id'])->update(['email_image'=> $email_image_counter]);
            // return redirect()->route('code');
            return redirect('https://coachculture.com/assets/images/EmailImage.png');
            // return view('coach.emailImageCode', $data);
        }
        else{
            return abort(404);
        }
    }

    public function CheckTrailerCounterCode(Request $request)
    {
        $code= request()->code;
        $data = CodeMaster::where('code',$code)->first();
        if($data)
        {
            $trailer_counter=  $data['trailer_counter'] + 1;
            $update = DB::table('code_master')->where('id',$data['id'])->update(['trailer_counter'=> $trailer_counter]);
            return redirect('https://youtu.be/tBYLmldMWn0');
        }
        else{
            return abort(404);
        }
    }


    public function NewsletterUnsubscribe()
    {
        $data['title'] = 'Newsletter Unsubscribe';
        return view('coach.NewsletterUnsubscribe', $data);
    }

    public function saveNewsletterUnsubscribe(Request $request)
    {


        $rules = [
            'email' => 'required|string|email'
        ];
        $customs = [
            'email.required' => 'Email is required',
            'email.email' => 'The Email must be a valid email address',
        ];

        $validator = Validator::make($request->input(), $rules, $customs);

        if ($validator->fails()) {

            if ($validator->errors()->first('email')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('email'));
            }
            $res = array("status" => false, 'error' => $validator->errors()->first());
        } else {

            $newsletter_check = Newsletter_subscribe::where(['email' => $request['email']])->first();

            if ($newsletter_check === null) {

                $res = array("status" => false, 'error' => "Email not found");
            }
            else {
                if($newsletter_check['status']=='1')
                {
                    $update = DB::table('newsletter_subscribe')->where('id',$newsletter_check['id'])
                        ->update(['status'=>'0']);
                    $res = array("status" => true, 'success' => "Newsletter unsubscribe successfully");

                }else{
                    $res = array("status" => false, 'error' => "Email already unsubscribe newsletter");
                }
            }
        }

        echo json_encode($res);
    }


    public function NewsletterResubscribe()
    {
        $data['title'] = 'Newsletter Resubscribe';
        return view('coach.NewsletterResubscribe', $data);
    }


    public function saveNewsletterResubscribe(Request $request)
    {


        $rules = [
            'email' => 'required|string|email'
        ];
        $customs = [
            'email.required' => 'Email is required',
            'email.email' => 'The Email must be a valid email address',
        ];

        $validator = Validator::make($request->input(), $rules, $customs);

        if ($validator->fails()) {

            if ($validator->errors()->first('email')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('email'));
            }
            $res = array("status" => false, 'error' => $validator->errors()->first());
        } else {

            $newsletter_check = Newsletter_subscribe::where(['email' => $request['email']])->first();

            if ($newsletter_check === null) {

                $res = array("status" => false, 'error' => "Email not found");
            }
            else {
                if($newsletter_check['status']==0)
                {
                    $update = DB::table('newsletter_subscribe')->where('id',$newsletter_check['id'])
                        ->update(['status'=>'1']);
                    $res = array("status" => true, 'success' => "Newsletter resubscribe successfully");

                }else{
                    $res = array("status" => false, 'error' => "Email already subscribe newsletter");
                }
            }
        }

        echo json_encode($res);
    }


    public function BecomeInsider()
    {
        $data['title'] = 'Become an insider';

        return view( 'coach.BecomeInsider', $data);
    }

    public function saveBecomeInsider(Request $request)
    {


        $rules = [
            'email' => 'required|string|email'
        ];
        $customs = [
            'email.required' => 'Email is required',
            'email.email' => 'The Email must be a valid email address',
        ];

        $validator = Validator::make($request->input(), $rules, $customs);

        if ($validator->fails()) {

            if ($validator->errors()->first('email')) {
                $res = array("status" => false, 'error' => $validator->errors()->first('email'));
            }
            $res = array("status" => false, 'error' => $validator->errors()->first());
        } else {

            $newsletter_check = Newsletter_subscribe::where(['email' => $request['email']])->get();


            $count1 = $newsletter_check->count();
            if($count1 == 0)
            {
                $insert = DB::table('newsletter_subscribe')->insert(array(
                    "email"=>$request['email'],'status'=>'1'));
                $res = array("status" => true, 'success' => "Newsletter resubscribe successfully");

            }else{
                $res = array("status" => false, 'error' => "Email already subscribe newsletter");
            }
        }

        echo json_encode($res);
    }


    public function CheckLoginCodeList(Request $request)
    {
        $username=$request->all()['username'];
        $password=$request->all()['password'];
        if(!empty($username) && !empty($password))
        {
            if(auth()->attempt(array('username' => $username, 'password' => $password)))
            {
                $CodeMaster =  CodeMaster::select('code', 'signup_form_counter', 'email_image','trailer_counter')->where('status','1')->orderBy('id', 'DESC')->get();
                $response=array();
                foreach ($CodeMaster as  $value) {
                    $response[$value['code']]=array(
                        'signup_form_counter'=>$value['signup_form_counter'],
                        'email_image'=>$value['email_image'],
                        'trailer_counter'=>$value['trailer_counter']
                    );
                }
                return response( $response, 200);
            }else{
                return abort(401, 'Unauthorized');
            }
        }else{
            return abort(404);
        }
    }
}
