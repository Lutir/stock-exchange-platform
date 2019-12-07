@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Icons')])

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous" />
<div class="content">
    <div class="container">
        {{ Form::open(array('url' => 'search-stock')) }}
        {{ Form::token() }}
            <div class="form-group">
            <label for="">Enter Stock Name</label>
            <input type="text"
                class="form-control" name="name" id="stock" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        {{ Form::close() }}
        @if($stock)
        <div class="container">
            <div class="row">
                <h1 class="text-center">{{ $stock->name }}</h1>
                <h4>{{ $stock->description }}</h4>
            </div>
            <div class="row">
                <div class="options">
                    <a name="" id="" class="btn btn-primary lastWeek" href="#" role="button">Last Week</a>
                    <a name="" id="" class="btn btn-primary lastMonth" href="#" role="button">Last Month</a>
                    <a name="" id="" class="btn btn-primary lastSixMonth" href="#" role="button">Last 6 Months</a>
                    <a name="" id="" class="btn btn-primary lastYear" href="#" role="button">Last Year</a>
                </div>
                <canvas id="myChart" width="200" height="200"></canvas>
            </div>
        </div>
        @endif

    </div>
</div>
<div class="history" style="display: none;">
    {{$stock->history}}
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
<script>
    let history = $('.history').text();
    history = jQuery.parseJSON(history);
    console.log(history);
    var ctx = document.getElementById('myChart').getContext('2d');
    data = {
        labels: [],
        datasets: [{
            label: 'Stock Prices',
            data: [],
            backgroundColor: ['rgba(255, 99, 132, 0.3)'],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1        
            }]
    }
    history.reverse();
    // if weekly
    console.log((data['datasets'][0]).data);
    for(let i=0;i<7;i++){
        (data['datasets'][0].data).push(history[i].price);
        (data['labels']).push(history[i].date);
    }
    // if monthly
    
    (data['datasets'][0].data).reverse();
    (data['labels']).reverse();


    myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
                }
            }]
        }
    }

    
});

$('.lastWeek').click(function(){
        weeklyUpdate();
    })

    $('.lastMonth').click(function(){
        monthlyUpdate();
    })

    $('.lastSixMonth').click(function(){
        sixMonthUpdate();
    })

    $('.lastYear').click(function(){
        oneYearUpdate();
    })

function weeklyUpdate(){
    (data['datasets'][0].data) = [];
    (data['labels']) = [];

    for(let i=0;i<7;i++){
        (data['datasets'][0].data).push(history[i].price);
        (data['labels']).push(history[i].date);
    }
    myChart.update();
}

function monthlyUpdate(){
    (data['datasets'][0].data) = [];
    (data['labels']) = [];

    for(let i=0;i<30;i++){
        (data['datasets'][0].data).push(history[i].price);
        (data['labels']).push(history[i].date);
    }
    myChart.update();
}

function sixMonthUpdate(){
    (data['datasets'][0].data) = [];
    (data['labels']) = [];

    for(let i=0;i<6;i++){
        (data['datasets'][0].data).push(history[i*30].price);
        (data['labels']).push(history[i*30].date);
    }
    myChart.update();

}

function oneYearUpdate(){
    (data['datasets'][0].data) = [];
    (data['labels']) = [];

    for(let i=0;i<12;i++){
        (data['datasets'][0].data).push(history[i*30].price);
        (data['labels']).push(history[i*30].date);
    }
    myChart.update();

}

</script>
@endsection
