@if(auth()->user()->role!='admin')

{{ abort(403) }}

@endif
<!DOCTYPE html>
<html>

<head>

<title>Add Workout | FitTrack</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body{
    background:#0d0d0d;
    color:white;
}


.form-card{

    background:#181818;

    padding:35px;

    border-radius:20px;

    border:1px solid #ffc107;

}


h2{

    color:#ffc107;

}


.btn-custom{

    background:#ffc107;

    color:black;

    border-radius:30px;

    font-weight:bold;

    padding:10px 30px;

}

</style>

</head>


<body>


<div class="container mt-5">


<h2 class="text-center mb-4">
Add Workout Plan
</h2>



<div class="form-card">


<form action="{{ route('workout-plans.store') }}" method="POST">


@csrf


<label>
Workout Name
</label>

<input type="text"
name="workout_name"
class="form-control mb-3"
placeholder="Weight Training">



<label>
Category
</label>

<input type="text"
name="category"
class="form-control mb-3"
placeholder="Strength / Cardio">



<label>
Duration
</label>

<input type="text"
name="duration"
class="form-control mb-3"
placeholder="30 Minutes">



<label>
Description
</label>

<textarea name="description"
class="form-control mb-3"
rows="4"></textarea>



<button class="btn btn-custom">

Add Workout

</button>


</form>


</div>


</div>


</body>

</html>