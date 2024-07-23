
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

            
            /*print_r($DaneGotowe);
           /* echo $stacja, "\t\t", $data, "\t\t", $DanePHP['predkosc_wiatru'],"\t\t", $DanePHP['temperatura']."<sup>o</sup>C", "<br>" ;
           */
            
            echo '
            <tr>
            <td>',$stacja_id.$data,'</td>
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