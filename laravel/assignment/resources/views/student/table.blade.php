<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Table Page</title>
  <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
  <link rel="stylesheet"href="{{ asset('/css/style.css') }}">
</head>

<body>

  <div id="card-table">

    <table>

      <a href="{{ route('student#insert_form') }}" id="visit-btn" type="button" style="display:inline-block">Insert New Student</a>
      <a href="{{ route('student#major') }}" id="visit-btn" type="button" style="display:inline-block">Insert New Major</a>
      <a href="{{ route('student#export_csv') }}" id="visit-btn" type="button" style="display:inline-block">Export CSV File</a><br>

      <form action="{{ route('student#import_csv') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-content">

        <input type="submit" id="update-btn" value="Import CSV File">
      </form>

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
      @foreach ($data as $student)
        <tr>
          <td>
            {{ $student->name }}
          </td>
          <td>
            {{ $student->email }}
          </td>
          <td>
            {{ $student->phone }}
          </td>
          <td>
            {{ $student->dob }}
          </td>
          <td>
            {{ $student->name_of_father }}
          </td>
          <td>
            {{ $student->major_id }}
          </td>
          <td>
            <a href="{{ url("/student/update_form/$student->id") }}" id="update-btn" type="button" name="update-btn">Update</a>
          </td>
          <td>
            <a href="{{ url("/student/delete_student/$student->id") }}" id="delete-btn" type="button" name="delete-btn" onClick="return confirm('Are you sure?')">Delete</a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>

</body>

</html>