<?php

function getUsers(){
    $query="Select * from users Order by name";
    try
    {
        global $db;
        $users = $db->query($query);
        $users = $users->fetchAll (PDO::FETCH_ASSOC);
        echo '{"users": '.json_encode($users).'}';
    } 
    catch (Exception $e) 
    {
        echo '("error":("text":'.$e->getMessage() .'))';
    }   
}

function getUserById($id) {
    $query="Select * from users Where user_id = '$id'";
    try
    {
        global $db;
        $users = $db->query($query);
        $user = $users->fetchAll (PDO::FETCH_ASSOC);
        echo json_encode($user);
    }
    catch (Exception $e) 
    {
        echo '("error":("text":'.$e->getMessage() .'))';
    }
}

function getUserByName($name) {
    $query="Select * from users Where UPPER(name) Like ".'"%'.$name.'%"'." Order By name";
    try
    {
        global $db;
        $users = $db->query($query);
        $user = $users->fetchAll (PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($user);
    }
    catch (Exception $e) 
    {
        echo '("error":("text":'.$e->getMessage() .'))';
    }
}

function addUser() {
    global $app;
    $request=$app->request();
    $user= json_decode($request->getBody());
    $username=$user->user_name;
    $password=$user->user_password;
    $name=$user->name;
    $photo=$user->photo;
    $query = "Insert into users(user_name, user_password, name, photo) values ('$username', '$password', '$name', '$photo')";
    try 
    {
        global $db;
        $users = $db->exec($query);
        $user->user_id = $db->lastInsertId();
        echo json_encode($user);
    } 
    catch (Exception $e) 
    {
        echo '("error":("text":'.$e->getMessage() .'))';
    }
}

function updateUser($id) {
    global $app;
    $request=$app->request();
    $user= json_decode($request->getBody());
    $username=$user->user_name;
    $password=$user->user_password;
    $name=$user->name;
    $query = "Update users set user_name='$username', user_password='$password', name='$name' Where id=$id";
    try{
        global $db;
        $db->exec($query);
        echo json_encode($user);
    } 
    catch (Exception $e) 
    {
        echo '("error":("text":'.$e->getMessage() .'))';
    }
}

function deleteUser($id) {
    echo $id;
    $query = "Delete from users Where user_id=$id";
    try {
        global $db;
        $db->exec($query);
    } catch (Exception $e) {
        echo '("error":("text":'.$e->getMessage() .'))';
    }
}
?>
