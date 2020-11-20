
@extends('layouts.app')

@section('title',"chiffre d'affaire")

@section('content')
<?php
    $curl = curl_init('http://127.0.0.1:8001/api/demande');
    curl_setopt_array($curl, [
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 2
    ]);
    $data = curl_exec($curl);
    $dataTable = json_decode($data, true);
    $long = count($dataTable)-1;
echo " la liste des chiffres d'affaires par client pour la semaine en cours, pour le mois en cours";
echo "</br>";

for ($i = 0; $i <= $long; $i++){
        echo $dataTable[$i]['CA'] ."€ (chiffre d'affaire) - ";
        echo date('W',strtotime ($dataTable[$i]['dateDemande']))." (numéro de semaine)". "</br>";
}
    curl_close($curl);

echo "<br/>";


?>
@stop

