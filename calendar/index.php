<?php require('config.php');?>
<!DOCTYPE html>
<?php 
  
     // Initialize the session
   session_start();
  
     //Check if the user is logged in, if not then redirect him to login page
     if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
         // When Not Login Return to this Page
           header("refresh:0; ../login.php");
         exit;


     }else if(isset($_SESSION['ID'])){
            $cID = $_SESSION['ID'];
            
         
            include "../dbconnection/conn.php";
            
            $getrecord = mysqli_query($conn,"SELECT * FROM tbl_user WHERE ID  ='$cID'");
            while($rowedit = mysqli_fetch_assoc($getrecord))
            {   
                $usertype = $rowedit['Usertype'];
                $customerID = $rowedit['ID'];
                   $image =$rowedit['Userimage'];
                    $fname = $rowedit['Userfname']." ".$rowedit['Userlname'];
                  $path= "../admin/upload/profilepicture/".$image;
                  $user = $rowedit['Usertype'];
                  if($user == 1){
                    header("refresh:0; ../");
                  }
               

            }
     }



?>

<html>
<style type="text/css">
    
@media screen and (max-width: 992px){
  .mobile{
    visibility: none;
    transition: 3s;
  }

  body{
  padding-left:0px;
 
  }
  .btnn{
    left: 10px;
  }
}

.linecenter 
 {
  overflow: hidden;
  text-align: center;
  font-weight: bold;
  font-size: 25px;
  margin-bottom: 50px;
  letter-spacing: 3px;
}

.linecenter :before,
.linecenter :after {
  background-color: #000;
  content: "";
  display: inline-block;
  height: 1px;
  position: relative;
  vertical-align: middle;
  width: 50%;

}

.linecenter :before {
  right: 0.5em;
  margin-left: -50%;
}

.linecenter :after {
  left: 0.5em;
  margin-right: -50%;
}

input[type="date"],select {
  color:grey;
  font-family: 'Poppins', sans-serif;
  width: 350px;
  padding: 10px 20px;
  margin: 5px 0px;
  //display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  
}
input[type="date    "]:focus {
  background-color: white;
}
.btn1{
  position: relative;

  display: block;
 // margin: 30px auto;
  padding: 0;

  overflow: hidden;
  font-family: sans-serif 'Poppins';
  border-width: 0;
  outline: none;
  border-radius: 2px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, .6);
  font-size: 1rem;
  
  background-color: #333948;
  color: #ecf0f1;
  padding:10px;
  border-radius: 5px;
  
  transition: background-color .3s;
}

.btn1:hover, .btn1:focus {
  background-color: #27ae60;
}

.btn1 > * {
  position: relative;
}

.btn1 span {
  display: block;
  padding: 12px 24px;
}

.btn1:before {
  content: "";
  
  position: absolute;
  top: 50%;
  left: 50%;
  
  display: block;
  width: 0;
  padding-top: 0;
    
  border-radius: 100%;
  
  background-color: rgba(236, 240, 241, .3);
  
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.btn1:active:before {
  width: 120%;
  padding-top: 120%;
  
  transition: width .2s ease-out, padding-top .2s ease-out;
}



.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: 'Poppins', sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    width: 100%;
    max-height: 200px;
    overflow: scroll;


}
.styled-table thead tr {

    



}
.style-table thead tr th{

}
.styled-table th{
    position:sticky;
  top:0;
  background-color: #333948;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;


}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;

}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;

}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

