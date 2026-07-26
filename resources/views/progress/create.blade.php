<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Progress | FitTrack</title>

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
    border-radius:20px;
    box-shadow:0 0 20px rgba(255,165,0,0.2);

}


.form-control{

    background:#334155;
    border:none;
    color:white;

}


.form-control:focus{

    background:#334155;
    color:white;
    border:1px solid orange;
    box-shadow:none;

}


label{

    color:#fbbf24;
    font-weight:600;

}


.btn-custom{

    background:orange;
    color:black;
    font-weight:bold;
    border-radius:10px;

}


.btn-custom:hover{

    background:#ffb84d;

}


.title-icon{

    color:orange;

}


</style>

</head>


<body>


<div class="container mt-5">


<div class="d-flex justify-content-between align-items-center mb-4">


<h2 class="text-warning">

<i class="bi bi-graph-up-arrow title-icon"></i>

Add Progress

</h2>


<a href="{{ url()->previous() }}"
class="btn btn-outline-light">

<i class="bi bi-arrow-left"></i>

Back

</a>


</div>



<div class="card p-4">


<form action="{{ route('progress.store') }}" method="POST">

@csrf



<!-- User Name -->

<div class="mb-3">


<label>

<i class="bi bi-person-fill"></i>

User Name

</label>


<select name="user_id" class="form-select">


<option value="">Select User</option>


@foreach($users as $user)

<option value="{{ $user->id }}">

{{ $user->name }}

</option>


@endforeach


</select>


</div>




<!-- Weight -->

<div class="mb-3">


<label>

<i class="bi bi-speedometer"></i>

Weight (kg)

</label>


<input type="number"
step="0.01"
name="weight"
class="form-control"
placeholder="Enter weight">


</div>





<!-- Height -->

<div class="mb-3">


<label>

<i class="bi bi-rulers"></i>

Height (cm)

</label>


<input type="number"
step="0.01"
name="height"
class="form-control"
placeholder="Enter height">


</div>





<!-- Date -->

<div class="mb-3">


<label>

<i class="bi bi-calendar-date"></i>

Workout Date

</label>


<input type="date"
name="workout_date"
class="form-control">


</div>




<div class="text-end">


<button class="btn btn-custom px-4">

<i class="bi bi-save"></i>

Save Progress

</button>


</div>



</form>


</div>


</div>


</body>

</html>