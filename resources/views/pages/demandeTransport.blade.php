@extends('layouts.app')

@section('title','trajet')

@section('content')
    <h1 align="center">Trajet</h1>
<?php

$idDevis = $_GET["id"];

$curl = curl_init('http://127.0.0.1:8001/api/trajet');
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
echo "<th>"."identifiant du véhicule"."</th>";
echo "<th>"."identifiant du conducteur"."</th>";
echo "<th>"."date de départ"."</th>";
echo "<th>"."date d'arrivée prévue"."</th>"."</tr>";

for ($i = 0; $i <= $long; $i++){
    if ($dataTable[$i]['devis_id'] == $idDevis){
        echo "<tr>";
        echo "<td>".$dataTable[$i]['vehicule_id']."</td>";
        echo "<td>".$dataTable[$i]['conducteur_id']."</td>";
        echo "<td>".$dataTable[$i]['dateDepart']."</td>";
        echo "<td>".$dataTable[$i]['dateArrivee']."</td>";
        echo "</tr>";
    }
}
echo "</table>";
curl_close($curl);
?>
@stop