.buttons{
 width: 70px;  color:white;
  transition:.2s;
  cursor: pointer;
  background-color: #333948;
  border: none;
  padding: 10px 12px;
  border-radius: 5px;
  align-items: ;
}
.buttons:hover{
   background:#2E94E3;
}
</style>
<head>
    <title>Calendar</title>
    
   <link href='<?=$dir;?>../calendar/packages/core/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>../calendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>../calendar/packages/timegrid/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>../calendar/packages/list/main.css' rel='stylesheet' />
    <!-- 
     <link href='<?=$dir;?>../calendar/packages/bootstrap/css/bootstrap.css' rel='stylesheet' />
    -->
   
    

    <link href="<?=$dir;?>../calendar/packages/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href='<?=$dir;?>../calendar/packages/datepicker/datepicker.css' rel='stylesheet' />
    <link href='<?=$dir;?>../calendar/packages/colorpicker/bootstrap-colorpicker.min.css' rel='stylesheet' />
    <link href='<?=$dir;?>../calendar/style.css' rel='stylesheet' />

    <script src='<?=$dir;?>../calendar/packages/core/main.js'></script>
    <script src='<?=$dir;?>../calendar/packages/daygrid/main.js'></script>
    <script src='<?=$dir;?>../calendar/packages/timegrid/main.js'></script>
    <script src='<?=$dir;?>../calendar/packages/list/main.js'></script>
    <script src='<?=$dir;?>../calendar/packages/interaction/main.js'></script>
    <script src='<?=$dir;?>../calendar/packages/jquery/jquery.js'></script>
    <script src='<?=$dir;?>../calendar/packages/jqueryui/jqueryui.min.js'></script>
    <script src='<?=$dir;?>../calendar/packages/bootstrap/js/bootstrap.js'></script>
    <script src='<?=$dir;?>../calendar/packages/datepicker/datepicker.js'></script>
    <script src='<?=$dir;?>../calendar/packages/colorpicker/bootstrap-colorpicker.min.js'></script>
    <script src='<?=$dir;?>../calendar/calendar.js'></script>
    <script src='<?=$dir;?>../calendar/calendar/calendar.js'></script>
     <!-- Fontawesome  -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body  onload="renderDate(); initClock();">
    <div class="btnn">
      <span class="fas fa-bars"></span>
    </div>
    <nav  style="padding:0; margin:0;" class="sidebarr">
      <div class="textt">Site Menu </div>
      <ul style="padding:0; margin:0;">
        <li class="activee"><a href="../admin/index.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
        <li><a href="../admin/employee.php"><i class="fas fa-user"></i>&nbsp; Employee</a></li>
        <li><a href="../admin/costumer.php"><i class="fas fa-users"></i>&nbsp; Customer</a></li>
        <li>
            <a href="#" class="feat-btn"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;  Bookings
              <span class="fas fa-caret-down first"></span>
            </a>
          <ul class="feat-showw">
            <li><a href="../admin/pending.php">Pending Bookings</a></li>
            <li><a href="../admin/allbooking.php">All booking</a></li>
            <li><a href="#"  target="_blank" style="color:black;"> Schedule</a></li>
          </ul>
        </li>
        <?php if($usertype ==3){
          ?>
            <li>
                <a href="#" class="serv-btn"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Information
                  <span class="fas fa-caret-down second"></span>
                </a>
              <ul class="serv-showw">
                <li><a href="../admin/announcement.php">Announcement</a></li>
                <li><a href="../admin/rules.php">Rates & Rules</a></li>
                <li><a href="../admin/admin_gall.php">Gallery</a></li>
                <li><a href="../admin/promos.php">Promos</a></li>

              </ul>
            </li>
            <li>
                <a href="#" class="third-btn"><i class="fas fa-desktop"></i>&nbsp;&nbsp;System
                  <span class="fas fa-caret-down third"></span>
                </a>
              <ul class="third-showw">
                <li><a href="announcement.php">Audit Trail</a></li>
                <li><a href="../admin/system.php">Sales Report</a></li>
                <li><a href="admin_gall.php">Database Backup</a></li>
              

              </ul>
            </li>
          <?php

        }else{



        }?>
        
        

      </ul>
    </nav>

