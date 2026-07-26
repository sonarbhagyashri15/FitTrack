<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Membership | FitTrack</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,Helvetica,sans-serif;
}

body{

background:#0d0d0d;
color:white;

}

.navbar{

background:#111;

}

.navbar-brand{

font-size:30px;
font-weight:bold;
color:#ff9800!important;

}

.nav-link{

color:white!important;
margin-left:18px;

}

.nav-link:hover{

color:#ff9800!important;

}

.hero h1{

font-size:40px;
font-weight:bold;

}

.hero span{

color:#ff9800;

}

.edit-card{

background:#181818;

border:1px solid #ff9800;

border-radius:20px;

padding:40px;

box-shadow:0 0 25px rgba(255,152,0,.30);

}

.form-control,
.form-select,
textarea{

background:#222;
color:white;
border:1px solid #555;

}

.form-control:focus,
.form-select:focus,
textarea:focus{

background:#222;
color:white;
border-color:#ff9800;
box-shadow:none;

}

.btn-orange{

background:#ff9800;
color:white;
font-weight:bold;
border-radius:30px;
padding:12px 30px;

}

.btn-orange:hover{

background:white;
color:#ff9800;

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

Edit

<span>

Membership Plan

</span>

</h1>
</div>

</section>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="edit-card">

<h2 class="text-warning text-center mb-4">

<i class="bi bi-pencil-square"></i>

Update Membership

</h2>

@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form method="POST"
action="{{ route('membership-plans.update',$plan->id) }}">

@csrf

@method('PUT')
<div class="row">

    <div class="col-md-6 mb-4">

        <label class="form-label fw-bold">

            <i class="bi bi-award-fill text-warning"></i>

            Plan Name

        </label>

        <input type="text"
               name="plan_name"
               class="form-control form-control-lg"
               value="{{ old('plan_name', $plan->plan_name) }}"
               placeholder="Enter Plan Name">

    </div>

    <div class="col-md-6 mb-4">

        <label class="form-label fw-bold">

            <i class="bi bi-calendar-check-fill text-warning"></i>

            Duration

        </label>

        <select name="duration"
                class="form-select form-select-lg">

            <option value="1 Month" {{ $plan->duration=='1 Month' ? 'selected' : '' }}>1 Month</option>

            <option value="3 Months" {{ $plan->duration=='3 Months' ? 'selected' : '' }}>3 Months</option>

            <option value="6 Months" {{ $plan->duration=='6 Months' ? 'selected' : '' }}>6 Months</option>

            <option value="12 Months" {{ $plan->duration=='12 Months' ? 'selected' : '' }}>12 Months</option>

        </select>

    </div>

    <div class="col-md-12 mb-4">

        <label class="form-label fw-bold">

            <i class="bi bi-currency-rupee text-warning"></i>

            Membership Price

        </label>

        <input type="number"
               name="price"
               class="form-control form-control-lg"
               value="{{ old('price', $plan->price) }}"
               placeholder="Enter Membership Price">

    </div>

    <div class="col-md-12 mb-4">

        <label class="form-label fw-bold">

            <i class="bi bi-card-text text-warning"></i>

            Description

        </label>

        <textarea
            name="description"
            rows="5"
            class="form-control"
            placeholder="Write membership description...">{{ old('description', $plan->description) }}</textarea>

    </div>

</div>

<div class="text-center mt-4">

    <button type="submit"
            class="btn btn-orange btn-lg px-5">

        <i class="bi bi-check-circle-fill"></i>

        Update Membership

    </button>

    <a href="{{ route('membership-plans.index') }}"
       class="btn btn-secondary btn-lg px-5 ms-3">

        <i class="bi bi-arrow-left-circle"></i>

        Back

    </a>

</div>
</form>

</div>

</div>

</div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>