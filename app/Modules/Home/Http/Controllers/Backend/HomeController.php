<?php

namespace App\Modules\Home\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Home::index");
    }
    public function signup()
    {
        return view ("Home::signup");
    }
}
