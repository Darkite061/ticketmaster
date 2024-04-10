@extends('/admin/plantilla/layout')

@section('titulo','Lista_de_lugares')

@section('contenido')
    <div class="container mt-5">
        <h1>Graficos</h1>

        <!-- Gráfico de Barras -->
        <div class="chart-container">
            <canvas id="barChart"></canvas>
        </div>

        <!-- Gráfico de Líneas -->
        <div class="chart-container mt-4">
            <canvas id="lineChart"></canvas>
        </div>

        <!-- Gráfico Circular -->
        <div class="chart-container mt-4">
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <!-- Enlaces a los archivos JS de Bootstrap y Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Datos ficticios para las gráficas
        const categorias = ['Conciertos', 'Deportes', 'Teatro', 'Festivales'];
        const boletosVendidos = [1200, 800, 600, 400];

        const fechas = ['2024-04-01', '2024-04-02', '2024-04-03', '2024-04-04', '2024-04-05'];
        const ventasDiarias = [100, 120, 80, 150, 110];

        const generos = ['Pop', 'Rock', 'Electrónica', 'Hip-Hop'];
        const porcentajes = [40, 30, 15, 15];

        // Gráfico de Barras
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: categorias,
                datasets: [{
                    label: 'Boletos Vendidos',
                    data: boletosVendidos,
                    backgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de Líneas
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: fechas,
                datasets: [{
                    label: 'Ventas Diarias',
                    data: ventasDiarias,
                    borderColor: '#28a745',
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico Circular
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: generos,
                datasets: [{
                    data: porcentajes,
                    backgroundColor: ['#ffc107', '#dc3545', '#17a2b8', '#6610f2']
                }]
            }
        });
    </script>
@endsection