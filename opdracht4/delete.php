<?php

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            echo "<script>alert('Leerling is Verwijderd')</script>";
            echo "<script> location.replace('Opdracht9.3.php');</script>";

        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cijfers";
        
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        
            $sql = "
                DELETE FROM cijfers
                WHERE id = :id";
            
            $stmt = $conn->prepare($sql);
            
            $stmt->execute(
                [
                    ':id'=>$_GET['id']
                ]);
            
        }

?>