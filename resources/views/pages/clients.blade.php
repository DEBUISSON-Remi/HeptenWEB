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
echo "<table class='table'>";

echo "<tr>";
echo "<th>"."id demande"."</th>";
echo "<th>"."numéro de client"."</th>";
echo "<th>"."numéro de devis"."</th>";
echo "<th>"."ville de départ"."</th>";
echo "<th>"."ville d'arrivée"."</th>";
echo "<th>"."distance"."</th>";
echo "<th>"."duree"."</th>";
echo "<th>"."poids"."</th>";
echo "<th>"."date de la demande"."</th>";
echo "<th>"."date limite "."</th>";
echo "<th>"."Chiffre d'affaire"."</th>"."</tr>";

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
