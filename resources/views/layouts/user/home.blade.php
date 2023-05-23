<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@extends('layouts.app')

@section('content')

    @if (!$results->isEmpty())
        <div class="card">
            <div class="card-header">{{ __('Sugested UKM Based Data Provided and Riasec Test') }}</div>

            <div class="card-body">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-6">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    @endif


    <div class="card">
        <div class="card-header">{{ __('My Riasec Test Results') }}</div>

        <div class="card-body">
            @if ($results->isEmpty())
                <p>No results found.</p>
            @else
                <!-- <canvas id="myChart"></canvas> -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $riasecResult)
                            <tr>
                                <td>{{ $riasecResult->created_at->format('d-m-Y') }}</td>
                                <td>{{ $riasecResult->result }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $results->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        
        var data = {!! json_encode($saw_result) !!};
        // Create an array to store the labels and data for the chart
        var labels = [];
        var scoreData = [];

        data.forEach(function(item) {
            labels.push(item.name);
            scoreData.push(item.score);
        });

        // Create the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    data: scoreData,
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF',
                        '#FF9F40'
                    ]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                }
            }
        });
    </script>
@endsection
