<div class="p-6 bg-white dark:bg-zinc-800 rounded shadow-2xl">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Informe de Solicitudes de Recolección</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-zinc-700 border border-gray-200 dark:border-gray-600">
            <thead>
                <tr class="bg-gray-100 dark:bg-zinc-600">
                    <th class="py-2 px-4 border-b dark:border-zinc-500">ID</th>
                    <th class="py-2 px-4 border-b dark:border-zinc-500">Usuario</th>
                    <th class="py-2 px-4 border-b dark:border-zinc-500">Correo</th>
                    <th class="py-2 px-4 border-b dark:border-zinc-500">Tipo de Residuo</th>
                    <th class="py-2 px-4 border-b dark:border-zinc-500">Fecha Solicitud</th>
                    <th class="py-2 px-4 border-b dark:border-zinc-500">Fecha Programada</th>
                    <th class="py-2 px-4 border-b dark:border-zinc-500">Estado</th>
                    <th class="py-2 px-4 border-b dark:border-zinc-500">Turno</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($solicitudes as $solicitud)
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-600">
                        <td class="py-2 px-4 border-b dark:border-zinc-500">{{ $solicitud->id }}</td>
                        <td class="py-2 px-4 border-b dark:border-zinc-500">{{ $solicitud->usuario->name ?? 'No disponible' }}</td>
                        <td class="py-2 px-4 border-b dark:border-zinc-500">{{ $solicitud->usuario->email ?? 'No disponible' }}</td>
                        <td class="py-2 px-4 border-b dark:border-zinc-500">{{ $solicitud->tipo_residuo }}</td>
                        <td class="py-2 px-4 border-b dark:border-zinc-500">{{ optional($solicitud->fecha_solicitud)->format('Y-m-d') }}</td>
                        <td class="py-2 px-4 border-b dark:border-zinc-500">{{ optional($solicitud->fecha_programada)->format('Y-m-d') ?? 'No programada' }}</td>
                        <td class="py-2 px-4 border-b dark:border-zinc-500">{{ $solicitud->estado }}</td>
                        <td class="py-2 px-4 border-b dark:border-zinc-500">{{ $solicitud->turno }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="py-4 text-center text-gray-500 dark:text-gray-400">No hay solicitudes registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

