<?php 
// for reading 
 try {
        $sql_1 = "SELECT * FROM `product-info` WHERE pi_type ='Sub-Category' ";
        $stmt_1 = $pdo->query($sql_1);
        $stmt_1->execute();  
        
    } catch (PDOException $e) {
       
    }

$pi_cat = @$_POST["product_cat"];
$pi_sub_cat = @$_POST["product_sub_cat"];
$type = @$_GET['type'];
$value1 = "Sub-Category";
$value2 = $pi_cat;
$v3 = $pi_sub_cat;
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
} else {
    if (isset($_POST['sub'])) {
        try {
            $sql = "INSERT INTO `product-info` (pi_type, pi_name, pi_parent) VALUES (:value1, :value2, :v3)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':value1', $value1);
            $stmt->bindParam(':value2', $value2);
            $stmt->bindParam(':v3', $v3);

            $stmt->execute();

            echo "Record inserted successfully.";
            echo "<script>window.location.href = 'index.php?module=Sub-category';</script>";

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
                <h3 class="card-title">Add a Sub-Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Main-Category</label>
                    <select name="product_cat" class="form-control">
                    <option value=""><?php echo @$main_cat_name ?></option>
                    <option value="">---Select Sub Catgeory---</option>
                    <?php 
                    $sql_6 = "SELECT * FROM `product-info` WHERE pi_type ='Main-Category' ";
                    $stmt_6 = $pdo->query($sql_6);
                    $stmt_6->execute(); 
            
                    while ($row_6 = $stmt_6->fetch()) {
                      // Process the retrieved data
                    $main_cat_name_6 = $row_6['pi_name'];
                        echo "<option> $main_cat_name_6 </option>";
                    }
                    ?>

                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub-Category</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo  @$main_sub_cat_name5 ?>" name="product_sub_cat">
                  </div>
               
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Show in home page</label>
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
                                $main_cat_name = $row['pi_name'];
                                $sub_cat_name = $row['pi_parent'];
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
 