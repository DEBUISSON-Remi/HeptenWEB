
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
    ?>
    <h4 align='center'>La liste des chiffres d'affaires par client pour la semaine en cours, pour le mois en cours :</h4>
    <br/><br/>
    <table border='1' cellpadding='10' width='100%'><tr>
    <th width='20%'>Client</th>
    <th width='20%'>Chiffre d'Affaire</th>
    <th width='20%'>Semaine</th>
    <th width='20%'>Mois</th>
    </tr>
        <?php
    for($i = 0; $i <= $long; $i++){
        echo "<tr>";
        echo "<td>".$dataTable[$i]['client_id']."</td>";
        echo "<td>".$dataTable[$i]['CA']."</td>";
        echo "<td>".date('W', strtotime($dataTable[$i]['dateDemande']))."</td>";
        echo "<td>".date('M', strtotime($dataTable[$i]['dateDemande']))."</td>";
        echo "</tr>";
    }
    echo "</table>";
    curl_close($curl);
    echo "<br/>";
    ?>
@stop

