@extends('layouts.admin')

@section('title', 'DashBoard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/DashBoard.css') }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">Dashboard</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h3>Stats</h3>
            <div class="dashboard-container">
                <div class="card text-white bg-primary">
                    <div class="card-header">Total Sales</div>
                    <div class="card-body">
                        <p>{{ number_format($totalSales, 0, ',', '.') }} VNĐ</p>
                    </div>
                </div>
                <div class="card text-white bg-success">
                    <div class="card-header">Total Payments</div>
                    <div class="card-body">
                        <p>{{ $totalPayments }}</p>
                    </div>
                </div>
                <div class="card text-white bg-danger">
                    <div class="card-header">Total Returns</div>
                    <div class="card-body">
                        <p>{{ $totalReturns }}</p>
                    </div>
                </div>
                <div class="card text-white bg-warning">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <p>{{ $totalUsers }}</p>
                    </div>
                </div>
                <div class="card text-white bg-info">
                    <div class="card-header">Total Products</div>
                    <div class="card-body">
                        <p>{{ $totalProducts }}</p>
                    </div>
                </div>
                <div class="card text-white bg-secondary">
                    <div class="card-header">Total Orders</div>
                    <div class="card-body">
                        <p>{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <h3>Sales Trend</h3>
            <canvas id="salesTrendChart"></canvas>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('salesTrendChart').getContext('2d');
    const salesTrendChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Sales',
                data: [12000, 19000, 30000, 25000, 22000, 30000],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection