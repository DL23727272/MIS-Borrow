<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap"
      rel="stylesheet"
    />

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
    <link href="styles.css" rel="stylesheet" />
   

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
     <header class="header">
      <div class="container">
       <div
        class="d-flex flex-column align-items-center justify-content-center text-center"
        >
          <div>
            <img
              src="img/ispsc.png"
              alt="ISPSC Logo"
              width="100"
              height="100"
              class="me-3"
            />
            <img
              class="bagong-pilipinas"
              src="img/bagong-pilipinas.png"
              alt="ISPSC Logo"
              width="120"
              height="120"
              class="me-3"
            />
          </div>
          <div>
            <h1 class="ispsc-logo mb-0">REPUBLIC OF THE PHILIPPINES</h1>
            <hr class="my-2 border-white" />
            <h1 class="ispsc-logo mb-0">
              ILOCOS SUR POLYTECHNIC STATE COLLEGE
            </h1>
            <h2 class="ispsc-logo mb-0">ILOCOS SUR, PHILIPPINES</h2>
          </div>
        </div>
      </div>
    </header>
      <!--End ti Navbar -->



      <!-- Signup Modal -->
    <div class="modal fade mt-5" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: rgba(255, 255, 255, 0.449); backdrop-filter: blur(10px);">
                <div class="modal-header">
                    <img src="img/logo.png" alt="Logo" style="width: 30px;">
                    <h5 class="ms-2">User Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" class="mt-1" id="signupForm">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label for="idNumber" style="font-weight: 700;"><i class="fa-solid fa-id-card"></i> ID Number</label>
                                    <input type="text" name="idNumber" id="idNumber" placeholder="Enter ID Number" class="form-control" required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="username" style="font-weight: 700;"><i class="fa-solid fa-user"></i> Username</label>
                                    <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control" required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="fullName" style="font-weight: 700;"><i class="fa-solid fa-signature"></i> Full Name</label>
                                    <input type="text" name="fullName" id="fullName" placeholder="Enter Full Name" class="form-control" required>
                                </div>
                            </div>
                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    <label for="department" style="font-weight: 700;"><i class="fa-solid fa-building"></i> Department</label>
                                    <input type="text" name="department" id="department" placeholder="Enter Department" class="form-control" required>
                                </div>
                                <label for="password" style="font-weight: 700;">
                                    <i class="fa-solid fa-lock"></i> Password
                                </label>
                                <div class="input-group my-3">
                                    <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" required>
                                    <button class="btn btn-outline-dark" type="button" id="toggleSignupPassword">
                                        <i class="fa fa-eye-slash" id="eyeIcon" aria-hidden="true"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="form-group my-3">
                                    <label for="confirmPassword" style="font-weight: 700;"><i class="fa-solid fa-lock"></i> Confirm Password</label>
                                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Re-enter Password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </form>
                     <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="signupButton"  onclick="Signup()">Sign Up</button>
                </div>
                </div>
               
            </div>
        </div>
    </div>




      <img src="img/bg.jpg" alt="image" class="login__bg" >



      
      <!-- LOGIN FORM -->
    <section class="vh-100">
        <div class="container d-flex justify-content-end align-items-center h-100">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="login_card card">
                    <form enctype="multipart/form-data" method="POST" class="mt-1">
                        <div class="m-5">
                            <div class="form-group d-flex justify-content-center my-5">
                                <img src="img/logo.png" alt="LOGO" style="width: 90px;">
                            </div>
                            <div class="form-group my-4">
                                <label for="Name" style="font-weight: 700;">Username</label>
                                <input type="text" name="userName" id="userName" placeholder="Enter Username" class="form-control" required>
                            </div>
                            <label for="Password" style="font-weight: 700;">Password</label>
                            <div class="mb-3 input-group">
                                <input type="password" id="userPassword" class="form-control" name="userLoginPassword" placeholder="Password" required>
                                        <button class="btn btn-outline-dark" type="button" id="togglePassword">
                                                  <i class="fa fa-eye-slash" id="eyeIcon" aria-hidden="true"></i>
                                          </button>
                            </div>
                            <div class="col-sm">
                                <p style="font-size: 13px; color: rgb(0, 0, 0);">
                                    Don't have an account?
                                    <a data-bs-toggle="modal" data-bs-target="#signupModal" style="text-overflow: unset; color: rgb(252, 254, 255); text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                                        Sign up
                                    </a>
                                </p>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-auto">
                                    <button type="button" id="addProductButton" class="btn btn-outline-light" onclick="Login()">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End LOgin FOrm -->


      
    
      <!---Footer-->
      <?php include 'footer.php'?>
      <script src="script/index.js"></script>
 
     <script type="text/javascript">

      document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".ispsc-logo").forEach(function (element) {
            element.innerHTML = element.textContent
              .split(" ")
              .map(word => `<span>${word.charAt(0)}</span>${word.slice(1)}`)
              .join(" ");
          });
      });

      document.addEventListener('DOMContentLoaded', function () {
          const togglePassword = document.getElementById('togglePassword');
          const passwordInput = document.getElementById('userPassword');
          const eyeIcon = document.getElementById('eyeIcon');
        
          togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
        
            // Toggle the eye icon
            if (type === 'password') {
              eyeIcon.classList.remove('fa-eye');
              eyeIcon.classList.add('fa-eye-slash');
            } else {
              eyeIcon.classList.remove('fa-eye-slash');
              eyeIcon.classList.add('fa-eye');
            }
          });
      });

     
    
    </script>
</body>
</html>