<?php

namespace App\Http\Controllers;

use App\Models\MembershipPlan;

class HomeController extends Controller
{
    public function index()
    {
        $plans = MembershipPlan::all();

        return view('home', compact('plans'));
    }
}