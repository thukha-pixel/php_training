<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Form Page</title>
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>

    <div id="card">

        <div id="card-content">
            <div id="card-title">
                <h2>Welcome to School Management System</h2>
                <div class="underline-tile"></div>

            </div>

            <form class="form" action="{{ route('student#insertStudent') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-content" type="text" name="name" placeholder="Enter Name" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="email" name="email" placeholder="Enter Email" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" name="phone" placeholder="Enter Phone Number" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" name="name_of_father" placeholder="Enter Father's Name" autocomplete="off" required>
                <div class="form-border"></div>

                <label for="date-of-birth">
                    &nbsp;Enter Your Birthday
                </label><br>
                <input class="form-content" type="date" name="date_of_birth" placeholder="Enter Your Birthday" autocomplete="off" required>
                <div class="form-border"></div>

                <label for="major">
                    &nbsp;Choose Major
                </label><br>
                <select name="major_id" id="major" class="form-contact" required>
                    <option value="">--Please choose an option--</option>
                    @foreach ($data as $major)
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                    @endforeach
                </select>
                
                <input id="submit-btn" type="submit" name="submit" value="Insert Data" />

                <a href="" id="visit-btn" type="button" name="visit-btn" value="Visit Table">Visit Table</a>

            </form>
        </div>
    </div>

</body>

</html>