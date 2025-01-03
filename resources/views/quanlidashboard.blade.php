@extends('layouts.admin')

@section('title', 'DashBoard')

@section('content')
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
                        <p>{{ number_format($totalSales, 0, ',', '.') }} VNĐ</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Total Payments</div>
                    <div class="card-body">
                        <p>{{ $totalPayments }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Total Returns</div>
                    <div class="card-body">
                        <p>{{ $totalReturns }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <p>{{ $totalUsers }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Total Products</div>
                    <div class="card-body">
                        <p>{{ $totalProducts }}</p>
                    </div>
                </div>
                <div class="card">
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
            <h3>Website Information</h3>
            <div class="card">
                <div class="card-header">Website Details</div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="websiteName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="websiteName" name="website_name" value="Your Website Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="websiteUrl" class="form-label">URL</label>
                            <input type="url" class="form-control" id="websiteUrl" name="website_url" value="http://yourwebsite.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Contact Email</label>
                            <input type="email" class="form-control" id="contactEmail" name="contact_email" value="contact@yourwebsite.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="+1234567890" required>
                        </div>
                        <div class="mb-3">
                            <label for="salesPhone" class="form-label">Phone for Sales</label>
                            <input type="tel" class="form-control" id="salesPhone" name="sales_phone" value="+1234567891" required>
                        </div>
                        <div class="mb-3">
                            <label for="warrantyPhone" class="form-label">Phone for Warranty</label>
                            <input type="tel" class="form-control" id="warrantyPhone" name="warranty_phone" value="+1234567892" required>
                        </div>
                        <div class="mb-3">
                            <label for="complaintPhone" class="form-label">Phone for Complaints</label>
                            <input type="tel" class="form-control" id="complaintPhone" name="complaint_phone" value="+1234567893" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection