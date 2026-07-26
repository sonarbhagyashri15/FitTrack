@if(auth()->user()->role!='admin')

{{ abort(403) }}

@endif
<!DOCTYPE html>
<html>

<head>

<title>Edit Workout Video | FitTrack</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body{
    background:#0f172a;
    color:white;
}


.box{

    background:#111827;
    padding:35px;
    border-radius:20px;

}


.title{

    color:#facc15;
    font-weight:800;

}


label{

    color:#e2e8f0;

}


.form-control{

    background:#1e293b;
    border:1px solid #334155;
    color:white;

}


.form-control:focus{

    background:#1e293b;
    color:white;
    border-color:#facc15;

}


.btn-yellow{

    background:#facc15;
    color:#111827;
    font-weight:bold;

}


</style>

</head>


<body>


<div class="container mt-5">


<div class="box">


<h2 class="title mb-4">

✏ Edit Workout Video

</h2>



<form method="POST"
action="{{route('workout-videos.update',$video->id)}}">


@csrf

@method('PUT')



<div class="mb-3">

<label>
Title
</label>

<input type="text"
name="title"
class="form-control"
value="{{$video->title}}">

</div>




<div class="mb-3">

<label>
Category
</label>


<input type="text"
name="category"
class="form-control"
value="{{$video->category}}">


</div>





<div class="mb-3">

<label>
Video Link
</label>


<input type="text"
name="video"
class="form-control"
value="{{$video->video}}">


</div>





<div class="mb-3">

<label>
Description
</label>


<textarea 
name="description"
class="form-control"
rows="5">{{$video->description}}</textarea>


</div>





<button class="btn btn-yellow">

Update Video

</button>


<a href="{{route('workout-videos.index')}}"
class="btn btn-secondary">

Cancel

</a>



</form>



</div>


</div>


</body>

</html>