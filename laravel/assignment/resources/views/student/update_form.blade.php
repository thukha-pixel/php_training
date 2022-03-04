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

            <form class="form" action="{{ route('student#update_student') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $student->id }}"/>
                <input class="form-content" type="text" name="name" placeholder="Enter Name" value="{{ $student->name }}" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="email" name="email" placeholder="Enter Email" value="{{ $student->email }}" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" name="phone" placeholder="Enter Phone Number" value="{{ $student->phone }}" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" name="name_of_father" placeholder="Enter Father's Name" value="{{ $student->name_of_father }}" autocomplete="off" required>
                <div class="form-border"></div>

                <label for="date-of-birth">
                    &nbsp;Enter Your Birthday
                </label><br>
                <input class="form-content" type="date" name="date_of_birth" placeholder="Enter Your Birthday" value="{{ $student->dob }}" autocomplete="off" required>
                <div class="form-border"></div>

                <label for="major">
                    &nbsp;Choose Major
                </label><br>
                <select name="major_id" id="major" class="form-contact" required>
                    <option value="">--Please choose an option--</option>
                    @foreach ($data as $major)
                        <option value="{{ $major->id }}" {{ $major->id == $student->major_id ? "selected" : ""}}>{{ $major->name }}</option>
                    @endforeach
                </select>
                
                <input id="submit-btn" type="submit" name="submit" value="Insert Data" />

                <a href="{{ route('student#table') }}" id="visit-btn" type="button" name="visit-btn" value="Visit Table">Visit Table</a>

            </form>
        </div>
    </div>

</body>

</html>