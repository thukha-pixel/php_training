<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Major Page</title>
    
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet"href="{{ asset('/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
</head>

<body>

    <div id="card">

        <div id="card-content">
            <div id="card-title">
                <h2>Available Majors</h2>
                <div class="underline-tile"></div>

                <div class="success-alert">
                    <table class="table-center">
                    @foreach ($data as $major)
                        <tr>
                           <td>{{ $major->name }}</td>
                           <td>
                            <form action="{{ route('student#delete_major') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $major->id }}"/>
                                <button type="submit">
                                    <i class="fa fa-btn fa-trash"></i>Delete
                                </button>
                            </form>
                           </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>

            <form class="form" action="{{ route('student#add_major') }}" method="POST">
                @csrf
                <input class="form-content" type="text" name="name" placeholder="Enter New Major Name" autocomplete="off" required>
                <div class="form-border"></div>

                <input id="submit-btn" type="submit" value="Add Major" />

                <a href="{{ route('student#table') }}" id="visit-btn" type="button" name="visit-btn" value="Visit Table">Visit Table</a>

            </form>
        </div>
    </div>

</body>

</html>