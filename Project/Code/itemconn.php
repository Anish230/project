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
        $product_img= $_FILES["upload_img"]["name"];
        $product_img_size= $_FILES["upload_img"]["size"];
        $product_img_tmp = $_FILES["upload_img"]["tmp_name"];
        $image_folder='image/'.$product_img;  
        $description=$_POST['description'];

        if($product_img_size > 2000000){
            $message[]='image is to large';
        }
        else{
    
        $INSERT = mysqli_query($conn, "INSERT INTO iteminfo (itemname, category, per, price, product_img, description)
             values('$itemname', '$category', '$per', '$price', '$product_img', '$description')");  

             if($INSERT){
                move_uploaded_file($product_img_tmp,$image_folder);
                $message[]='product uploaded'; 
             }
             else{
                $message[]='product upload failed'; 
             }
        }

}






?>