<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CoachClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function startOnDemandClass(Request $request, $id)
    {
        $id = base64_decode($id);
        $response = CoachClass::find($id);
        $data['thumbnail_video'] = ($response->thumbnail_video) ? $response->thumbnail_video : '';
        $class_type_data = get_row('class_type', array('class_type_name'), array('id' => $response->class_type_id));
        $data['class_type'] = $class_type_data->class_type_name;
        $data['class_subtitle'] = $response->class_subtitle;
        $user_data = get_row('users', array('username', 'user_image'), array('id' => $response->coach_id));
        $data['username'] = $user_data->username;
        $data['title'] = 'Start Class';
        return view('user.startclass', $data);
    }
}
