<?php

	//if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) 
	//{ die(header('Location: http://www.musikkapelle-waidring.at/')); };

  function getConnection(){
	$pdo = new PDO('mysql:host=localhost;dbname=notendatenbank;charset=utf8', 'root', '');
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

  
?>
