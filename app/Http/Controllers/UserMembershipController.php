<?php
namespace App\Http\Controllers;
use App\Models\UserMembership;
use App\Models\MembershipPlan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class UserMembershipController extends Controller
{
    public function store($id)
    {
        $plan = MembershipPlan::findOrFail($id);
        $months = (int) filter_var($plan->duration, FILTER_SANITIZE_NUMBER_INT);
        if ($months <= 0) {
            $months = 1;
        }
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addMonths($months);
        UserMembership::create([
            'user_id' => Auth::id(),
            'membership_plan_id' => $plan->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'active'
        ]);
        return redirect()
            ->route('dashboard')
            ->with('success', 'Membership Purchased Successfully');
    }
}