<div class="container mobile" style="background-color:white;
    box-shadow: 0 1px 2px rgba(0,0,0,0.07), 
                0 2px 4px rgba(0,0,0,0.07), 
                0 4px 8px rgba(0,0,0,0.07), 
                0 8px 16px rgba(0,0,0,0.07),
                0 16px 32px rgba(0,0,0,0.07), 
                0 32px 64px rgba(0,0,0,0.07); 
                width:250px;height:100%; margin-left:-250px; 
                position:fixed; padding-top:60px; padding:10px; " >
    
    <div class="container" style="text-align: center; margin-top:60px;" >
      <?php 
        if($image == ""){
          ?>
             <img src="../style/images/admin/admin.png" class="admin" alt="admin picture"/>
          <?php
        }else{
          ?>
          <div class="circular--landscape">
            <img src="<?php echo"".$path  ?>" class="admin" alt="admin picture"/>
          </div>
          <?php
        }
      ?>
       <p style="text-align: center; font-size:20px"> <?php echo"".strtoupper($fname) ?></p>
    </div>
    <!-- <a class="navbar-brand" href="#">
               <img src="../style/images/banner.png" alt="" class="logo">
           </a> -->
                <!--digital clock start-->
    <div class="datetime">
      <div class="date">
        <span id="dayname">Day</span>,
        <span id="tmonth">Month</span>
        <span id="daynum">00</span>,
        <span id="year">Year</span>
      </div>
      <div class="time">
        <span id="hour">00</span>:
        <span id="minutes">00</span>:
        <span id="seconds">00</span>
        <span id="period">AM</span>
      </div>
    </div>
    <!--digital clock end-->

    <script type="text/javascript">
    function updateClock(){
      var now = new Date();
      var dname = now.getDay(),
          mo = now.getMonth(),
          dnum = now.getDate(),
          yr = now.getFullYear(),
          hou = now.getHours(),
          min = now.getMinutes(),
          sec = now.getSeconds(),
          pe = "AM";

          if(hou >= 12){
            pe = "PM";
          }
          if(hou == 0){
            hou = 12;
          }
          if(hou > 12){
            hou = hou - 12;
          }

          Number.prototype.pad = function(digits){
            for(var n = this.toString(); n.length < digits; n = 0 + n);
            return n;
          }

          var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
          var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
          var ids = ["dayname", "tmonth", "daynum", "year", "hour", "minutes", "seconds", "period"];
          var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
          for(var i = 0; i < ids.length; i++)
          document.getElementById(ids[i]).firstChild.nodeValue = values[i];
    }

    function initClock(){
      updateClock();
      window.setInterval("updateClock()", 1);
    }
  </script>
  <br><br>
  <div class="wrapper">
    <div class="calendar">
      <div class="month">
        <div class="prev" onclick="moveDate('prev')">
          <span>&#10094;</span>
        </div>
        <div>
          <h2 id="month"></h2>
          <p id="date_str"></p>
        </div>
        <div class="next" onclick="moveDate('next')">
          <span>&#10095;</span>
        </div>
      </div>
      <div class="weekdays">
        <div>Sun</div>
        <div>M</div>
        <div>T</div>
        <div>W</div>
        <div>Th</div>
        <div>F</div>
        <div>Sat</div>
      </div>
      <div class="days">

      </div>
    </div>
  </div>
    <script>
        var dt = new Date();
        function renderDate() {
              dt.setDate(1);
            var day = dt.getDay();
            var today = new Date();
            var endDate = new Date(
                dt.getFullYear(),
                dt.getMonth() + 1,
                0
            ).getDate();

            var prevDate = new Date(
                dt.getFullYear(),
                dt.getMonth(),
                0
            ).getDate();
            var months = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ]
            document.getElementById("month").innerHTML = months[dt.getMonth()];
           
            var cells = "";
            for (x = day; x > 0; x--) {
                cells += "<div class='prev_date'>" + (prevDate - x + 1) + "</div>";
            }
            console.log(day);
            for (i = 1; i <= endDate; i++) {
                if (i == today.getDate() && dt.getMonth() == today.getMonth()) cells += "<div class='today'>" + i + "</div>";
                else
                    cells += "<div>" + i + "</div>";
            }
            document.getElementsByClassName("days")[0].innerHTML = cells;

        }

        function moveDate(para) {
            if(para == "prev") {
                dt.setMonth(dt.getMonth() - 1);
            } else if(para == 'next') {
                dt.setMonth(dt.getMonth() + 1);
            }
            renderDate();
        }
    </script>

</div>
<!-- ######################################################################################### HEADER -->
<div class="columns is-mobile" style="background-color:white;
    box-shadow: 0 1px 2px rgba(0,0,0,0.07), 
                0 2px 4px rgba(0,0,0,0.07), 
                0 4px 8px rgba(0,0,0,0.07), 
                0 8px 16px rgba(0,0,0,0.07),
                0 16px 32px rgba(0,0,0,0.07), 
                0 32px 64px rgba(0,0,0,0.07); 
                height:66px;background-image: url('../style/images/ridges_banner.png'); background-repeat: no-repeat; 
                background-size: auto 100% ;
                padding:0;
                margin:0;">


  <div class="column" style="background-color:; margin:0;padding:0;" >
      <div class="dropdown" style="float:right; height:100%; background-color:; margin:0; padding:0; ">
        <button type="button" class="dropbtn"  style="font-size:17px; background-color:#e09f5b; " >
            Welcome, FirstName <i class="fas fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
           <form method="POST">
             <button  type="button" class="buttonNav"onclick="location.href='../admin/account.php';"><i class="fas fa-edit"></i>  Account</button>
             <button  type="submit"class="buttonNav" name="logout"><i class="fas fa-sign-out-alt"></i>  Logout</button>
           </form>
        </div>

      </div>
  </div>

 
