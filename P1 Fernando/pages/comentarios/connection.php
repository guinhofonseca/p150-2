<?php

function connection() {
  try {
    $connection = new PDO('mysql:host=localhost;port=3306;dbname=Caduser','root','');
        return $connection;
  } catch (Exception $error) {
    echo "Ocorreu o seguinte erro: {$error->getMessage()}";
  }
}
