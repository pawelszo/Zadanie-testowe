<?php
namespace App\helpers;


class logger{

    public function dodajLog($file, $func, $callback){
        
        $useFile = '../src/logs/ApiLogs.txt';
        $current = file_get_contents($useFile);
        $date = date('Y-m-d h:i:s');
        $current .= $date .' Plik: ' . $file . ' Funkcja: ' . $func . ' Odpowiedz: '.$callback ."\r\n";
        file_put_contents($useFile, $current);

    }

}
