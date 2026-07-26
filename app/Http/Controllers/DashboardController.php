<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MembershipPlan;
use App\Models\UserMembership;
use App\Models\WorkoutPlan;
use App\Models\Progress;
use App\Models\WorkoutVideo;

class DashboardController extends Controller
{
    public function index()
    {

        $totalUsers = User::count();

        $totalMemberships = MembershipPlan::count();

        $activeMemberships = UserMembership::where('status','active')
                                ->count();

        $expiredMemberships = UserMembership::where('status','expired')
                                ->count();


        $totalWorkouts = WorkoutPlan::count();


        $totalVideos = WorkoutVideo::count();


        $totalProgress = Progress::count();


        $recentUsers = User::latest()
                        ->take(5)
                        ->get();


        $recentMemberships = UserMembership::with('user','plan')
                        ->latest()
                        ->take(5)
                        ->get();



        return view('admin.dashboard',compact(

            'totalUsers',
            'totalMemberships',
            'activeMemberships',
            'expiredMemberships',
            'totalWorkouts',
            'totalVideos',
            'totalProgress',
            'recentUsers',
            'recentMemberships'

        ));

    }
}