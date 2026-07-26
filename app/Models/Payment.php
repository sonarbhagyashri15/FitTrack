<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [

        'user_id',
        'membership_plan_id',
        'amount',
        'payment_method',
        'payment_date',
        'status'

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function membership()
    {
        return $this->belongsTo(MembershipPlan::class, 'membership_plan_id');
    }
}