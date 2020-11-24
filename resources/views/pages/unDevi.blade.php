@extends('layouts.app')

@section('title','devis correspondant ')

@section('content')
    <h1 align="center">devis correspondant</h1>

    <?php

$idDevis = $_GET["id"];


$curl = curl_init('http://127.0.0.1:8001/api/devis');
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
echo "<th>"."identifiant du devis "."</th>";
echo "<th>"."identifiant du transport"."</th>";
echo "<th>"."ville de départ"."</th>";
echo "<th>"."ville d'arrivée"."</th>";
echo "<th>"."distance"."</th>";
echo "<th>"."duree"."</th>";
echo "<th>"."état du devis"."</th>"."</tr>";

for ($i = 0; $i <= $long; $i++){
    if ($dataTable[$i]['id'] == $idDevis){
        echo "<tr>";
        echo "<td>".$dataTable[$i]['id']."</td>";
        echo "<td>"."<a href='/demande/search?id=".$dataTable[$i]['demandeTransport_id']."'>".$dataTable[$i]['demandeTransport_id']."</td>";
        echo "<td>".$dataTable[$i]['montant']."</td>";
        echo "<td>".$dataTable[$i]['dateEnvoi']."</td>";
        echo "<td>".$dataTable[$i]['dateArriveePrevue']."</td>";
        echo "<td>".$dataTable[$i]['valide']."</td>";
        echo "<td>".$dataTable[$i]['etatDevis']."</td>";
        echo "</tr>";
    }
}
echo "</table>";
curl_close($curl);
?>
@stop
