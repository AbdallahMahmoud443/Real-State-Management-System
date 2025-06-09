<?php

namespace App\Http\Controllers\User\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    //
    function index()
    {
        return view('user.dashboard.index');
    }
}
