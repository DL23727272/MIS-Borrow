<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

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
    <link href="styles.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <style>
        
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
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addItemModal"> 
                        <button class="btn btn-outline-success" >Add Item</button>
                    </a>
                 </div>
              <h1 class="fw-bold">Library Books</h1>
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
          var studentID = sessionStorage.getItem('studentID');
          var studentName = sessionStorage.getItem('studentName');
          var bookItems = JSON.parse(localStorage.getItem("bookItems")) || [];
          if (studentID) {
              document.getElementById('studentID').innerText = 'Student Name: ' + studentName;
              console.log('Customer ID ' + studentID);
              console.log('Customer Name ' + studentName);
              console.log(cartItems);
          } else {
              console.log('Customer ID not found in sessionStorage');
          }
  
          displayCartCount();
      });
  
     // ADD ITEM
    $(document).on('click', '#addItemButton', function () {
        console.log("Submit button clicked");

        var formData = new FormData();
        formData.append('itemName', $('#itemName').val());
        formData.append('itemDescription', $('#itemDescription').val());
        formData.append('itemStatus', $('#itemStatus').val());
        formData.append('image', $('#itemImage')[0].files[0]);

        console.log("Form data:", formData);

        $.ajax({
            type: 'POST',
            url: 'backend/addItems.php',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#addItemButton').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Submitting...');
            },
            success: function (response) {
                console.log("AJAX request successful");
                console.log("Response:", response);

                if (response.trim() === 'Item inserted successfully') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Item added successfully',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#addItemModal').modal('hide');
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to add item',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX request error:", xhr.responseText);
                alertify.error('Error: ' + xhr.responseText);
                $('#addItemButton').prop('disabled', false).html('Submit');
            }
        });
    });
    // END ADD ITEM

  
      // LOAD BOOKS
      function loadBooks() {
          $.ajax({
              url: 'backend/adminFetchBooks.php',
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
  
      // EDIT BOOK
      document.addEventListener('DOMContentLoaded', (event) => {
          document.querySelectorAll('.edit-book').forEach(button => {
              button.addEventListener('click', (e) => {
                  const bookID = button.getAttribute('data-book-id');
                  const bookTitle = button.getAttribute('data-book-title');
                  const bookAuthor = button.getAttribute('data-book-author');
                  const bookISBN = button.getAttribute('data-book-isbn');
                  const bookStatus = button.getAttribute('data-book-status');
                  const bookImage = button.getAttribute('data-book-image');
  
                  document.getElementById('editBookID').value = bookID;
                  document.getElementById('editBookTitle').value = bookTitle;
                  document.getElementById('editBookAuthor').value = bookAuthor;
                  document.getElementById('editBookISBN').value = bookISBN;
                  document.getElementById('editBookStatus').value = bookStatus;
              });
          });
  
          $(document).on('submit', '.edit-book-form', function (e) {
              e.preventDefault();
  
              var formData = $(this).serialize();
              var modalId = $(this).attr('id').replace('editBookForm', '#editBookModal');
  
              $.ajax({
                  type: 'POST',
                  url: 'backend/updateBook.php',
                  data: formData,
                  success: function (response) {
                      console.log(response);
                      Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: response.message,
                      });
                      $(modalId).modal('hide');
                      setTimeout(function() {
                          location.reload();
                      }, 2000);
                  },
                  error: function (xhr, status, error) {
                      console.error(xhr.responseText);
                  }
              });
          });
      });
      // END EDIT BOOK
  
      // DELETE BOOK
      $(document).on('click', '.delete-book', function () {
          var bookID = $(this).data('book-id');
  
          $.ajax({
              type: 'POST',
              url: 'backend/deleteBook.php',
              data: { bookID: bookID },
              success: function (response) {
                  if (response.success) {
                      Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: response.message,
                      });
                      setTimeout(function() {
                          location.reload();
                      }, 2000);
                  } else {
                      Swal.fire({
                          icon: 'error',
                          title: 'Error',
                          text: response.message,
                      });
                  }
              },
              error: function (xhr, status, error) {
                  console.error("AJAX request error:", xhr.responseText);
                  alert('Error: ' + xhr.responseText);
              }
          });
      });
      // END DELETE BOOK
  </script>
  
    
</body>
</html>