<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OverlayController;
use App\Models\Overlaytype;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $displayData = DB::select("select * from pagesettings ORDER BY id DESC limit 1"); 
    return view("/home",["displayData" => $displayData]);

    
});

Route::post("/submitemail",[OverlayController::class,"store"]);

Route::get('/setting', function () {
    return view('setting');
});

Route::post('/savesettings',[OverlayController::class,"saveSetting"]);


