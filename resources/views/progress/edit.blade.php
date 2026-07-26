<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Progress | FitTrack</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
background:#0d1117;
color:white;
font-family:Arial,Helvetica,sans-serif;
}

.navbar{
background:#111;
}

.navbar-brand{
color:#ff9800!important;
font-size:30px;
font-weight:bold;
}

.card{
background:#1b1b1b;
border:2px solid #ff9800;
border-radius:20px;
box-shadow:0 0 20px rgba(255,152,0,.25);
}

.form-control{
background:#2b2b2b;
border:none;
color:white;
}

.form-control:focus{
background:#2b2b2b;
color:white;
box-shadow:none;
border:1px solid #ff9800;
}

.btn-orange{
background:#ff9800;
color:white;
font-weight:bold;
border-radius:30px;
padding:10px 30px;
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
href="{{ route('dashboard') }}">

💪 FitTrack

</a>

</div>

</nav>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-7">

<div class="card p-4">

<h2 class="text-warning mb-4 text-center">

Edit Progress

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

<form action="{{ route('progress.update',$progress->id) }}"
method="POST">

@csrf

@method('PUT')
<div class="mb-4">

    <label class="form-label fw-bold">

        <i class="bi bi-speedometer2 text-warning"></i>

        Weight (Kg)

    </label>

    <input type="number"
           step="0.01"
           name="weight"
           class="form-control form-control-lg"
           value="{{ old('weight',$progress->weight) }}"
           placeholder="Enter Weight">

</div>


<div class="mb-4">

    <label class="form-label fw-bold">

        <i class="bi bi-rulers text-warning"></i>

        Height (cm)

    </label>

    <input type="number"
           step="0.01"
           name="height"
           class="form-control form-control-lg"
           value="{{ old('height',$progress->height) }}"
           placeholder="Enter Height">

</div>


<div class="mb-4">

    <label class="form-label fw-bold">

        <i class="bi bi-calendar-event text-warning"></i>

        Workout Date

    </label>

    <input type="date"
           name="workout_date"
           class="form-control form-control-lg"
           value="{{ old('workout_date',$progress->workout_date) }}">

</div>


<div class="alert alert-dark border border-warning">

    <h5 class="text-warning">

        Current BMI

    </h5>

    <h2>

        {{ number_format($progress->bmi,2) }}

    </h2>

    <small class="text-secondary">

        BMI will automatically update after saving changes.

    </small>

</div>


<div class="d-flex justify-content-between mt-4">

    <a href="{{ route('progress.index') }}"
       class="btn btn-secondary btn-lg">

        <i class="bi bi-arrow-left-circle"></i>

        Back

    </a>

    <button type="submit"
            class="btn btn-orange btn-lg">

        <i class="bi bi-check-circle-fill"></i>

        Update Progress

    </button>

</div>
</form>

</div>

</div>

</div>

</div>

<!-- ================= FOOTER ================= -->

<footer class="bg-black text-white pt-5 pb-3 border-top border-warning mt-5">

    <div class="container">

        <div class="row">

            <div class="col-md-4 mb-4">

                <h2 class="text-warning">

                    💪 FitTrack

                </h2>

                <p class="text-light">

                    Track your fitness journey, update your progress,
                    and achieve your goals with FitTrack.

                </p>

            </div>

            <div class="col-md-4 mb-4">

                <h4 class="text-warning">

                    Quick Links

                </h4>

                <ul class="list-unstyled">

                    <li class="mb-2">

                        <a href="{{ route('home') }}"
                           class="text-decoration-none text-light">

                            Home

                        </a>

                    </li>

                    <li class="mb-2">

                        <a href="{{ route('dashboard') }}"
                           class="text-decoration-none text-light">

                            Dashboard

                        </a>

                    </li>

                    <li class="mb-2">

                        <a href="{{ route('membership-plans.index') }}"
                           class="text-decoration-none text-light">

                            Membership Plans

                        </a>

                    </li>

                    <li class="mb-2">

                        <a href="{{ route('workout-plans.index') }}"
                           class="text-decoration-none text-light">

                            Workout Plans

                        </a>

                    </li>

                    <li class="mb-2">

                        <a href="{{ route('workout-videos.index') }}"
                           class="text-decoration-none text-light">

                            Workout Videos

                        </a>

                    </li>

                    <li class="mb-2">

                        <a href="{{ route('progress.index') }}"
                           class="text-decoration-none text-light">

                            Progress

                        </a>

                    </li>

                </ul>

            </div>

            <div class="col-md-4 mb-4">

                <h4 class="text-warning">

                    Contact Us

                </h4>

                <p>📍 Nashik, Maharashtra</p>

                <p>📞 +91 9876543210</p>

                <p>✉ fittrack@gmail.com</p>

                <div class="mt-3">

                    <i class="bi bi-facebook fs-3 text-primary me-3"></i>

                    <i class="bi bi-instagram fs-3 text-danger me-3"></i>

                    <i class="bi bi-twitter-x fs-3 text-info me-3"></i>

                    <i class="bi bi-youtube fs-3 text-danger"></i>

                </div>

            </div>

        </div>

        <hr class="border-warning">

        <div class="text-center">

            <p class="mb-0">

                © 2026
                <span class="text-warning fw-bold">

                    FitTrack

                </span>

                | Gym Membership & Workout Management System

            </p>

        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>