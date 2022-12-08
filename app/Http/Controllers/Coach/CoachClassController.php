<?php

namespace App\Http\Controllers\Coach;

use App\Models\MealType;
use App\Models\ClassType;
use App\Models\Equipment;
use App\Models\CoachClass;
use App\Models\CoachRecipe;
use App\Models\MuscleGroup;
use Illuminate\Http\Request;
use Aws\S3\MultipartUploader;
use App\Models\ClassDifficulty;
use App\Models\Nationality;
use App\Models\CoachClassAddon;
use App\Models\CoachRecipeAddon;
use App\Models\DietaryRestriction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Aws\Exception\MultipartUploadException;

class CoachClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function onDemandVideoUpload()
    {
        $data['title'] = 'On Demand Video Upload';
        $data['class_type'] = ClassType::all();
        $data['class_difficulty'] = ClassDifficulty::all();
        // $data['Nationality'] = Nationality::all();
        $data['Nationality']=get_nationality_currency();
        $data['equipment'] = Equipment::all();
        return view('coach.onDemandVideoUpload', $data);
    }

    // save on demand class
    public function saveOnDemandVideoUpload(Request $request)
    {
        $this->validate($request, [
            'class_type_id' => 'required',
            'class_subtitle' => 'required|max:191',
            'class_difficulty_id' => 'required',
            // 'Nationality' => 'required',
            'duration' => 'required|string',
            'subscriber_fee' => 'required',
            'non_subscriber_fee' => 'required',
            'burn_calories' => 'required',
            'description' => 'required|string',
            // 'muscle_group' => 'required',
            // 'thumbnail_video' => 'required'
        ]);

        $user = auth()->user();

        if ($user->role == 'coach') {
            $coach_class_data = CoachClass::where(array('class_subtitle' => $request['class_subtitle'], 'coach_class_type' => 'on_demand', 'coach_id' => $user->id))->get();

            if (count($coach_class_data) != 0) {
                echo  json_encode(array('status' => false, 'error' => "Coach class subtitle already exists"));
            } else {

                $add_coach_class = array(
                    'coach_id' => $user->id,
                    'coach_class_type' => 'on_demand',
                    'class_subtitle' => $request['class_subtitle'],
                    'class_type_id' => $request['class_type_id'],
                    'class_difficulty_id' => $request['class_difficulty_id'],
                    'duration' => $request['duration'] . ' mins',
                    'subscriber_fee' => $request['subscriber_fee'],
                    'non_subscriber_fee' => $request['non_subscriber_fee'],
                    'base_currency' => $request['Nationality'],
                    // 'base_currency' =>  'USD',
                    'burn_calories' => $request['burn_calories'],
                    'description' => $request['description'],
                    'thumbnail_video' => $request['thumbnail_video'],
                );
                $coach_class = CoachClass::create($add_coach_class);
                $coach_class_id = $coach_class->id;

                if ($request['muscle_group_id']) {
                    foreach ($request['muscle_group_id'] as $value) {
                        $MuscleGroup = MuscleGroup::find($value);
                        if (isset($MuscleGroup)) {
                            CoachClassAddon::create(
                                [
                                    'coach_class_id' => $coach_class_id,
                                    'type' => 'muscle_group',
                                    'type_id' => $value
                                ]
                            );
                        }
                    }
                }

                if ($request['equipment']) {
                    foreach ($request['equipment'] as $value) {
                        $Equipment = Equipment::find($value);
                        if (isset($Equipment)) {
                            CoachClassAddon::create(
                                [
                                    'coach_class_id' => $coach_class_id,
                                    'type' => 'equipment',
                                    'type_id' => $value
                                ]
                            );
                        }
                    }
                }


                echo  json_encode(array('status' => true, 'success' => "Coach class create successfully"));
            }
        } else {

            echo  json_encode(array('status' => false, 'error' => "Invalid role for create coach class"));
        }
    }

    // Upload coach class video
    public function uploadCoachClassVideo(Request $request)
    {
        $this->validate($request, [
            'thumbnail_video' => 'required|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv|max:20000'
        ]);

        // Video Upload
        if ($request->thumbnail_video) {

            $s3Client = S3clientinint();
            $videoName = rand(0, 999999) . time() . '.' . $request->thumbnail_video->extension();
            $source = $_FILES["thumbnail_video"]['tmp_name'];

            $uploader = new MultipartUploader($s3Client, $source, [
                'bucket' => 'class-resources',
                'key' => 'on_demand_class_video/' . $videoName,
                'ACL' => 'public-read'
            ]);

            try {
                $result = $uploader->upload();
                $thumbnail_video = urldecode($result['ObjectURL']);
                $res_data = array(
                    'thumbnail_video' => $thumbnail_video,
                    'thumbnail_video_preview_link' => $thumbnail_video
                );

                echo  json_encode(array('data' =>  $res_data, 'status' => true, 'success' => "Video upload successfully"));
            } catch (MultipartUploadException $e) {
                echo  json_encode(array('status' => false, 'error' =>  $e->getMessage()));
            }
        }
    }

    public function scheduleLiveVideo()
    {
        $data['class_type'] = ClassType::all();
        $data['class_difficulty'] = ClassDifficulty::all();
        $data['equipment'] = Equipment::all();
        $data['title'] = 'Schedule Live Video';
        // $data['Nationality'] = Nationality::all();
        $data['Nationality']=get_nationality_currency();

        return view('coach.scheduleLiveVideo', $data);
    }

    // save live class
    public function saveScheduleLiveVideo(Request $request){

        $this->validate($request, [
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'class_type_id' => 'required',
            'class_subtitle' => 'required|max:191',
            'class_difficulty_id' => 'required',
            // 'class_date' => 'required|date|date_format:Y-m-d',
            // 'class_time' => 'required|date_format:H:i',
            'class_date' => 'required',
            'class_time' => 'required',
            'duration' => 'required|string',
            'subscriber_fee' => 'required',
            'non_subscriber_fee' => 'required',
            'burn_calories' => 'required',
            'description' => 'required|string',
            // 'muscle_group' => 'required',
            // 'thumbnail_image' => 'required'
        ]);

        $user = auth()->user();

        if ($user->role == 'coach') {
            $coach_class_data = CoachClass::where(array('class_subtitle' => $request['class_subtitle'], 'coach_class_type' => 'on_demand', 'coach_id' => $user->id))->get();

            if (count($coach_class_data) != 0) {
                echo  json_encode(array('status' => false, 'error' => "Coach class subtitle already exists"));
            } else {

                $tmpfile = $_FILES['thumbnail_image']['tmp_name'];
                $filename = basename($_FILES['thumbnail_image']['name']);
                $curl_data = array(
                    'coach_class_type' => 'live',
                    "thumbnail_image" => curl_file_create($tmpfile, $_FILES['thumbnail_image']['type'], $filename)
                );

                $curl = curl_init();
                $admin_api_url = getenv("admin_coach_class_image_url");
                // $admin_api_url = "http://coachculture.brainbinaryinfotech.com/api/coach-class/upload-image-video";

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

                $thumbnail_image =   $response->data->thumbnail_image;
                $add_coach_class = array(
                    'coach_id' => $user->id,
                    'coach_class_type' => 'live',
                    'class_subtitle' => $request['class_subtitle'],
                    'class_type_id' => $request['class_type_id'],
                    'class_difficulty_id' => $request['class_difficulty_id'],
                    'class_date' => $request['class_date'],
                    'class_time' => $request['class_time'],
                    'duration' => $request['duration'] . ' mins',
                    'subscriber_fee' => $request['subscriber_fee'],
                    'non_subscriber_fee' => $request['non_subscriber_fee'],
                    // 'base_currency' =>  'USD',
                    'base_currency' => $request['Nationality'],
                    'burn_calories' => $request['burn_calories'],
                    'description' => $request['description'],
                    'thumbnail_image' => $thumbnail_image
                );

                $coach_class = CoachClass::create($add_coach_class);
                $coach_class_id = $coach_class->id;

                if ($request['muscle_group_id']) {
                    foreach ($request['muscle_group_id'] as $value) {
                        $MuscleGroup = MuscleGroup::find($value);
                        if (isset($MuscleGroup)) {
                            CoachClassAddon::create(
                                [
                                    'coach_class_id' => $coach_class_id,
                                    'type' => 'muscle_group',
                                    'type_id' => $value
                                ]
                            );
                        }
                    }
                }

                if ($request['equipment']) {
                    foreach ($request['equipment'] as $value) {
                        $Equipment = Equipment::find($value);
                        if (isset($Equipment)) {
                            CoachClassAddon::create(
                                [
                                    'coach_class_id' => $coach_class_id,
                                    'type_id' => $value
                                ]
                            );
                        }
                    }
                }

                echo  json_encode(array('status' => true, 'success' => "Coach class create successfully"));
            }
        } else {

            echo  json_encode(array('status' => false, 'error' => "Invalid role for create coach class"));
        }
    }



    public function createMealRecipe()
    {
        $data['meal_type'] = MealType::all();
        $data['dietary_restriction'] = DietaryRestriction::all();

        $data['title'] = 'Create Meal Recipe';
        return view('coach.createMealRecipe', $data);
    }


    // save live class
    public function saveMealRecipe(Request $request)
    {

        $this->validate($request, [
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'title' => 'required|string|unique:coach_recipe,title',
            'sub_title' => 'required|string',
            'duration' => 'required|string',
            // 'recipe_step' => 'required|string',
            // 'dietary_restriction_id' => 'required|string',
            'meal_type_id' => 'required',
        ]);

        $user = auth()->user();

        if ($user->role == 'coach') {


            $tmpfile = $_FILES['thumbnail_image']['tmp_name'];
            $filename = basename($_FILES['thumbnail_image']['name']);
            $curl_data = array(
                "thumbnail_image" => curl_file_create($tmpfile, $_FILES['thumbnail_image']['type'], $filename)
            );

            $curl = curl_init();
            $admin_api_url = getenv("admin_coach_recipe_image_url");

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

            $thumbnail_image =   $response->data->file_path;

            if ($request['recipe_step']) {
                $i = 1;
                $recipe_step = array();
                foreach ($request['recipe_step'] as $value) {
                    $recipe_step[] = $value;
                    $i++;
                }

                $recipe_step = json_encode((object)$recipe_step);
            }



            $qty_ingredient = '';
            if ($request['qty']) {
                $i = 0;
                $qty_ingredient = array();
                foreach ($request['qty'] as $value) {
                    $weight =  $request['addmore'][$i];
                    $ingredient =  $request['ingredient'][$i];
                    if (!empty($value) &&  !empty($weight) && !empty($ingredient)) {
                        $qty_ingredient[] = array(
                            'quantity' => $value . $weight,
                            'ingredients' => $ingredient
                        );
                    }

                    $i++;
                }
                $qty_ingredient = json_encode($qty_ingredient);
            }

            $coach_recipe = CoachRecipe::create(
                [
                    'coach_id' => $user->id,
                    'thumbnail_image' => $thumbnail_image,
                    'title' => $request['title'],
                    'sub_title' => $request['sub_title'],
                    'duration' => $request['duration'] . ' mins',
                    'recipe_step' => $recipe_step,
                    'qty_ingredient' => $qty_ingredient,
                    'status' => '1'
                ]
            );

            $coach_recipe_id = $coach_recipe->id;

            if ($request['meal_type_id']) {
                foreach ($request['meal_type_id'] as $value) {
                    $MealType = MealType::find($value);
                    if (isset($MealType)) {
                        CoachRecipeAddon::create(
                            [
                                'coach_recipe_id' => $coach_recipe_id,
                                'type' => 'meal_type',
                                'type_id' => $value
                            ]
                        );
                    }
                }
            }

            if ($request['dietary_restriction_id']) {
                foreach ($request['dietary_restriction_id'] as $value) {
                    $DietaryRestriction = DietaryRestriction::find($value);
                    if (isset($DietaryRestriction)) {
                        CoachRecipeAddon::create(
                            [
                                'coach_recipe_id' => $coach_recipe_id,
                                'type' => 'dietary_restriction',
                                'type_id' => $value
                            ]
                        );
                    }
                }
            }

            echo  json_encode(array('status' => true, 'success' => "Coach recipe create successfully"));
        } else {

            echo  json_encode(array('status' => false, 'error' => "Invalid role for create coach class"));
        }
    }

    public function scanQRCode()
    {
        $data['title'] = 'Scan qr code';
        return view('coach.scanQRCode', $data);
    }

    public function uploadsuccess()
    {
        $data['title'] = 'Upload Success';
        return view('coach.uploadsuccess', $data);
    }
}
