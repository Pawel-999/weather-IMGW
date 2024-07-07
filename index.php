<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="./css/style.css" type="text/css"/>
    <title>Aktualna pogoda w Polsce</title>
</head>

<body>

<?php
    echo "Aktualna pogoda w Polsce <br />";
    $dataJSON = file_get_contents("https://danepubliczne.imgw.pl/api/data/synop/", true);
    $DaneGotowe = json_decode($dataJSON, true);
    echo '
    <table>
    <th>Miasto</th>
    <th>Data / godz.</th>
    <th>Temp</th>
    <th>Siła wiatru</th>
    <th>Kier. wiatru</th>
    <th>Wilgotność</th>
    <th>Suma opad.</th>
    <th>Ciśnienie</th>
    '
        
    ;
    foreach ($DaneGotowe as $DanePHP)
        {
            $stacja_id = $DanePHP['id_stacji'];
            $stacja = $DanePHP['stacja'];
            $data = strtotime($DanePHP['data_pomiaru']);
            $godzina = $DanePHP['godzina_pomiaru'];
            $temperatura = $DanePHP['temperatura'];
            $wiatr = $DanePHP['predkosc_wiatru'];
            $wiatr_dir = $DanePHP['kierunek_wiatru'];
            $wilgotnosc = $DanePHP['wilgotnosc_wzgledna'];
            $opad = $DanePHP['suma_opadu'];
            $qnh = $DanePHP['cisnienie'];

            
            /*print_r($DaneGotowe);*/
           /* echo $stacja, "\t\t", $data, "\t\t", $DanePHP['predkosc_wiatru'],"\t\t", $DanePHP['temperatura']."<sup>o</sup>C", "<br>" ;
           */
            
            echo '
            <tr>
            <td><b>', $stacja, '</b></td>
            <td>', date("d-m-Y"),' /',$godzina,'<sup><u>00</u></sup></td>
            <td>', $temperatura, ' <sup><u>o</u></sup>C</td>
            <td>', $wiatr,' <sup>m</sup>/<sub>s</sub></td>
            <td>', $wiatr_dir,' <sup><u>o</u></sup></td>
            <td>', $wilgotnosc,' %</td>
            <td>', $opad,' mm</td>
            <td>', $qnh,', HPa</td>
            </tr>';
               
        }        
        echo '</table>';
        echo '<hr>';
       echo 'Dane IMGW z dnia: '.date('d-m-Y', $data);
       
        
    
    
    /* foreach($DaneGotowe[0] as $key => $value);
    echo $value;

    print_r ($DaneGotowe[1]);
    */
?>
    
</body>
</html>