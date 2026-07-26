<!DOCTYPE html>
<html>

<head>

    <title>Progress | FitTrack</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#0d0d0d;
            color:white;
        }

        .card-box{
            background:#181818;
            border:1px solid #ffc107;
            border-radius:20px;
            padding:25px;
        }

        h2{
            color:#ffc107;
            font-weight:bold;
        }

        table{
            border-radius:15px;
            overflow:hidden;
        }

    </style>

</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">
        📈 Progress Tracker
    </h2>

    @if(auth()->user()->role=='admin')

    <a href="{{ route('progress.create') }}" class="btn btn-warning mb-4">
        + Add Progress
    </a>

    @endif
    <a href="{{ url()->previous() }}"
class="btn btn-outline-light">

<i class="bi bi-arrow-left"></i>

Back

</a>

    <div class="card-box">

        <table class="table table-dark table-hover table-bordered align-middle text-center">

            <thead>

            <tr>

                @if(auth()->user()->role=='admin')
                <th>User ID</th>
                @endif

                <th>Date</th>
                <th>Weight</th>
                <th>Height</th>
                <th>BMI</th>

                @if(auth()->user()->role=='admin')
                <th width="180">Action</th>
                @endif

            </tr>

            </thead>

            <tbody>

            @forelse($progress as $item)

                <tr>

                    @if(auth()->user()->role=='admin')
                    <td>{{ $item->user_id }}</td>
                    @endif

                    <td>{{ $item->workout_date }}</td>

                    <td>{{ $item->weight }} kg</td>

                    <td>{{ $item->height }} cm</td>

                    <td>{{ $item->bmi }}</td>

                    @if(auth()->user()->role=='admin')

                    <td>

                        <a href="{{ route('progress.edit',$item->id) }}"
                           class="btn btn-primary btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('progress.destroy',$item->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete Progress?')">

                                Delete

                            </button>

                        </form>

                    </td>

                    @endif

                </tr>

            @empty

                <tr>

                    <td colspan="{{ auth()->user()->role=='admin' ? 6 : 4 }}">

                        No Progress Records Found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>

</html>