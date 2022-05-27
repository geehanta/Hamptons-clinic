<?php
session_start();
?>

<?php

$connect = new PDO("mysql:host=localhost;dbname=hamtons", "root", "");
$message = '';
if(isset($_POST["email"]))
{
 sleep(5);
 $query = "
 INSERT INTO patients 
 (name, dob, gender, email, age, residence, mobile_no, bp, temp, pulse, spo, complaints, diagnosis, plan, tests, treatment, dor, bill) VALUES 
 (:name, :dob, :gender, :email, :age, :residence, :mobile_no, :bp, :temp, :pulse, :spo, :complaints, :diagnosis, :plan, :tests, :treatment, :dor, :bill)
 ";
 $user_data = array(
  ':name'  => $_POST["name"],
  ':dob'  => $_POST["dob"],
  ':gender'   => $_POST["gender"],
  ':email'   => $_POST["email"],
  ':age'   => $_POST["age"],
  ':residence'   => $_POST["residence"],
  ':mobile_no'  => $_POST["mobile_no"],
  ':bp'  => $_POST["bp"],
  ':temp'  => $_POST["temp"],
  ':pulse'  => $_POST["pulse"],
  ':spo'  => $_POST["spo"],
  ':complaints'  => $_POST["complaints"],
  ':diagnosis'  => $_POST["diagnosis"],
  ':plan'  => $_POST["plan"],
  ':tests'  => $_POST["tests"],
  ':treatment'  => $_POST["treatment"],
  ':dor'  => $_POST["dor"],
  ':bill'  => $_POST["bill"],
 );
 $statement = $connect->prepare($query);
 if($statement->execute($user_data))
 {
  $message = '
  <div class="alert alert-success">
  Registration Completed Successfully
  </div>
  ';
 }
 else
 {
  $message = '
  <div class="alert alert-success">
  There is an error in Registration
  </div>
  ';
 }
}
?>


