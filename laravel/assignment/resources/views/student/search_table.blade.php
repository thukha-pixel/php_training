<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Search Table Page</title>
  <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
  <link rel="stylesheet"href="{{ asset('/css/style.css') }}">
</head>

<body>

  <div id="card-table">

    <table>

      <div class="success-alert">
        <form action="{{ route('student#search_item') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="search_item" class="form-content" placeholder="search here" autocomplete="off">
    
            <input type="submit" id="update-btn" value="Search">
          </form>
      </div>

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