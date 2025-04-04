<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - EraaSoft PMS Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php include_once(__DIR__."\..\handelers\add_to_cart.php");?>
        <?php include_once(__DIR__."\..\core\\functions.php")?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">EraaSoft PMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    </ul>
                    <form class="d-flex" action="cart.php">
                        <button class="btn btn-outline-dark me-3" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                <!-- print number of product in cart -->
                                <?php if (isset($_SESSION['cart'])) {
                                    echo count($_SESSION['cart']);
                                } else {
                                    echo "0";
                                }; ?>
                            </span>
                        </button>
                    </form>
                    <?php if(!isset($_COOKIE["user_email"])): ?>
  <!-- Login and Register links -->
  <a class="btn btn-outline-dark me-2" href="login.php">
    <i class="bi-box-arrow-in-right me-1"></i>
    Login
  </a>
  <a class="btn btn-outline-dark" href="register.php">
    <i class="bi-person-plus-fill me-1"></i>
    Register
  </a>
<?php else: ?>
  <!-- Dropdown with user email and logout -->
  <div class="dropdown">
    <button class="btn btn-outline-dark dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="bi-person-circle fs-4 me-2"></i>
      <span class="text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($_COOKIE["user_email"]); ?></span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
      <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
    </ul>
  </div>
<?php endif; ?>


                </div>
                       
  
         
            </div>
          
        </nav>
        <div class="container"><?=show_message()?></div>
      

      

    