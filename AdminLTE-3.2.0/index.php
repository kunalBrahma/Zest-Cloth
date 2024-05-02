
<?php
session_start();
include '../database.php';
  $login_id = $_SESSION['my_id'];
  if($login_id==''){
    header("Location: authentication.php");
  }


  $module = @$_GET['module'];
  if($module == 'category'){
    include('inc/header.php');
    include('inc/preloader.php');
    include('inc/navbar.php');
    include('inc/sidebar.php');
    include('inc/category.php');
    include('inc/footer.php');
  }
  else if($module == 'Sub-category'){
    include('inc/header.php');
    include('inc/preloader.php');
    include('inc/navbar.php');
    include('inc/sidebar.php');
    include('inc/sub-cat-body.php');
    include('inc/footer.php');
  }
  else if($module == 'product'){
    include('inc/header.php');
    include('inc/preloader.php');
    include('inc/navbar.php');
    include('inc/sidebar.php');
    include('inc/product-body.php');
    include('inc/footer.php');
  }
  else if($module == 'top-bar'){
    include('inc/header.php');
    include('inc/preloader.php');
    include('inc/navbar.php');
    include('inc/sidebar.php');
    include('inc/top-bar-body.php');
    include('inc/footer.php');
  }
  else if($module == 'slider'){
    include('inc/header.php');
    include('inc/preloader.php');
    include('inc/navbar.php');
    include('inc/sidebar.php');
    include('inc/slider-body.php');
    include('inc/footer.php');
  }
  else {
    include('inc/header.php');
    include('inc/preloader.php');
    include('inc/navbar.php');
    include('inc/sidebar.php');
    include('inc/homebody.php');
    include('inc/footer.php');
  }
   
  
?>





 

  

 