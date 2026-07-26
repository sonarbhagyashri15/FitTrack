<?php

namespace App\Http\Controllers;

use App\Models\MembershipPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipPlanController extends Controller
{
    public function index()
    {
        $plans = MembershipPlan::all();

        return view('membership.index', compact('plans'));
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }

        return view('membership.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'plan_name'   => 'required|max:100',
            'duration'    => 'required|max:50',
            'price'       => 'required|numeric|min:0',
            'description' => 'required'
        ]);

        MembershipPlan::create([
            'plan_name'   => $request->plan_name,
            'duration'    => $request->duration,
            'price'       => $request->price,
            'description' => $request->description
        ]);

        return redirect()
            ->route('membership-plans.index')
            ->with('success', 'Membership plan added successfully.');
    }

    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }

        $plan = MembershipPlan::findOrFail($id);

        return view('membership.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'plan_name'   => 'required|max:100',
            'duration'    => 'required|max:50',
            'price'       => 'required|numeric|min:0',
            'description' => 'required'
        ]);

        $plan = MembershipPlan::findOrFail($id);

        $plan->update([
            'plan_name'   => $request->plan_name,
            'duration'    => $request->duration,
            'price'       => $request->price,
            'description' => $request->description
        ]);

        return redirect()
            ->route('membership-plans.index')
            ->with('success', 'Membership plan updated successfully.');
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            abort(403, 'Unauthorized');
        }

        $plan = MembershipPlan::findOrFail($id);

        $plan->delete();

        return redirect()
            ->route('membership-plans.index')
            ->with('success', 'Membership plan deleted successfully.');
    }
}