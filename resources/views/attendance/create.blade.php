<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Attendance | FitTrack</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#0f172a;
    color:white;
}

.card{
    background:#1e293b;
    border:2px solid orange;
    border-radius:15px;
}

.btn-custom{
    background:orange;
    color:black;
    font-weight:bold;
}

.btn-custom:hover{
    background:#ffb84d;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<h2 class="text-warning mb-4">

📅 Add Attendance

</h2>

<form action="{{ route('attendance.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>User</label>

<select name="user_id" class="form-control" required>

<option value="">-- Select User --</option>

@foreach($users as $user)

<option value="{{ $user->id }}">

{{ $user->name }} ({{ $user->email }})

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Attendance Date</label>

<input type="date"
name="attendance_date"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status" class="form-control" required>

<option value="Present">Present</option>

<option value="Absent">Absent</option>

</select>

</div>

<button class="btn btn-custom">

Save Attendance

</button>

<a href="{{ route('attendance.index') }}"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</body>
</html>