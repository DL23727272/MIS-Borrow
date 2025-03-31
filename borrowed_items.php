<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed</title>

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
    <link rel="stylesheet" href="styles.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap"
      rel="stylesheet"
    />

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
     <nav class="navbar navbar-expand-lg shadow-lg sticky-top" id="navbar" style=" background-color:#800000">
        <div class="container-sm d-flex justify-content-between" style="width: 100%;">
  
          <div class="d-flex justify-content-between align-items-center" style="width: 100vw">
            <div class="d-flex align-items-center">
              <!-- Logo and text -->
              <!-- <div>
                  <img src="img/logo.png" alt="" style="width: 60px;" />
              </div> -->
              <div class="ms-1">
                  <h3 class="fw-bold m-0 text-white">MIS Office Equipment Logs</h3>
              </div>
            </div>
            <div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                <i class="fa-solid fa-bars" id="mugIcon"></i>
              </button>
            </div>
          </div>
          <div class="collapse navbar-collapse container-fluid" id="navbarSupportedContent" style="width: 50vw">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link fw-bold" aria-current="page" href="admin.php">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold " href="borrowed_items.php">
                  Borrowed Item's
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="index.php">
                  <i class="fa-solid fa-power-off"></i>
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
     <!-- <section class="container-sm">
        <div class="d-flex flex-column align-items-center text-center">
          <img
            src="./img/lms.jpg"
            style="width: 200px; height: 200px"
            alt=""
            class="mt-5 mb-3 img-fluid"
            srcset=""
          />
          <p class="w-75 lead text-secondary fst-italic" id="studentID">
            
          </p>
         
        </div>
      </section> -->
      <!-- End Hero-->
  
      <hr class="container-sm Sborder border-success mt-5 border-2 opacity-50" />
  
      <!--Borrowed Items-->
    <section class="container-sm mt-5">
        <h2>Borrowed Items (Admin View)</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Borrower</th>
                        <th>Borrow Date</th>
                        <th>Returned Date</th>
                        <th>Return</th>
                    </tr>
                </thead>
                <tbody id="borrowedTableBody">
                    <!-- Borrowed items will be displayed here -->
                </tbody>
            </table>
        </div>
    </section>


      <!---end Cart-->
      <hr class="container-sm Sborder border-success mt-5 border-2 opacity-50" />
      <!---Footer-->
      <?php include 'footer.php'?>
     <!---End Footer-->

 
     <script src="script/admin_borrowedItems.js"></script>
     <script src="script/cart.js"></script>
     <script type="text/javascript">
      alertify.set('notifier', 'position', 'top-right');

    </script>
</body>
</html>