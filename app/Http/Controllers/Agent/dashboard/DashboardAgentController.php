<?php

namespace App\Http\Controllers\agent\dashboard;

use App\Http\Controllers\Controller;

class DashboardAgentController extends Controller
{
    //
    function index()
    {
        return view('agent.dashboard.index');
    }
}
