<?php

include("db.php");

function createTask($task){
    global $conn;

    $stmt = $conn->prepare("INSERT INTO todos (task) VALUES (?) ");
    $stmt->bind_param("s", $task);
    $stmt->execute(); 
    $stmt->close();
}

function getTasks() {
    global $conn;
    $result = $conn->query("SELECT id, task, completed FROM todos"); 
    $tasks = [];

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $tasks[] = $row;
        }
    }
    return $tasks;
}

function markTaskAsCompleted($id){
    global $conn;
    $stmt = $conn->prepare('UPDATE todos SET completed = 1 WHERE id=?'); 
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
