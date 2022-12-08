<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CodeMaster;

class CodemasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    }
}
