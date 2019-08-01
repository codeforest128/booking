<?php
    ob_start();
    session_start();
    if(empty($_SESSION['username'])){
        echo "first,You must login";
        header("Location: index.php");
    }

    // $koneksi = mysqli_connect("localhost", "lupulhok_webreservation_user","booking","lupulhok_webreservation_db");
    $koneksi = mysqli_connect("localhost", "root","","lupulhok_webreservation_db");
    $query = "SELECT * FROM `tbl_webreservation` ORDER BY `tbl_webreservation`.`DATECHECKIN` ASC";
    $result = mysqli_query($koneksi, "SELECT * FROM tbl_webreservation ORDER BY ID DESC");
?>
<!DOCTYPE html>  
<html>  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">  
        <title>LU PUTU BOOKING INFORMATION</title>             
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link href="assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
        <script src="assets/js/plugins/morris/morris.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script> 

        <!-- Custom Style -->
        <style>
            .table1 {
                font-family: sans-serif;
                color: #444;
                border-collapse: collapse;
                width: 90%;
                border: 1px solid #f2f5f7;
            }

            .table1 tr th{
                background: #F08205;
                color: #fff;
                font-weight: normal;
            }

            .table1, th, td {
                padding: 8px 20px;
                text-align: center;
            }

            .table1 tr:hover {
                background-color: #F5F5DC;
            }

            .table1 tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
        <!--! End Custom Style !-->
    </head>
</head>
<body style="text-align:center">
    <br />  
    <div class="container" style="width:95%;">  
        <h2 align="center">LU PUTU BOOKING INFORMATION</h2>  
        <h5 align="center">klik tombol REFRESH PAGE untuk lihat data terbaru dan ulangi klik tombol LIHAT BOOKING</h5><br />
        <div class="col-md-1">  
             <h5>From Date:</h5> 
        </div>  
        <div class="col-md-1">  
             <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" value="<?php echo date("Y/m/d");?>" />  
        </div> 
        <div class="col-md-1">  
             <h5>To Date:</h5> 
        </div> 
        <div class="col-md-1">  
             <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" value="<?php echo date("Y/m/d");?>" />  
        </div> 
        <div class="col-md-2">  
             <input class="button" type="button" name="filter" id="filter" value="LIHAT BOOKING" class="btn btn-info" />  
        </div> 
        <div class="col-md-2">  
             <!-- <input class="button" type="button" value="MANUAL ENTRY BARU" onclick="window.location.href='http://www.luputu.com/manual-booking.php'"  /> -->
             <input class="button" type="button" value="MANUAL ENTRY BARU" onclick="save()"  />
        </div>
        <div class="col-md-1"> 
             <input class="submit" type="submit"  value="REFRESH PAGE" onClick="document.location.reload(true)" />
        </div>
        <div class="col-md-1"> 
             <input class="button" type="button"  value="Log Out" onClick="window.location.href='logout.php'" />
        </div>
        <div style="clear:both"></div> 
        <br />
        <div id="order_table">
             <table class="table1">
                <thead>
                    <tr>
                       <th>NO</th>
                       <th>DATE IN</th>
                       <th>TIME IN</th>
                       <th>FIRST NAME</th>
                       <th>SECOND NAME</th>
                       <th>HOTEL</th>
                       <th>ROOM NO</th>
                       <th>PAX</th>   
                       <th>PICK UP</th>
                       <th>REQUIREMENT</th>
                       <th>NO TABLE</th>
                       <th>STATUS</th>
                       <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody id="listRecords">
                    <?php
                        // $koneksi = mysqli_connect("localhost", "lupulhok_webreservation_user","booking");
                        $koneksi = mysqli_connect("localhost", "root","");
                        $database = mysqli_select_db($koneksi, "lupulhok_webreservation_db");  

                        $no = 0;
                        $data = mysqli_query($koneksi,"select * from tbl_webreservation");
                        while($r = mysqli_fetch_array($data)){
                            $ID = $r['ID'];
                            $DATECHECKIN = $r['DATECHECKIN'];
                            $TIMECHECKIN = $r['TIMECHECKIN'];
                            $FIRSTNAME = $r['FIRSTNAME'];
                            $SECONDNAME = $r['SECONDNAME'];
                            $HOTEL = $r['HOTEL'];
                            $ROOMNO = $r['ROOMNO'];
                            $NUMBEROFGUEST = $r['NUMBEROFGUEST'];   
                            $TRANSPORT = $r['TRANSPORT'];
                            $QUESTIONS = $r['QUESTIONS'];
                            $NOTABLE = $r['NOTABLE'];
                            $STATUS = $r['STATUS'];
                            $no++;
                            if($STATUS == 1){
                                $color = "#fcf8e3";
                                $stat = "Checked In";
                            }
                            else if($STATUS == 2){
                                $color = "#f2dede";
                                $stat = "Picked Up";
                            }
                            else if($STATUS == 3){
                                $color = "#dff0d8";
                                $stat = "Cancelled";
                            }
                    ?>
                        <tr style="background: <?php echo $color;?>;">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $DATECHECKIN; ?></td>
                        <td><?php echo $TIMECHECKIN; ?></td>
                        <td><?php echo $FIRSTNAME; ?></td>
                        <td><?php echo $SECONDNAME; ?></td>
                        <td><?php echo $HOTEL; ?></td>
                        <td><?php echo $ROOMNO; ?></td>
                        <td><?php echo $NUMBEROFGUEST; ?></td>   
                        <td><?php echo $TRANSPORT; ?></td>
                        <td><?php echo $QUESTIONS; ?></td>
                        <td><?php echo $NOTABLE; ?></td>
                        <td><?php echo $stat; ?></td>
                        <td><a class="btn btn-info btn-sm editRecord" onclick="edit(<?php echo $ID; ?>)">Edit</a>
                       </tr>
                      <?php  
                         }  
                      ?> 
                </tbody> 
             </table>  
        </div>  
    </div>
    <form id="editEmpForm" method="post" action="editbooking.php">
        <input type="hidden" name="update" value="update">
        <input type="hidden" name="ID" id="empId" class="form-control">
        <div class="modal fade" id="editEmpModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">                
                    <div class="modal-header">
                        <h3 class="modal-title" id="editModalLabel">Edit NO TABLE AND STATUS</h3>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">NO TABLE</label>
                            <div class="col-md-10">
                                <input type="number" name="NOTABLE" id="notable" class="form-control" placeholder="NO TABLE" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">STATUS</label>
                            <div class="col-md-10">
                                <select name="STATUS" id="status" class="form-control">
                                  <option value="1">Checked In</option>
                                  <option value="2">Picked Up</option>
                                  <option value="3">Cancelled</option>
                                </select>
                            </div>
                        </div>              
                    </div>
                    <div class="modal-footer">                    
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="tambahbooking.php" id="saveEmpForm" method="post">
        <input type="hidden" name="save" value="save">
        <div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">LIHAT BOOKING</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">x</span>
                        </button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">DATECHECKIN</label>
                            <div class="col-md-10">
                                <input type="Date" name="DATECHECKIN" id="DATECHECKIN" class="form-control" placeholder="YYYY/MM/DD" required>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">TIMECHECKIN</label>
                            <div class="col-md-10">
                                <input type="TIME" name="TIMECHECKIN" id="TIMECHECKIN" class="form-control" placeholder="Address" required>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">FIRSTNAME</label>
                            <div class="col-md-10">
                                <input type="text" name="FIRSTNAME" id="FIRSTNAME" class="form-control" placeholder="FIRSTNAME" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">SECONDNAME</label>
                            <div class="col-md-10">
                                <input type="text" name="SECONDNAME" id="SECONDNAME" class="form-control" placeholder="SECONDNAME" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">EMAIL</label>
                            <div class="col-md-10">
                                <input type="EMAIL" name="EMAIL" id="EMAIL" class="form-control" value="waitress@luputu.com" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">PHONE</label>
                            <div class="col-md-10">
                                <input type="number" name="PHONE" id="PHONE" class="form-control" value="082144320002" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">HOTEL</label>
                            <div class="col-md-10">
                                <input type="text" name="HOTEL" id="HOTEL" class="form-control" placeholder="HOTEL" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ROOMNO</label>
                            <div class="col-md-10">
                                <input type="number" name="ROOMNO" id="ROOMNO" class="form-control" placeholder="ROOMNO" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">NUMBEROFGUEST</label>
                            <div class="col-md-10">
                                <input type="number" name="NUMBEROFGUEST" id="NUMBEROFGUEST" class="form-control" placeholder="NUMBEROFGUEST" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">TRANSPORT</label>
                            <div class="col-md-10">
                                <input type="text" name="TRANSPORT" id="TRANSPORT" class="form-control" placeholder="TRANSPORT" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">QUESTIONS</label>
                            <div class="col-md-10">
                                <input type="text" name="QUESTIONS" id="QUESTIONS" class="form-control" placeholder="QUESTIONS" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">NO TABLE</label>
                            <div class="col-md-10">
                                <input type="number" name="NOTABLE" id="NOTABLE" class="form-control" placeholder="NO TABLE" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">STATUS</label>
                            <div class="col-md-10">
                                <select name="STATUS" id="status" class="form-control">
                                  <option value="1">Checked In</option>
                                  <option value="2">Picked Up</option>
                                  <option value="3">Cancelled</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input name="Submit" class="btn btn-secondary" type="submit" value="ADD" />
                        
                    </div>
                    
                </div>
                
            </div> 
        </div>
    </form>
