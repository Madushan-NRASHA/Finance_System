@extends('admin.layouts.front', ['main_page' => 'yes'])

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Small box for customers -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $userCount }}</h3>
                                <p>Customers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-man"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Small box for paid customers -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ Session::get('client_count', 0) }}</h3>
                                <p>Paid Customers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Small box for delayed customers -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ Session::get('client_count', 0) }}</h3>
                                <p>Delayed Customers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Small box for closed clients -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box" style="background-color: #28a745;">
                            <div class="inner">
                                <h3>5</h3>
                                <p>Closed Clients</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-checkmark"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Date Picker -->
                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <label for="date-picker">Select Month:</label>
                        <input type="month" id="date-picker" class="form-control">
                    </div>
                </div>

                <!-- Paid Customers Chart -->
                <h4>Paid Customers</h4>
                <div class="position-relative mb-4">
                    <canvas id="paid-customers-chart" height="200"></canvas>
                </div>

                <!-- Unpaid Customers Chart -->
                <h4>Unpaid Customers</h4>
                <div class="position-relative mb-4">
                    <canvas id="unpaid-customers-chart" height="200"></canvas>
                </div>
            </div>
        </section>
    </div>

    <aside class="control-sidebar control-sidebar-dark"></aside>

    <!-- Chart.js Script for Sales Chart with Daily Data -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var paidCtx = document.getElementById('paid-customers-chart').getContext('2d');
        var unpaidCtx = document.getElementById('unpaid-customers-chart').getContext('2d');

        // Initialize the Paid Customers chart
        var paidCustomersChart = new Chart(paidCtx, {
            type: 'bar',
            data: {
                labels: [], // Dynamic labels (days of the month)
                datasets: [{
                    label: 'Paid Customers',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(188,60,90,0.8)',
                    data: [] // Dynamic data for paid customers
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true // Y-axis starts at 0
                    }
                }
            }
        });

        // Initialize the Unpaid Customers chart
        var unpaidCustomersChart = new Chart(unpaidCtx, {
            type: 'bar',
            data: {
                labels: [], // Dynamic labels (days of the month)
                datasets: [{
                    label: 'Unpaid Customers',
                    backgroundColor: 'rgba(255,99,132,0.9)',
                    borderColor: 'rgba(255,99,132,0.8)',
                    data: [] // Dynamic data for unpaid customers
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true // Y-axis starts at 0
                    }
                }
            }
        });

        // Function to update both charts based on the selected month
        document.getElementById('date-picker').addEventListener('change', function() {
            var selectedMonth = this.value; // Format: YYYY-MM

            // Get number of days in the selected month
            var date = new Date(selectedMonth);
            var daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

            // Generate day labels (1 to daysInMonth)
            var dayLabels = Array.from({ length: daysInMonth }, (_, i) => i + 1);

            // Generate random data for demonstration purposes
            var newPaidData = Array.from({ length: daysInMonth }, () => Math.floor(Math.random() * 100));
            var newUnpaidData = Array.from({ length: daysInMonth }, () => Math.floor(Math.random() * 100));

            // Update the Paid Customers chart with new labels and data
            paidCustomersChart.data.labels = dayLabels; // Update labels with days of the month
            paidCustomersChart.data.datasets[0].data = newPaidData; // Update paid customer data
            paidCustomersChart.update(); // Refresh the chart

            // Update the Unpaid Customers chart with new labels and data
            unpaidCustomersChart.data.labels = dayLabels; // Update labels with days of the month
            unpaidCustomersChart.data.datasets[0].data = newUnpaidData; // Update unpaid customer data
            unpaidCustomersChart.update(); // Refresh the chart
        });
    </script>
@endsection
