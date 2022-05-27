<?php
session_start();
?>


<!DOCTYPE Html>
<html>
    <head>
        <title>USAMRU-K</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.css" /> -->
         <meta charset='utf-8' />
        <link href='fullcalendar/lib/main.css' rel='stylesheet' />
        <script src='fullcalendar/lib/main.js'></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" >

	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>

	    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
        <link href='fullcalendar/main.css' rel='stylesheet' />
        <script src='fullcalendar/main.js'></script>
    
	 
	    <script type="text/javascript" src="js/datatables.min.js"></script>
	    <script type="text/javascript" src="parsley/dist/parsley.min.js"></script>
		<link rel="stylesheet" type="text/css" href="parsley/parsley.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>

		<script type="text/javascript" src="js/bootstrap-datepicker1.js"></script>
		<link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
		<link rel="stylesheet" href="crudPageStyles.css">


        <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
    
       
    </head>
    <body>
        <main>
            <input type="checkbox" id="check">
            <header class="mainhead">
                <!-- header area start -->
                <label for="check">
                <i class="fa-solid fa-bars" id="sidebar_btn">  </i>
                </label>
                <div class="left_area">
                <h2>ADMIN PORTAL  </h2>
                </div>
                <div class="class">
                    <a href="logout.php" class="logout_btn">Logout</a>
                </div>   
            </header>
            <!-- header area end -->
            <!-- sidebar start -->
            <div class="sidebar">
                <center>
                    <img src="admin.png" class="profile_image" alt="">
                    <h4>
                    <?php echo "Admin  "?>
                    </h4>
                <br>
                </center>
                <a class="current" data-bs-toggle="tooltip" data-bs-placement="right" title="Appointments" href="adminPage.php"><i class="fa-solid fa-calendar-days"></i> <span>Appointments</span></a> 
                <a data-bs-toggle="tooltip" data-bs-placement="right" title="Desk" href="frontdeskadmin.php"><i class="fa-solid fa-user-doctor"></i> <span>Desk</span></a>
                <a data-bs-toggle="tooltip" data-bs-placement="right" title="Pharmacy" href="pharmacyPageadmin.php"><i class="fa-solid fa-book"></i> <span>Pharmacy</span></a>
            </div>
            <!-- sidebar end -->


            <article class="content">
                <br>
                <br>
                <br>
                <br>
                <div class="calendarContainer">
                    <div class="container">
                        <div id="calendar">
                        </div>
                    </div>
                </div>
                 
                

            </article>
        </main>
</body>  
</html>