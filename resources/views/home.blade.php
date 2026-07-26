<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FitTrack | Gym Management Portal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{

background:#0f172a;
color:white;
overflow-x:hidden;

}

/* NAVBAR */

.navbar{

background:rgba(15,23,42,.9);
backdrop-filter:blur(12px);
padding:15px 0;

}

.navbar-brand{

font-size:32px;
font-weight:bold;
color:#f59e0b !important;

}

.nav-link{

color:white !important;
font-size:17px;
margin-left:25px;
transition:.3s;

}

.nav-link:hover{

color:#f59e0b !important;

}

/* HERO */

.hero{

height:100vh;

background:

linear-gradient(rgba(0,0,0,.65),
rgba(0,0,0,.70)),

url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=1600&q=80');

background-size:cover;
background-position:center;

display:flex;
align-items:center;

}

.hero h1{

font-size:70px;
font-weight:bold;

}

.hero span{

color:#f59e0b;

}

.hero p{

font-size:22px;
margin-top:20px;
margin-bottom:35px;
color:#ddd;

}

.btn-main{

background:#f59e0b;
color:#111;
padding:15px 35px;
border-radius:50px;
font-weight:bold;
text-decoration:none;
transition:.3s;

}

.btn-main:hover{

background:white;
color:#111;

}

.btn-outline-custom{

border:2px solid white;
padding:15px 35px;
border-radius:50px;
color:white;
margin-left:15px;
text-decoration:none;

}

.btn-outline-custom:hover{

background:white;
color:black;

}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top">

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

<div class="collapse navbar-collapse"
id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">

<a class="nav-link"
href="{{ route('home') }}">

Home

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('login') }}">

User Login

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('admin.login') }}">

Admin Login

</a>

</li>

<li class="nav-item">

<a class="nav-link"
href="{{ route('register') }}">

Register

</a>

</li>

</ul>

</div>

</div>

</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-7">

<h1>

Transform Your

<span>

Fitness Journey

</span>

</h1>

<p>

FitTrack is a complete Gym Membership Management System that helps members manage memberships, workout plans, attendance, progress tracking and more through a modern and easy-to-use platform.

</p>

<a href="{{ route('login') }}"
class="btn-main">

User Login

</a>

<a href="{{ route('admin.login') }}"
class="btn-outline-custom">

Admin Login

</a>

</div>
<div class="col-lg-5">

<div class="card border-0 shadow-lg"
style="background:rgba(255,255,255,.08);
backdrop-filter:blur(12px);
border-radius:25px;">

<div class="card-body p-5 text-center">

<h2 class="fw-bold text-warning">

Welcome to FitTrack

</h2>

<p class="text-light mt-3">

Manage your gym membership, workout plans,
attendance and fitness progress with one click.

</p>

<div class="d-grid gap-3 mt-4">

<a href="{{ route('login') }}"
class="btn btn-warning btn-lg">

<i class="bi bi-person-fill"></i>

User Login

</a>

<a href="{{ route('admin.login') }}"
class="btn btn-danger btn-lg">

<i class="bi bi-shield-lock-fill"></i>

Admin Login

</a>

<a href="{{ route('register') }}"
class="btn btn-outline-light btn-lg">

<i class="bi bi-person-plus-fill"></i>

Register

</a>

</div>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- FEATURES -->

<section class="py-5"
style="background:#111827;">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold text-warning">

Why Choose FitTrack?

</h2>

<p class="text-light">

Smart Gym Management Solution

</p>

</div>

<div class="row g-4">

<div class="col-md-4">

<div class="card bg-dark border-warning text-white h-100 shadow">

<div class="card-body text-center p-4">

<i class="bi bi-credit-card display-3 text-warning"></i>

<h4 class="mt-3">

Membership Management

</h4>

<p>

Manage gym memberships, plans,
expiry dates and renewals easily.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card bg-dark border-warning text-white h-100 shadow">

<div class="card-body text-center p-4">

<i class="bi bi-camera-video-fill display-3 text-warning"></i>

<h4 class="mt-3">

Workout Videos

</h4>

<p>

Watch exercise videos and
follow professional workout plans.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card bg-dark border-warning text-white h-100 shadow">

<div class="card-body text-center p-4">

<i class="bi bi-graph-up-arrow display-3 text-warning"></i>

<h4 class="mt-3">

Progress Tracking

</h4>

<p>

Track weight, BMI,
attendance and fitness improvement.

</p>

</div>

</div>

</div>

</div>

</div>

</section>
<!-- ================= FOOTER ================= -->

<footer class="py-5 bg-black text-white">

<div class="container">

<div class="row">

<div class="col-md-4">

<h3 class="text-warning fw-bold">

💪 FitTrack

</h3>

<p class="mt-3">

A Complete Gym Membership Management System
developed using Laravel Framework.

</p>

</div>

<div class="col-md-4">

<h4 class="text-warning">

Quick Links

</h4>

<ul class="list-unstyled mt-3">

<li class="mb-2">

<a href="{{ route('home') }}"
class="text-white text-decoration-none">

Home

</a>

</li>

<li class="mb-2">

<a href="{{ route('login') }}"
class="text-white text-decoration-none">

User Login

</a>

</li>

<li class="mb-2">

<a href="{{ route('admin.login') }}"
class="text-white text-decoration-none">

Admin Login

</a>

</li>

<li class="mb-2">

<a href="{{ route('register') }}"
class="text-white text-decoration-none">

Register

</a>

</li>

</ul>

</div>

<div class="col-md-4">

<h4 class="text-warning">

Contact

</h4>

<p class="mt-3">

<i class="bi bi-geo-alt-fill"></i>

Nashik, Maharashtra

</p>

<p>

<i class="bi bi-envelope-fill"></i>

fittrack@gmail.com

</p>

<p>

<i class="bi bi-telephone-fill"></i>

+91 9876543210

</p>

</div>

</div>

<hr class="border-secondary mt-4">

<div class="text-center">

<p class="mb-0">

© 2026 FitTrack | All Rights Reserved

</p>

</div>

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>