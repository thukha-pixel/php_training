<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Form Page</title>
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <script src="{{ asset('/js/library/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/js/common.js') }}"></script>
</head>

<body>

    <div id="card">

        <div id="card-content">
            <div id="card-title">
                <h2>Welcome to School Management System</h2>
                <div class="underline-tile"></div>

            </div>

            <div class="form insert-form">
                <input class="form-content" type="text" id="name" name="name" placeholder="Enter Name" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="email" id="email" name="email" placeholder="Enter Email" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" id="phone" name="phone" placeholder="Enter Phone Number" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" id="name_of_father" name="name_of_father" placeholder="Enter Father's Name" autocomplete="off" required>
                <div class="form-border"></div>

                <label for="date-of-birth">
                    &nbsp;Enter Your Birthday
                </label><br>
                <input class="form-content" type="date" id="date_of_birth" name="date_of_birth" placeholder="Enter Your Birthday" autocomplete="off" required>
                <div class="form-border"></div>

                <label for="major">
                    &nbsp;Choose Major
                </label><br>
                <select name="major_id" id="major_id" class="form-contact" required>
                    <option value="">--Please choose an option--</option>
                    @foreach ($data as $major)
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                    @endforeach
                </select>
                
                <button class="insert-btn" id="submit-btn">Insert Data</button>

                <a href="{{ route('student_ajax#table') }}" id="visit-btn" type="button" name="visit-btn" value="Visit Table">Visit Table</a>

            </div>
        </div>
    </div>

</body>

</html>