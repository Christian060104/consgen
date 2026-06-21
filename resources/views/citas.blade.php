<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-indigo-600 dark:text-indigo-400 font-semibold">Citas</p>
                <h1 class="mt-2 text-3xl font-semibold text-slate-900 dark:text-slate-100">Administra tu agenda médica</h1>
                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400 max-w-2xl">Registra nuevas citas, revisa la lista de pacientes y edita los detalles cuando lo necesites.</p>
            </div>
            <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
                <div class="rounded-[1.75rem] bg-slate-50 p-4 border border-slate-200 shadow-sm dark:bg-slate-900 dark:border-slate-800">
                    <p class="text-xs uppercase tracking-[0.35em] font-semibold text-slate-500 dark:text-slate-400">Total de citas</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900 dark:text-white">{{ $citas->count() }}</p>
                </div>
                <div class="rounded-[1.75rem] bg-slate-50 p-4 border border-slate-200 shadow-sm dark:bg-slate-900 dark:border-slate-800">
                    <p class="text-xs uppercase tracking-[0.35em] font-semibold text-slate-500 dark:text-slate-400">Última fecha</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900 dark:text-white">{{ optional($citas->last())->fecha ?? 'Sin citas' }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="grid gap-6 xl:grid-cols-[0.95fr_1.05fr]">
            <section class="rounded-[2rem] bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 shadow-xl p-8">
                <div class="mb-8">
                    <div class="inline-flex items-center gap-2 rounded-full bg-indigo-500/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.3em] text-indigo-700 dark:text-indigo-300">
                        <span class="h-2.5 w-2.5 rounded-full bg-indigo-500"></span>
                        Nueva cita
                    </div>
                    <h2 class="mt-6 text-2xl font-semibold text-slate-900 dark:text-slate-100">Agendar cita médica</h2>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Ingresa los datos del paciente para registrar una nueva cita de forma rápida y segura.</p>
                </div>

                <form action="{{ route('citas.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Nombre</span>
                            <input class="mt-2 block w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" type="text" name="nombre" placeholder="Nombre del paciente" required>
                        </label>
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Teléfono</span>
                            <input class="mt-2 block w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" type="text" name="telefono" placeholder="Ej. 5551234567" required>
                        </label>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Correo</span>
                            <input class="mt-2 block w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" type="email" name="correo" placeholder="correo@ejemplo.com" required>
                        </label>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Fecha</span>
                                <input class="mt-2 block w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" type="date" name="fecha" required>
                            </label>
                            <label class="block">
                                <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Hora</span>
                                <input class="mt-2 block w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" type="time" name="hora" required>
                            </label>
                        </div>
                    </div>

                    <label class="block">
                        <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Motivo</span>
                        <textarea class="mt-2 block w-full rounded-[1.75rem] border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" name="motivo" rows="5" placeholder="Motivo de la cita" required></textarea>
                    </label>

                    <button type="submit" class="inline-flex w-full justify-center rounded-3xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/10 transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400">Guardar Cita</button>
                </form>
            </section>

            <section class="rounded-[2rem] bg-slate-950/95 border border-slate-800 shadow-xl p-6 text-slate-100">
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-2xl font-semibold">Lista de citas</h2>
                        <p class="mt-2 text-sm text-slate-400">Visualiza, edita o elimina las citas registradas.</p>
                    </div>
                    <span class="rounded-full bg-slate-800 px-4 py-2 text-xs font-semibold uppercase tracking-[0.28em] text-slate-300">{{ $citas->count() }} citas</span>
                </div>

                <div class="overflow-x-auto rounded-[1.75rem] border border-slate-800 bg-slate-900/95">
                    <table class="min-w-full divide-y divide-slate-800 text-left text-sm">
                        <thead class="bg-slate-950/95 text-slate-300">
                            <tr>
                                <th class="px-4 py-3 font-medium">Nombre</th>
                                <th class="px-4 py-3 font-medium">Teléfono</th>
                                <th class="px-4 py-3 font-medium">Fecha</th>
                                <th class="px-4 py-3 font-medium">Hora</th>
                                <th class="px-4 py-3 font-medium">Motivo</th>
                                <th class="px-4 py-3 font-medium">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900 text-slate-200">
                            @forelse($citas as $cita)
                                <tr class="transition hover:bg-slate-800/80">
                                    <td class="px-4 py-4">{{ $cita->nombre }}</td>
                                    <td class="px-4 py-4">{{ $cita->telefono }}</td>
                                    <td class="px-4 py-4">{{ $cita->fecha }}</td>
                                    <td class="px-4 py-4">{{ $cita->hora }}</td>
                                    <td class="px-4 py-4">{{ $cita->motivo }}</td>
                                    <td class="px-4 py-4 space-x-2">
                                        <a href="{{ route('citas.edit', $cita) }}" class="inline-flex rounded-2xl bg-amber-500 px-3 py-2 text-xs font-semibold text-slate-950 transition hover:bg-amber-400">Editar</a>
                                        <form action="{{ route('citas.destroy', $cita) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex rounded-2xl bg-rose-500 px-3 py-2 text-xs font-semibold text-white transition hover:bg-rose-400">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-8 text-center text-sm text-slate-500">No hay citas registradas todavía.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
