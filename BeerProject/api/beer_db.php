<?php

function getBeers(){
    $query="Select * from beers Order by name";
    try
    {
        global $db;
        $beers = $db->query($query);
        $beers = $beers->fetchAll (PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo '{"beers": '.json_encode($beers).'}';
    } 
    catch (Exception $e) 
    {
        echo '("error":("text":'.$e->getMessage() .'))';
    }   
}

function getBeerById($id) {
    $query="Select * from beers Where beer_id = '$id'";
    try
    {
        global $db;
        $beers = $db->query($query);
        $beer = $beers->fetchAll (PDO::FETCH_ASSOC);
        echo json_encode($beer);
    }
    catch (Exception $e) 
    {
        echo '("error":("text":'.$e->getMessage() .'))';
    }
}

function getBeerByName($name) {
    $query="Select * from beers Where UPPER(name) Like ".'"%'.$name.'%"'." Order By name";
    try
    {
        global $db;
        $beers = $db->query($query);
        $beer = $beers->fetchAll (PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($beer);
    }
    catch (Exception $e) 
    {
        echo '("error":("text":'.$e->getMessage() .'))';
    }
}

function addBeer() {
    global $app;
    $request=$app->request();
    $beer= json_decode($request->getBody());
    $name=$beer->name;
    $country=$beer->country;
    $type=$beer->type;
    $description=$beer->description;
    $price=$beer->price;
    $query = "Insert into beers(name, country, type, description, price) values ('$name', '$country', '$type', '$description', '$price')";
    try 
    {
        global $db;
        $beers = $db->exec($query);
        $beer->beer_id = $db->lastInsertId();
        echo json_encode($beer);
    } 
    catch (Exception $e) 
    {
        echo '("error":("text":'.$e->getMessage() .'))';
    }
    
}

function updateBeer($id) {
    global $app;
    $request=$app->request();
    $beer= json_decode($request->getBody());
    $name=$beer->name;
    $country=$beer->country;
    $type=$beer->type;
    $description=$beer->description;
    $price=$beer->price;
    $query="Update beers set name='$name', country='$country', type='$type', description='$description', price='$price' Where beer_id=$id";
    try{
        global $db;
        $db->exec($query);
        echo json_encode($beer);
    } 
    catch (Exception $e) 
    {
        echo '("error":("text":'.$e->getMessage() .'))';
    }
}

function deleteBeer($id) {
    echo $id;
    $query = "Delete from beers Where beer_id=$id";
    try {
        global $db;
        $db->exec($query);
    } catch (Exception $e) {
        echo '("error":("text":'.$e->getMessage() .'))';
    }
}
?>

