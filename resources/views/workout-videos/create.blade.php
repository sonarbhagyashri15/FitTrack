@if(auth()->user()->role!='admin')

{{ abort(403) }}

@endif
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Workout Video | FitTrack</title>

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

.hero{
padding:70px 0;
background:
linear-gradient(rgba(0,0,0,.75),rgba(0,0,0,.75)),
url('https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=1600&q=80');
background-size:cover;
background-position:center;
text-align:center;
}

.hero h1{
font-size:55px;
font-weight:bold;
}

.hero span{
color:#ff9800;
}

.form-card{
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
border-radius:30px;
padding:12px 30px;
font-weight:bold;
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

<a class="navbar-brand" href="{{ route('home') }}">

💪 FitTrack

</a>

<div class="collapse navbar-collapse">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('membership-plans.index') }}">Membership</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('workout-plans.index') }}">Workout</a>
</li>

<li class="nav-item">
<a class="nav-link text-warning" href="{{ route('workout-videos.index') }}">Workout Videos</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('progress.index') }}">Progress</a>
</li>

<li class="nav-item">

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="btn btn-danger ms-3">

Logout

</button>

</form>

</li>

</ul>

</div>

</div>

</nav>

<section class="hero">

<div class="container">

<h1>

Upload

<span>

Workout Video

</span>

</h1>

<p>

Upload training videos for gym members.

</p>

</div>

</section>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="form-card">

<h2 class="text-warning text-center mb-4">

<i class="bi bi-camera-video-fill"></i>

Add Workout Video

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

<form action="{{ route('workout-videos.store') }}"
method="POST">

@csrf
<div class="row">

    <div class="col-md-6 mb-4">

        <label class="form-label fw-bold">

            <i class="bi bi-card-heading text-warning"></i>

            Video Title

        </label>

        <input type="text"
               name="title"
               class="form-control form-control-lg"
               value="{{ old('title') }}"
               placeholder="Enter Workout Video Title">

    </div>

    <div class="col-md-6 mb-4">

        <label class="form-label fw-bold">

            <i class="bi bi-list-ul text-warning"></i>

            Category

        </label>

        <select name="category"
                class="form-select form-select-lg">

            <option value="">Select Category</option>

            <option value="Cardio">Cardio</option>

            <option value="Strength Training">Strength Training</option>

            <option value="Yoga">Yoga</option>

            <option value="CrossFit">CrossFit</option>

            <option value="Weight Loss">Weight Loss</option>

            <option value="Body Building">Body Building</option>

            <option value="Stretching">Stretching</option>

        </select>

    </div>

<div class="col-md-12 mb-4">

<label class="form-label fw-bold">

<i class="bi bi-youtube text-warning"></i>

YouTube Video Link

</label>


<input type="text"
name="youtube_url"
class="form-control form-control-lg"
value="{{ old('youtube_url') }}"
placeholder="https://youtu.be/example">


<small class="text-secondary">

Paste YouTube video URL

</small>

</div>

    <div class="col-md-12 mb-4">

        <label class="form-label fw-bold">

            <i class="bi bi-file-text text-warning"></i>

            Description

        </label>

        <textarea
            name="description"
            rows="5"
            class="form-control"
            placeholder="Write workout video description...">{{ old('description') }}</textarea>

    </div>

</div>

<div class="text-center mt-4">

    <button type="submit"
            class="btn btn-orange btn-lg px-5">

        <i class="bi bi-cloud-arrow-up-fill"></i>

        Upload Video

    </button>

    <a href="{{ route('workout-videos.index') }}"
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

<!-- ================= FOOTER ================= -->

<footer class="bg-black text-white pt-5 pb-3 border-top border-warning">

    <div class="container">

        <div class="row">

            <div class="col-md-4 mb-4">

                <h2 class="text-warning">

                    💪 FitTrack

                </h2>

                <p class="text-light">

                    Train smarter with professional workout videos and achieve
                    your fitness goals with FitTrack.

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

                <p>

                    📍 Nashik, Maharashtra

                </p>

                <p>

                    📞 +91 9876543210

                </p>

                <p>

                    ✉ fittrack@gmail.com

                </p>

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