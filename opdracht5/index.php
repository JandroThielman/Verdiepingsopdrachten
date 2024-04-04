<?php

    echo "
        <style>
            table, th, td {
                border: 3px solid black;
                border-collapse: collapse;
            }

            td{
                colspan: 2;
            }

        </style>
    ";

    $db = new PDO("mysql:host=localhost;dbname=poll_data", "root", "");
    $optie = $db->prepare("SELECT * FROM optie");
    $optie->execute();
    $poll = $db->prepare("SELECT *, SUM(votes) AS total_votes FROM poll WHERE question_id IN (1, 2) GROUP BY question_id;");
    $poll->execute();
    $result1 = $optie->fetch(PDO::FETCH_ASSOC);
    $result2 = $poll->fetch(PDO::FETCH_ASSOC);

    function procent($choice){

        $db = new PDO("mysql:host=localhost;dbname=poll_data", "root", "");
        $poll = $db->prepare("SELECT * FROM poll WHERE choice = :choice");
        $poll->bindParam(':choice', $choice);
        $poll->execute();
        $result3 = $poll->fetch(PDO::FETCH_ASSOC);

        global $result2;
        $formule = 100/$result2['total_votes'];
        $formule_klaar = round($formule * $result3['votes'], 0);

        echo "<td>" . $formule_klaar . " %</td>";
    }

    function votes($choice){

        $db = new PDO("mysql:host=localhost;dbname=poll_data", "root", "");
        $poll = $db->prepare("SELECT * FROM poll WHERE choice = :choice");
        $poll->bindParam(':choice', $choice);
        $poll->execute();
        $result3 = $poll->fetch(PDO::FETCH_ASSOC);

        echo "<td>" . $result3['votes'] . "</td>";
    }

    echo "<table border='2px' border-style='dashed'>";

    global $result3;

        echo "<tr>";
            echo '<th>Stelling van de maand: "' . $result1['vraag'] . '"</th>';
        echo "</tr>";

        echo "<tr>";
            echo '<td>Aantal uitgebrachte stemmen: "' . $result2['total_votes'] . '"</td>';
        echo "</tr>";

        echo "<tr>";
            echo "<td>" . $result1['antwoord1'] . "</td>";
            echo votes(1);
            echo procent(1);
        echo "</tr>";

        echo "<tr>";
            echo "<td>" . $result1['antwoord2'] . "</td>";
            echo votes(2);
            echo procent(2);
        echo "</tr>";

        echo "<tr>";
            echo "<td>" . $result1['antwoord3'] . "</td>";
            echo votes(3);
            echo procent(3);
        echo "</tr>";

        echo "<tr>";
            echo "<td>" . $result1['antwoord4'] . "</td>";
            echo votes(4);
            echo procent(4);
        echo "</tr>";

    echo "</table>";

?>