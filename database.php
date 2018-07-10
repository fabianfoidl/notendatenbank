<?php

	//if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) 
	//{ die(header('Location: http://www.musikkapelle-waidring.at/')); };
    //error_reporting(E_ALL);

  function getConnection(){
	$pdo = new PDO('mysql:host=localhost;dbname=notendatenbank;charset=utf8', 'root', '');
    //$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	return $pdo;
  }


  function fetch_noten($pdo){
   // global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM Noten");
    $stmt->execute([]);
    return $stmt->fetchAll();
  }
  
  function fetch_noten2($pdo, $id){
	  $stmt = $pdo->prepare("SELECT * FROM Noten WHERE id = ?");
	  $stmt->execute([$id]);
	  return $stmt->fetchAll();
  }
  
  function fetch_gattung($pdo){
	  $stmt = $pdo->prepare("SHOW COLUMNS FROM Noten LIKE 'gattung'");
	  $stmt->execute([]);
	  return $stmt->fetchAll();
  }

  function fetch_besetzung($pdo){
    $stmt = $pdo->prepare("SHOW COLUMNS FROM Noten LIKE 'besetzung'");
    $stmt->execute([]);
    return $stmt->fetchAll();
}

  function fetch_schwierigkeitsgrad($pdo){
     $stmt = $pdo->prepare("SHOW COLUMNS FROM Noten LIKE 'schwierigkeitsgrad'");
     $stmt->execute([]);
     return $stmt->fetchAll();
  }

  function fetch_stil($pdo){
    $stmt = $pdo->prepare("SHOW COLUMNS FROM Noten LIKE 'stil'");
    $stmt->execute([]);
    return $stmt->fetchAll();
  }

  function fetch_max_id($pdo){
      $stmt = $pdo->prepare("SELECT MAX(id) AS MAXID FROM noten");
      $stmt->execute([]);
      return $stmt->fetchAll();
  }

  function fetch_ablage($pdo){
        $stmt = $pdo->prepare("SELECT CONCAT(a.buchstabe,'-',a.zahl + 1) AS ablage FROM (SELECT substring(ablage,1,1) AS buchstabe, substring(ablage,3,5) AS zahl FROM noten GROUP BY buchstabe HAVING MAX(zahl)) a");
        $stmt->execute([]);
        return $stmt->fetchAll();
  }


  if($_SERVER["REQUEST_METHOD"] == "POST") {
      $objPost = $_POST;
      switch($objPost['method']) {
          case 'update':
              refresh_data(getConnection(), $objPost);
              break;
          case 'insert':
              insert_data(getConnection(), $objPost);
              break;
      }

  }

  function refresh_data($pdo, $objPost){
      $parseDate = date_parse($objPost["anschaffungsDatum"]);
      $parseDate2 = $parseDate['year']."-".$parseDate['month']."-".$parseDate['day'];
      $data = array(
          $objPost["titel"],
          $objPost["untertitel"],
          $objPost["gattung"],
          $objPost["gattungBeschreibung"],
          $objPost["ablage"],
          $objPost["verlag"],
          $objPost["komponist"],
          $objPost["arrangeur"],
          $objPost["besetzung"],
          $objPost["schwierigkeitsgrad"],
          $objPost["stil"],
          $objPost["spieldauer"],
          $objPost["erscheinungsjahr"],
          $objPost["lieferant"],
          //$objPost["anschaffungsDatum"],
          $parseDate2,
          $objPost["kosten"],
          $objPost["bemerkung"],
          (isset($objPost["digital"]) ? 1 : 0),
          $objPost["id"]
      );
      $stmt = $pdo->prepare("UPDATE noten SET titel = ? ,
                                              untertitel = ?,
                                              gattung = ?,
                                              gattungBeschreibung = ?,
                                              ablage = ?,
                                              verlag = ?,
                                              komponist = ?,
                                              arrangeur = ?,
                                              besetzung = ?,
                                              schwierigkeitsgrad = ?,
                                              stil = ?,
                                              spieldauer = ?,
                                              erscheinungsjahr = ?,
                                              lieferant = ?,
                                              anschaffungsDatum = ?,
                                              kosten = ?,
                                              bemerkung = ?,
                                              digital = ?
                                              WHERE id=?");
      if($stmt->execute($data)){
          echo "Update erfolgreich";
      } else {
          echo "Update fehlgeschlagen";
      }
  }



    function insert_data($pdo, $objPost){
        $parseDate = date_parse($objPost["anschaffungsDatum"]);
        $parseDate2 = $parseDate['year']."-".$parseDate['month']."-".$parseDate['day'];
        $data = array(
            $objPost["titel"],
            $objPost["untertitel"],
            $objPost["gattung"],
            $objPost["gattungBeschreibung"],
            $objPost["ablage"],
            $objPost["verlag"],
            $objPost["komponist"],
            $objPost["arrangeur"],
            $objPost["besetzung"],
            $objPost["schwierigkeitsgrad"],
            $objPost["stil"],
            $objPost["spieldauer"],
            $objPost["erscheinungsjahr"],
            $objPost["lieferant"],
            //$objPost["anschaffungsDatum"],
            $parseDate2,
            $objPost["kosten"],
            $objPost["bemerkung"],
            (isset($objPost["digital"]) ? 1 : 0),
            $objPost["id"]
        );
        $stmt = $pdo->prepare("INSERT INTO noten (titel, untertitel, gattung, gattungBeschreibung, ablage, verlag, komponist, arrangeur, besetzung, schwierigkeitsgrad, stil, spieldauer, erscheinungsjahr, lieferant, anschaffungsDatum, kosten, bemerkung, digital, id)
                                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        if($stmt->execute($data)){
            echo "Einfügen erfolgreich";
        } else {
            echo "Einfügen fehlgeschlagen";
        }
    }
