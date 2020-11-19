@extends('layouts.app')

@section('title','devis')

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
    $long = count($dataTable)-1;
    for ($i = 0; $i <= $long; $i++){
        if ($dataTable[$i]['etatDevis'] == "1") {
            $devisAttente ++;
        }
    }

    echo $devisAttente;

    curl_close($curl);
    echo " nombre de demande en attente d'être traitée pour un devis";



    echo"<br/>";


    $curl = curl_init('http://127.0.0.1:8001/api/devis');
    curl_setopt_array($curl, [
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 2
    ]);
    $data = curl_exec($curl);
    $dataTable = json_decode($data, true);
    $devisAttente= 0;
    $long = count($dataTable)-1;
    for ($i = 0; $i <= $long; $i++){
        if ($dataTable[$i]['valide'] == "") {
            $devisAttente = $devisAttente + 1;
        }
    }

    echo $devisAttente;

    curl_close($curl);
echo " le nombre de devis en attente d'être accepté par les clients";


    echo "<br/>";

    $curl = curl_init('http://127.0.0.1:8001/api/devis');
    curl_setopt_array($curl, [
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 2
    ]);
    $data = curl_exec($curl);
    $dataTable = json_decode($data, true);
    $devisAttente= 0;
    $long = count($dataTable)-1;
    for ($i = 0; $i <= $long; $i++){
        if ($dataTable[$i]['valide'] == "0") {
            $devisAttente = $devisAttente + 1;
        }
    }

    echo $devisAttente;

    curl_close($curl);
echo " le nombre de devis refusés ou abandonnés";


    echo "<br/>";


    $curl = curl_init('http://127.0.0.1:8001/api/devis');
    curl_setopt_array($curl, [
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 2
    ]);
    $data = curl_exec($curl);
    $dataTable = json_decode($data, true);
    $countNonTraitee= 0;
    $countTraite = 0;
    $long = count($dataTable)-1;
    for ($i = 0; $i <= $long; $i++){

        if (strtotime( $dataTable[$i]['dateArriveePrevue'] )>=strtotime(date('d m Y'))){
            if ($dataTable[$i]['valide'] == "1"){
                $countTraite ++;
            }
        }else {
            if ($dataTable[$i]['valide'] == "1"){
                $countNonTraitee++;
                }
        }

    }

    echo $countNonTraitee . " le nombre de devis acceptés mais non-traités par le responsable logistique de son agence";
    echo "<br/>";
    echo $countTraite ." le nombre de devis acceptés et traités par le responsable logistique de son agence";

    ?>
@endsection
