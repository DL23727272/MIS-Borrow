function Login() {
    var username = document.getElementById("userName").value;
    var password = document.getElementById("userPassword").value;

    if (username == "" && password == "") {
        alertify.error('Empty fields! Please fill all the fields.');
    } else if (username == "") {
        alertify.error('Fill up the Username field!');
    } else if (password == "") {
        alertify.error('Fill up the Password field!');
    } else {
        // Send form data to loginProcess.php using AJAX
        $.ajax({
            type: "POST",
            url: "backend/loginProcess.php",
            data: {
                userName: username,
                userLoginPassword: password // Fix this key name
            },
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        showConfirmButton: false,
                        timer: 2000 
                    });

                    sessionStorage.setItem('userID', response.userID);
                    sessionStorage.setItem('studentName', username);

                    setTimeout(function() {
                        if (response.type === 'user') {
                            window.location.href = 'admin.html'; 
                        } else {
                            window.location.href = 'home.php'; 
                        }
                    }, 2000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500 
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alertify.error('Failed to log in!');
            }
        });
    }
}


function Signup() {
    // Get form data
    var studentSignUpidNumber = $("#idNumber").val();
    var studentSignUpName = $("#username").val();
    var studentSignUpUsername = $("#fullName").val();
    var studentDepartment = $("#department").val();
    var studentSignUpPassword = $("#password").val();
    var checkSignUpPassword = $("#confirmPassword").val();

    // Check if passwords match
    if (studentSignUpPassword !== checkSignUpPassword) {
        alertify.error('Passwords do not match!');
        return; 
    }

    // Check for empty fields
    if (studentSignUpidNumber === "" || studentSignUpName === "" || studentSignUpUsername === "" || studentDepartment === "" || studentSignUpPassword === "" || checkSignUpPassword === "") {
        alertify.error('Empty fields! Please fill all the fields.');
    } else {
        // Log data being sent to server
        console.log({
            studentSignUpidNumber: studentSignUpidNumber,
            studentSignUpName: studentSignUpName,
            studentSignUpUsername: studentSignUpUsername,
            studentDepartment: studentDepartment,
            studentSignUpPassword: studentSignUpPassword
        });

        // Make AJAX request
        $.ajax({
            type: "POST",
            url: "backend/signupProcess.php",
            data: {
                studentSignUpidNumber: studentSignUpidNumber,
                studentSignUpName: studentSignUpName,
                studentSignUpUsername: studentSignUpUsername,
                studentDepartment: studentDepartment,
                studentSignUpPassword: studentSignUpPassword
            },
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    $("#idNumber").val("");
                    $("#username").val("");
                    $("#fullName").val("");
                    $("#department").val("");
                    $("#password").val("");
                    $("#confirmPassword").val("");
                    //alertify.success(response.message);
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 2000 
                    });
                    $('#exampleModal').modal('hide');
                } else {
                    alertify.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                alertify.error('Failed to sign up!');
            }
        });
    }
}
