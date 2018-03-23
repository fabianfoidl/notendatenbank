<?php

  include "database.php";
  $res = fetch_noten(getConnection());
  
 ?>

<html>

	<head>
		<title>Notendatenbank MK Waidring</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="stylesheet" href="stylesheets/bootstrap-quick-search.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		
		<script src="javascripts/bootstrap-quick-search.gz.js"></script>
		<script src="javascripts/bootstrap-quick-search.min.js"></script>
		
		<style>
		
			.container {
				margin: 0 auto;
				background-color: black;
			}
		
		</style>

	</head>

	<body>

    <div class="content">
		<div class="container">
     
			<div class="form-group">
				<input data-input="quick-search" data-search-target="#searchable-table tbody > tr" name="quick-search">
				<span class="glyphicon glyphicon-remove-circle form-control-feedback form-action-clear" aria-hidden="true"></span>
			</div>

			<table id="searchable-table">
			<thead>
			  <tr>
				<th>Name</th>
				<th>Occupation</th>
				<th>Nationality</th>
				<th>Age</th>
			  </tr>
			</thead>

			<tbody>
			  <tr>
				<td>Fabian</td>
				<td>EGGER</td>
				<td>Austria</td>
				<td>21</td>
			  </tr>
			  <tr>
				<td>Heinz</td>
				<td>EGGER</td>
				<td>Austria</td>
				<td>21</td>
			  </tr>
			  <tr>
				<td>Christiane</td>
				<td>EGGER</td>
				<td>Austria</td>
				<td>21</td>
			  </tr>
			  <tr>
				<td>Sarah</td>
				<td>EGGER</td>
				<td>Austria</td>
				<td>21</td>
			  </tr>
			</tbody>
			</table>
			
		</div>

    </div>
	

	</body>
</html>