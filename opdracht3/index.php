<?php

try {

    $connect = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
    $query = $connect->prepare("SELECT * FROM computertraffic;");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    die("Error!: " . $e->getMessage());

}

echo $_SERVER['HTTP_USER_AGENT'];
echo '<br>';

function browser(){

    $connect = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");

    if (preg_match('/MSIE (\d+\.\d+);/', $_SERVER['HTTP_USER_AGENT'])) {

        $query = $connect->prepare("SELECT os FROM computertraffic WHERE id = 3");
        $query->execute();
        $result = $query->fetchColumn();

        $volgende = $result + 1;

        $query = $connect->prepare('UPDATE computertraffic SET os = (?) WHERE id = 3;');
        $query->execute([$volgende]);

    } else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $_SERVER['HTTP_USER_AGENT'])) {

        $query = $connect->prepare("SELECT os FROM computertraffic WHERE id = 1");
        $query->execute();
        $result = $query->fetchColumn();

        $volgende = $result + 1;

        $query = $connect->prepare('UPDATE computertraffic SET os = (?) WHERE id = 1;');
        $query->execute([$volgende]);

    } else if (preg_match('/Edge\/\d+/', $_SERVER['HTTP_USER_AGENT'])) {

        $query = $connect->prepare("SELECT os FROM computertraffic WHERE id = 6");
        $query->execute();
        $result = $query->fetchColumn();

        $volgende = $result + 1;

        $query = $connect->prepare('INSERT INTO computertraffic (os) VALUES (?)');
        $query->execute([$volgende]);

    } else if (preg_match('/Firefox[\/\s](\d+\.\d+)/', $_SERVER['HTTP_USER_AGENT'])) {

        $query = $connect->prepare("UPDATE computertraffic SET os = (?) WHERE id = 6");
        $query->execute();
        $result = $query->fetchColumn();

        $volgende = $result + 1;

        $query = $connect->prepare('INSERT INTO computertraffic (os) VALUES (?)');
        $query->execute([$volgende]);

    } else if (preg_match('/OPR[\/\s](\d+\.\d+)/', $_SERVER['HTTP_USER_AGENT'])) {

        $query = $connect->prepare("SELECT os FROM computertraffic WHERE id = 4");
        $query->execute();
        $result = $query->fetchColumn();

        $volgende = $result + 1;

        $query = $connect->prepare('UPDATE computertraffic SET os = (?) WHERE id = 4');
        $query->execute([$volgende]);

    } else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $_SERVER['HTTP_USER_AGENT'])) {

        $query = $connect->prepare("SELECT os FROM computertraffic WHERE id = 5");
        $query->execute();
        $result = $query->fetchColumn();

        $volgende = $result + 1;

        $query = $connect->prepare('UPDATE computertraffic SET os = (?) WHERE id = 5');
        $query->execute([$volgende]);

    }
}

browser();

echo "<table border='2px'>";
echo "  <tr>
                <th>Webbrowser</th>
                <th>Bezoeken</th>
            </tr>";

foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['browser'] . "</td>";
    echo "<td>" . $row['os'] . "</td>";
    echo "</tr>";
}

echo "</table>";
