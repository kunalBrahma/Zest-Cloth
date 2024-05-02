  <!-- header desktop part -->
  <header class="container-fluid topbar mobile-hide">
        <p class="head-mobile" >
          <?php
              try {
                $sql_1 = "SELECT * FROM frontend_master WHERE id = 1 ";
                $stmt_1 = $pdo->query($sql_1);
                $stmt_1->execute();  
                
                while ($row = $stmt_1->fetch()) {
                    // Process the retrieved data
                  $fm_1 = $row['fm_1'];
                echo $fm_1;
                }
                
              } catch (PDOException $e) {
              
              }
            ?>
        </p>
   
    </header>
  <!-- header mobile part -->
  <header class="container-fluid topbar dk-hide pt-2">
    <p class="head-mobile" >
    <?php
              try {
                $sql_1 = "SELECT * FROM frontend_master WHERE id = 1 ";
                $stmt_1 = $pdo->query($sql_1);
                $stmt_1->execute();  
                
                while ($row = $stmt_1->fetch()) {
                    // Process the retrieved data
                  $fm_1 = $row['fm_1'];
                echo $fm_1;
                }
                
              } catch (PDOException $e) {
              
              }
            ?>
    </p>
</header>
