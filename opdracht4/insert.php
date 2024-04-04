<?php
//auteur : jandro

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<script>alert('Leerling is Toegevoegd')</script>";
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

    $sql = "INSERT INTO cijfers (leerlingen, cijfers, Vakken, Docenten) VALUES (:leerlingen, :cijfers, :Vakken, :Docenten);";
    
    $query = $conn->prepare($sql);
    
    $status = $query->execute(
        [
            ':leerlingen' => $_POST['leerlingen'],
            ':cijfers' => $_POST['cijfers'],
            ':Vakken' => $_POST['Vakken'],
            ':Docenten' => $_POST['Docenten']
        ]
    );

    if ($status) {
        echo 'toegevoegd';
    } else {
        echo 'fail: ' . implode(" ", $query->errorInfo());
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leerlingen Invoegen Formulier</title>
</head>
<body>

<h2>Voeg een nieuwe Leerling toe</h2>

<form action="" method="post">
  <label for="leerlingen">leerling:</label>
  <input type="text" id="leerlingen" name="leerlingen" required><br>

  <label for="cijfers">Cijfer:</label>
  <input type="number" id="cijfers" name="cijfers" required><br>

  <label for="Vakken">Vak:</label>
  <input type="text" id="Vakken" name="Vakken" required><br>

  <label for="Docenten">Docent:</label>
  <input type="text" id="Docenten" name="Docenten" required><br>

  <input type="submit" value="Voeg toe">
</form>

</body>
</html>