</div><br>
<!-- End -->

<div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <form id="createEvent" class="form-horizontal">

                    <div class="row">

                        <div class="col-md-6">

                            <div id="title-group" class="form-group">
                                <label class="control-label" for="title">Title</label>
                                <input type="text" class="form-control" name="title">
                                <!-- errors will go here -->
                            </div>

                            <div id="startdate-group" class="form-group">
                                <label class="control-label" for="startDate">Start Date</label>
                                <input type="text" class="form-control datetimepicker" id="startDate" name="startDate">
                                <!-- errors will go here -->
                            </div>

                            <div id="enddate-group" class="form-group">
                                <label class="control-label" for="endDate">End Date</label>
                                <input type="text" class="form-control datetimepicker" id="endDate" name="endDate">
                                <!-- errors will go here -->
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div id="color-group" class="form-group">
                                <label class="control-label" for="color">Colour</label>
                                <input type="text" class="form-control colorpicker" name="color" value="#6453e9">
                                <!-- errors will go here -->
                            </div>

                            <div id="textcolor-group" class="form-group">
                                <label class="control-label" for="textcolor">Text Colour</label>
                                <input type="text" class="form-control colorpicker" name="text_color" value="#ffffff">
                                <!-- errors will go here -->
                            </div>

                        </div>

                    </div>

                    

                </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="editeventmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Update Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <form id="editEvent" class="form-horizontal">
                    <input type="hidden" id="editEventId" name="editEventId" value="">

                    <div class="row">

                        <div class="col-md-6">

                            <div id="edit-title-group" class="form-group">
                                <label class="control-label" for="editEventTitle">Title</label>
                                <input type="text" class="form-control " id="editEventTitle" name="editEventTitle">
                                <!-- errors will go here -->
                            </div>

                            <div id="edit-startdate-group" class="form-group">
                                <label class="control-label" for="editStartDate">Start Date</label>
                                <input type="text" class="form-control datetimepicker" id="editStartDate" name="editStartDate">
                                <!-- errors will go here -->
                            </div>

                            <div id="edit-enddate-group" class="form-group">
                                <label class="control-label" for="editEndDate">End Date</label>
                                <input type="text" class="form-control datetimepicker" id="editEndDate" name="editEndDate">
                                <!-- errors will go here -->
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div id="edit-color-group" class="form-group" style="display:none;">
                                <label class="control-label" for="editColor">Colour</label>
                                <input type="text" class="form-control colorpicker" id="editColor" name="editColor" value="#6453e9">
                                <!-- errors will go here -->
                            </div>

                            <div id="edit-textcolor-group" class="form-group" style="display:none;">
                                <label class="control-label" for="editTextColor">Text Colour</label>
                                <input type="text" class="form-control colorpicker" id="editTextColor" name="editTextColor" value="#ffffff">
                                <!-- errors will go here -->
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn modalbtn" data-dismiss="modal">Close</button>
              <button type="submit" class="btn modalbtn">Save changes</button>
              <button type="button" class="btn modalbtn" id="deleteEvent" data-id>Delete</button>
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container">
<!-- 
    <p><br>Read the full <a href="https://demos.dcblog.dev/Jquery-fullcalendar-with-php-and-mysql/">jQuery Fullcalender with PHP and MySQL</a> Tutorial</p>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addeventmodal">
      Add Event
    </button>
-->
    <div id="calendar"></div>
</div>

<script>
  $(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    var maxDate2="";
    var minus ="";
    var year1= year; 
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();  
    var maxDate = year + '-' + month + '-' + day;
    $('#txtDate').attr('min', maxDate);
    $('#txtDate1').attr('min', maxDate);
    var monthend = month+5;
    if(monthend > 12){
       year1 = year1 +1;
       var minus = monthend - 12;
       if(minus<10){
        var monthmonthend = '0'+minus    
       }
       maxDate2 = year1 + '-' + monthmonthend + '-' + day;
    }else{
       maxDate2 = year1 + '-' + monthend + '-' + day;
    }
    // $('#txtDate').attr('max', maxDate2);
    // $('#txtDate1').attr('max', maxDate2);
  });

