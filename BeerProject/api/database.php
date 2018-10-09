<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $dsn = 'mysql:host=localhost;dbname=worldbeers';
        $username = 'root';
        $password = 'admin';
        
        try{
            $db = new PDO($dsn, $username, $password);
            echo "You have successfully connected to the database";
        }
        catch (PDOException $e){
            $error_message = $e->getMessage();
            include ('database_error.php');
            exit();
        }
        
        ?>
    </body>
</html>
