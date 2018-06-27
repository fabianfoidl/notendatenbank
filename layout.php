<?php

  include "database.php";
  $res = fetch_noten(getConnection());
  //echo(fetch_gattung(getConnection())[0]['Type']);
  
  $it = fetch_gattung(getConnection())[0]['Type'];
  $rst1 = explode(",", $it);
  while($elem = each($rst1)){
	  $rst1[$elem[0]] = str_replace("set('", "", $rst1[$elem[0]]);
      $rst1[$elem[0]] = str_replace("enum('", "", $rst1[$elem[0]]);
      $rst1[$elem[0]] = str_replace("')", "", $rst1[$elem[0]]);
      $rst1[$elem[0]] = str_replace("'", "", $rst1[$elem[0]]);
  }
  
	foreach($rst1 AS $rst1row){
		echo $rst1row."<br>";
	}
  
  
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
		
		<!-- Featherlight Lightbox -->
		<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.css" type="text/css" rel="stylesheet" />
		
		
		<!-- Javascript Featherlight Lightbox - nach unten kopieren -->
		<script src="//code.jquery.com/jquery-latest.js"></script>
		<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
		
		<style>
		
			.container {
				margin: 0 auto;
				//background-color: black;
				border: 1px solid black;
			}
			
			#main-table{
				padding-bottom: 20px;
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

			<div id="main-table" class="table-responsive">
				<table id="searchable-table" class="table table-hover">
				<thead>
				  <tr>
					<th>ID</th>
                    <th>Gattung</th>
					<th>Titel</th>
					<th>Komponist</th>
					<th>Arrangeur</th>
					<th>Besetzung</th>
					<th>Erscheinungsjahr</th>
					<th>Ablage</th>
					<th></th>
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
				  <?php foreach($res AS $row): ?>
				  <tr>
					<td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["gattung"]; ?></td>
					<td><?php echo $row["titel"]; ?></td>
					<td><?php echo $row["komponist"]; ?></td>
					<td><?php echo $row["arrangeur"]; ?></td>
					<td><?php echo $row["besetzung"]; ?></td>
					<td><?php echo $row["erscheinungsjahr"]; ?></td>
					<td><?php echo $row["ablage"]; ?></td>
					<td><a href="#" data-featherlight="data.php?id=<?php echo $row["id"]; ?> .lightbox-ajax">edit</a></td>
				  </tr>
				  <?php endforeach; ?>
				</tbody>
				</table>
			</div>
			
		</div>

    </div>
	
	

	</body>
</html>