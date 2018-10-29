
        <?php
        $dsn = 'mysql:host=localhost;dbname=worldbeers';
        $username = 'root';
        $password = 'admin';
        
        try{
            $db = new PDO($dsn, $username, $password);
            //echo "You have successfully connected to the database";
        }
        catch (PDOException $e){
            $error_message = $e->getMessage();
            include ('database_error.php');
            exit();
        }
        
        ?>

