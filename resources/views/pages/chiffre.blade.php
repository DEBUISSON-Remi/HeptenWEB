
@extends('layouts.app')

@section('title',"chiffre d'affaire")

@section('content')

    <script>

        function displayCanvas(canvasId){
            canvas1 = document.getElementById("1");
            canvas2 = document.getElementById("2");
            canvas3 = document.getElementById("3");

            if(canvasId === 1){
                canvas1.style.display = "block";
                canvas2.style.display = "none";
                canvas3.style.display = "none";
            }
            else if(canvasId === 2){
                canvas1.style.display = "none";
                canvas2.style.display = "block";
                canvas3.style.display = "none";
            }
            else{
                canvas1.style.display = "none";
                canvas2.style.display = "none";
                canvas3.style.display = "block";
            }

        }
    </script>
    <script>
        let myChart = document.getElementById('1').getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let massPopChart = new Chart(myChart, {
            type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
                labels:['    '],
                datasets:[{
                    label:'Montant total genere par le consultant',
                    data:[
                        ArgentGenere
                    ],
                    //backgroundColor:'green',
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{
                title:{
                    display:true,

                    fontSize:25
                },

                tooltips:{
                    enabled:true
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMin: 0
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        let myChart2 = document.getElementById('3').getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let massPopChart2 = new Chart(myChart2, {
            type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
                labels:['Biens en cours de vente', 'Dossiers en cours', 'Dossiers complets', 'Dossiers complets archives', 'Biens abandonnes et erchives'],
                datasets:[{

                    data:[
                        BiensEnCoursDeVente,
                        DossierEnCours,
                        DossierComplet,
                        dossierArchive,
                        BiensAbandonnes,

                    ],
                    //backgroundColor:'green',
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{
                title:{
                    display:true,

                    fontSize:25
                },
                legend:{
                    display:true,
                    position:'right',
                    labels:{
                        fontColor:'#000'
                    }
                },
                layout:{
                    padding:{
                        left:0,
                        right:0,
                        bottom:0,
                        top:0
                    }
                },
                tooltips:{
                    enabled:true
                }
            }
        });
    </script>
    <script>
        nbMax=parseInt(nbBiensVendus)+1;
        let myChart3 = document.getElementById('2').getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let massPopChart3 = new Chart(myChart3, {
            type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
                labels:['    '],
                datasets:[{
                    label:'Nombres de biens vendu par le consultant',
                    data:[
                        nbBiensVendus
                    ],
                    //backgroundColor:'green',
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: nbMax,
                            stepSize: 1
                        }
                    }]
                }
            }
        });

    </script>
    </html>

@stop
