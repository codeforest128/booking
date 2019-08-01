<?php
// including the database connection file
include_once("koneksi.php");

// Get
if(isset($_POST['action'])){
    $action = $_POST['action'];
    $ID = $_POST['ID'];

    $result = mysqli_query($koneksi, "SELECT * from tbl_webreservation Where ID=$ID");

    $data = null;

    while($res = mysqli_fetch_array($result)){
        $data = array(
            "NOTABLE" => $res['NOTABLE'],
            "ID" => $ID,
            "STATUS" => $res['STATUS']
        );            
    }

    if ( $data === null) echo "Error";
    else echo json_encode($data);
    exit;   
}

// Update
if(isset($_POST['update']))
{   
    $NOTABLE = $_POST['NOTABLE'];
    $STATUS = $_POST['STATUS'];
    $ID = $_POST['ID'];

    mysqli_query($koneksi, "UPDATE tbl_webreservation SET NOTABLE='$NOTABLE' , STATUS='$STATUS' WHERE ID=$ID");
    header("Location: home.php");
}
?>