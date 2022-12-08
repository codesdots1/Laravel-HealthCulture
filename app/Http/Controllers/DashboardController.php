<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coachchannel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\CoachClassViewers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\CodeMaster;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

    }

    public function coach() {
        $data['title'] = 'Coach dashboard';
        return view('coach.dashboard', $data);
    }

    public function user() {

        $user = auth()->user();
        $sqlQuery = "SELECT * FROM coach_class WHERE class_date >= CURRENT_DATE()  AND status='1'  ORDER BY class_date and class_time ASC LIMIT 1";
        // $sqlQuery = "SELECT * FROM coach_class";

        $upcoming_live_class = DB::select($sqlQuery
        );

        $response=[];
        if (count($upcoming_live_class) != 0) {

            $upcoming_live_class = $upcoming_live_class[0];

            $response['id'] = $upcoming_live_class->id;
            $response['coach_class_type'] = $upcoming_live_class->coach_class_type;

            $class_type_data = get_row('class_type', array('class_type_name'), array('id' => $upcoming_live_class->class_type_id));
            $response['class_type'] = $class_type_data->class_type_name;

            $response['class_subtitle'] = $upcoming_live_class->class_subtitle;
            $response['class_date'] = $upcoming_live_class->class_date;
            $response['class_time'] = $upcoming_live_class->class_time;

            $user_data = get_row('users', array('username', 'user_image'), array('id' => $upcoming_live_class->coach_id));
            $response['username'] = $user_data->username;
            $response['user_image'] = ($user_data->user_image) ? getenv("admin_base_url") . $user_data->user_image : '';

            $response['total_views'] = CoachClassViewers::select("id")->where('coach_class_id', $upcoming_live_class->id)->count();


            $response['thumbnail_video'] = ($upcoming_live_class->thumbnail_video) ? $upcoming_live_class->thumbnail_video : '';
            if ($upcoming_live_class->coach_class_type == 'live') {

                $CoachchannelInfo = Coachchannel::select('ingest_endpoint', 'playbackurl', 'streamdata')->where('coach_id', $upcoming_live_class->coach_id)->first();
                if ($upcoming_live_class->coach_id == $user->id) {
                    $CoachchannelInfo->streamdata = $CoachchannelInfo->streamdata;
                } else {
                    unset($CoachchannelInfo->streamdata);
                }
                $response['coach_channel'] = $CoachchannelInfo;
            }
        }

        $data['upcoming_live_class'] = $response;
        $data['title'] = 'User dashboard';
        return view('user.dashboard', $data);
    }
}
