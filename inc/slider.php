<!-- slider-->
<div class="slider">
        <div id="carouselExampleAutoplaying" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
            
            <?php
              
                $sql_s = "SELECT * FROM frontend_master WHERE fm_type = 'Slider' ";
                $stmt_s = $pdo->query($sql_s);
                $stmt_s->execute();  
                
                while ($row = $stmt_1->fetch()) {
                    // Process the retrieved data
                  $fm_2 = $row['fm_2'];
                 ?>
                  <div class="carousel-item active" data-bs-interval="3000">
                  <img src="../AdminLTE-3.2.0/assests/slider/<?php echo $fm_2;  ?>" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    
                  </div>
                </div>
                 
                 <?php   
                    }
                  ?>
    </p>
              <div class="carousel-item active" data-bs-interval="3000">
                <img src="img/slider/slider1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="3000">
                <img src="img/slider/slider2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  
                </div>
              </div>
              <div class="carousel-item">
                <img src="img/slider/slider3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>