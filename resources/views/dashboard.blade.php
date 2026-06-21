<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-indigo-600 dark:text-indigo-400 font-semibold">Panel</p>
                <h1 class="mt-2 text-3xl font-semibold text-slate-900 dark:text-slate-100">Dashboard CONSGEN</h1>
                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Resumen rápido de citas y actividad del sistema.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="grid gap-6 lg:grid-cols-3">
            <div class="rounded-[2rem] bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 shadow-xl p-6">
                <div class="inline-flex items-center gap-2 rounded-full bg-indigo-500/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.3em] text-indigo-700 dark:text-indigo-300">Total de citas</div>
                <p class="mt-6 text-sm text-slate-500 dark:text-slate-400">Todas las citas registradas en el sistema.</p>
                <p class="mt-4 text-4xl font-semibold text-slate-900 dark:text-white">{{ $totalCitas }}</p>
            </div>
            <div class="rounded-[2rem] bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 shadow-xl p-6">
                <div class="inline-flex items-center gap-2 rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.3em] text-emerald-700 dark:text-emerald-300">Citas hoy</div>
                <p class="mt-6 text-sm text-slate-500 dark:text-slate-400">Citas programadas para el día de hoy.</p>
                <p class="mt-4 text-4xl font-semibold text-slate-900 dark:text-white">{{ $citasHoy }}</p>
            </div>
            <div class="rounded-[2rem] bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 shadow-xl p-6">
                <div class="inline-flex items-center gap-2 rounded-full bg-sky-500/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.3em] text-sky-700 dark:text-sky-300">Usuarios</div>
                <p class="mt-6 text-sm text-slate-500 dark:text-slate-400">Cuentas registradas que pueden acceder al panel.</p>
                <p class="mt-4 text-4xl font-semibold text-slate-900 dark:text-white">{{ $totalUsuarios }}</p>
            </div>
        </div>

        <section class="mt-6 rounded-[2rem] bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 shadow-xl p-6">
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">Citas por día</h2>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Observa la evolución de las citas programadas en los últimos días.</p>
                </div>
                <div class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.28em] text-slate-600 dark:bg-slate-900 dark:text-slate-300">Actualizado al instante</div>
            </div>

            <div class="rounded-[1.75rem] border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-900">
                <canvas id="citasChart" class="h-[320px] w-full"></canvas>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    backgroundColor: 'rgba(59, 130, 246, 0.88)',
                    borderRadius: 14,
                    barPercentage: 0.62,
                    categoryPercentage: 0.68
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: '#64748b' }
                    },
                    y: {
                        grid: { color: 'rgba(148, 163, 184, 0.18)' },
                        ticks: { color: '#64748b' }
                    }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#111827',
                        titleColor: '#f8fafc',
                        bodyColor: '#f8fafc'
                    }
                }
            }
        });
    </script>
</x-app-layout>
