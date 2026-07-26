<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Payment | FitTrack</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#0f172a;
    color:white;
}

.card{
    background:#1e293b;
    border:2px solid orange;
    border-radius:18px;
}

.btn-custom{
    background:orange;
    color:black;
    font-weight:bold;
}

.btn-custom:hover{
    background:#ffb84d;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<h2 class="text-warning mb-4">

💳 Add Payment

</h2>

<form action="{{ route('payments.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>User</label>

<select name="user_id" class="form-control" required>

<option value="">Select User</option>

@foreach($users as $user)

<option value="{{ $user->id }}">

{{ $user->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Membership Plan</label>

<select name="membership_plan_id" class="form-control" required>

<option value="">Select Plan</option>

@foreach($plans as $plan)

<option value="{{ $plan->id }}">

{{ $plan->plan_name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Amount</label>

<input
type="number"
step="0.01"
name="amount"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Payment Method</label>

<select
name="payment_method"
class="form-control">

<option>Cash</option>

<option>UPI</option>

<option>Card</option>

</select>

</div>

<div class="mb-3">

<label>Payment Date</label>

<input
type="date"
name="payment_date"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-control">

<option>Paid</option>

<option>Pending</option>

</select>

</div>

<button class="btn btn-custom">

Save Payment

</button>

<a href="{{ route('payments.index') }}"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</body>

</html>