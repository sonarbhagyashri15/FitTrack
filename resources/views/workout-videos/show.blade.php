<!DOCTYPE html>
<html>
<head>

<title>{{ $video->title }} | FitTrack</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark text-white">


<div class="container mt-5">


<div class="card bg-black text-white p-4 border-warning">


<h1 class="text-warning">
{{ $video->title }}
</h1>


<p>
<b>Category:</b> {{ $video->category }}
</p>



<div class="ratio ratio-16x9 mb-4">


<iframe

src="https://www.youtube.com/embed/{{ Str::afterLast($video->youtube_url,'/') }}"

title="YouTube video"

allowfullscreen>

</iframe>


</div>



<h5 class="text-warning">
Description
</h5>


<p>
{{ $video->description }}
</p>



<a href="{{ route('workout-videos.index') }}"
class="btn btn-warning">

Back to Videos

</a>


</div>


</div>


</body>
</html>