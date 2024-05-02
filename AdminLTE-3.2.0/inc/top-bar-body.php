<?php 
// for reading 
 try {
        $sql_1 = "SELECT * FROM frontend_master WHERE id = 1 ";
        $stmt_1 = $pdo->query($sql_1);
        $stmt_1->execute();  
        
        while ($row = $stmt_1->fetch()) {
            // Process the retrieved data
          $fm_1 = $row['fm_1'];
         
        }
        
    } catch (PDOException $e) {
       
    }

$offer_name = @$_POST["offer_name"];
$type = @$_GET['type'];
$value1 = "top-bar";
$value2 = @$offer_name;
$id = 1;



 
    if (isset($_POST['sub'])) {
        try {
            $sql = "UPDATE frontend_master SET fm_1 = :value2 WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':value2', $value2);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            echo "Record inserted successfully.";
            echo "<script>window.location.href = 'index.php?module=top-bar';</script>";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }




  ?>
 
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit offers</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Update offers</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo @$fm_1 ?>" name="offer_name">
                  </div>
               
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
                </div>
              </form>
            </div>
            </div>
            
        </div>
      </div>
    </div>
 </div>
 