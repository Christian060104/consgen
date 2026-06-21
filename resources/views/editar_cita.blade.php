<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-indigo-600 dark:text-indigo-400 font-semibold">Citas</p>
                <h1 class="mt-2 text-3xl font-semibold text-slate-900 dark:text-slate-100">Editar cita existente</h1>
                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Actualiza la información del paciente y guarda los cambios en el sistema.</p>
            </div>
            <a href="{{ route('citas.index') }}" class="inline-flex items-center justify-center rounded-3xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Volver a citas</a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto">
            <section class="rounded-[2rem] bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 shadow-xl p-8">
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">Detalles de la cita</h2>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Modifica los campos necesarios y guarda la información actualizada.</p>
                </div>
                <form action="{{ route('citas.update', $cita) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Nombre</span>
                            <input class="mt-2 block w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" type="text" name="nombre" value="{{ $cita->nombre }}" required>
                        </label>
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Teléfono</span>
                            <input class="mt-2 block w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" type="text" name="telefono" value="{{ $cita->telefono }}" required>
                        </label>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Correo</span>
                            <input class="mt-2 block w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" type="email" name="correo" value="{{ $cita->correo }}" required>
                        </label>
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Fecha</span>
                            <input class="mt-2 block w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" type="date" name="fecha" value="{{ $cita->fecha }}" required>
                        </label>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Hora</span>
                            <input class="mt-2 block w-full rounded-3xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" type="time" name="hora" value="{{ $cita->hora }}" required>
                        </label>
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300">Motivo</span>
                            <textarea class="mt-2 block w-full rounded-[1.75rem] border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" name="motivo" rows="5" required>{{ $cita->motivo }}</textarea>
                        </label>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                        <a href="{{ route('citas.index') }}" class="inline-flex justify-center rounded-3xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100 dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-900">Cancelar</a>
                        <button type="submit" class="inline-flex justify-center rounded-3xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/10 transition hover:bg-indigo-500">Actualizar</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</x-app-layout>
