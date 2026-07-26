<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>FitTrack | User Dashboard</title>

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

background:#0f172a;
color:white;

}

.dashboard-title{

font-size:35px;
font-weight:bold;
color:#f59e0b;

}

.card-box{

background:#1e293b;
border:1px solid #334155;
border-radius:18px;
padding:25px;
height:100%;
transition:.3s;

}

.card-box:hover{

transform:translateY(-5px);
border-color:#f59e0b;

}

.card-title{

color:#f59e0b;
font-weight:bold;
margin-bottom:15px;

}

.summary-card{

background:#111827;
border:1px solid #334155;
border-radius:18px;
padding:20px;
text-align:center;

}

.summary-card h2{

color:#f59e0b;

}

.summary-card p{

margin:0;
color:#cbd5e1;

}

</style>

</head>

<body>

<div class="container py-5">

<div class="d-flex justify-content-between align-items-center mb-5">

<div>

<h2 class="dashboard-title">

Welcome {{ $user->name }} 👋

</h2>

<p class="text-light">

Manage your gym activities from one place.

</p>

</div>

<form method="POST"
action="{{ route('logout') }}">

@csrf

<button class="btn btn-danger">

<i class="bi bi-box-arrow-right"></i>

Logout

</button>

</form>

</div>

<div class="row g-4">

<div class="col-md-3">

<div class="summary-card">

<h2>

{{ $membership ? $membership->plan->plan_name : 'No Plan' }}

</h2>

<p>

Membership

</p>

</div>

</div>

<div class="col-md-3">

<div class="summary-card">

<h2>

{{ $progress ? $progress->weight : '--' }}

</h2>

<p>

Weight (Kg)

</p>

</div>

</div>

<div class="col-md-3">

<div class="summary-card">

<h2>

{{ $progress ? $progress->bmi : '--' }}

</h2>

<p>

Current BMI

</p>

</div>

</div>

<div class="col-md-3">

<div class="summary-card">

<h2>

{{ $attendance }}

</h2>

<p>

Attendance

</p>

</div>

</div>

</div>
<!-- Membership & Payment -->

<div class="row mt-4">

    <!-- Membership -->

    <div class="col-lg-6 mb-4">

        <div class="card-box">

            <h4 class="card-title">

                💳 Active Membership

            </h4>

            @if($membership)

                <table class="table table-dark table-borderless">

                    <tr>

                        <th>Plan</th>

                        <td>{{ $membership->plan->plan_name }}</td>

                    </tr>

                    <tr>

                        <th>Start Date</th>

                        <td>{{ $membership->start_date }}</td>

                    </tr>

                    <tr>

                        <th>Expiry Date</th>

                        <td>{{ $membership->end_date }}</td>

                    </tr>

                    <tr>

                        <th>Status</th>

                        <td>

                            <span class="badge bg-success">

                                {{ $membership->status }}

                            </span>

                        </td>

                    </tr>

                </table>

            @else

                <div class="alert alert-warning">

                    No Active Membership Found

                </div>

            @endif

        </div>

    </div>

    <!-- Payment -->

    <div class="col-lg-6 mb-4">

        <div class="card-box">

            <h4 class="card-title">

                💰 Latest Payment

            </h4>

            @if($payment)

                <table class="table table-dark table-borderless">

                    <tr>

                        <th>Amount</th>

                        <td>₹{{ $payment->amount }}</td>

                    </tr>

                    <tr>

                        <th>Method</th>

                        <td>{{ $payment->payment_method }}</td>

                    </tr>

                    <tr>

                        <th>Payment Date</th>

                        <td>{{ $payment->payment_date }}</td>

                    </tr>

                    <tr>

                        <th>Status</th>

                        <td>

                            @if($payment->status=='Paid')

                                <span class="badge bg-success">

                                    Paid

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    {{ $payment->status }}

                                </span>

                            @endif

                        </td>

                    </tr>

                </table>

            @else

                <div class="alert alert-warning">

                    No Payment Record Found

                </div>

            @endif

        </div>

    </div>

</div>
<!-- Workout Plans & Progress -->

<div class="row mt-4">

    <!-- Workout Plans -->

    <div class="col-lg-6 mb-4">

        <div class="card-box">

            <h4 class="card-title">

                🏋️ Workout Plans

            </h4>

            @if($workouts->count())

                <table class="table table-dark table-hover">

                    <thead>

                        <tr>

                            <th>id</th>
                            <th>Workout</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($workouts as $workout)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $workout->workout_name }}</td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="alert alert-warning">

                    No Workout Plans Available

                </div>

            @endif

        </div>

    </div>

    <!-- Latest Progress -->

    <div class="col-lg-6 mb-4">

        <div class="card-box">

            <h4 class="card-title">

                📊 Latest Progress

            </h4>

            @if($progress)

                <table class="table table-dark table-borderless">

                    <tr>

                        <th>Weight</th>

                        <td>{{ $progress->weight }} Kg</td>

                    </tr>

                    <tr>

                        <th>Height</th>

                        <td>{{ $progress->height }} cm</td>

                    </tr>

                    <tr>

                        <th>BMI</th>

                        <td>{{ $progress->bmi }}</td>

                    </tr>

                    <tr>

                        <th>Workout Date</th>

                        <td>{{ $progress->workout_date }}</td>

                    </tr>

                </table>

            @else

                <div class="alert alert-warning">

                    No Progress Record Found

                </div>

            @endif

        </div>

    </div>

</div>
<!-- Workout Videos & Quick Actions -->

<div class="row mt-4">

    <!-- Workout Videos -->

    <div class="col-lg-6 mb-4">

        <div class="card-box">

            <h4 class="card-title">

                🎥 Workout Videos

            </h4>

            <a href="{{ route('workout-videos.index') }}"
               class="btn btn-warning w-100 mb-3">

                View Workout Videos

            </a>

            <p class="text-light">

                Watch exercise videos uploaded by the trainer and
                improve your fitness journey.

            </p>

        </div>

    </div>

    <!-- Quick Actions -->

    <div class="col-lg-6 mb-4">

        <div class="card-box">

            <h4 class="card-title">

                ⚡ Quick Actions

            </h4>

            <div class="d-grid gap-3">

                <a href="{{ route('progress.index') }}"
                   class="btn btn-success">

                    📈 My Progress

                </a>

                <a href="{{ route('attendance.index') }}"
                   class="btn btn-primary">

                    📅 Attendance

                </a>

                <a href="{{ route('payments.index') }}"
                   class="btn btn-info text-dark">

                    💳 Payment History

                </a>

                <a href="{{ route('membership-plans.index') }}"
                   class="btn btn-warning">

                    🏋 Buy / Renew Membership

                </a>

            </div>

        </div>

    </div>

</div>

<hr class="border-secondary my-4">

<div class="alert alert-success text-center">

    <h5 class="mb-1">

        🎉 Welcome to FitTrack

    </h5>

    <p class="mb-0">

        Stay consistent with your workouts, track your BMI,
        maintain attendance, and achieve your fitness goals.

    </p>

</div>
</div>

<footer class="mt-5 py-4 bg-dark border-top border-secondary">

    <div class="container text-center">

        <h5 class="text-warning mb-2">

            💪 FitTrack Gym Membership Portal

        </h5>

        <p class="text-light mb-2">

            Manage Membership • Workout Plans • Progress • Attendance • Payments

        </p>

        <small class="text-secondary">

            © {{ date('Y') }} FitTrack. All Rights Reserved.

        </small>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>