<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\MembershipPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Payment List
    public function index()
    {
        if (Auth::user()->role == 'admin') {

            $payments = Payment::with(['user', 'membership'])
                ->latest()
                ->get();

        } else {

            $payments = Payment::with(['user', 'membership'])
                ->where('user_id', Auth::id())
                ->latest()
                ->get();

        }

        return view('payment.index', compact('payments'));
    }

    // Add Payment (Admin Only)
    public function create()
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $users = User::all();
        $plans = MembershipPlan::all();

        return view('payment.create', compact('users', 'plans'));
    }

    // Store Payment (Admin Only)
    public function store(Request $request)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $request->validate([
            'user_id' => 'required',
            'membership_plan_id' => 'required',
            'amount' => 'required|numeric',
            'payment_method' => 'required',
            'payment_date' => 'required|date',
            'status' => 'required'
        ]);

        Payment::create([
            'user_id' => $request->user_id,
            'membership_plan_id' => $request->membership_plan_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment Added Successfully.');
    }

    // Edit Payment (Admin Only)
    public function edit($id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $payment = Payment::findOrFail($id);

        $users = User::all();
        $plans = MembershipPlan::all();

        return view('payment.edit', compact(
            'payment',
            'users',
            'plans'
        ));
    }

    // Update Payment (Admin Only)
    public function update(Request $request, $id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $request->validate([
            'user_id' => 'required',
            'membership_plan_id' => 'required',
            'amount' => 'required|numeric',
            'payment_method' => 'required',
            'payment_date' => 'required|date',
            'status' => 'required'
        ]);

        $payment = Payment::findOrFail($id);

        $payment->update([
            'user_id' => $request->user_id,
            'membership_plan_id' => $request->membership_plan_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment Updated Successfully.');
    }

    // Delete Payment (Admin Only)
    public function destroy($id)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $payment = Payment::findOrFail($id);

        $payment->delete();

        return redirect()
            ->route('payments.index')
            ->with('success', 'Payment Deleted Successfully.');
    }
}