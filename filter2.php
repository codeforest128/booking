<?php  
 //filter2.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
     // $koneksi = mysqli_connect("localhost", "lupulhok_webreservation_user","booking","lupulhok_webreservation_db");
     $koneksi = mysqli_connect("localhost", "root","","lupulhok_webreservation_db");  
      $output = '';  
      $query = "  
           SELECT * FROM tbl_webreservation  
           WHERE DATECHECKIN BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($koneksi, $query);  
      $output .= '  
           <table class="table1">  
                <tr>  
                     <tr><th width="2%">ID</th>  
                     <th width="15%">DATE IN</th>  
                     <th width="5%">TIME IN</th>
                     <th width="10%">FIRST NAME</th>  
                     <th width="10%">SECOND NAME</th>  
                     <th width="10%">HOTEL</th>  
                     <th width="5%">ROOM NO</th>  
                     <th width="5%">PAX</th>  
                     <th width="5%">PICK UP</th>  
                     <th width="10%">REQUIREMENT</th> 
                     <th width="2%">NO TABLE</th>
                     <th width="2%">STATUS</th>
                     <th>ACTIONS</th>
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {
                if($row["STATUS"] == 1){
                  $stat = "Checked In";
                  $output .= '  
                     <tr style="background: #fcf8e3;">  
                         <td>'. $row["ID"] .'</td> 
                         <td>'. $row["DATECHECKIN"] .'</td>  
                         <td>'. $row["TIMECHECKIN"] .'</td>  
                         <td>'. $row["FIRSTNAME"] .'</td>  
                         <td>'. $row["SECONDNAME"] .'</td>  
                         <td>'. $row["HOTEL"] .'</td>
                         <td>'. $row["ROOMNO"] .'</td>  
                         <td>'. $row["NUMBEROFGUEST"] .'</td>  
                         <td>'. $row["TRANSPORT"] .'</td>   
                         <td>'. $row["QUESTIONS"] .'</td>
                         <td>'. $row["NOTABLE"] .'</td>
                         <td>'. $stat .'</td>
                         <td><a class="btn btn-info btn-sm editRecord" onclick="edit(' . $row["ID"] .')">Edit</a>

                     </tr>  
                ';
                }
                else if($row["STATUS"] == 2){
                  $stat = "Picked Up";
                  $output .= '  
                     <tr style="background: #f2dede;">  
                         <td>'. $row["ID"] .'</td> 
                         <td>'. $row["DATECHECKIN"] .'</td>  
                         <td>'. $row["TIMECHECKIN"] .'</td>  
                         <td>'. $row["FIRSTNAME"] .'</td>  
                         <td>'. $row["SECONDNAME"] .'</td>  
                         <td>'. $row["HOTEL"] .'</td>
                         <td>'. $row["ROOMNO"] .'</td>  
                         <td>'. $row["NUMBEROFGUEST"] .'</td>  
                         <td>'. $row["TRANSPORT"] .'</td>   
                         <td>'. $row["QUESTIONS"] .'</td>
                         <td>'. $row["NOTABLE"] .'</td>
                         <td>'. $stat .'</td>
                         <td><a class="btn btn-info btn-sm editRecord" onclick="edit(' . $row["ID"] .')">Edit</a>
                     </tr>  
                ';

                }
                else if($row["STATUS"] == 3){
                  $color = "#dff0d8";
                  $stat = "Cancelled";
                  $output .= '  
                     <tr style="background: #dff0d8;">  
                         <td>'. $row["ID"] .'</td> 
                         <td>'. $row["DATECHECKIN"] .'</td>  
                         <td>'. $row["TIMECHECKIN"] .'</td>  
                         <td>'. $row["FIRSTNAME"] .'</td>  
                         <td>'. $row["SECONDNAME"] .'</td>  
                         <td>'. $row["HOTEL"] .'</td>
                         <td>'. $row["ROOMNO"] .'</td>  
                         <td>'. $row["NUMBEROFGUEST"] .'</td>  
                         <td>'. $row["TRANSPORT"] .'</td>   
                         <td>'. $row["QUESTIONS"] .'</td>
                         <td>'. $row["NOTABLE"] .'</td>
                         <td>'. $stat .'</td>
                         <td><a class="btn btn-info btn-sm editRecord" onclick="edit(' . $row["ID"] .')">Edit</a>
                     </tr>  
                ';
                }
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">Mehh..Lacur Konden ade tamu ngebooking nok !!</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>

