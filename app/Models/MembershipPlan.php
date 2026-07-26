<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    protected $fillable = [
        'plan_name',
        'duration',
        'price',
        'description'
    ];

    public function memberships()
    {
        return $this->hasMany(UserMembership::class);
    }
}