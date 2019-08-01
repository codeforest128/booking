<?php
ob_start();
session_start();
if(empty($_SESSION['username']))
{
  echo "first,You must login";
  header("Location: index.php");
}
?>
<?php
//including the database connection file
include("koneksi.php");
 
if(isset($_POST['Submit'])) {    
    $DATECHECKIN = $_POST['DATECHECKIN'];
    $TIMECHECKIN = $_POST['TIMECHECKIN'];
    $FIRSTNAME = $_POST['FIRSTNAME'];
    $SECONDNAME = $_POST['SECONDNAME'];
    $EMAIL = $_POST['EMAIL'];
    $PHONE = $_POST['PHONE'];
    $HOTEL = $_POST['HOTEL'];
    $ROOMNO = $_POST['ROOMNO'];
    $NUMBEROFGUEST = $_POST['NUMBEROFGUEST'];
    $TRANSPORT = $_POST['TRANSPORT'];
    $QUESTIONS = $_POST['QUESTIONS'];  
    $NOTABLE = $_POST['NOTABLE'];
    $STATUS = $_POST['STATUS'];
        
    // checking empty fields
    if(empty($DATECHECKIN) || empty($TIMECHECKIN) || empty($FIRSTNAME) || empty($SECONDNAME) || empty($EMAIL) || empty($PHONE) || empty($HOTEL) || empty($ROOMNO) || empty($NUMBEROFGUEST) || empty($TRANSPORT) || empty($QUESTIONS) || empty($NOTABLE) || empty($STATUS)) {                
        if(empty($DATECHECKIN)) {
            echo "<font color='red'>DATE IN MASIH KOSONG.</font><br/>";
        }
        
        if(empty($TIMECHECKIN)) {
            echo "<font color='red'>TIME IN MASIH KOSONG.</font><br/>";
        }
        
        if(empty($FIRSTNAME)) {
            echo "<font color='red'>FIRST NAME MASIH KOSONG.</font><br/>";
        }
        
        if(empty($SECONDNAME)) {
            echo "<font color='red'>SECOND NAME MASIH KOSONG.</font><br/>";
        }
        
        if(empty($EMAIL)) {
            echo "<font color='red'>EMAIL MASIH KOSONG.</font><br/>";
        }
        
        if(empty($PHONE)) {
            echo "<font color='red'>PHONE MASIH KOSONG.</font><br/>";
        }
        
        if(empty($HOTEL)) {
            echo "<font color='red'>HOTEL MASIH KOSONG.</font><br/>";
        }
        
        if(empty($ROOMNO)) {
            echo "<font color='red'>ROOM NO MASIH KOSONG.</font><br/>";
        }
        
        if(empty($NUMBEROFGUEST)) {
            echo "<font color='red'>PAX MASIH KOSONG.</font><br/>";
        }
        
        if(empty($TRANSPORTN)) {
            echo "<font color='red'>TRANSPORT MASIH KOSONG.</font><br/>";
        }
        
        if(empty($QUESTIONS)) {
            echo "<font color='red'>QUESTIONS MASIH KOSONG.</font><br/>";
        }
        
        if(empty($NOTABLE)) {
            echo "<font color='red'>NO TABLE MASIH KOSONG.</font><br/>";
        }
        if(empty($STATUS)) {
            echo "<font color='red'>STATUS MASIH KOSONG.</font><br/>";
        }        
                
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>KEMBALI LIHAT BOOKINGk</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($koneksi, "INSERT INTO tbl_webreservation(DATECHECKIN, TIMECHECKIN, FIRSTNAME, SECONDNAME, EMAIL, PHONE, HOTEL, ROOMNO, NUMBEROFGUEST, TRANSPORT, QUESTIONS, NOTABLE, STATUS) VALUES('$DATECHECKIN','$TIMECHECKIN','$FIRSTNAME','$SECONDNAME','$EMAIL','$PHONE','$HOTEL','$ROOMNO','$NUMBEROFGUEST','$TRANSPORT','$QUESTIONS','$NOTABLE','$STATUS')");
        
        //display success message
        echo "<font color='green'>TAMBAH BOOKINGAN BARU SUDAH BERHASIL.";
        echo "<br/><a href='home.php'>View Result</a>";
    }
}
?>