function deleteStudent(id) {
    $.ajax({
        type: "DELETE",
        url: "/api/students/" + id,
        success: location.reload(),
    });
}

$(document).ready(function () {

    $.ajax({
        dataType: "json",
        type: "GET",
        url: "/api/students",
        success: function (data) {
            data.forEach(element => {
                $(".api-add-tr").append(`
                    <tr>
                        <td>${element.name}</td>
                        <td>${element.email}</td>
                        <td>${element.phone}</td>
                        <td>${element.dob}</td>
                        <td>${element.name_of_father}</td>
                        <td>${element.major_id}</td>
                        <td><a href="/ajax/student_ajax/update_form/${element.id}" id="update-btn" type="button" name="update-btn">Update</a></td>
                        <td><button id="delete-btn" type="button" name="delete-btn" onclick="return confirm('Are you sure?')? deleteStudent(${element.id}): '';">Delete</button></td>
                    </tr>
                `);
            });
        }
    });

    $(".insert-btn").click(function () {

        $.ajax({
            url: "/api/students",
            method: "POST",
            data: {
                name: $("#name").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                date_of_birth: $("#date_of_birth").val(),
                name_of_father: $("#name_of_father").val(),
                major_id: $("#major_id").val(),
            },
            success: $(location).attr('href', 'http://localhost:8000/ajax/student_ajax/table'),
        });
    });

    $.ajax({
        dataType: "json",
        type: "GET",
        url: "/api/students/" + $("#update_id").val(),
        success: function (data) {
            console.log(data);
            $("#update_name").val(data.name);
            $("#update_email").val(data.email);
            $("#update_phone").val(data.phone);
            $("#update_name_of_father").val(data.name_of_father);
            $("#update_date_of_birth").val(data.dob);

            $(`#${data.major_id}`).attr("selected", "selected");
        }
    });

    $(".update-submit-btn").click(function () {

        $.ajax({
            url: "/api/students/" + $("#update_id").val(),
            method: "PUT",
            data: {
                name: $("#update_name").val(),
                email: $("#update_email").val(),
                phone: $("#update_phone").val(),
                dob: $("#update_date_of_birth").val(),
                name_of_father: $("#update_name_of_father").val(),
                major_id: $("#major_id").val(),
            },
            success: $(location).attr('href', 'http://localhost:8000/ajax/student_ajax/table'),
        });
    });
});
