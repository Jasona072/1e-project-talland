<?php
function gooiDobbelsteen() {
    return rand(1, 6);
}

echo "Welkom bij Craps!\n";
echo "Druk op Enter om te beginnen of typ 'stop' om te stoppen.\n";

while (true) {
    $input = trim(fgets(STDIN));
    if ($input === 'stop') {
        echo "Spel gestopt.\n";
        break;
    }

    $d1 = gooiDobbelsteen();
    $d2 = gooiDobbelsteen();
    $totaal = $d1 + $d2;
    echo "Je gooide $d1 en $d2 (totaal $totaal)\n";

    if ($totaal == 7 || $totaal == 11) {
        echo "Je wint meteen!\n\n";
    } elseif ($totaal == 2 || $totaal == 3 || $totaal == 12) {
        echo "Je verliest meteen.\n\n";
    } else {
        $punt = $totaal;
        echo "Je punt is nu $punt. Blijf gooien tot je $punt of 7 gooit.\n\n";

        while (true) {
            echo "Druk op Enter om opnieuw te gooien of typ 'stop' om te stoppen: ";
            $input = trim(fgets(STDIN));
            if ($input === 'stop') {
                echo "Spel gestopt.\n";
                exit;
            }

            $d1 = gooiDobbelsteen();
            $d2 = gooiDobbelsteen();
            $totaal = $d1 + $d2;
            echo "Je gooide $d1 en $d2 (totaal $totaal)\n";

            if ($totaal == $punt) {
                echo "Je hebt je punt ($punt) opnieuw gegooid. Je wint!\n\n";
                break;
            } elseif ($totaal == 7) {
                echo "Je gooide 7. Je verliest.\n\n";
                break;
            } else {
                echo "Nog geen winst of verlies. Gooi opnieuw.\n\n";
            }
        }
    }

    echo "Druk op Enter om een nieuw spel te starten of typ 'stop' om te stoppen.\n";
}
?>

