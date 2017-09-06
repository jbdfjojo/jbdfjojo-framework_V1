<?php

/**

 * ATTENTION A CREE LA BASE DE DONNEE AVANT D'UTILISER CE MODULE

 **/

//Initiailisation de l'objet PDO pour se connecter à la database

require "../../../vendor/autoload.php";

use Config\Config;

/* creation de la base de donnée */

// connexion à Mysql sans base de données
$pdo = new PDO('mysql:host='.Config::Params('host'), Config::Params('user'), Config::Params('pass'));

// création de la requête sql
// on teste avant si elle existe ou non (par sécurité)
$requete = "CREATE DATABASE IF NOT EXISTS `". Config::Params('dbName') ."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

// on prépare et on exécute la requête
$pdo->prepare($requete)->execute();

/* creation de la table users  */

$bdd = new PDO('mysql:host='. Config::Params('host') .';dbname='. Config::Params('dbName') .';charset=utf8', Config::Params('user') , Config::Params('pass'));
$bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->query("SET NAMES 'utf8', lc_time_names = 'fr_FR'");

//initialisation de la variable req
$req = "";
//on met la variable finRinquete a false
$finRequete = false;
//on met le fichier dans une variable
$tables = file("j_framwork.sql"); //Là ton fichier
//pour chaque ligne du ficher ...
foreach ($tables AS $ligne) {
  //si ligne[0] n'est pas égal à - et si ligne[0] n'est pas égale a rien
  if ($ligne[0] != "-" && $ligne[0] != "") {
    //on concate $ligne dans $req
    $req .= $ligne;
    // on divise $ligne en plusieurs sous-chaines de caracteres divisé par ;
    $test = explode(";", $ligne);
    //Si la taille de $test est suppérieure à 1 (donc s'il y a quelque chose dedans) faire
    if (sizeof($test) > 1) {
      //mettre finRequete à vrai
      $finRequete = true;
    }
  }
  //Si finRequete est vrai
  if ($finRequete) {
    // on prépare la requete sql dans stmt
    $stmt = $bdd->prepare($req);
    //si l'exécution se passe bien
    if (!$stmt->execute()) {
      //lancer l'exception suivante
      throw new PDOException("Impossible d'ins&eacute;rer la ligne:<br>".$req."<hr>", 100);
    }
    //on vide req
    $req = "";
    //on remet finRequete à faux
    $finRequete = false;
  }
}

header("Location: $_SERVER[HTTP_REFERER]");