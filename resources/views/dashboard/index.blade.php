@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-12 col-md">
            <div class="card shadow-sm rounded p-3">
                <h5 class="card-title fst-bold">{{ __('Grafik Pemasukan dan Pengeluaran') }} </h5>
                <div class="card-body">
                    <canvas id="transactionChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('transactionChart').getContext('2d');
        const transactionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                        label: 'Pemasukan',
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        data: @json(array_values($incomeData)),
                        borderWidth: 1
                    },
                    {
                        label: 'Pengeluaran',
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        data: @json(array_values($expenseData)),
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
