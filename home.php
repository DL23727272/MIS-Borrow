<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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
          #mugIcon {
            color: white; /* Makes the icon white */
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
              <div class="ms-2">
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
                <a class="nav-link fw-bold" aria-current="page" href="#">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold " href="cart.php">
                  Item's (<span id="cartCount">0</span>)
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold " href="borrowed.php">
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
      <section class="container-sm mt-4">
          <div class="d-flex flex-column align-items-center text-center">
              <h1 class="display-6 text-danger fw-bold" id="welcomeBanner"></h1>
          </div>
      </section>
      <!-- End Hero-->
  
      <hr class="container-sm Sborder border-success mt-5 border-2 opacity-50" />
  
      <section class="mt-5">
        <div class="container-sm">
          <div class="row justify-content-center">
            <div class="col-12 text-center">
              <h1 class="fw-bold">MIS Equipments</h1>
            </div>
          </div>
          <div class=" w-100" id="bookContent">
            
          </div>
        </div>
      </section>
    
      <!---Footer-->
      <?php include 'footer.php'?>
     <!---End Footer-->

 
    <script type="text/javascript">

document.addEventListener("DOMContentLoaded", function () {
    let userName = sessionStorage.getItem('studentName');
    document.getElementById('welcomeBanner').innerText = `Welcome, ${userName}!`;
});

        alertify.set('notifier', 'position', 'top-right');
    
        $(document).ready(function () {
              $('#modalContainer').load('modal.html');
          });
          document.addEventListener("DOMContentLoaded", function () {
          document.querySelectorAll(".ispsc-logo").forEach(function (element) {
              element.innerHTML = element.textContent
                .split(" ")
                .map(word => `<span>${word.charAt(0)}</span>${word.slice(1)}`)
                .join(" ");
            });
        });
    
        document.addEventListener("DOMContentLoaded", function () {
            var userID = sessionStorage.getItem('idNumber');
            var studentName = sessionStorage.getItem('studentName');
            var cartItem = JSON.parse(localStorage.getItem("itemCart")) || [];
            // Check if customerID is present
            if (userID) {
                document.getElementById('studentID').innerText = 'Name: ' + studentName;
                console.log('Customer ID ' + userID)
                console.log('Customer Name ' + studentName);
                console.log(cartItem)
    
            } else {
                console.log('User ID not found in sessionStorage.');
                Swal.fire({
                    icon: 'error',
                    title: 'Access Denied',
                    text: 'You are not logged in. Redirecting to login page...',
                    timer: 3000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'index.php'; // Redirect to login page
                });
            }
    
            // Update cart count in navbar
            displayCartCount();
        });
    
    
        function loadBooks() {
            $.ajax({
                url: 'backend/fetchBooks.php',
                success: function (data) {
                    if (data.trim() === '') {
                        $('#bookContent').append('<div><p>NO PRODUCTS AVAILABLE</p></div>');
                    } else {
                        $('#bookContent').append(data);
                    }
                },
                error: function () {
                    $('#bookContent').append('<div><p>Error loading products. Please try again later.</p></div>');
                }
            });
        }
    
        loadBooks();
    
        $(document).ready(function () {
            // Function to update cart count in the navbar
            function displayCartCount() {
                var itemCart = JSON.parse(localStorage.getItem("itemCart")) || [];
                var cartCount = itemCart.length;
                $('#cartCount').text(cartCount);
                localStorage.setItem("cartCount", cartCount);
            }

            // Call displayCartCount on page load to update the cart count display
            displayCartCount();

            // Event listener for adding items to the cart
            $(document).on('click', '.borrow-item', function () {
                var itemId = $(this).data('item-id');
                var itemName = $(this).data('item-name');

                var cartItem = {
                    id: itemId,
                    name: itemName
                };

                var itemCart = JSON.parse(localStorage.getItem("itemCart")) || [];
                itemCart.push(cartItem);
                localStorage.setItem("itemCart", JSON.stringify(itemCart));

                // Update cart count display
                displayCartCount();

                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Item added successfully!',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        });
        
    </script>
    
</body>
</html>