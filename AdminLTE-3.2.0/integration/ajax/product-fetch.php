<?php
include '../../../database.php'
?>
<select name="pi_sub" class="form-control">
    <option value=""><?php echo @$pi_sub ?></option>
    <option value="">---Select Sub Category---</option>
    <?php 
    $parent = @$_GET['parent'];
    if (!empty($parent)) {
        $sql_6 = "SELECT * FROM `product-info` WHERE pi_type ='Sub-Category' AND pi_parent = '$parent'";
        $stmt_6 = $pdo->prepare($sql_6);
        // $stmt_6->bindParam(':parent', $parent);
        $stmt_6->execute(); 

        while ($row_6 = $stmt_6->fetch()) {
            // Process the retrieved data
            $main_cat_name_6 = $row_6['pi_sub'];
            echo "<option> $main_cat_name_6 </option>";
        }
    }
    ?>
</select>