</body>  
<br /> <br /> <br /> 
<footer><h5 align="center"><?php echo " copyright ©LU PUTU - Wayan Sadra - " . date("Y") ?></footer>
</html>  
<script>  
    $(document).ready(function(){
        // Date picker configuration
        $.datepicker.setDefaults({ dateFormat: 'yy-mm-dd'});  

        $(function(){  
            $("#from_date").datepicker();  
            $("#to_date").datepicker();  
        });
        
        $('#filter').click(function(){  
            var from_date = $('#from_date').val();
            console.log(from_date);  
            var to_date = $('#to_date').val(); 
            if(from_date != '' && to_date != ''){  
                 $.ajax({
                      url:"filter2.php",  
                      method:"POST",
                      data:{from_date:from_date, to_date:to_date},  
                      success:function(data)  
                      {  
                           $('#order_table').html(data);  
                      }  
                 });  
            }  
            else{  
                 alert("Pilih Tanggalne malu Nyett !!");  
            }  
        });  
    });

    // Edit function
    function edit(id){
        $.ajax({
            url : 'editbooking.php',
            method : 'POST',
            data : { "action" : "get", "ID" : id},
            success: function(res){
                if ( res !== 'Error'){
                    data = JSON.parse(res);
                    $('#notable').val(data['NOTABLE']);
                    $('#status').val(data['STATUS']);
                    $('#empId').val(data['ID']);
                    $('#editEmpModal').modal('show');
                }else{
                    alert('There is an error!');
                }
            }
        });
    }
    function save(){
        $('#addEmpModal').modal('show');
    }
 </script>


