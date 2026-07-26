<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Users | FitTrack</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

background:#0d1117;

color:white;

font-family:Arial,Helvetica,sans-serif;

}

.header{

display:flex;

justify-content:space-between;

align-items:center;

margin-bottom:35px;

}

.title{

font-size:35px;

font-weight:bold;

color:#ff9800;

}

.card-box{

background:#1f2937;

border:2px solid #ff9800;

border-radius:18px;

padding:25px;

}

.table{

color:white;

}

.table thead{

background:#ff9800;

color:black;

}

.table tbody tr:hover{

background:#2d3748;

}

.btn-orange{

background:#ff9800;

color:black;

font-weight:bold;

border-radius:30px;

padding:8px 22px;

}

.btn-orange:hover{

background:white;

color:#ff9800;

}

.search-box{

max-width:350px;

}

</style>

</head>

<body>

<div class="container mt-5">

<div class="header">

<div>

<h2 class="title">

👥 Manage Users

</h2>

<p class="text-secondary">

View and manage all registered users.

</p>

</div>

<a href="{{ route('admin.dashboard') }}"
class="btn btn-orange">

← Back to Admin

</a>

</div>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif

<div class="card-box">

<form method="GET"
action="{{ route('users.index') }}"
class="mb-4">

<div class="row">

<div class="col-md-6">

<input
type="text"
name="search"
value="{{ $search }}"
class="form-control search-box"
placeholder="Search by Name or Email">

</div>

<div class="col-md-3">

<button class="btn btn-warning">

Search

</button>

</div>

</div>

</form>

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead>

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Created</th>

<th width="120">

Action

</th>

</tr>

</thead>

<tbody>
@forelse($users as $user)

<tr>

    <td>

        {{ $user->id }}

    </td>

    <td>

        <strong>{{ $user->name }}</strong>

    </td>

    <td>

        {{ $user->email }}

    </td>

    <td>

        {{ $user->created_at->format('d M Y') }}

    </td>

    <td>

        @if(auth()->id() != $user->id)

        <form action="{{ route('users.destroy',$user->id) }}"
              method="POST"
              onsubmit="return confirm('Are you sure you want to delete this user?')">

            @csrf

            @method('DELETE')

            <button class="btn btn-danger btn-sm">

                <i class="bi bi-trash"></i>

                Delete

            </button>

        </form>

        @else

        <span class="badge bg-success">

            Current User

        </span>

        @endif

    </td>

</tr>

@empty

<tr>

    <td colspan="5" class="text-center text-warning py-4">

        <i class="bi bi-exclamation-circle"></i>

        No Users Found

    </td>

</tr>

@endforelse

</tbody>

</table>

</div>
<!-- Pagination -->

<div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">

    <div class="text-secondary">

        Total Users :
        <strong class="text-warning">
            {{ $users->total() }}
        </strong>

    </div>

    <div>

        {{ $users->withQueryString()->links() }}

    </div>

</div>

</div>

<div class="text-center mt-5 mb-4">

    <hr class="border-warning">

    <h5 class="text-warning">

        💪 FitTrack Admin Panel

    </h5>

    <p class="text-secondary mb-0">

        Manage registered users securely and efficiently.

    </p>

    <small class="text-secondary">

        © 2026 FitTrack | All Rights Reserved

    </small>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>