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


    <script src="script/admin.js"></script>
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
  
     
  </script>
  
    
</body>
</html>