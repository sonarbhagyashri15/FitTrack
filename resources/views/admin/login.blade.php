<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Login | FitTrack</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#0f172a;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    width:420px;
    background:#1e293b;
    border:2px solid orange;
    border-radius:15px;
}

.card-header{
    background:orange;
    color:black;
    font-size:24px;
    font-weight:bold;
    text-align:center;
}

.btn-login{
    background:orange;
    color:black;
    font-weight:bold;
}

.btn-login:hover{
    background:#ffb84d;
}

</style>

</head>

<body>

<div class="card">

<div class="card-header">

Admin Login

</div>

<div class="card-body">

<form method="POST" action="{{ route('admin.login.submit') }}">
@csrf
<input type="hidden" name="admin_login" value="1">

<div class="mb-3">

<label class="text-white">

Email

</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="text-white">

Password

</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="d-grid">

<button class="btn btn-login">

Login

</button>

</div>

<div class="text-center mt-3">

<a href="{{ route('home') }}"
class="text-warning">

← Back to Home

</a>

</div>

</form>

</div>

</div>

</body>

</html>