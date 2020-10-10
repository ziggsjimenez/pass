<?php

namespace App\Http\Controllers;

use App\Pass;
use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Auth;


class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function welcome(){

        $passes = Pass::where('user_id',Auth::user()->id)->get();

        return redirect(route('passes.index',compact('passes')));

    }


}
