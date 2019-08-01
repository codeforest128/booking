<?php
   ob_start();
   session_start();
?>
<?php
            include_once("koneksi.php");
            
            if (!empty($_POST['username']) 
               && !empty($_POST['password'])) {
               $query = "  
                 SELECT * FROM admin  
                 WHERE username = '".$_POST["username"]."' AND password = '".$_POST["password"]."'  
                  ";
      			$result = mysqli_query($koneksi, $query); 
               if (mysqli_num_rows($result) > 0) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = '".$_POST["username"]."';
                  
                  echo 'You have entered valid use name and password';
                  header("Location: home.php");
               }else {
                  header("Location: index.php");;
               }
            }
?>