<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Workout Videos | FitTrack</title>

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
background:#0d0d0d;
color:white;
}

.navbar{
background:#111;
}

.navbar-brand{
font-size:30px;
font-weight:bold;
color:#ff9800!important;
}

.nav-link{
color:white!important;
margin-left:18px;
}

.nav-link:hover{
color:#ff9800!important;
}

.hero{

padding:70px 0;

background:
linear-gradient(rgba(0,0,0,.75),rgba(0,0,0,.75)),
url('https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&fit=crop&w=1600&q=80');

background-size:cover;
background-position:center;
text-align:center;

}

.hero h1{
font-size:55px;
font-weight:bold;
}

.hero span{
color:#ff9800;
}

.video-card{

background:#181818;

border:1px solid #ff9800;

border-radius:20px;

padding:20px;

height:100%;

transition:.4s;

}

.video-card:hover{

transform:translateY(-10px);

box-shadow:0 0 20px rgba(255,152,0,.4);

}

.btn-orange{

background:#ff9800;

color:white;

border-radius:30px;

font-weight:bold;

}

.btn-orange:hover{

background:white;

color:#ff9800;

}

video{

width:100%;

height:220px;

border-radius:12px;

}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg">

<div class="container">

<a class="navbar-brand"
href="{{ route('home') }}">

💪 FitTrack

</a>





</div>

</nav>

<section class="hero">

<div class="container">

<h1>

Workout

<span>

Videos

</span>

</h1>

<p>

Watch professional workout videos anytime.

</p>

</div>

</section>

<div class="container py-5">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="text-warning">

All Workout Videos

</h2>
@if(auth()->user()->role=='admin')

<a href="{{ route('workout-videos.create') }}"
class="btn btn-orange">

<i class="bi bi-plus-circle"></i>

Add Video

</a>
@endif

</div>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="row">
@forelse($videos as $video)

<div class="col-lg-4 col-md-6 mb-4">

    <div class="video-card">

        <video controls>

            <source src="{{ asset('videos/'.$video->video) }}" type="video/mp4">

            Your browser does not support the video tag.

        </video>

        <h4 class="text-warning mt-3">

            {{ $video->title }}

        </h4>

        <span class="badge bg-warning text-dark mb-3">

            {{ $video->category }}

        </span>

        <p class="text-light">

            {{ $video->description }}

        </p>

        <div class="d-flex justify-content-between mt-4">
            @if(auth()->user()->role=='admin')


            <a href="{{ route('workout-videos.edit',$video->id) }}"
               class="btn btn-primary">

                <i class="bi bi-pencil-square"></i>

                Edit

            </a>
            @endif
            <a href="{{ route('workout-videos.show',$video->id) }}"
class="btn btn-warning">

▶ Play Video

</a>
@if(auth()->user()->role=='admin')

            <form action="{{ route('workout-videos.destroy',$video->id) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this video?');">

                @csrf

                @method('DELETE')

                <button class="btn btn-danger">

                    <i class="bi bi-trash"></i>

                    Delete

                </button>

            </form>
@endif
        </div>

    </div>

</div>

@empty

<div class="col-12">

    <div class="alert alert-warning text-center">

        <h4>

            No Workout Videos Available

        </h4>

        <p>

            Click on <strong>Add Video</strong> to upload your first workout video.

        </p>

    </div>

</div>

@endforelse

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>