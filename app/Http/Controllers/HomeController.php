<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Settings;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $file = Settings::getIntro()->value;
        return view('home')->with('file',Markdown::convertToHtml($file));
    }
}
