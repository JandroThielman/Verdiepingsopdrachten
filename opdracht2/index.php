<?php

    $user = $_SERVER['HTTP_USER_AGENT'];

    echo $user;
    echo '<br>';

    function browser($user){
        if( preg_match('/MSIE (\d+\.\d+);/', $user) ) {
            echo "Internet Browser: Internet Explorer";
        } else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $user) ) {
            echo "Internet Browser: Chrome";
        } else if (preg_match('/Edge\/\d+/', $user) ) {
            echo "Internet Browser: Edge";
        } else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $user) ) {
            echo "Internet Browser: Firefox";
        } else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $user) ) {
            echo "Internet Browser: Opera";
        } else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $user) ) {
            echo "Internet Browser: Safari";
        }
    }

    function OS($user) {
    
        if (preg_match('/win/i', $user)) {
            if (preg_match('/NT 10.0/i', $user)) {
                echo 'Besturings Systeem: Windows 10';
            } elseif (preg_match('/NT 6.3/i', $user)) {
                echo 'Besturings Systeem: Windows 8.1';
            } elseif (preg_match('/NT 6.2/i', $user)) {
                echo 'Besturings Systeem: Windows 8';
            } elseif (preg_match('/NT 6.1/i', $user)) {
                echo 'Besturings Systeem: Windows 7';
            }
          }
    
    }

    browser($user);
    echo '<br>';
    OS($user);

?>