<!DOCTYPE Html>
<html>
    <head>
    <title>HAMPTONS</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="crudPageStyles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <style>
        .box
        {
        width:80%;
        margin:0 auto;
        }
        .active_tab1
        {
        background-color:#4aabe0;
        color:white;
        font-weight: 600;
        }
        .inactive_tab1
        {
        background-color: #f5f5f5;
        color: #333;
        cursor: not-allowed;
        }
        .has-error
        {
        border-color:#cc0000;
        background-color:#ffff99;
        }
     </style>

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
                <h2> FRONT DESK  </h2>
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
                    <?php echo "Desk  "?>
                    </h4>
                <br>
                </center>
                <!-- <a  data-bs-toggle="tooltip" data-bs-placement="right" title="Appointments" href="#"><i class="fa-solid fa-calendar-days"></i> <span>Appointments</span></a> -->
                <a class="current" data-bs-toggle="tooltip" data-bs-placement="right" title="Patients" href="patients.php"><i class="fa-solid fa-user"></i> <span>Patients</span></a>
                
            </div>
            <!-- sidebar end -->

            <article class="content">
            <br>
            <br>
            <br>
            <br>
            <div class="calendarContainer">
                <br/>
                <div class="container box">
                    <br />
                    <h3 align="center"><b>Patient Registration Form</b></h3>
                    <br />
                    <?php echo $message; ?>
                    <form method="post" id="register_form">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Patients Info</a>
                            </li>
                            <li class="nav-item">
                             <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Patients Vitals</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Doctors Notes</a>
                            </li>
                        </ul>

                        <div class="tab-content" style="margin-top:16px;">
                         <div class="tab-pane active" id="login_details">
                            <div class="panel panel-default">
                                <div class="panel-heading">Login Details</div>
                                    <div class="panel-body">
                                    <div class="form-group">
                                             <label>Enter Name</label>
                                                <input type="text" name="name" id="name" class="form-control" />
                                             <span id="error_name" class="text-danger"></span>
                                         </div>
                                        <div class="form-group">
                                            <label>Enter Date of Birth</label>
                                                <input type="date"  name="dob" id="dob" class="form-control" />
                                            <span id="error_dob" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Age</label>
                                                <input type="text" name="age" id="age" class="form-control" />
                                                <span id="error_age" class="text-danger"></span>
                                        </div>
                                         <div class="form-group">
                                             <label>Gender</label>
                                                <label class="radio-inline">
                                                 <input type="radio" name="gender" value="male" checked> Male
                                                 </label>
                                                <label class="radio-inline">
                                                 <input type="radio" name="gender" value="female"> Female
                                                </label>
                                         </div>
                                         <div class="form-group">
                                            <label>Enter Residence</label>
                                             <textarea name="residence" id="residence" class="form-control"></textarea>
                                                <span id="error_residence" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                                <label>Enter Mobile No.</label>
                                                    <input type="text" name="mobile_no" id="mobile_no" class="form-control" />
                                                     <span id="error_mobile_no" class="text-danger"></span>  
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Email Address</label>
                                                <input type="text" name="email" id="email" class="form-control" />
                                                <span id="error_email" class="text-danger"></span>
                                        </div>
                                        
                                        <br/>
                                            <div align="center">
                                                 <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                        <div class="tab-pane fade" id="personal_details">
                            <div class="panel panel-default">
                                <div class="panel-heading">Fill Personal Details</div>
                                    <div class="panel-body">
                                    <div class="form-group">
                                             <label>Enter Blood Pressure</label>
                                                <input type="float" name="bp" id="bp" class="form-control" />
                                             <span id="error_bp" class="text-danger"></span>
                                         </div>
                                        <div class="form-group">
                                            <label>Enter Temperature</label>
                                                <input type="float" name="temp" id="temp" class="form-control" />
                                            <span id="error_temp" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Pulse</label>
                                                <input type="float" name="pulse" id="pulse" class="form-control" />
                                            <span id="error_pulse" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter SPO</label>
                                                <input type="float" name="spo" id="spo" class="form-control" />
                                            <span id="error_spo" class="text-danger"></span>
                                        </div>
                                         
                                         <br />
                                         <div align="center">
                                             <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
                                             <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
                                         </div>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        <div class="tab-pane fade" id="contact_details">
                            <div class="panel panel-default">
                                <div class="panel-heading">Fill Contact Details</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                        <div class="form-group">
                                            <label>Chief Complaints</label>
                                             <textarea name="complaints" id="complaints" class="form-control"></textarea>
                                                <span id="error_complaints" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                        <label>Diagnosis</label>
                                             <textarea name="diagnosis" id="diagnosis" class="form-control"></textarea>
                                                <span id="error_diagnosis" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                        <label>Plan</label>
                                             <textarea name="plan" id="plan"  class="form-control"></textarea>
                                                <span id="error_plan" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                        <label>Tests Done</label>
                                             <textarea name="tests" id="tests" class="form-control"></textarea>
                                                <span id="error_tests" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                        <label>Treatment</label>
                                             <textarea name="treatment" id="treatment" class="form-control"></textarea>
                                                <span id="error_treatment" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label> Date of Return</label>
                                                <input type="date"  name="dor" id="dor" class="form-control" />
                                            <span id="error_dor" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                             <label> Bill</label>
                                                <input type="float" name="bill" id="bill" class="form-control" />
                                             <span id="error_bill" class="text-danger"></span>
                                         </div>
                                        
                                            <br/>
                                        <div align="center">
                                                <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
                                                  <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Register</button>
                                        </div>
                                             <br/>
                                     </div>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </article>
    </main>
