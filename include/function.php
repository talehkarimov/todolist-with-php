<?php


function addTodo($todo_name){
    global $pdo;

    $query = " INSERT INTO `todo` ( `todo_name`) VALUES (?) ";
    $sql = $pdo->prepare($query);
    $sql->execute([$todo_name]);
    return $sql->rowCount() > 0 ? true : false;
}

function getTodo(){
    global $pdo;

    $query = "SELECT * FROM `todo`";
    $sql = $pdo->prepare($query);
    $sql->execute();
    return $sql->fetchAll(); 
}

function deleteTodo($id){
    global $pdo;

    $query = "DELETE FROM `todo` WHERE id = ? ";
    $sql = $pdo->prepare($query);
    $sql->execute([$id]);
    return $sql->rowCount() > 0 ? true : false;
}