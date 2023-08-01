
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<style>
        h2{text-align:center}
        </style>
<div >

  <h2>Product Items</h2>
  <table class="table ">
    <thead>
      <tr>
        <th >S.N.</th>
        <th >Product_ID</th>
        <th >Item Image</th>
        <th >Item Name</th>
        <th >Description</th>
        <th >Category</th>
        <th >Price per/day</th>
        <th >Action</th>
      </tr>
    </thead>
    <?php
      
      $conn = new mysqli('localhost','root','','rent'); 
      if($conn->connect_error){
          die('Connection Failed :'.$conn->connect_error);
      }
      $sql="SELECT * from iteminfo WHERE id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["id"]?></td>
      <td><img src="./image/<?php echo $row['product_img']; ?>" while="25 0" height="150" ></td>
      <td><?=$row["itemname"]?></td>
      <td><?=$row["Description"]?></td>
      <td><?=$row["category"]?></td>       
      <td><?=$row["price"]?></td>     
      <td><a class="btn btn-info" href="productupdate.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
      <a class="btn btn-danger" href="productdelete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>  
</div>
   