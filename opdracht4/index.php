<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rapport</title>
</head>
<body>

<form method="post">
    <div class="search-div">
        <input type="text" placeholder="Zoeken" class="Zoeken" name="zoekbar">
        <button type="submit" class="Search-button" name="search">
            <img class="Search" src="./Images/magnifying-glass-solid.svg">
        </button>
    </div>
    <br>
    <a href="insert.php">Insert een Leerling</a>
    <br><br>
</form>

    <?php

        try {
            
            $mode = 0;

            if(isset($_POST['search'])){
                $mode = 1;
                $zoek = $_POST['zoekbar'];
            }

            switch ($mode) {
                case '1':

                    $db = new PDO("mysql:host=localhost;dbname=cijfers", "root", "");
                    $query = $db->prepare("SELECT * FROM `cijfers` WHERE leerlingen = '$zoek';");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);

                    echo "<table>";

                        echo '<th>Leerling</th>';
                        echo '<th>Cijfer</th>';
                        echo '<th>Vak</th>';
                        echo '<th>Docent</th>';
                        echo '<th>Verwijderen</th>';

                        foreach ($result as &$data) {
                            echo "<tr>";
                                echo "<td>" . htmlspecialchars($data["leerlingen"]) . "</td>";
                                echo "<td>" . htmlspecialchars($data["cijfers"]) . "</td>";
                                echo "<td>" . htmlspecialchars($data["Vakken"]) . "</td>";
                                echo "<td>" . htmlspecialchars($data["Docenten"]) . "</td>";
                                echo '<td><a href="delete.php?id=' . $data['id'] . '">' . "Verwijder</a></td>";
                            echo "</tr>";
                        }
                    echo "</table>";
                break;
                
                default:

                    $db = new PDO("mysql:host=localhost;dbname=cijfers", "root", "");
                    $query = $db->prepare("SELECT * FROM cijfers");
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);

                    echo "<table>";

                        echo '<th onclick="sortTable(0)"><a class="sort">Leerling</a></th>';
                        echo '<th onclick="sortTable(1)"><a class="sort">Cijfer</a></th>';
                        echo '<th onclick="sortTable(2)"><a class="sort">Vak</a></th>';
                        echo '<th onclick="sortTable(3)"><a class="sort">Docent</a></th>';
                        echo '<th>Verwijderen</th>';

                        foreach ($result as &$data) {
                            echo "<tr>";
                                echo "<td>" . htmlspecialchars($data["leerlingen"]) . "</td>";
                                echo "<td>" . htmlspecialchars($data["cijfers"]) . "</td>";
                                echo "<td>" . htmlspecialchars($data["Vakken"]) . "</td>";
                                echo "<td>" . htmlspecialchars($data["Docenten"]) . "</td>";
                                echo '<td><a href="delete.php?id=' . $data['id'] . '">' . "Verwijder</a></td>";
                            echo "</tr>";
                        }
                    echo "</table>";

                    function gem(){
                        $db = new PDO("mysql:host=localhost;dbname=cijfers", "root", "");
                        $query = $db->prepare("SELECT ROUND(AVG(cijfers),1) AS cijfer FROM cijfers;");
                        $query->execute();
                        $result = $query->fetch(PDO::FETCH_ASSOC);

                        echo 'Het gemiddelde cijfer is een: ' . $result['cijfer'];
                        echo '<br>';
                    }

                    function hoogste(){
                        $db = new PDO("mysql:host=localhost;dbname=cijfers", "root", "");
                        $query = $db->prepare("SELECT MAX(cijfers) AS cijfer FROM cijfers");
                        $query->execute();
                        $result = $query->fetch(PDO::FETCH_ASSOC);

                        echo 'Het hoogste cijfer is een: ' . $result['cijfer'];
                        echo '<br>';
                    }

                    function laagste(){
                        $db = new PDO("mysql:host=localhost;dbname=cijfers", "root", "");
                        $query = $db->prepare("SELECT MIN(cijfers) AS cijfer FROM cijfers");
                        $query->execute();
                        $result = $query->fetch(PDO::FETCH_ASSOC);

                        echo 'Het laagste cijfer is een: ' . $result['cijfer'];
                    }

                    Gem();
                    hoogste();
                    laagste();

                break;

            }

        } catch (PDOException $e) {
            die ('Error!: ' . $e->getMessage());
        }

    ?>

<script src="JavaScript.js"></script>

</body>
</html>