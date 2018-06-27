<?php

	//if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) 
	//{ die(header('Location: http://www.musikkapelle-waidring.at/')); };

  function getConnection(){
	$pdo = new PDO('mysql:host=localhost;dbname=notendatenbank;charset=utf8', 'root', '');
	//$pdo = new PDO('mysql:host=mysqlsvr50.world4you.com;dbname=9860988db4;charset=utf8', 'sql9860988', '2d4fj3r');
    //$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
	  $stmt = $pdo->prepare("SHOW COLUMNS FROM Noten LIKE 'besetzung'");
	  $stmt->execute([]);
	  return $stmt->fetchAll();
  }

  
?>
