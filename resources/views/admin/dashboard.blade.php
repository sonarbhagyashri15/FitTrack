<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard | FitTrack</title>

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
background:#0d1117;
color:white;
overflow-x:hidden;
}

.sidebar{

position:fixed;

left:0;

top:0;

width:260px;

height:100vh;

background:#111827;

padding:30px 20px;

border-right:2px solid #ff9800;

}

.logo{

font-size:30px;

font-weight:bold;

color:#ff9800;

text-align:center;

margin-bottom:40px;

}

.sidebar a{

display:block;

padding:15px;

margin-bottom:12px;

border-radius:10px;

text-decoration:none;

color:white;

transition:.3s;

font-size:17px;

}

.sidebar a:hover{

background:#ff9800;

color:black;

}

.main{

margin-left:260px;

padding:35px;

}

.header{

display:flex;

justify-content:space-between;

align-items:center;

margin-bottom:40px;

}

.header h2{

font-weight:bold;

}

.card-box{

background:#1f2937;

border:2px solid #ff9800;

border-radius:18px;

padding:25px;

transition:.3s;

height:100%;

}

.card-box:hover{

transform:translateY(-8px);

box-shadow:0 0 20px rgba(255,152,0,.4);

}

.count{

font-size:42px;

font-weight:bold;

color:#ff9800;

}

.title{

font-size:18px;

margin-top:8px;

}

.btn-orange{

background:#ff9800;

color:white;

font-weight:bold;

border-radius:30px;

padding:10px 25px;

}

.btn-orange:hover{

background:white;

color:#ff9800;

}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">

💪 FitTrack

</div>

<a href="{{ route('admin.dashboard') }}">
<i class="bi bi-speedometer2"></i>
 Dashboard
</a>

<a href="{{ route('membership-plans.index') }}">
<i class="bi bi-credit-card"></i>
 Membership Plans
</a>

<a href="{{ route('workout-plans.index') }}">
<i class="bi bi-activity"></i>
 Workout Plans
</a>

<a href="{{ route('workout-videos.index') }}">
<i class="bi bi-camera-video"></i>
 Workout Videos
</a>

<a href="{{ route('progress.index') }}">
<i class="bi bi-graph-up-arrow"></i>
 Progress
</a>

<a href="{{ route('payments.index')}}">
<i class="bi bi-cash-stack"></i>
Payments</a>
<a href="{{route('attendance.index')}}">
<i class="bi bi-calendar-check-fill"></i> 
Attendance</a>
<form action="{{ route('logout') }}" method="POST" class="mt-4">

@csrf

<button class="btn btn-danger w-100">

Logout

</button>

</form>

</div>

<div class="main">

<div class="header">

<div>

<h2>

Admin Dashboard

</h2>

<p class="text-secondary">

Welcome Admin 👋

</p>

</div>

<a href="{{ route('home') }}"
class="btn btn-orange">

Visit Website

</a>

</div>

<div class="row">
<!-- Total Users -->

<div class="col-lg-4 col-md-6 mb-4">

    <div class="card-box text-center">

        <i class="bi bi-people-fill text-warning" style="font-size:55px;"></i>

        <div class="count">

            {{ $totalUsers }}

        </div>

        <div class="title">

            Total Users

        </div>

    </div>

</div>

<!-- Membership Plans -->

<div class="col-lg-4 col-md-6 mb-4">

    <div class="card-box text-center">

        <i class="bi bi-credit-card-fill text-warning" style="font-size:55px;"></i>

        <div class="count">

            {{ $totalPlans }}

        </div>

        <div class="title">

            Membership Plans

        </div>

    </div>

</div>

<!-- Total Memberships -->

<div class="col-lg-4 col-md-6 mb-4">

    <div class="card-box text-center">

        <i class="bi bi-person-vcard-fill text-warning" style="font-size:55px;"></i>

        <div class="count">

            {{ $totalMemberships }}

        </div>

        <div class="title">

            Purchased Memberships

        </div>

    </div>

</div>

<!-- Active Memberships -->

<div class="col-lg-4 col-md-6 mb-4">

    <div class="card-box text-center">

        <i class="bi bi-award-fill text-success" style="font-size:55px;"></i>

        <div class="count text-success">

            {{ $activeMemberships }}

        </div>

        <div class="title">

            Active Memberships

        </div>

    </div>

</div>

<!-- Workout Plans -->

<div class="col-lg-4 col-md-6 mb-4">

    <div class="card-box text-center">

        <i class="bi bi-activity text-info" style="font-size:55px;"></i>

        <div class="count text-info">

            {{ $totalWorkoutPlans }}

        </div>

        <div class="title">

            Workout Plans

        </div>

    </div>

</div>

<!-- Workout Videos -->

<div class="col-lg-4 col-md-6 mb-4">

    <div class="card-box text-center">

        <i class="bi bi-camera-video-fill text-danger" style="font-size:55px;"></i>

        <div class="count text-danger">

            {{ $totalWorkoutVideos }}

        </div>

        <div class="title">

            Workout Videos

        </div>

    </div>

</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>   
