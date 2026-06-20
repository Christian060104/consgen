<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard CONSGEN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center mb-5">🏥CONSGEN</h1>

        <div class="row text-center">

            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h2>{{ $totalCitas }}</h2>
                        <p>Total de Citas</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h2>{{ $citasHoy }}</h2>
                        <p>Citas Hoy</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h2>{{ $totalUsuarios }}</h2>
                        <p>Usuarios Registrados</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5">
            <h3 class="text-center">📊 Citas por Día</h3>

            <canvas id="citasChart"></canvas>
        </div>

        <script>
            const labels = @json($fechas);
            const data = @json($totales);

            const ctx = document.getElementById('citasChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Citas por día',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)'
                    }]
                }
            });
        </script>

</body>

</html>
