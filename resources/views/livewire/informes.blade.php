<div class="p-6 bg-white dark:bg-zinc-800 rounded-2xl shadow-2xl shadow-lime-500/50!">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Informe de Solicitudes de Recolección</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-zinc-700 border border-gray-200 dark:border-gray-600">
            <thead>
                <tr class="bg-gray-100 dark:bg-zinc-600 text-sm text-gray-700 dark:text-gray-100">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Usuario</th>
                    <th class="py-2 px-4 border-b">Correo</th>
                    <th class="py-2 px-4 border-b">Dirección</th>
                    <th class="py-2 px-4 border-b">Localidad</th>
                    <th class="py-2 px-4 border-b">Contacto</th>
                    <th class="py-2 px-4 border-b">Tipo Solicitud</th>
                    <th class="py-2 px-4 border-b">Tipo(s) Residuo</th>
                    <th class="py-2 px-4 border-b">Frecuencia</th>
                    <th class="py-2 px-4 border-b">Fecha Solicitud</th>
                    <th class="py-2 px-4 border-b">Fecha Programada</th>
                    <th class="py-2 px-4 border-b">Hora Preferida</th>
                    <th class="py-2 px-4 border-b">Peso (kg)</th>
                    <th class="py-2 px-4 border-b">Observaciones</th>
                    <th class="py-2 px-4 border-b">Aceptación</th>
                    <th class="py-2 px-4 border-b">Estado</th>
                    <th class="py-2 px-4 border-b">Turno</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($solicitudes as $solicitud)
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-600 text-sm text-gray-800 dark:text-gray-100">
                        <td class="py-2 px-4 border-b">{{ $solicitud->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->usuario->name ?? 'No disponible' }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->usuario->email ?? 'No disponible' }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->direccion }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->localidad }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->numero_contacto }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->tipo_solicitud }}</td>
                        <td class="py-2 px-4 border-b">
                            @foreach ($solicitud->tipos_residuo as $residuo)
                                <span
                                    class="inline-block bg-green-100 text-green-800 text-xs px-2 rounded mr-1">{{ $residuo }}</span>
                            @endforeach

                        </td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->frecuencia ?? 'N/A' }}</td>
                        <td class="py-2 px-4 border-b">{{ optional($solicitud->fecha_solicitud)->format('Y-m-d') }}</td>
                        <td class="py-2 px-4 border-b">
                            {{ optional($solicitud->fecha_programada)->format('Y-m-d') ?? 'No programada' }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->hora_preferida ?? 'N/A' }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->peso ?? 'N/A' }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->observaciones ?? 'Ninguna' }}</td>
                        <td class="py-2 px-4 border-b">
                            @if ($solicitud->aceptacion_pautas)
                                <span class="text-green-600 font-semibold">Sí</span>
                            @else
                                <span class="text-red-600 font-semibold">No</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->estado }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->numero_turno ?? 'Sin turno' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="17" class="py-4 text-center text-gray-500 dark:text-gray-400">No hay solicitudes
                            registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>