</script>
<div class="container is-fullhd" style="background-color:;width">
  <center>
    <div class="container is-mobile">
      <form method="POST">
        <div class="container is-mobile"><p class="linecenter">CLOSING DATES</p></div>
        <div class="columns is-mobile is-multiline" >
          <div class="column ">
            <label for="startDate" >From:</label>
            <input type="date"  name="startDate" id="txtDate"  required>
          </div>
          <div class="column">
            <label for="endDate" >To:</label>
            <input type="date" name="endDate"  id="txtDate1" required>
          </div>
          <div class="column">
          
            <select name="category">
                <option value="Daytour">Daytour</option>
                <option value="Overnight">Overnight</option>
            </select>
            
          </div> 
          <div class="column is-full">
            <button>
              <div class="sub-main">

                <button type="submit" name="close_date" class="btn1" > DECLARE CLOSE</button>
              </div>
            </button>
          </div>
        </div>  
      </form>
    </div>
    <h1 class="content"></h1>
  </center>
</div>

<div class="column is-full" style="background-color:;overflow: scroll;width:100%;max-height: 600px; padding:0; margin:0;margin-top:3px;">
          <table class="styled-table" id="overnighttable">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM events WHERE appID = 'CLOSE'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                       ?>
                        <tr>
                        <td><?php echo"".date("F jS, Y - h:s a", strtotime($row['start_event']))."-      To     -".date("F jS, Y -- h:s a", strtotime($row['end_event']));?></td>
                        <td><?php echo"".$row['title'];?></td>
                        <td>
                            
                            <button  id="confirmBtn" class="buttons confirmBtn ">Update</button>
                           
                        </td>
                        </tr>
                       <?php
                      }
                    } else {
                      echo "0 results";
                    }
                ?>
              
            </tbody>
          </table>
         </div>




<script>
    $('.btnn').click(function(){
      $(this).toggleClass("clickk");
      $('.sidebarr').toggleClass("showw");
    });
      $('.feat-btn').click(function(){
        $('nav ul .feat-showw').toggleClass("showw");
        $('nav ul .first').toggleClass("rotatee");
      });
      $('.serv-btn').click(function(){
        $('nav ul .serv-showw').toggleClass("show11");
        $('nav ul .second').toggleClass("rotatee");
      });
      $('.third-btn').click(function(){
        $('nav ul .third-showw').toggleClass("show111");
        $('nav ul .third').toggleClass("rotatee");
      });
      $('nav ul li').click(function(){
        $(this).addClass("activee").siblings().removeClass("activee");
      });
    </script>
</body>
</html>
<?php
if(isset($_POST['logout'])){

  session_unset();
  session_destroy();

  ?>
 <script type="text/javascript">location.href = '../login.php';</script>
<?php

}else if(isset($_POST['close_date'])){

    $startDate = $_POST['startDate'];
    $endDate   = $_POST['endDate'];

    $startDateTime = $startDate.'T14:00:00';
    $endDateTime = $endDate.'T12:00:00';

    $textbg ='#655656';
    $textcolor ='#FFFFFF';
    $type = $_POST['category'];
    if($type == 'Daytour'){
        $sql1 = "INSERT INTO tbl_booking (customerID, bname, bdate, btype, btime_in, btime_out ,  bpax,bprice,balance,bdaytourtime, bstatus)
        VALUES ('CLOSE', ' ', '$startDate' ,'$type', '$startDate', '$endDate',30,0,0,'07:00 am to 10:00 am 10:00 am to 13:00 pm 13:00 pm to 16:00 pm 16:00 pm to 19:00 pm','CLOSE')";

        $sql = "INSERT INTO events (appID, title, start_event, end_event, color, text_color)
        VALUES ('CLOSE', '$type CLOSE CAMP MAINTENANCE', '$startDate', '$endDate','$textbg','$textcolor')";
    }else{
        
        $room = " || C1  || C2  || C3  || C4  || C5  || C6  || C7  || C8  || C9 ";
        $sql1 = "INSERT INTO tbl_booking (customerID, bname, bdate, broom,btype, btime_in, btime_out ,  bpax,bprice,balance, bstatus)
        VALUES ('CLOSE', ' ', '$startDate','$room' ,'$type', '$startDateTime', '$endDateTime',30,0,0,'CLOSE')";

        $sql = "INSERT INTO events (appID, title, start_event, end_event, color, text_color)
        VALUES ('CLOSE', '$type CLOSE CAMP MAINTENANCE', '$startDateTime', '$endDateTime','$textbg','$textcolor')";
    }

    
    mysqli_query($conn, $sql);

    
    if ($conn->query($sql1) === TRUE) {
      echo '<script type="text/javascript">alert("Successful")</script>';
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


}

?>