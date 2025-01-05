@extends('layouts.admin')

@section('content')

<html>
<head>
    <title>Thống kê doanh thu theo biểu đồ cột</title>
    
</head>
<body>
    <div class="chart-container">
        <div class="chart-title">Thống kê doanh thu theo biểu đồ cột</div>
        <div class="chart">
            <div class="y-axis">
                <div>100</div>
                <div>75</div>
                <div>50</div>
                <div>25</div>
                <div>0</div>
            </div>
            <div class="bar bar-1"></div>
            <div class="bar bar-2"></div>
            <div class="bar bar-3"></div>
            <div class="bar bar-4"></div>
            <div class="bar bar-5"></div>
            <div class="bar bar-6"></div>
            <div class="bar bar-7"></div>
            <div class="bar bar-8"></div>
            <div class="bar bar-9"></div>
            <div class="bar bar-10"></div>
            <div class="bar bar-11"></div>
            <div class="bar bar-12"></div>
        </div>
        <div class="x-axis">
            <div>1</div>
            <div>2</div>
            <div>3</div>
            <div>4</div>
            <div>5</div>
            <div>6</div>
            <div>7</div>
            <div>8</div>
            <div>9</div>
            <div>10</div>
            <div>11</div>
            <div>12</div>
        </div>
        <div class="x-axis-label">tháng</div>
    </div>
</body>
</html>


@endsection