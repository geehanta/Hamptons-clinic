<!DOCTYPE Html>
<html>
    <head>
        <title>LOGIN</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css" >

	    <script src="js/jquery.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>

	    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
	 
	    <script type="text/javascript" src="js/datatables.min.js"></script>
	    <script type="text/javascript" src="parsley/dist/parsley.min.js"></script>
		<link rel="stylesheet" type="text/css" href="parsley/parsley.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>

		<script type="text/javascript" src="js/bootstrap-datepicker1.js"></script>
		<link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
        <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="hamtonstylesheet.css">
    </head>
    <body>
        <main>
            <header>
                    <h2 align="center">HAMPTONS MEDICAL CLINIC </h2>
            </header>

                   
		<br />
		<br />
		<br />
		<div class="container">
			<br />
			
			<div class="row">
				<div class="col-md-3">&nbsp;</div>
				<div class="col-md-6">
					<span id="error"></span>
					<div class="card" id="cardshadow">
						<div class="card-header"> Login</div>
						<div class="card-body">
							<form method="post" action="#">
								<div class="form-group">
									<label>Enter Username</label>
									<input autocomplete="off" type="text" name="name"  class="form-control" required  />
								</div>
								<div class="form-group">
									<label>Enter password</label>
									<input autocomplete="off" type="password" name="pwd"  class="form-control" required  />
								</div>
								<div class="form-group text-center">
                                <button  id=buttonShadow  align="center" type="submit">Sign In</button>
								</div>
							</form>
						</div>
					</div>
					<br />
					<br />
				</div>
			</div>
		</div>
		<br />
		<br />
<?php
$host="localhost";
$user="root";
$password="";
$db="hamtons";

session_start();

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
    {
        die ("Connection to  user database failed!");
    }

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username=$_POST["name"];
        $password=$_POST["pwd"];

        //To prevent sql injection
        $username=stripcslashes($username);
        $password=stripcslashes($password);
    


        $sql="select * from users where username='".$username."'AND PASSWORD='".$password."'";

        $result=mysqli_query($data,$sql);
        $row=mysqli_fetch_array($result);

    if($row["usertype"]=="admin")
            {  $_SESSION["USERNAME"]=$username;
                header("location:adminPage.php");
            }
        
    elseif($row["usertype"]=="desk")
        {    $_SESSION["USERNAME"]=$username;
            header("location:frontDesk.php");
        }
    elseif($row["usertype"]=="pharmacy")
        {    $_SESSION["USERNAME"]=$username;
            header("location:pharmacyPage.php");
        }
    else
        {    $_SESSION["USERNAME"]=$username;
     
        echo "Incorrect login Credentials!";
        }
    }

?>
            
                    </div>
                        </div>
            </article>
            <footer align="center">
                <ul class="ulFooter">
                    <li style="float:center"><b> &copy; 2022 HAMTONS-MEDICAL-KENYA </b></li>
                    
                </ul>
            </footer>
        </main>
    </body>
</html>