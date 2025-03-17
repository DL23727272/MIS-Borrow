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
                <a class="nav-link " aria-current="page" href="#">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="cart.html">
                  Cart(<span id="cartCount">0</span>)
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="index.html">
                  <i class="fa-solid fa-power-off"></i>
                </a>
              </li>
            </ul>
          </div>
      
        </div>
      </nav>
      <!--End ti Navbar -->

      <!-- <div class="mt-5">
        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addBookModal"> 
         <button class="btn btn-outline-success" >Add Product</button>
        </a>
     </div> -->

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
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus
             blanditiis repudiandae illum impedit voluptate pariatur sed possimus
             porro unde delectus iure illo distinctio et veritatis animi nesciunt, sunt ducimus 
             id ratione dolores. Deserunt veritatis quo natus ut repellat, asperiores dolorem.t.
          </p>
          <!-- <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addProduct"> 
          <button class="btn btn-outline-success" >Add Product</button>
          </a> -->
        </div>
      </section>
      <!-- End Hero-->
  
      <hr class="container-sm Sborder border-success mt-5 border-2 opacity-50" />
  
      <section class="mt-5">
        <div class="container-sm">
          <div class="row justify-content-center">
            <div class="col-12 text-center">
              <h1 class="fw-bold">Library Books</h1>
            </div>
          </div>
          <div class=" w-100" id="bookContent">
            
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
        });
    
        document.addEventListener("DOMContentLoaded", function () {
            var studentID = sessionStorage.getItem('studentID');
            var studentName = sessionStorage.getItem('studentName');
            var bookItems = JSON.parse(localStorage.getItem("bookItems")) || [];
            // Check if customerID is present
            if (customerID) {
                document.getElementById('studentID').innerText = 'Student Name: ' + customerName;
                console.log('Customer ID ' + studentID)
                console.log('Customer Name ' + studentName);
                console.log(cartItems)
    
            } else {
                console.log('Customer ID not found in sessionStorage');
            }
    
            // Update cart count in navbar
            displayCartCount();
        });
    
        //add book
        $(document).on('click', '#addBookButton', function () {
            console.log("Submit button clicked"); // Debug statement
    
            // alertify.success("CLICKED");
    
            var formData = new FormData();
            formData.append('bookTitle', $('#bookTitle').val());
            formData.append('bookAuthor', $('#bookAuthor').val());
            formData.append('bookISBN', $('#bookISBN').val());
            formData.append('bookStatus', $('#bookStatus').val());
            formData.append('image', $('#productImageName')[0].files[0]);
    
            console.log("Form data:", formData);
    
            $.ajax({
                type: 'POST',
                url: 'process/addBook.php',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
    
                    $('#addBookButton').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Submitting...');
                },
                success: function (response) {
                    console.log("AJAX request successful");
                    console.log("Response:", response); // check response  from server uo xd
    
                    if (response.trim() === 'Product inserted successfully') {
                        //  alertify.success('Product added successfully');
                        Swal.fire({
                            icon: 'success',
                            title: 'Product added successfully',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#addBookModal').modal('hide');
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    } else {
                        //   alertify.error('Failed to add product');
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to add product',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#addBookButton').prop('disabled', false).html('Submit');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX request error:", xhr.responseText); // Debug statement
                    alertify.error('Error: ' + xhr.responseText);
                    $('#addBookButton').prop('disabled', false).html('Submit');
                }
            });
        });
        //end add book
    
        function loadBooks() {
            $.ajax({
                url: 'process/fetchBooks.php',
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
                var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
                var cartCount = cartItems.length;
                $('#cartCount').text(cartCount);
                localStorage.setItem("cartCount", cartCount); 
            }
        
            // Call displayCartCount on page load to update the cart count display
            displayCartCount();
        
            // Event listener for adding items to the cart
            $(document).on('click', '.add-to-cart', function () {
                var bookId = $(this).data('book-id');
                var bookTitle = $(this).data('book-title');
                var bookAuthor = $(this).data('book-author');
                var bookISBN = $(this).data('book-isbn');
        
                var cartItem = {
                    id: bookId,
                    title: bookTitle,
                    author: bookAuthor,
                    isbn: bookISBN
                };
        
                var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
                cartItems.push(cartItem);
                localStorage.setItem("cartItems", JSON.stringify(cartItems));
        
                // Update cart count display
                displayCartCount();
        
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Book added to cart!',
                    showConfirmButton: false,
                    timer: 2000 
                });
            });
        });
        
    </script>
    
</body>
</html>