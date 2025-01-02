@extends('layouts.admin')

@section('title', 'DashBoard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/DashBoard.css') }}">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">DashBoard</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h3>Stats</h3>
                <div class="dashboard-container">
                    <div class="card">
                        <div class="card-header">Total Sales</div>
                        <div class="card-body">
                            <!-- Display Total Sales Data here -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Total Payments</div>
                        <div class="card-body">
                            <!-- Display Total Payments Data here -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Total Returns</div>
                        <div class="card-body">
                            <!-- Display Total Returns Data here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Payments</div>
                    <div class="card-body">
                        <!-- <!-- Display Payments Data here -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Recent Activity</div>
                    <div class="card-body">
                        <!-- Display Recent Activity Data here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection