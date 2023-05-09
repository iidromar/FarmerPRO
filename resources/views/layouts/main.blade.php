<!DOCTYPE html>
<html dir="rtl">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="{{URL::asset('https://www.googletagmanager.com/gtag/js?id=UA-90680653-2')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-90680653-2');
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>منظمة الأغذية والزراعة للأمم المتحدة</title>

    <!-- vendor css -->
    <link href="{{URL::asset('../lib/fontawesome-free/css/all.rtl.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('../lib/ionicons/css/ionicons.rtl.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('../lib/typicons.font/typicons.rtl.css')}}" rel="stylesheet">
    <link href="{{URL::asset('../lib/flag-icon-css/css/flag-icon.rtl.min.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset('assets/fao-logo-circule.png')}}" />

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">


    <link rel="preconnect" href="{{URL::asset('https://fonts.googleapis.com')}}">
    <link rel="preconnect" href="{{URL::asset('https://fonts.gstatic.com')}}" crossorigin>
    <link href="{{URL::asset('https://fonts.googleapis.com/css2?family=Cairo&display=swap')}}" rel="stylesheet">


</head>
<body>

<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="{{ route('dashboard') }}" class="az-logo"><img style="height: 11vh; width: 14vw;" src="{{URL::asset('img/fao_logo.png')}}"></a>
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="{{ route('dashboard') }}" class="az-logo"><img style="height: 11vh; width: 14vw;" src="{{URL::asset('img/fao_logo.png')}}"></a>
                <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
            <ul class="nav">
               @yield('nav_content')
            </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header -->

@yield('content')


<div class="az-footer ht-40">
    <div class="container ht-100p pd-t-0-f">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">© جميع الحقوق محفوظة لمنظمة الأغذية والزراعة التابعة للأمم المتحدة</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">  <a href="https://www.fao.org/home/ar" target="_blank">الموقع الرسمي</a></span>
    </div><!-- container -->
</div><!-- az-footer -->

<script>
    $(document).ready(function(){
        $("td").click(function(event){
            var farmer_id = event.target.id;
            $('#farmer_switcher').val(farmer_id);
            $('#form_switcher').submit();
        });
    });
</script>


<script src="{{URL::asset('../lib/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('../lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('../lib/ionicons/ionicons.js')}}"></script>
<script src="{{URL::asset('../lib/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('../lib/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('../lib/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{URL::asset('../lib/peity/jquery.peity.min.js')}}"></script>


<script src="{{URL::asset('../js/azia.js')}}"></script>
<script src="{{URL::asset('../js/chart.flot.sampledata.js')}}"></script>
<script src="{{URL::asset('../js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('../js/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('../js/chart.chartjs.js')}}"></script>
<script src="{{URL::asset('../js/jquery.cookie.js')}}" type="text/javascript"></script>
<script>
    $(function(){
        'use strict'

        var plot = $.plot('#flotChart', [{
            data: flotSampleData3,
            color: '#007bff',
            lines: {
                fillColor: { colors: [{ opacity: 0 }, { opacity: 0.2 }]}
            }
        },{
            data: flotSampleData4,
            color: '#560bd0',
            lines: {
                fillColor: { colors: [{ opacity: 0 }, { opacity: 0.2 }]}
            }
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 8
            },
            yaxis: {
                show: true,
                min: 0,
                max: 100,
                ticks: [[0,'30'],[20,'40'],[40,'50'],[60,'60'],[80,'70']],
                tickColor: '#eee'
            },
            xaxis: {
                show: true,
                color: '#fff',
                ticks: [[30,'2'],[60,'4'],[90,'6'],[120,'8']],
            }
        });

        $.plot('#flotChart1', [{
            data: dashData2,
            color: '#00cccc'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: { colors: [ { opacity: 0.2 }, { opacity: 0.2 } ] }
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 35
            },
            xaxis: {
                show: false,
                max: 50
            }
        });

        $.plot('#flotChart2', [{
            data: dashData2,
            color: '#007bff'
        }], {
            series: {
                shadowSize: 0,
                bars: {
                    show: true,
                    lineWidth: 0,
                    fill: 1,
                    barWidth: .5
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 35
            },
            xaxis: {
                show: false,
                max: 20
            }
        });


        //-------------------------------------------------------------//


        // Line chart
        $('.peity-line').peity('line');

        // Bar charts
        $('.peity-bar').peity('bar');

        // Bar charts
        $('.peity-donut').peity('donut');

        var ctx5 = document.getElementById('chartBar5').getContext('2d');
        new Chart(ctx5, {
            type: 'bar',
            data: {
                labels: [0,1,2,3,4,5,6,7],
                datasets: [{
                    data: [2, 4, 10, 20, 45, 40, 35, 18],
                    backgroundColor: '#560bd0'
                }, {
                    data: [3, 6, 15, 35, 50, 45, 35, 25],
                    backgroundColor: '#cad0e8'
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    enabled: false
                },
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        display: false,
                        ticks: {
                            beginAtZero:true,
                            fontSize: 11,
                            max: 80
                        }
                    }],
                    xAxes: [{
                        barPercentage: 0.6,
                        gridLines: {
                            color: 'rgba(0,0,0,0.08)'
                        },
                        ticks: {
                            beginAtZero:true,
                            fontSize: 11,
                            display: false
                        }
                    }]
                }
            }
        });


        // Donut Chart
        var datapie = {
            labels: ['الضأن', 'عدد النعاج - الحلوب', 'عدد النعاج - الحوامل ', 'عدد النعاج - الجافة (غير حامل)', 'عدد الفحول (الكباش)'],
            datasets: [{
                data: [{{ ($route != '/') ? ((($farmer->total_lamb) == null) || (($farmer->total_lamb) == '-') || (($farmer->total_lamb) == '_')  ? '0' : $farmer->total_lamb) : $total_lambs }},
                    {{ ($route != '/') ?  ((($farmer->ewes_milking) == null) || (($farmer->ewes_milking) == '-') || (($farmer->ewes_milking) == '_')  ? '0' : $farmer->ewes_milking) : $total_ewes_milking }},
                    {{ ($route != '/') ?  ((($farmer->ewes_pregnant) == null) || (($farmer->ewes_pregnant) == '-') || (($farmer->ewes_pregnant) == '_')  ? '0' : $farmer->ewes_pregnant) : $total_ewes_pregnant }},
                    {{ ($route != '/') ?  ((($farmer->ewes_dry_not_pregnant) == null) || (($farmer->ewes_dry_not_pregnant) == '-') || (($farmer->ewes_dry_not_pregnant) == '_')  ? '0' : $farmer->ewes_dry_not_pregnant) : $total_ewes_dry_not_pregnant }},
                    {{ ($route != '/') ?  ((($farmer->stallions_rams) == null) || (($farmer->stallions_rams) == '-') || (($farmer->stallions_rams) == '_')  ? '0' : $farmer->stallions_rams) : $total_stallions_rams }}],
                backgroundColor: ['#6f42c1', '#007bff','#17a2b8','#00cccc','#adb2bd']
            }]
        };

        var optionpie = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false,
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        // For a doughnut chart
        var ctxpie= document.getElementById('chartDonut');
        var myPieChart6 = new Chart(ctxpie, {
            type: 'doughnut',
            data: datapie,
            options: optionpie
        });

    });
</script>


</body>
</html>
