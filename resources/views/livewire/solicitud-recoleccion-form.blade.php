<div class="max-w-4xl mx-auto p-6 bg-white dark:bg-zinc-800 shadow-2xl shadow-lime-500/50! rounded-2xl text-gray-900 dark:text-gray-100">
    @if (session()->has('success'))
        <div class="mb-4 p-3 bg-green-100 dark:bg-green-200 text-green-700 dark:text-green-900 rounded">
            {{ session('success') }}
        </div>
    @endif
    <h2 class="text-2xl font-semibold border-b pb-2 border-gray-300 dark:border-gray-600">Registrar Solicitud de Recolección</h2>

    <form wire:submit.prevent="submit" class="space-y-6">
        <h2 class="text-xl font-semibold border-b pb-2 pt-2 border-gray-300 dark:border-gray-600">Datos del Usuario</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block">Número de contacto</label>
                <input type="text" wire:model.defer="numero_contacto" class="input border-b dark:border-gray-600 border-slate-800 rounded-xs" />
                @error('numero_contacto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">Dirección exacta</label>
                <input type="text" wire:model.defer="direccion" class="input border-b dark:border-gray-600 border-slate-800 rounded-xs" />
                @error('direccion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">Localidad</label>
                <input type="text" wire:model.defer="localidad" class="input border-b dark:border-gray-600 border-slate-800 rounded-xs" />
                @error('localidad') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <h2 class="text-xl font-semibold border-b pb-2 border-gray-300 dark:border-gray-600">Tipo de Solicitud</h2>
        <div>
            <select wire:model="tipo_solicitud" class="input bg-white hover:bg-white dark:bg-zinc-800 hover:dark:bg-zinc-800">
                <option value="Programada">✅ Programada</option>
                <option value="Bajo demanda">🔁 Bajo demanda</option>
            </select>
            @error('tipo_solicitud') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <h2 class="text-xl font-semibold border-b pb-2 border-gray-300 dark:border-gray-600">Tipo de Residuo</h2>
        <div class="flex flex-wrap gap-4">
            <label><input type="checkbox" value="Inorgánico reciclable" wire:model="tipos_residuo"> ♻️ Inorgánico</label>
            <label><input type="checkbox" value="Peligroso" wire:model="tipos_residuo"> ☠️ Peligroso</label>
            <label><input type="checkbox" value="Orgánico" wire:model="tipos_residuo"> 🌱 Orgánico</label>
        </div>
        @error('tipos_residuo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <h2 class="text-xl font-semibold border-b pb-2 border-gray-300 dark:border-gray-600">Frecuencia de Recolección</h2>
        <div>
            <select wire:model.defer="frecuencia" class="input bg-white hover:bg-white dark:bg-zinc-800 hover:dark:bg-zinc-800">
                <option value="">Selecciona frecuencia (si aplica)</option>
                <option>1 vez por semana</option>
                <option>2 veces por semana</option>
                <option>1 vez al mes</option>
            </select>
            @error('frecuencia') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <h2 class="text-xl font-semibold border-b pb-2 border-gray-300 dark:border-gray-600">Fechas y Horarios</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block">📅 Fecha de solicitud</label>
                <input type="date" wire:model="fecha_solicitud" class="input" />
                @error('fecha_solicitud') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            @if ($tipo_solicitud === 'Programada')
            <div>
                <label class="block">📆 Fecha programada</label>
                <input type="date" wire:model="fecha_programada" class="input" />
                @error('fecha_programada') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            @endif

            <div>
                <label class="block">⏰ Hora preferida (opcional)</label>
                <input type="time" wire:model="hora_preferida" class="input" />
                @error('hora_preferida') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <h2 class="text-xl font-semibold border-b pb-2 border-gray-300 dark:border-gray-600">Detalles adicionales</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block">📦 Cantidad estimada (kg)</label>
                <input type="number" wire:model="peso" class="input border-b dark:border-gray-600 border-slate-800 rounded-xs" step="0.1" />
                @error('peso') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block">📝 Observaciones</label>
                <textarea wire:model="observaciones" class="input border-b dark:border-gray-600 border-slate-800 rounded-xs" rows="3" placeholder="Notas para el recolector..."></textarea>
                @error('observaciones') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-4">
            <label class="flex items-center space-x-2">
                <input type="checkbox" wire:model="aceptacion_pautas" />
                <span>Declaro que he seguido las pautas adecuadas de limpieza y separación de residuos.</span>
            </label>
            @error('aceptacion_pautas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="text-right">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Enviar Solicitud
            </button>
        </div>
    </form>
</div>
