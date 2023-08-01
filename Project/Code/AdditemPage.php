<?php

$conn = new mysqli('localhost','root','','rent'); 
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }

if(isset($_POST['upload'])){

        $itemname= $_POST['itemname'];
        $category= $_POST['category'];
        $per= $_POST['per'];
        $price= $_POST['price'];
        $description=$_POST['description'];
        $product_img= $_FILES["upload_img"]["name"];
        $product_img_size= $_FILES["upload_img"]["size"];
        $product_img_tmp = $_FILES["upload_img"]["tmp_name"];
        $image_folder='image/'.$product_img;  
        

        if($product_img_size > 9000000){
            echo 'image is to large';
        }
        else{
    
        $INSERT = mysqli_query($conn, "INSERT INTO iteminfo (itemname, category, per, price, product_img, description)
             values('$itemname', '$category', '$per', '$price', '$product_img', '$description')");  

             if($INSERT){
                move_uploaded_file($product_img_tmp,$image_folder);
                echo 'product uploaded'; 
             }
             else{
                echo 'product upload failed'; 
             }
        }

}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./AdditemPage1.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap"
    />
  </head>
  <body>
    <form action="" method="POST" enctype="multipart/form-data" >
    <div class="additem-page">
      <div class="additem-box">
        <b class="add-item2">Add Item</b>
          <div class="firstname-input2">
            <input class="text-field1" type="text" name="itemname" placeholder="Item Name" required/>
           </div>

         <select list="category" name="category"  class="additem-box-item"  required>
          <option value="Miscellaneous">Miscellaneous</option>
          <option value="Electronic Devices">Electronic Devices</option>
          <option value="Home Appliances">Home Appliances</option>
          <option value="Real States">Real States</option>   
          <option value="Hardware">Hardware</option>                   
          </select>

        <div class="per">
          <div class="radio-with-label1">
            <input type="radio" id="month" name="per" value="month" required>
            <div class="permonth1">Per/Month</div>
          </div>
          <div class="radio-with-label1">
            <input type="radio" id="week" name="per" value="week" required>
            <div class="permonth1">Per/Week</div>
          </div>
          <div class="radio-with-label1">
            <input type="radio" id="day" name="per" value="day" required>
            <div class="permonth1">Per/Day</div>
          </div>
        </div>

        <div class="price-nego1">
          <input class="price-nego-child" type="number" name="price" min="1" placeholder="price" required> 
          <div class="neco"><br>
            <input type="file" name="upload_img"  accept="image/jpg, image/jpeg, image/png" required>

          </div>
        </div>

        <div class="description1">
          <input class="img" type="text" name="description" class="description-child" required>
          <div class="description3">Description</div>
        </div>
        <button type="submit" class="signin3" value="upload" name="upload" >Upload</button>

      </div>
    </div>

    </form>
  </body>
</html>
