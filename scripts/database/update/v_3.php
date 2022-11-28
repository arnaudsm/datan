<?php

  /*
    With this file, the new version of the database will be => XX
    The name of the file needs to be v_X.php

    What needs to be changed in this file:
    1. CHANGE THE $new_v value
    2. MAKE YOUR CHANGE TO THE DATABASE

  */

  include '../../bdd-connexion.php';

  /* 1. CHANGE THE new_v VALUE */
  $new_v = 3;

  $last_v_installed = $bdd->query('SELECT version FROM mysql_v ORDER BY version DESC LIMIT 1');
  $last_v_installed = $last_v_installed->fetchAll(PDO::FETCH_ASSOC);
  $last_v_installed = $last_v_installed[0]['version'];

  echo "New version to install = " . $new_v . "<br>";
  echo "Last version installed = " . $last_v_installed . "<br>";

  if ($new_v > $last_v_installed) {
    echo "Create the new table: groupes_stats_history <br>";

    /* 2. MAKE YOUR CHANGE TO THE DATABASE */
    $prepare = $bdd->prepare("CREATE TABLE `groupes_stats_history`(
      `organeRef` VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
      `active` INT(1) NOT NULL ,
      `stat` VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
      `type` VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
      `legislature` INT(2) NOT NULL ,
      `dateValue` DATE NOT NULL ,
      `value` DECIMAL(4,2) NULL DEFAULT NULL ,
      `dateMaj` DATE NOT NULL
    )");

    if (!$prepare->execute()) {
      echo "The update did not work <br>";
    } else {
      echo "The update worked";

      $prepare = $bdd->prepare("INSERT INTO mysql_v (version) VALUES (:new_version)");
      $prepare->execute(array('new_version' => $new_v));

    }

  } else {
    echo "The last version installed is already up to date <br>";
    die();
  }

?>
