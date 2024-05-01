<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pagesetting;
use Illuminate\Http\Request;
use App\Models\Email;
use Illuminate\Support\Facades\DB;

class OverlayController extends Controller
{
    public function store(Request $request)
    {
        $newEmail    = $request->input('email');
        $data        = new Email;
        $existEmails = Email::pluck('email');
        foreach($existEmails as $email){
           if($email == $newEmail){
            return false;
           }
        }
        $data->email = $newEmail;

        $data->save();

        return $data->id;


    }

    public function saveSetting(Request $request){
        $title          = $request->input("title");
        $targetingRule  = $request->input("targeting_rule");
        $overlayType    = $request->input('overlay_type');
        $displayRules   = $request->input('display_rules');

        $data                = new Pagesetting;
        $data->titles         = $title;
        $data->targetrules = $targetingRule;
        $data->overlaytypes   = $overlayType;  
        $data->displayrules  = $displayRules;
        $data->save();
        return "Successfully Setting Saved...";
    }  
}
