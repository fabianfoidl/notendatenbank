<?php

   include "database.php";
    //$res = fetch_noten2(getConnection(), $_GET["id"]);
    $maxId = fetch_max_id(getConnection());
    $id = $maxId[0][0] + 1;

    $ablage = fetch_ablage(getConnection());

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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( function() {
            var a = (<?php echo json_encode($ablage); ?>);
            var b = a.map(function(item) {
               return item[0];
            });
            $( "#ablage" ).autocomplete({
                source: b
            });
        } );
    </script>

    <div class="lightbox-ajax2">
        <form action="./database.php" method="post">
            <?php
                    echo "<p><strong>ID: </strong><input name='idshow' value='$id' disabled></p>";
                    echo "<input name='id' value='$id' type='hidden'>";
                    echo "<input name='method' value='insert' type='hidden'>";
                    echo "<p><strong>Titel: </strong><input name='titel' value=''></p>";
                    echo "<p><strong>Untertitel: </strong><input name='untertitel' value=''></p>";
                    echo "<p><strong>Gattung: </strong><select name='gattung'>";
                        foreach($resGattung AS $resrow) {echo "<option value='$resrow'>$resrow</option>"; }
                        echo"</select></p>";
                    echo "<p><strong>Beschreibung Gattung: </strong><input name='gattungBeschreibung' value=''></p>";
                   // echo "<p><strong>Ablage: </strong><input name='ablage' value=''></p>";
                    echo "<p><strong>Ablage: </strong><input name='ablage' id='ablage' value=''></p>";
                    echo "<p><strong>Verlag: </strong><input name='verlag' value=''></p>";
                    echo "<p><strong>Komponist: </strong><input name='komponist' value=''></p>";
                    echo "<p><strong>Arrangeur: </strong><input name='arrangeur' value=''></p>";
                    echo "<p><strong>Besetzung: </strong><select name='besetzung'>";
                    foreach($resBesetzung AS $resrow) {echo "<option value='$resrow'>$resrow</option>"; }
                        echo"</select></p>";
                    echo "<p><strong>schwierigkeitsgrad: </strong><select name='schwierigkeitsgrad'>";
                    foreach($resschwierigkeitsgrad AS $resrow) {echo "<option value='$resrow'>$resrow</option>"; }
                    echo"</select></p>";
                    echo "<p><strong>stil: </strong><select name='stil'>";
                        foreach($resstil AS $resrow) {echo "<option value='$resrow'>$resrow</option>"; }
                        echo"</select></p>";
                    echo "<p><strong>Spieldauer: </strong><input name='spieldauer' value=''></p>";
                    echo "<p><strong>Erscheinungsjahr: </strong><input name='erscheinungsjahr' value=''></p>";
                    echo "<p><strong>Lieferant: </strong><input name='lieferant' value=''></p>";
                    echo "<p><strong>Anschaffungsdatum: </strong><input name='anschaffungsDatum' value=''></p>";
                    echo "<p><strong>Kosten: </strong><input name='kosten' value=''></p>";
                    echo "<p><strong>Bemerkung: </strong><textarea name='bemerkung' style='width:200px; height:100px;'></textarea></p>";
                    echo "<p><strong>Digital: </strong><input type='checkbox' name='digital' value='digital'></p>";
            ?>
            <input type="submit" value="Einfügen">
        </form>
    </div>