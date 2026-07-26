<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FitTrack | Membership Plans</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial, Helvetica, sans-serif;
}

body{

background:#0d0d0d;
color:white;

}

/* NAVBAR */

.navbar{

background:#111;
box-shadow:0 2px 15px rgba(0,0,0,.5);

}

.navbar-brand{

font-size:30px;
font-weight:bold;
color:#ff9800 !important;

}

.nav-link{

color:white !important;
margin-left:15px;
transition:.3s;

}

.nav-link:hover{

color:#ff9800 !important;

}

/* HERO */



.hero h1{

font-size:40px;
font-weight:bold;

}

.hero span{

color:#ff9800;

}

.hero p{

font-size:20px;
margin-top:15px;

}

.btn-orange{

background:#ff9800;
color:white;
padding:12px 30px;
border:none;
border-radius:40px;
font-weight:bold;

}

.btn-orange:hover{

background:white;
color:#ff9800;

}


.plan-section{

padding:60px 0;

}

.membership-card{

background:#181818;
border:1px solid #ff9800;
border-radius:20px;
padding:25px;
transition:.4s;
height:100%;

}

.membership-card:hover{

transform:translateY(-10px);
box-shadow:0 0 20px rgba(255,152,0,.5);

}

.plan-name{

color:#ff9800;
font-size:28px;
font-weight:bold;

}

.price{

font-size:45px;
font-weight:bold;

}

.duration{

color:#ffc107;

}

.description{

color:#cccccc;

}

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg">

<div class="container">

<a class="navbar-brand"
href="{{ route('home') }}">

💪 FitTrack

</a>

<button class="navbar-toggler bg-light"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>



</div>

</nav>

<section class="hero">

<div class="container">

<h1>

Choose Your

<span>

Membership

</span>

</h1>





<div class="mt-4">
@if(auth()->user()->role == 'admin')

<a href="{{ route('membership-plans.create') }}"
class="btn btn-orange">

<i class="bi bi-plus-circle"></i>

Add New Plan

</a>
@endif
</div>

</div>

</section>

<section class="plan-section">

<div class="container">

<div class="row">
{{-- Success Message --}}
@if(session('success'))
<div class="col-12">
    <div class="alert alert-success alert-dismissible fade show shadow mb-4" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

{{-- Validation Errors --}}
@if ($errors->any())
<div class="col-12">
    <div class="alert alert-danger alert-dismissible fade show shadow mb-4">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

@if($plans->count())

@foreach($plans as $plan)

<div class="col-lg-4 col-md-6 mb-4">

    <div class="membership-card">

        <div class="text-center">

            <div class="mb-3">

                <i class="bi bi-gem text-warning"
                   style="font-size:55px;"></i>

            </div>

            <h3 class="plan-name">

                {{ $plan->plan_name }}

            </h3>

            <h1 class="price">

                ₹{{ number_format($plan->price,2) }}

            </h1>

            <span class="badge bg-warning text-dark fs-6">

                {{ $plan->duration }}

            </span>

        </div>

        <hr class="border-warning">

        <p class="description">

            {{ $plan->description }}

        </p>

        <div class="d-grid gap-2 mt-4">

            {{-- Buy Membership --}}
            <form action="{{ route('buy.membership',$plan->id) }}"
                  method="POST">

                @csrf

                <button class="btn btn-success w-100">

                    <i class="bi bi-cart-check-fill"></i>

                    Buy Membership

                </button>

            </form>

            {{-- Edit --}}
            @if(auth()->user()->role == 'admin')

            <a href="{{ route('membership-plans.edit',$plan->id) }}"
               class="btn btn-primary">

                <i class="bi bi-pencil-square"></i>

                Edit Plan

            </a>
            @endif

            {{-- Delete --}}
            @if(auth()->user()->role == 'admin')

            <form action="{{ route('membership-plans.destroy',$plan->id) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this membership plan?');">

                @csrf

                @method('DELETE')

                <button class="btn btn-danger w-100">

                    <i class="bi bi-trash3-fill"></i>

                    Delete Plan

                </button>

            </form>
            @endif

        </div>

    </div>

</div>

@endforeach

@else

<div class="col-12">

    <div class="alert alert-warning text-center p-5 shadow">

        <h3>

            <i class="bi bi-exclamation-circle-fill"></i>

            No Membership Plans Available

        </h3>

        <p class="mt-3">

            Click the <strong>Add New Plan</strong> button to create your first membership plan.

        </p>

    </div>

</div>

@endif
</div>

</div>

</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>