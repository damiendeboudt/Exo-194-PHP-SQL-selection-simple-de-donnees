<?php

try {
    $server = 'localhost';
    $db = 'exo_194';
    $user = 'root';
    $password = '';

    $bdd= new PDO("mysql:host=$server;dbname=$db; charset=utf8", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $stmt = $bdd->prepare("SELECT nom, prenom, rue, numero, code_postal, ville, pays, mail from user");

    $state = $stmt->execute();

    if ($state) {
       foreach ($stmt->fetchAll() as $user) {
           echo "Utilisateur: " . $user['nom']. ' ' . $user['prenom'] . ' ' . $user['rue'] . ' ' . $user['numero'] .
               ' ' . $user['code_postal'] . ' ' . $user['ville'] . ' ' . $user['pays'] . ' ' . $user['mail'] . "<br>";
       }
    } else {
        echo 'erreur';
    }

    $stmt2 = $bdd->prepare("SELECT * from user ORDER BY id DESC");

    $state2 = $stmt2->execute();

    if ($state2) {
        foreach ($stmt2->fetchAll() as $user) {
            echo "Utilisateur: " . $user['id'] . $user['nom']. ' ' . $user['prenom'] . ' ' . $user['rue'] . ' ' . $user['numero'] .
                ' ' . $user['code_postal'] . ' ' . $user['ville'] . ' ' . $user['pays'] . ' ' . $user['mail'] . "<br>";
        }
    } else {
        echo 'erreur';
    }

    $stmt3 = $bdd->prepare("SELECT id, nom, prenom from user ORDER BY id DESC");

    $state3 = $stmt3->execute();

    if($state3) {
        foreach ($stmt3->fetchAll() as $user) {
            echo "User: " . $user["id"] . ' ' .  $user['nom'] . ' ' . $user['prenom'] . "<br>";
        }
    }
}
catch(PDOException $exceptions) {
    echo $exceptions->getMessage();
}
/**
 * 1. Importez le fichier SQL se trouvant dans le dossier SQL.
 * 2. Connectez vous à votre base de données avec PHP
 * 3. Sélectionnez tous les utilisateurs et affichez toutes les infos proprement dans un div avec du css
 *    ex:  <div class="classe-css-utilisateur">
 *              utilisateur 1, données ( nom, prenom, etc ... )
 *         </div>
 *         <div class="classe-css-utilisateur">
 *              utilisateur 2, données ( nom, prenom, etc ... )
 *         </div>
 * 4. Faites la même chose, mais cette fois ci, triez le résultat selon la colonne ID, du plus grand au plus petit.
 * 5. Faites la même chose, mais cette fois ci en ne sélectionnant que les noms et les prénoms.
 */
