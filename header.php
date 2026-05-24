<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Our Treatments</title>

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- bootstrap icon -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <style>
  header{
    font-weight:bold;
    backdrop-filter: blur(10px);
    background-color:transparent;
  }
 .navbar-nav .nav-item:hover{
  padding-bottom:0;
  border-bottom: 2px solid black;
 }
 .navbar-nav .nav-item .nav-link:focus {
  color: blue;
}
</style>
  </head>
  <body>
<header class="shadow fixed-top">
      <div class="container d-flex justify-content-start justify-content-sm-between" id="login">
          <a class="navbar-brand d-flex flex-column justify-content-center ps-5" href="home.php">
                <img src="./images/logobc.png" alt="beautycare logo">
          </a>
      
      <div class="social-icons">
              <a href="#" class="text-primary mx-2 d-none d-lg-inline"><i class="bi bi-facebook"></i></a>
              <a href="#" class="text-primary mx-2 d-none d-lg-inline"><i class="bi bi-twitter"></i></a>
              <a href="#" class="text-success mx-2 d-none d-lg-inline"><i class="bi bi-instagram"></i></a>
              <a class="btn btn-outline-dark my-2 mx-2 d-none d-lg-inline" href="register.php">    
          <i class="bi bi-unlock-fill"></i>
              </a>
            <a class="btn btn-outline-dark my-2 mx-2" href="login.php">    
            <i class="bi bi-key-fill"></i>
              </a>
              <a class="btn btn-outline-dark my-2 mx-2" href="logout.php">    
            <i class="bi bi-box-arrow-left"></i>
              </a>
            </div>
      </div>
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg border-top border-secondary">
      <div class="container-fluid p-1">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link"  href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="blogdisplay.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="treatment.php"
                >Our Treatments</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="books.php">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="contactus.php"
                >Contact Us</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="aboutus.php"
                >About Us</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </header>
    
    <!-- Header navbar -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>  
  </body>
    </html>