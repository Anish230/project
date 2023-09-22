<?php
        $conn = new mysqli('localhost','root','','rent'); 
        if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
           }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>renthere</title>
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./index.css" />
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
    
    <div class="homepage-beforelogin">
      <div class="homebar">
        <input  class="sreach-bar" type="search" defaultvalue="String"  placeholder="Search" maxlength="{255}" minlength="{01}" id="se1"  />

        <button class="catogore-butt">
          <div class="catogory-seletor"></div>
          <img
            class="siexpand-more-alt-icon"
            alt=""
            src="./public/siexpand-more-alt.svg"
          />
        </button>
        <button class="search-butt">
          <div class="search-butt-child"></div>
          <img
            class="sisearch-alt-icon"
            alt=""
            src="./public/sisearch-alt.svg"
          />
        </button>
        <button class="login" id="login">
          <b class="sign-in">Login</b>
        </button>
        <button class="signin" id="signin">
          <b class="sign-in">Sign in</b>
        </button>
      </div>
      <div class="mostused">
          

      
      </div>
      <div class="aboutus"></div>
      <img
        class="pink-simple-text-logo-1"
        alt=""
        src="./public/pink-simple-text-logo-1@2x.png"/>
                  <br><br><br><br><br><br><br><br>
                  <br><br><br><br><br><br><br>
                  

        <table > 
              <a >Miscellaneous</a>
            <?php
              $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){
                    $cat="Miscellaneous";
                   if($row['category'] == $cat ){

                  ?>
              <td >         
                <div class="productCard" >
                  <a href="ItemProfile.php?id=<?php echo $row['id']; ?>">
                  <img class="img" src="./image/<?php echo $row['product_img']; ?>" while="100%" height="150" ></a> 
                  <a ><?=$row["itemname"]?></a>
                  <p class="price">RS:<?=$row["price"]?>/DAY</p>
                </div>   
              </td>
              <?php } $count=$count+1;
                  }
                }?>
          </table>
          <table > 
              <a >Home Appliances</a>
            <?php
              $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){
              ?>
              <td >
                  <?php
                    $cat="Home_Appliances";
                   if($row['category'] == $cat ){

                  ?>
                <div class="productCard" >
                  <a href="ItemProfile.php?id=<?php echo $row['id']; ?>">
                  <img class="img" src="./image/<?php echo $row['product_img']; ?>" while="100%" height="150" ></a> 
                  <a ><?=$row["itemname"]?></a>
                  <p class="price">RS:<?=$row["price"]?>/DAY</p>
                </div>
                <?php } $count=$count+1;
                  }
                }?>   
              </td>
          </table>
          <table > 
              <a >Real States</a>
            <?php
              $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){
              ?>
              <td >
                  <?php
                    $cat="Real_States";
                   if($row['category'] == $cat ){

                  ?>
                <div class="productCard" >
                  <a href="ItemProfile.php?id=<?php echo $row['id']; ?>">
                  <img class="img" src="./image/<?php echo $row['product_img']; ?>" while="100%" height="150" ></a> 
                  <a ><?=$row["itemname"]?></a>
                  <p class="price">RS:<?=$row["price"]?>/DAY</p>
                </div>
                <?php } $count=$count+1;
                  }
                }?>   
              </td>
          </table>
          <table > 
              <a >Hardware</a>
            <?php
              $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){
              ?>
              <td >
                  <?php
                    $cat="Hardware";
                   if($row['category'] == $cat ){

                  ?>
                <div class="productCard" >
                  <a hidden><?=$count?></a>
                  <a href="ItemProfile.php?id=<?php echo $row['id']; ?>">
                  <img class="img" src="./image/<?php echo $row['product_img']; ?>" while="100%" height="150" >
                  </a> 
                  <a ><?=$row["itemname"]?></a>
                  <p class="price">RS:<?=$row["price"]?>/DAY</p>
                </div>
                <?php } $count=$count+1;
                  }
                }?>   
              </td>
          </table>
          <table > 
              <a >Electronic</a>
            <?php
              $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){
              ?>
              <td >
                  <?php
                    $cat="Electronic";
                   if($row['category'] == $cat ){

                  ?>
                <div class="productCard" >
                  <a href="ItemProfile.php?id=<?php echo $row['id']; ?>">
                  <img class="img" src="./image/<?php echo $row['product_img']; ?>" while="100%" height="150" /></a> 
                  <a ><?=$row["itemname"]?></a>
                  <p class="price">RS:<?=$row["price"]?>/DAY</p>
                </div>
                <?php } $count=$count+1;
                  }
                }?>   
              </td>
          </table>












    </div>
    <script>
      var login = document.getElementById("login");
      if (login) {
        login.addEventListener("click", function (e) {
          window.location.href = "./Login2.php";
        });
      }
      
      var signin = document.getElementById("signin");
      if (signin) {
        signin.addEventListener("click", function (e) {
          window.location.href = "./Register.html";
        });
      }
      </script>
  </body>
</html>
