<?php


        $page_name = @$_GET['page'];

        include('inc/head.php');
        include('inc/topbar.php');
        include('inc/navbar.php');

        if($page_name == 'terms'){
                include('inc/terms.php');
        }elseif($page_name == 'privacy'){
                include('inc/privacy.php');
        }elseif($page_name == 'checkout'){
            include('inc/checkout.php');
        }elseif($page_name == 'privacy'){
            include('inc/privacy.php');
        }elseif($page_name == 'login'){
            include('inc/login.php');
        }elseif($page_name == 'register'){
            include('inc/register.php');
        }
        elseif($page_name == 'product'){
            include('inc/product.php');
        }elseif($page_name == 'shoppingbag'){
            include('inc/shoppingbag.php');
        }elseif($page_name == 'women'){
            include('inc/women.php');
        }elseif($page_name == 'whislist'){
            include('inc/whislist.php');
        }elseif($page_name == 'congrats'){
            include('inc/congrats.php');
        }

        else{
                include('inc/slider.php');
                include('inc/productcat.php');
                include('inc/feature.php');
                include('inc/customer.php');
        }
        
        include('inc/footer.php');

        
?>