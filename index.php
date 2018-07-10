<?php

  include "database.php";

  session_start();

  // Login
  if(isset($_POST['password'])) {
      if(!isset($_SESSION['userid'])){
          if(password_verify($_POST['password'], '$2y$10$zD31YOBwM0HyeE5h/vBhy..lH8GNTLzGep1HJ62fa0jMW.SA2hDBe')){
              $_SESSION['userid'] = "notenwart";
          }
    }

  }
  
 ?>

<html>

	<head>
		<title>Notendatenbank MK Waidring</title>

        <script src="//code.jquery.com/jquery-latest.js"></script>
        <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


        <script src="./javascripts/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css" />

        <!-- Featherlight Lightbox -->
        <link href="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.css" type="text/css" rel="stylesheet" />


        <style>


            .content {
                padding: 10px;
                margin: 0;
            }

            #login {
                float: right;
                margin-bottom: 50px;
            }

			.container {
				margin: 0 auto;
                width: 90%;
				//background-color: black;
				border: 1px solid black;
                //float:left;
                clear: both;
			}

            #notenTable_wrapper {
                margin-top: 10px;
            }

            tfoot input {
                width: 100%;
                padding: 3px;
                box-sizing: border-box;
            }


		
		</style>

        <script>
            $(document).ready(function(){
                $("#table").load("table.php");
            });

            $(document).ready(function(){
                $("#refresh").click(function(){
                    $("#table").load("table.php");
                });
            });


        </script>


	</head>

	<body>

    <!-- Login div -->
    <div style="display:none">
        <div id="login">
            <form method="post" action="index.php">
                <!-- Benutzer: <input type="text" name="fname"><br> -->
                Passwort: <input type="password" name="password"><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>


    <div class="content">
        <div id="login">

            <?php if (!isset($_SESSION['userid'])) {
                echo"<button type='button' class='btn btn-success' data-featherlight='#login'>Login</button><br>";
            } else {
                echo"<form action='logout.php' method='post'><input type='submit' class='btn btn-danger' value='LOGOUT' /></form>";
            }
            ?>
        </div>

        <div>
            <input type="button" id="refresh" value="Tabelle aktualisieren">
        </div>

		<div class="container">

            <div id="table"></div>

			
		</div><!-- end container -->

    </div><!-- end content -->









    </body>
</html>