<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Payment History | FitTrack</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

.table{
    color:white;
}

.table thead{
    background:orange;
    color:black;
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

<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="text-warning">

💳 Payment History

</h2>

@if(auth()->user()->role=='admin')

<a href="{{ route('payments.create') }}"
class="btn btn-custom">

<i class="bi bi-plus-circle"></i>

Add Payment

</a>

@endif
<a href="{{ url()->previous() }}"
class="btn btn-outline-light">

<i class="bi bi-arrow-left"></i>

Back

</a>

</div>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="card p-4">

<div class="table-responsive">

<table class="table table-bordered table-hover">

<thead>

<tr>

@if(auth()->user()->role=='admin')
<th>ID</th>
@endif

<th>User</th>

<th>Membership</th>

<th>Amount</th>

<th>Method</th>

<th>Date</th>

<th>Status</th>

@if(auth()->user()->role=='admin')
<th>Action</th>
@endif

</tr>

</thead>

<tbody>

@forelse($payments as $payment)

<tr>

@if(auth()->user()->role=='admin')
<td>{{ $payment->id }}</td>
@endif

<td>{{ $payment->user->name }}</td>

<td>{{ $payment->membership->plan_name }}</td>

<td>₹ {{ number_format($payment->amount,2) }}</td>

<td>{{ $payment->payment_method }}</td>

<td>{{ $payment->payment_date }}</td>

<td>

@if($payment->status=='Paid')

<span class="badge bg-success">

Paid

</span>

@else

<span class="badge bg-danger">

Pending

</span>

@endif

</td>

@if(auth()->user()->role=='admin')

<td>

<a href="{{ route('payments.edit',$payment->id) }}"
class="btn btn-primary btn-sm">

Edit

</a>

<form action="{{ route('payments.destroy',$payment->id) }}"
method="POST"
style="display:inline;">

@csrf

@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Delete this payment?')">

Delete

</button>

</form>

</td>

@endif

</tr>

@empty

<tr>

<td colspan="{{ auth()->user()->role=='admin' ? 8 : 6 }}"
class="text-center">

No Payment Records Found

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>