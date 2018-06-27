<?php

    include "database.php";
    $res = fetch_noten2(getConnection(), $_GET["id"]);

    $gattung = fetch_gattung(getConnection())[0]['Type'];
    $resGattung = explode(",", $gattung);
    $resGattung = str_replace('enum', '', $resGattung);
    $resGattung = str_replace("'", '', $resGattung);
    $resGattung = str_replace('(', '', $resGattung);
    $resGattung = str_replace(')', '', $resGattung);

    $besetzung = fetch_besetzung(getConnection())[0]['Type'];
    $resBesetzung = explode(",", $besetzung);
    $resBesetzung = str_replace('enum', '', $resBesetzung);
    $resBesetzung = str_replace("'", '', $resBesetzung);
    $resBesetzung = str_replace('(', '', $resBesetzung);
    $resBesetzung = str_replace(')', '', $resBesetzung);

    $schwierigkeitsgrad = fetch_schwierigkeitsgrad(getConnection())[0]['Type'];
    $resschwierigkeitsgrad = explode(",", $schwierigkeitsgrad);
    $resschwierigkeitsgrad = str_replace('enum', '', $resschwierigkeitsgrad);
    $resschwierigkeitsgrad = str_replace("'", '', $resschwierigkeitsgrad);
    $resschwierigkeitsgrad = str_replace('(', '', $resschwierigkeitsgrad);
    $resschwierigkeitsgrad = str_replace(')', '', $resschwierigkeitsgrad);

    $stil = fetch_stil(getConnection())[0]['Type'];
    $resstil = explode(",", $stil);
    $resstil = str_replace('enum', '', $resstil);
    $resstil = str_replace("'", '', $resstil);
    $resstil = str_replace('(', '', $resstil);
    $resstil = str_replace(')', '', $resstil);
  
 ?>

<div class="lightbox-ajax">
	<form action="./database.php" method="post">
		<?php
			foreach($res AS $row){
				echo "<p><strong>ID: </strong><input name='idshow' value='".$row["id"]."' disabled></p>";
                echo "<input name='id' value='".$row["id"]."' type='hidden'>";
                echo "<input name='method' value='update' type='hidden'>";
				echo "<p><strong>Titel: </strong><input name='titel' value='".$row["titel"]."'></p>";
				echo "<p><strong>Untertitel: </strong><input name='untertitel' value='".$row["untertitel"]."'></p>";
				echo "<p><strong>Gattung: </strong><select name='gattung'>";
				    foreach($resGattung AS $resrow) {echo "<option value='$resrow'"; echo ($resrow == $row['gattung']) ? 'selected' : ''; echo ">$resrow</option>"; }
				    echo"</select></p>";
				echo "<p><strong>Beschreibung Gattung: </strong><input name='gattungBeschreibung' value='".$row["gattungBeschreibung"]."'></p>";
				echo "<p><strong>Ablage: </strong><input name='ablage' value='".$row["ablage"]."'></p>";
				echo "<p><strong>Verlag: </strong><input name='verlag' value='".$row["verlag"]."'></p>";
				echo "<p><strong>Komponist: </strong><input name='komponist' value='".$row["komponist"]."'></p>";
				echo "<p><strong>Arrangeur: </strong><input name='arrangeur' value='".$row["arrangeur"]."'></p>";
				echo "<p><strong>Besetzung: </strong><select name='besetzung'>";
                foreach($resBesetzung AS $resrow) {echo "<option value='$resrow'"; echo ($resrow == $row['besetzung']) ? 'selected' : ''; echo ">$resrow</option>"; }
                    echo"</select></p>";
                echo "<p><strong>schwierigkeitsgrad: </strong><select name='schwierigkeitsgrad'>";
                foreach($resschwierigkeitsgrad AS $resrow) {echo "<option value='$resrow'"; echo ($resrow == $row['schwierigkeitsgrad']) ? 'selected' : ''; echo ">$resrow</option>"; }
                echo"</select></p>";
                echo "<p><strong>stil: </strong><select name='stil'>";
                    foreach($resstil AS $resrow) {echo "<option value='$resrow'"; echo ($resrow == $row['stil']) ? 'selected' : ''; echo ">$resrow</option>"; }
                    echo"</select></p>";
				echo "<p><strong>Spieldauer: </strong><input name='spieldauer' value='".$row["spieldauer"]."'></p>";
				echo "<p><strong>Erscheinungsjahr: </strong><input name='erscheinungsjahr' value='".$row["erscheinungsjahr"]."'></p>";
				echo "<p><strong>Lieferant: </strong><input name='lieferant' value='".$row["lieferant"]."'></p>";
				echo "<p><strong>Anschaffungsdatum: </strong><input name='anschaffungsDatum' value='".date("d.m.Y",strtotime($row["anschaffungsDatum"]))."'></p>";
				echo "<p><strong>Kosten: </strong><input name='kosten' value='".$row["kosten"]."'></p>";
				echo "<p><strong>Bemerkung: </strong><textarea name='bemerkung' style='width:200px; height:100px;'>".$row["bemerkung"]."</textarea></p>";
				echo "<p><strong>Digital: </strong><input type='checkbox' name='digital' value='digital' ".(($row["digital"]) == 1 ? "checked" : "")."></p>";
			}
		?>
		<input type="submit" value="Aktualisieren">
	</form>
</div>