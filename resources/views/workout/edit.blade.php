@if(auth()->user()->role!='admin')

{{ abort(403) }}

@endif
<!DOCTYPE html>
<html>

<head>

<title>Edit Workout</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body class="bg-dark text-white">


<div class="container mt-5">


<h2 class="text-warning">
Edit Workout
</h2>


<form method="POST"
action="{{route('workout-plans.update',$workout->id)}}">


@csrf

@method('PUT')


<input class="form-control mb-3"
name="workout_name"
value="{{$workout->workout_name}}">


<input class="form-control mb-3"
name="category"
value="{{$workout->category}}">


<input class="form-control mb-3"
name="duration"
value="{{$workout->duration}}">


<textarea class="form-control mb-3"
name="description">{{$workout->description}}</textarea>


<button class="btn btn-warning">

Update Workout

</button>


</form>


</div>


</body>

</html>