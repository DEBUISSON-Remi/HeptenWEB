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
    $long = count($dataTable);
    $compt = 0;
    while ( $compt < $long){
        echo $dataTable['valide'];
    }

    curl_close($curl);

?>
@endsection
