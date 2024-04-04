<?php

    $n = 10;

    function RandomWachtwoord($n){

        $letters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randstring = '';

        for ($i=0; $i < $n; $i++) { 
            $index = rand(0, strlen($letters) - 1);
            $randstring .= $letters[$index];
        }

        return $randstring;

    }

    echo "Willekeurig wachtwoord van 10 tekens: " . RandomWachtwoord($n);

?>