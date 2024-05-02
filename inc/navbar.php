 <!-- nav bar  -->
 <nav class="container-fluid navbar">
        <div class="nav-bar">
            <a href="" class="link-a"><i class="fa-solid fa-bars bar"></i></a>
        </div>
        <div class="nav-logo">
            <a href="index.php"><img class="logo" height="50px"; width="240pcx" src="img/content/logo.png" alt=""></a>
        </div>
       
        <?php
              try {
                $sql_1 = "SELECT * FROM `product-info` WHERE pi_type = 'Main-Category' ";
                $stmt_1 = $pdo->query($sql_1);
                $stmt_1->execute();  
                
                while ($row = $stmt_1->fetch()) {
                    // Process the retrieved data
                  $pi_parent = $row['pi_parent'];
                echo "<div class='menu'> <a class='link-a nav-hover'>$pi_parent</a></div>";
                }
                
              } catch (PDOException $e) {
              
              }
            ?>
    </p>
       

        <!-- <div class="menu"><a class="link-a nav-hover" href="">MEN</a></div>
        <div class="menu"><a class="link-a nav-hover" href="inc/women.php">WOMEN</a></div>
        <div class="menu"><a class="link-a nav-hover" href="#">KIDS</a></div>
        <div class="menu"><a class="link-a nav-hover" href="#">HOME AND LIVING</a></div>
        <div class="menu"><a class="link-a nav-hover" href="#">BLOG</a></div> -->
        <div class="nav-icon">
            <div class="icons">
                <a href="#" class="link-a"><i class="fa-solid fa-user"></i>
                <br><p class="icon-tag">Profile</p>
                </a>
            </div>
            <div class="icons">
                <a href="inc/whislist.php" class="link-a">
                    <i class="fa-solid fa-heart"></i>
                    <br><p class="icon-tag">Whistlist</p>
                </a>
            </div>
            <div class="icons">
                <a href="inc/shoppingbag.php" class="link-a">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <br><p class="icon-tag">Bag</p>
                </a>
            </div>
        </div>
    </nav>