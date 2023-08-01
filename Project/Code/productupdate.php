<?php 

$conn = new mysqli('localhost','root','','rent'); 
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    
    if (isset($_POST['update'])) {

        $itemname = $_POST['itemname'];

        $id = $_POST['id'];

        $category = $_POST['category'];

        $Description = $_POST['Description'];

        $price = $_POST['price'];

        $product_img= $_FILES["upload_img"]["name"];
        $product_img_size= $_FILES["upload_img"]["size"];
        $product_img_tmp = $_FILES["upload_img"]["tmp_name"];
        $image_folder='image/'.$product_img;  
        

        if($product_img_size > 9000000){
            echo 'image is to large';
        }else{

        $sql = "UPDATE `iteminfo` SET `itemname`='$itemname',`category`='$category',`Description`='$Description',
        `price`='$price',`product_img`='$product_img' WHERE `id`='$id'"; 

            if($sql){
                 move_uploaded_file($product_img_tmp,$image_folder);
                echo '<script>alert("Product uploaded")</script>'; 
                $result = $conn->query($sql); 

                if ($result == TRUE) {

                     echo'<script>alert("Record updated successfully.")</script>';
                     header('Location: productView.php');

                    }else{

                        echo "Error:" . $sql . "<br>" . $conn->error;

                    }


                }
            else{
                    echo 'product upload failed'; 
                }

        
    }

    } 

if (isset($_GET['id'])) {

    $id = $_GET['id']; 

    $sql = "SELECT * FROM `iteminfo` WHERE `id`='$id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $itemname = $row['itemname'];

            $category = $row['category'];

            $Description = $row['Description'];

            $price  = $row['price'];

            $product_img = $row['product_img'];

            $id = $row['id'];

        } 
        $sql="SELECT * from iteminfo WHERE id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
         ($row=$result-> fetch_assoc());
      }

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post" enctype="multipart/form-data">

          <fieldset>

            <legend>Personal information:</legend>

            Itemname:<br>

            <input type="text" name="itemname" value="<?php echo $itemname; ?>">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <br>

            Catrgory:<br>

            <select list="category" name="category"  class="additem-box-item" >
            <option value="Miscellaneous">Miscellaneous</option>
            <option value="Electronic Devices">Electronic Devices</option>
            <option value="Home Appliances">Home Appliances</option>
            <option value="Real States">Real States</option>   
            <option value="Hardware">Hardware</option>                   
            </select>

            <br>

            Description:<br>

            <input type="text" name="Description" value="<?php echo $Description; ?>">

            <br>

            price:<br>

            <input type="price" name="price" value="<?php echo $price; ?>">

            <br>


            product_img:<br>
            <img src="./image/<?php echo $row['product_img']; ?>" while="200" height="150" >

            <input type="file" name="upload_img"  accept="image/jpg, image/jpeg, image/png" value="" required >


            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } 

}

?> 