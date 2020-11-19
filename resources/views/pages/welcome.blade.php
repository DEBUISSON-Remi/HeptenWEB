@extends('layouts.app')

@section('title','accueil')


@section('content')
<?php
    $curl = curl_init('http://127.0.0.1:8001/api/devis');
    curl_setopt_array($curl, [
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 2
    ]);
    $data = curl_exec($curl);
    $dataTable = json_decode($data, true);
    $devisAttente= 0;
    $long = count($dataTable)/2;
    for ($i = 0; $i <= $long; $i++){
        if ($dataTable[$i]['valide'] == "") {
            $devisAttente = $devisAttente + 1;
        }
    }

    echo $devisAttente;

    curl_close($curl);

?>
@endsection
