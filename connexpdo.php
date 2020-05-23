<?php

function connexpdo($base, $user, $password){

    try {
        $base = new PDO($base, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    return $base;
}
