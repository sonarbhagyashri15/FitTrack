<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Payment | FitTrack</title>

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

✏️ Edit Payment

</h2>

<form action="{{ route('payments.update',$payment->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>User</label>

<select name="user_id" class="form-control" required>

@foreach($users as $user)

<option value="{{ $user->id }}"
{{ $payment->user_id == $user->id ? 'selected' : '' }}>

{{ $user->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Membership Plan</label>

<select name="membership_plan_id" class="form-control" required>

@foreach($plans as $plan)

<option value="{{ $plan->id }}"
{{ $payment->membership_plan_id == $plan->id ? 'selected' : '' }}>

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
value="{{ $payment->amount }}"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Payment Method</label>

<select name="payment_method" class="form-control">

<option value="Cash"
{{ $payment->payment_method=='Cash' ? 'selected' : '' }}>

Cash

</option>

<option value="UPI"
{{ $payment->payment_method=='UPI' ? 'selected' : '' }}>

UPI

</option>

<option value="Card"
{{ $payment->payment_method=='Card' ? 'selected' : '' }}>

Card

</option>

</select>

</div>

<div class="mb-3">

<label>Payment Date</label>

<input
type="date"
name="payment_date"
value="{{ $payment->payment_date }}"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status" class="form-control">

<option value="Paid"
{{ $payment->status=='Paid' ? 'selected' : '' }}>

Paid

</option>

<option value="Pending"
{{ $payment->status=='Pending' ? 'selected' : '' }}>

Pending

</option>

</select>

</div>

<button class="btn btn-custom">

Update Payment

</button>

<a href="{{ route('payments.index') }}"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

</body>

</html>