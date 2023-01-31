<?php

include_once "conexao.php";

try{
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $delete = $conectar->prepare("delete from login WHERE id = :id");
    
    $delete->bindParam(":id", $id);
    $delete->execute();

    header("location: index.php");    

} catch (PDOException $e){
    echo "Erro na página: " . $e->getMessage();
}


?>