</body>  
</html>
<script>
$(document).ready(function(){
 
 $('#btn_login_details').click(function(){
  
  var error_email = '';
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
  if($.trim($('#email').val()).length == 0)
  {
   error_email = 'Email is required';
   $('#error_email').text(error_email);
   $('#email').addClass('has-error');
  }
  else
  {
   if (!filter.test($('#email').val()))
   {
    error_email = 'Invalid Email';
    $('#error_email').text(error_email);
    $('#email').addClass('has-error');
   }
   else
   {
    error_email = '';
    $('#error_email').text(error_email);
    $('#email').removeClass('has-error');
   }
  }
  
 

  if(error_email != '' )
  {
   return false;
  }
  else
  {
   $('#list_login_details').removeClass('active active_tab1');
   $('#list_login_details').removeAttr('href data-toggle');
   $('#login_details').removeClass('active');
   $('#list_login_details').addClass('inactive_tab1');
   $('#list_personal_details').removeClass('inactive_tab1');
   $('#list_personal_details').addClass('active_tab1 active');
   $('#list_personal_details').attr('href', '#personal_details');
   $('#list_personal_details').attr('data-toggle', 'tab');
   $('#personal_details').addClass('active in');
  }
 });
 
 $('#previous_btn_personal_details').click(function(){
  $('#list_personal_details').removeClass('active active_tab1');
  $('#list_personal_details').removeAttr('href data-toggle');
  $('#personal_details').removeClass('active in');
  $('#list_personal_details').addClass('inactive_tab1');
  $('#list_login_details').removeClass('inactive_tab1');
  $('#list_login_details').addClass('active_tab1 active');
  $('#list_login_details').attr('href', '#login_details');
  $('#list_login_details').attr('data-toggle', 'tab');
  $('#login_details').addClass('active in');
 });
 
 $('#btn_personal_details').click(function(){
  var error_name = '';
  var error_dob = '';
  
  if($.trim($('#name').val()).length == 0)
  {
   error_first_name = ' Name is required';
   $('#error_name').text(error_name);
   $('#name').addClass('has-error');
  }
  else
  {
   error_name = '';
   $('#error_name').text(error_name);
   $('#name').removeClass('has-error');
  }
  
  if($.trim($('#dob').val()).length == 0)
  {
   error_dob = 'Date is required';
   $('#error_dob').text(error_dob);
   $('#dob').addClass('has-error');
  }
  else
  {
   error_dob = '';
   $('#error_dob').text(error_dob);
   $('#dob').removeClass('has-error');
  }

  if(error_name != '' || error_dob != '')
  {
   return false;
  }
  else
  {
   $('#list_personal_details').removeClass('active active_tab1');
   $('#list_personal_details').removeAttr('href data-toggle');
   $('#personal_details').removeClass('active');
   $('#list_personal_details').addClass('inactive_tab1');
   $('#list_contact_details').removeClass('inactive_tab1');
   $('#list_contact_details').addClass('active_tab1 active');
   $('#list_contact_details').attr('href', '#contact_details');
   $('#list_contact_details').attr('data-toggle', 'tab');
   $('#contact_details').addClass('active in');
  }
 });
 
 $('#previous_btn_contact_details').click(function(){
  $('#list_contact_details').removeClass('active active_tab1');
  $('#list_contact_details').removeAttr('href data-toggle');
  $('#contact_details').removeClass('active in');
  $('#list_contact_details').addClass('inactive_tab1');
  $('#list_personal_details').removeClass('inactive_tab1');
  $('#list_personal_details').addClass('active_tab1 active');
  $('#list_personal_details').attr('href', '#personal_details');
  $('#list_personal_details').attr('data-toggle', 'tab');
  $('#personal_details').addClass('active in');
 });
 
 $('#btn_contact_details').click(function(){
  var error_residence = '';
  var error_mobile_no = '';
  var mobile_validation = /^\d{10}$/;
  if($.trim($('#residence').val()).length == 0)
  {
   error_residence = 'Residence is required';
   $('#error_residence').text(error_residence);
   $('#residence').addClass('has-error');
  }
  else
  {
   error_residence = '';
   $('#error_residence').text(error_residence);
   $('#residence').removeClass('has-error');
  }
  
  if($.trim($('#mobile_no').val()).length == 0)
  {
   error_mobile_no = 'Mobile Number is required';
   $('#error_mobile_no').text(error_mobile_no);
   $('#mobile_no').addClass('has-error');
  }
  else
  {
   if (!mobile_validation.test($('#mobile_no').val()))
   {
    error_mobile_no = 'Invalid Mobile Number';
    $('#error_mobile_no').text(error_mobile_no);
    $('#mobile_no').addClass('has-error');
   }
   else
   {
    error_mobile_no = '';
    $('#error_mobile_no').text(error_mobile_no);
    $('#mobile_no').removeClass('has-error');
   }
  }
  if(error_residence != '' || error_mobile_no != '')
  {
   return false;
  }
  else
  {
   $('#btn_contact_details').attr("disabled", "disabled");
   $(document).css('cursor', 'prgress');
   $("#register_form").submit();
  }
  
 });
 
});
</script>