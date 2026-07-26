<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Attendance | FitTrack</title>

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

✏️ Edit Attendance

</h2>

<form action="{{ route('attendance.update',$attendance->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>User</label>

<select name="user_id" class="form-control" required>

@foreach($users as $user)

<option value="{{ $user->id }}"
{{ $attendance->user_id == $user->id ? 'selected' : '' }}>

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
value="{{ $attendance->attendance_date }}"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status" class="form-control" required>

<option value="Present"
{{ $attendance->status=='Present' ? 'selected' : '' }}>

Present

</option>

<option value="Absent"
{{ $attendance->status=='Absent' ? 'selected' : '' }}>

Absent

</option>

</select>

</div>

<button class="btn btn-custom">

Update Attendance

</button>

<a href="{{ route('attendance.index') }}"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

</body>

</html>