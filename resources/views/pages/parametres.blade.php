@extends('layouts.app')

@section('title','paramètres')


@section('content')
    <h1 align="center">Paramètres</h1>
    entrez la durée de validité par défaut d'un devis : <input type="text" />


    <br/>

    A quelle format voulez vous exporter le fichier
    <input type="radio" name="export" value="pdf" id="pdf" checked="checked" /> <label for="pdf">PDF</label>
    <input type="radio" name="export" value="impression" id="impression" /> <label for="impression">Impression</label>
    <br/>

@endsection
