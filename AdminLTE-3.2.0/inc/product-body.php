 <?php 
// for reading 
 try {
        $sql_1 = "SELECT * FROM `product-info` WHERE pi_type ='Sub-Category' ";
        $stmt_1 = $pdo->query($sql_1);
        $stmt_1->execute();  
        
    } catch (PDOException $e) {
       
    }
$type = @$_GET['type'];

$short_desc = @$_POST['short_desc'];
$long_desc = @$_POST['long_desc'];
$pi_size = @$_POST['pi_size'];
$pi_color = @$_POST['pi_color'];
$pi_name = @$_POST['name'];
$pi_sub = @$_POST['pi_sub'];
$pi_parent = @$_POST['pi_parent'];
$pi_type = 'Product';
$pi_price = @$_POST['pi_price'];
$pi_selling = @$_POST['pi_selling'];


$value3 = @$_GET['id'];

if ($type == 'Edit') {

        $sql_5 = "SELECT * FROM `product-info` WHERE id ='$value3' ";
        $stmt_5 = $pdo->query($sql_5);
        $stmt_5->execute(); 

        while ($row_5 = $stmt_5->fetch()) {
          // Process the retrieved data
        $main_cat_name = $row_5['pi_name'];
        $main_sub_cat_name5 = $row_5['pi_parent'];

       
        }
if(isset($_POST['sub'])){
  try {
    $sql_ed = "UPDATE `product-info` SET pi_parent = :v3 WHERE id = :id";
    $stmt_ed = $pdo->prepare($sql_ed);

    $stmt_ed->bindParam(':v3', $v3);
    $stmt_ed->bindParam(':id', $value3); // Bind the id parameter to $value3
    $stmt_ed->execute();

   
    echo "<script>window.location.href = 'index.php?module=Sub-category';</script>";
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
}
        

else if ($type == 'Delete') {
    try {
        $sql_2 = "DELETE FROM `product-info` WHERE id = :id";
        $stmt_2 = $pdo->prepare($sql_2);
        $stmt_2->bindParam(':id', $value3); // Bind the id parameter to $value3

        $stmt_2->execute();
        echo "Record deleted successfully.";
        echo "<script>window.location.href = 'index.php?module=Sub-category';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
 else {
    if (isset($_POST['sub'])) {


                  $allow = array("jpg", "JPG", "jpeg", "JPEG", "gif", "GIF", "png", "PNG", "pdf", "PDF");
              //1st File
              if($_FILES['photo1']['name'] == "") {
                //echo "No Image"
              } else {

                $photo1=basename($_FILES['photo1']['name']);
                $extension = pathinfo($photo1, PATHINFO_EXTENSION);
                if(in_array($extension,$allow)){
                  $target_path = "assests/product/";
                  $photo1 = md5(rand() * time()).'.'.$extension;
                  $target_path = $target_path . $photo1;
                  move_uploaded_file($_FILES['photo1']['tmp_name'], $target_path);
                  $photo_one = ($photo1!='')?" pi_img1='$photo1' ". ',':'';
                }
              
              }
               //2nd File
               if($_FILES['photo2']['name'] == "") {
                //echo "No Image"
              } else {

                $photo2=basename($_FILES['photo2']['name']);
                $extension = pathinfo($photo2, PATHINFO_EXTENSION);
                if(in_array($extension,$allow)){
                  $target_path = "assests/product/";
                  $photo2 = md5(rand() * time()).'.'.$extension;
                  $target_path = $target_path . $photo2;
                  move_uploaded_file($_FILES['photo2']['tmp_name'], $target_path);
                  $photo_two = ($photo2!='')?" pi_img2='$photo2' ". ',':'';
                }
              
              }
              //2nd File
              if($_FILES['photo3']['name'] == "") {
                //echo "No Image"
              } else {

                $photo3=basename($_FILES['photo3']['name']);
                $extension = pathinfo($photo3, PATHINFO_EXTENSION);
                if(in_array($extension,$allow)){
                  $target_path = "assests/product/";
                  $photo3 = md5(rand() * time()).'.'.$extension;
                  $target_path = $target_path . $photo3;
                  move_uploaded_file($_FILES['photo3']['tmp_name'], $target_path);
                  $photo_three = ($photo3!='')?" pi_img3='$photo3' ". ',':'';
                }
              
              }
              //2nd File
              if($_FILES['photo4']['name'] == "") {
                //echo "No Image"
              } else {

                $photo4=basename($_FILES['photo4']['name']);
                $extension = pathinfo($photo4, PATHINFO_EXTENSION);
                if(in_array($extension,$allow)){
                  $target_path = "assests/product/";
                  $photo4 = md5(rand() * time()).'.'.$extension;
                  $target_path = $target_path . $photo4;
                  move_uploaded_file($_FILES['photo4']['tmp_name'], $target_path);
                  $photo_four = ($photo4!='')?" pi_img4='$photo4' ". ',':'';
                }
              
              }
          
        try {

         
          $sql_1 = "INSERT INTO `product-info` 
          SET $photo_one  $photo_two $photo_three $photo_four
          pi_parent = :pi_parent,
          pi_sub = :pi_sub,
          pi_name = :pi_name,
          pi_size = :pi_size,
          pi_color = :pi_color,
          short_desc = :short_desc,
          long_desc = :long_desc,
          pi_price = :pi_price,
          pi_selling = :pi_selling,
          pi_type = :pi_type";

          $stmt_1 = $pdo->prepare($sql_1);
          $stmt_1->bindParam(':pi_parent', $pi_parent);
          $stmt_1->bindParam(':pi_sub', $pi_sub);
          $stmt_1->bindParam(':pi_name', $pi_name);
          $stmt_1->bindParam(':pi_size', $pi_size);
          $stmt_1->bindParam(':pi_color', $pi_color);
          $stmt_1->bindParam(':short_desc', $short_desc);
          $stmt_1->bindParam(':long_desc', $long_desc);
          $stmt_1->bindParam(':pi_price', $pi_price);
          $stmt_1->bindParam(':pi_selling', $pi_selling);
          $stmt_1->bindParam(':pi_type', $pi_type);

          $stmt_1->execute();

            echo "Record inserted successfully.";
            echo "<script>window.location.href = 'index.php?module=product';</script>";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
       
 }



  ?>
 
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add a Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Main-Category</label>
                    <select name="pi_parent" class="form-control" onchange="fetchproduct(this.value)">
                    <option value=""><?php echo @$main_cat_name ?></option>
                    <option value="">---Select Sub Catgeory---</option>
                    <?php 
                    $sql_6 = "SELECT * FROM `product-info` WHERE pi_type ='Main-Category' ";
                    $stmt_6 = $pdo->query($sql_6);
                    $stmt_6->execute(); 
            
                    while ($row_6 = $stmt_6->fetch()) {
                      // Process the retrieved data
                    $main_cat_name_6 = $row_6['pi_parent'];
                        echo "<option> $main_cat_name_6 </option>";
                    }
                    ?>

                    </select>
                    
                  </div>
                  <div class="form-group">
                   
                    <label for="exampleInputEmail1">Sub-Category</label>
                    <div id="txtHint"></div>
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo  @$main_sub_cat_name5 ?>" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select size</label>
                    <select name="pi_size" class="form-control">
                            <option value="">----select size----</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>XXL</option>
                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Color</label>
                    <select name="pi_color" class="form-control">
                            <option value="">----select color----</option>
                            <option>Black</option>
                            <option>Blue</option>
                            <option>Green</option>
                            <option>Yellow</option>
                            <option>Pink</option>
                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Short Description</label>
                    <textarea class="form-control" name="short_desc"><?php echo @$short_desc; ?></textarea>
                    
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Long Description</label>
                    <textarea id="editor" class="form-control" name="long_desc"><?php echo @$long_desc; ?></textarea>
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">MRP Price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="pi_price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Selling Price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo  @$main_sub_cat_name5 ?>" name="pi_selling">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input class="form-control" type="file" name="photo1">
                    <input class="form-control" type="file" name="photo2">
                    <input class="form-control" type="file" name="photo3">
                    <input class="form-control" type="file" name="photo4">
                  
                    
                  </div>
                  
                  
               
                 
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
                </div>
              </form>
            </div>
            </div>
            <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 30px">Sl no.</th>
                      <th>Main Category</th>
                      <th>Sub Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                      <?php 
                              $i = 1;
                               while ($row = $stmt_1->fetch()) {
                                  // Process the retrieved data
                                $main_cat_name = $row['pi_parent'];
                                $sub_cat_name = $row['pi_sub'];
                                $main_id =$row['id'];
                               ?>
                               

                      <td><?php echo $i++; ?></td>
                      <td><?php echo $main_cat_name  ?></td>
                      <td><?php echo $sub_cat_name  ?></td>
                      
                      <td>
                        <a style="text-decoration: none; color:black" href="index.php?module=Sub-category&type=Edit&id=<?php echo $main_id; ?>"><i class="fa-solid fa-pen-to-square"></i></a> | 
                      <a  style="text-decoration: none; color:black" 
                      href="index.php?module=Sub-category&type=Delete&id=<?php echo $main_id; ?>"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                              <?php
                              }
                              ?>

              </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
            </div>
        </div>
      </div>
    </div>
 </div>
 <script type="text/javascript">
function fetchproduct(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("txtHint").innerHTML = this.responseText;
    };
    xmlhttp.open("GET", "integration/ajax/product-fetch.php?parent=" + str);
   

    xmlhttp.send();
  }
}
  

 </script>
 