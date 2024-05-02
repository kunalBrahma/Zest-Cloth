<?php 
// for reading 

 try {
        $sql_1 = "SELECT * FROM frontend_master WHERE fm_type ='Slider'";
        $stmt_1 = $pdo->query($sql_1);
        $stmt_1->execute();  
        
    } catch (PDOException $e) {
       
    }
    

$pi_cat = @$_POST["image_name"];
$type = @$_GET['type'];
$value1 = "Slider";
$value2 = $pi_cat;
@$id = $_GET['id'];

// Use $id in your code

$allow = array("jpg", "JPG", "jpeg", "JPEG", "gif", "GIF", "png", "PNG", "pdf", "PDF");
//1st File
if(!isset($_FILES['photo1']['name']) || $_FILES['photo1']['name'] == ""){
  //echo "No Image"
} else {

  $photo1=basename($_FILES['photo1']['name']);
  $extension = pathinfo($photo1, PATHINFO_EXTENSION);
  if(in_array($extension,$allow)){
    $target_path = "../assests/slider";
    $photo1 = md5(rand() * time()).'.'.$extension;
    $target_path = $target_path . $photo1;
    move_uploaded_file($_FILES['photo1']['tmp_name'], $target_path);
    $photo_one = ($photo1!='')?" fm_2='$photo1' ". ',':'';
  }

}

if ($type == 'Edit')
 {

  $sql_5 = "SELECT * FROM frontend_master WHERE id ='$id' ";
        $stmt_5 = $pdo->query($sql_5);
        $stmt_5->execute(); 

        while ($row_5 = $stmt_5->fetch()) {
          // Process the retrieved data
        $fm_1 = $row_5['fm_1'];
       
        }
        if(isset($_POST['sub'])){
          try {
            $sql_ed = "UPDATE frontend_master SET fm_1 = :value2 WHERE id = :id";
            $stmt_ed = $pdo->prepare($sql_ed);
      
            $stmt_ed->bindParam(':value2', $value2);
            $stmt_ed->bindParam(':id', $id); // Bind the id parameter to $value3
            $stmt_ed->execute();
      
           
            echo "<script>window.location.href = 'index.php?module=slider';</script>";
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        }
  
}

else if (isset($type) && $type == 'Delete') {
    // Your code for delete operation


    try {
        $sql_2 = "DELETE FROM frontend_master WHERE id = :id";
        $stmt_2 = $pdo->prepare($sql_2);
        $stmt_2->bindParam(':id', $id); // Bind the id parameter to $value3

        $stmt_2->execute();
        echo "Record deleted successfully.";
        echo "<script>window.location.href = 'index.php?module=slider';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    if (isset($_POST['sub'])) {
        try {
            $sql_1 = "INSERT INTO frontend_master
          SET $photo_one  
          fm_1 = :value2,
          fm_type = :value1";
          

          $stmt_1 = $pdo->prepare($sql_1);
          $stmt_1->bindParam(':value2', $value2);
          $stmt_1->bindParam(':value1', $value1);
          

          $stmt_1->execute();

            echo "Record inserted successfully.";
            echo "<script>window.location.href = 'index.php?module=slider';</script>";
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
                <h3 class="card-title">Add a Slider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo @$fm_1 ?>" name="image_name">
                  </div>
               
                  <div class="form-group">
                  <label for="exampleInputEmail1">Upload file</label>
                  <input class="form-control" type="file" name="photo1">
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
                      <th>Slider Name</th>
                      <th>Slider Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                      <?php 
                              $i = 1;
                              
                               while ($row = $stmt_1->fetch()) {
                                  // Process the retrieved data
                                $slider_name = $row['fm_1'];
                                $slider_image = $row['fm_2'];
                                @$main_id =$row['id'];
                                

                               ?>
                               

                      <td><?php echo  $i++?></td>
                      <td><?php echo $slider_name  ?></td>
                      <td><?php echo $slider_image  ?></td>
                     
                      
                      <td>
                        <a style="text-decoration: none; color:black" href="index.php?module=slider&type=Edit&id=<?php echo $main_id; ?>"><i class="fa-solid fa-pen-to-square"></i></a> | 
                      <a  style="text-decoration: none; color:black" 
                      href="index.php?module=slider&type=Delete&id=<?php echo $main_id; ?>"><i class="fa-solid fa-trash"></i></a></td>
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
 