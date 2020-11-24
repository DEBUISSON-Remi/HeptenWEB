@extends('layouts.app')

@section('title','dossiers')

@section('content')

<?php

$curl = curl_init('http://127.0.0.1:8001/api/clients');
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
echo "<th>"."id"."</th>";
echo "<th>"."Raison Sociale"."</th>"."</tr>";

for ($i = 0; $i <= $long; $i++){
    echo "<tr>";
    echo "<td>".$dataTable[$i]['id']."</td>";
    echo "<td>"."<a href='client?id=".$dataTable[$i]['id']."'>".$dataTable[$i]['raisonSociale']."</a>"."</td>";
    echo "</tr>";
}

echo "</table>";
curl_close($curl);
?>
@stop
