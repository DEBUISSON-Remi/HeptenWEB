@extends('layouts.app')

@section('title','demande transport')

@section('content')
    <h1 align="center">demande transport</h1>
<?php

$idClient = $_GET["id"];

$curl = curl_init('http://127.0.0.1:8001/api/demande');
curl_setopt_array($curl, [
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 2
]);
$data = curl_exec($curl);
$dataTable = json_decode($data, true);
$long = count($dataTable)-1;
?>

    <table class='table'>
    <tr>
    <th>id demande"."</th>
    <th>numéro de client</th>
    <th>numéro de devis</th>
    <th>ville de départ</th>
    <th>ville d'arrivée</th>
    <th>distance</th>
    <th>duree</th>
    <th>poids</th>
    <th>date de la demande</th>
    <th>date limite </th>
    <th>Chiffre d'affaire</th>"."</tr>
<?php
for ($i = 0; $i <= $long; $i++){
    if ($dataTable[$i]['client_id'] == $idClient){
        echo "<tr>";
        echo "<td>".$dataTable[$i]['id']."</td>";
        echo "<td>".$dataTable[$i]['client_id']."</td>";
        echo "<td>"."<a href='devis/search?id=".$dataTable[$i]['devis_id']."'>".$dataTable[$i]['devis_id']."</td>";
        echo "<td>".$dataTable[$i]['villeDepart']."</td>";
        echo "<td>".$dataTable[$i]['villeArrivee']."</td>";
        echo "<td>".$dataTable[$i]['distance']."</td>";
        echo "<td>".$dataTable[$i]['duree']."</td>";
        echo "<td>".$dataTable[$i]['poids']."</td>";
        echo "<td>".$dataTable[$i]['dateDemande']."</td>";
        echo "<td>".$dataTable[$i]['dateLimite']."</td>";
        echo "<td>".$dataTable[$i]['CA']."</td>";
        echo "</tr>";
    }
}
echo "</table>";
curl_close($curl);
?>
@stop
