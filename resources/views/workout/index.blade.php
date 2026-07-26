<!DOCTYPE html>
<html lang="en">

<head>

<title>Workout Plans | FitTrack</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<style>

body{

    background:#0f172a;
    color:white;

}


/* Header */

.page-title{

    font-size:35px;
    font-weight:700;
    color:#fbbf24;

}



/* Workout Card */

.workout-card{

    background:#1e293b;

    border:1px solid rgba(251,191,36,0.5);

    border-radius:25px;

    padding:30px;

    height:100%;

    transition:0.4s;

    position:relative;

    overflow:hidden;

}



.workout-card:hover{

    transform:translateY(-10px);

    box-shadow:0 0 30px rgba(251,191,36,0.5);

}



/* Icon */

.workout-icon{

    width:70px;

    height:70px;

    border-radius:50%;

    background:#fbbf24;

    color:#111827;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:35px;

    margin:auto;

    margin-bottom:20px;

}




.workout-name{

    color:#fbbf24;

    font-size:25px;

    font-weight:bold;

}



.category{

    color:#94a3b8;

    font-size:17px;

}



.duration{

    background:#334155;

    padding:8px 15px;

    border-radius:20px;

    display:inline-block;

    margin:15px 0;

}



.description{

    color:#cbd5e1;

    min-height:60px;

}




.btn-add{

    background:#fbbf24;

    color:black;

    font-weight:bold;

    border-radius:10px;

}



.btn-add:hover{

    background:#f59e0b;

}




.empty{

    background:#1e293b;

    padding:40px;

    border-radius:20px;

}



</style>

</head>



<body>


<div class="container mt-5">



<div class="d-flex justify-content-between align-items-center mb-5">


<h1 class="page-title">

<i class="bi bi-barbell"></i>

Workout Plans

</h1>



@if(auth()->user()->role=='admin')

<a href="{{route('workout-plans.create')}}"
class="btn btn-add">

<i class="bi bi-plus-circle"></i>

Add Workout

</a>

@endif


</div>





<div class="row">



@forelse($workouts as $workout)



<div class="col-lg-4 col-md-6 mb-4">



<div class="workout-card text-center">



<div class="workout-icon">

<i class="bi bi-lightning-charge-fill"></i>

</div>



<h3 class="workout-name">

{{$workout->workout_name}}

</h3>



<p class="category">

<i class="bi bi-tags-fill"></i>

{{$workout->category}}

</p>




<span class="duration">

<i class="bi bi-clock-fill"></i>

{{$workout->duration}}

</span>




<p class="description mt-3">

{{$workout->description}}

</p>




@if(auth()->user()->role=='admin')


<a href="{{ route('workout-plans.edit',$workout->id) }}"
class="btn btn-primary btn-sm">

<i class="bi bi-pencil-square"></i>

Edit

</a>



<form action="{{ route('workout-plans.destroy',$workout->id) }}"
method="POST"
style="display:inline">


@csrf

@method('DELETE')


<button class="btn btn-danger btn-sm"
onclick="return confirm('Delete Workout?')">

<i class="bi bi-trash"></i>

Delete

</button>


</form>


@endif



</div>


</div>




@empty


<div class="col-12">


<div class="empty text-center">


<h4 class="text-warning">

<i class="bi bi-info-circle"></i>

No Workout Plans Available

</h4>


</div>


</div>


@endforelse



</div>



</div>



</body>

</html>