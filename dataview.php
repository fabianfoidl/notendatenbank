<?php

  include "database.php";
  $res = fetch_noten2(getConnection(), $_GET["id"]);
  
 ?>

<div class="lightbox-ajax">
	<form action="./refresh.php">
		<?php
			foreach($res AS $row){
                echo "<p><strong>ID: </strong>".$row["id"]."</p>";
                echo "<p><strong>Titel: </strong>".$row["titel"]."</p>";
                echo (strlen($row["untertitel"]) > 0) ? "<p><strong>Untertitel: </strong>".$row["untertitel"]."</p>" : "";
                echo "<p><strong>Gattung: </strong>".$row["gattung"]."</p>";
                echo (strlen($row["gattungBeschreibung"]) > 0) ? "<p><strong>Beschreibung Gattung: </strong>".$row["gattungBeschreibung"]."</p>" : "";
                echo "<p><strong>Ablage: </strong>".$row["ablage"]."</p>";
                echo "<p><strong>Verlag: </strong>".$row["verlag"]."</p>";
                echo "<p><strong>Komponist: </strong>".$row["komponist"]."</p>";
                echo "<p><strong>Arrangeur: </strong>".$row["arrangeur"]."</p>";
                echo "<p><strong>Besetzung: </strong>".$row["besetzung"]."</p>";
                echo "<p><strong>Schwierigkeitsgrad: </strong>".$row["schwierigkeitsgrad"]."</p>";
                echo (strlen($row["stil"]) > 0) ? "<p><strong>Stil: </strong>".$row["stil"]."</p>" : "";
                echo "<p><strong>Spieldauer: </strong>".$row["spieldauer"]."</p>";
                echo "<p><strong>Erscheinungsjahr: </strong>".$row["erscheinungsjahr"]."</p>";
                echo "<p><strong>Lieferant: </strong>".$row["lieferant"]."</p>";
                echo "<p><strong>Anschaffungsdatum: </strong>".date("d.m.Y",strtotime($row["anschaffungsDatum"]))."</p>";
                echo "<p><strong>Kosten: </strong>".$row["kosten"]."</p>";
                echo "<p><strong>Bemerkung: </strong>".$row["bemerkung"]."</p>";
                echo "<p><strong>Digital: </strong>".(($row["digital"]) == 1 ? "ja" : "nein")."</p>";
			}
		?>
	</form>
</div>