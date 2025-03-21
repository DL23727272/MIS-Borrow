<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Alertify sakit sa ulo -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- Sweet -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo.ico">

    <style>
          .navbar {
            background-color: #008000; 
            transition: background-color 0.3s ease; 
          }
         
          .nav-link {
            color: white;
            font-weight: 500;
            transition: color 0.3s ease 
          }
          .nav-link.scrolled:hover {
            color: #006341; 
            font-weight: 500;
          }
         
          .login__bg{
            position: absolute;
            width: 100%;
            height: 110%;
            object-fit: cover;
            object-position: center;
            z-index: -1;
          }
          .login_card{
            height: 90%;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.385); 
            backdrop-filter: blur(10px); 
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
          }
         
    </style>
</head>
<body>
     <!--Navbar-->
     <nav class="navbar navbar-expand-lg shadow-lg sticky-top" id="navbar">
        <div class="container-sm d-flex justify-content-between" style="width: 100%">
  
          <div class="d-flex justify-content-between align-items-center" style="width: 100vw">
            <div class="d-flex align-items-center">
                <!-- Logo and text -->
                <div>
                    <img src="img/logo.png" alt="" style="width: 60px;" />
                </div>
                <div class="ms-2">
                    <h3 class="fw-bold m-0">Library Users Registration</h3>
                </div>
            </div>
            <div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                <i class="fa-solid fa-bars" id="mugIcon"></i>
              </button>
            </div>
          </div>
          <div class="collapse navbar-collapse container-fluid" id="navbarSupportedContent" style="width: 30vw">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="admin.html">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="account.html">
                 Users
                </a>
              </li>
            </ul>
          </div>
      
        </div>
      </nav>
      <!--End ti Navbar -->

      <!-- MODAL -->

      <div id="modalContainer"></div>

      <!-- END MODAL -->

      <!--Hero-->
     <section class="container-sm">
        <div class="d-flex flex-column align-items-center text-center">
          <img
            src="./img/lms.jpg"
            style="width: 200px; height: 200px"
            alt=""
            class="mt-5 mb-3 img-fluid"
            srcset=""
          />
          <p class="w-75 lead text-secondary fst-italic">
            Starbucks is more than just a coffee shop; it's a community hub where
            people connect over delicious drinks and meaningful moments. With our
            expertly crafted coffees, teas, and snacks, every visit is an
            opportunity to treat yourself to quality and comfort. From our iconic
            lattes to seasonal favorites, there's something for every palate. Join
            us at Starbucks and let's make every sip count.
          </p>
         
        </div>
      </section>
      <!-- End Hero-->
  
      <hr class="container-sm Sborder border-success mt-5 border-2 opacity-50" />
  
      <section class="mt-5">
        <div class="container-sm">
          <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="mt-5">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal"> 
                        <button class="btn btn-outline-success" >Add User</button>
                    </a>
                 </div>
              <h1 class="fw-bold">Library Management System Accounts</h1>
            </div>
          </div>
          <div class=" w-100" id="userContent">
            
          </div>
        </div>
      </section>
      
    
      <!---Footer-->
      <footer class="mt-5 text-white p-3" style="background-color: #008000;">
        <div class="container-sm d-flex justify-content-between align-items-center">
          <div class="">
            <h4>ISPSC Library Management System</h4>
            <h5>CCSIT 210</h5>
            <ul>
              <li>Dran Leynard Gamoso</li>
              <li>Dran Leynard Gamoso</li>
            </ul>
          </div>
          <div class="">
            <div>
              <img src="./img/logo.png" style=" width: 50px; height: 50px;" alt="">
            </div>
            <div>
              <p class="fst-bold">&copy DL Visuals</p>
            </div>
          </div>
        </div>
      </footer>
     <!---End Footer-->

 
    <script type="text/javascript">
        alertify.set('notifier', 'position', 'top-right');
    
        $(document).ready(function () {
            $('#modalContainer').load('modal.html');

             // Fetch and display users
             fetchUsers();

             function fetchUsers() {
                 $.ajax({
                     url: 'backend/fetchAccounts.php',
                     method: 'GET',
                     success: function(data) {
                         $('#userContent').html(data);
                     },
                     error: function() {
                         alertify.error('Failed to load users');
                     }
                 });
             }
              // Handle edit user form submission
            $(document).on('submit', '.edit-user-form', function(e) {
                e.preventDefault();

                var form = $(this);
                var userID = form.find('input[name="editUserID"]').val();

                $.ajax({
                    url: 'backend/updateUser.php',
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response == 'success') {
                         //   alertify.success('User updated successfully');
                            fetchUsers();
                            $('#editUserModal' + userID).modal('hide');
                        } else {
                            alertify.error('Failed to update user');
                        }
                    },
                    error: function() {
                        alertify.error('Failed to update user');
                    }
                });
            });

            // Handle delete user
            $(document).on('click', '.delete-user', function() {
                var userID = $(this).data('user-id');
                console.log("User ID:", userID); // Add debug logging

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'backend/deleteUser.php',
                            method: 'POST',
                            data: { userID: userID },
                            success: function(response) {
                                console.log("Delete response:", response); // Add debug logging
                                if (response == 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: 'User has been deleted.'
                                    });
                                    fetchUsers();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Failed to delete user'
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log("Error:", error); // Add debug logging
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Failed to delete user'
                                });
                            }
                        });
                    }
                });
            });


        });

        
        function Signup() {
            // Get form data
            var studentSignUpidNumber = $("#studentSignUpidNumber").val();
            var studentSignUpName = $("#studentSignUpName").val();
            var studentSignUpUsername = $("#studentSignUpUsername").val();
            var studentDepartment = $("#studentDepartment").val();
            var studentSignUpPassword = $("#studentSignUpPassword").val();
            var checkSignUpPassword = $("#checkSignUpPassword").val();
        
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
                            $("#studentSignUpidNumber").val("");
                            $("#studentSignUpName").val("");
                            $("#studentSignUpUsername").val("");
                            $("#studentDepartment").val("");
                            $("#studentSignUpPassword").val("");
                            $("#checkSignUpPassword").val("");
                            //alertify.success(response.message);
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 2000 
                            });
                            $('#exampleModal').modal('hide');
                            fetchUsers();
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
        
    
      

       
    </script>
    
</body>
</html>