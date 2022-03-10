<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Table Page</title>
  <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
  <link rel="stylesheet"href="{{ asset('/css/style.css') }}">
  <script src="{{ asset('/js/library/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('/js/common.js') }}"></script>
</head>

<body>

  <div id="card-table">

    <table class="api-add-tr">

      <a href="{{ route('student_ajax#insert_form') }}" id="visit-btn" type="button" style="display:inline-block">Insert New Student</a>

      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Birthday</th>
        <th>Father's Name</th>
        <th>Major ID</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
      
    </table>
  </div>

</body>

</html>