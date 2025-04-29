<div class="p-6 bg-white dark:bg-zinc-800 rounded shadow-2xl">
    @if (session()->has('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Registrar Solicitud de Recolección</h2>

    <form wire:submit.prevent="submit">
        <div class="mb-4">
            <label class="block mb-1">Tipo de residuo</label>
            <select wire:model="tipo_residuo" class="w-full border rounded px-3 py-2">
                <option value="">Seleccione</option>
                <option value="Organico">Orgánico</option>
                <option value="Inorganico">Inorgánico</option>
                <option value="Peligroso">Peligroso</option>
            </select>
            @error('tipo_residuo') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" wire:model="es_programada" class="mr-2">
                ¿Es programada?
            </label>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Fecha de solicitud</label>
            <input type="date" wire:model="fecha_solicitud" class="w-full border rounded px-3 py-2">
            @error('fecha_solicitud') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        @if($es_programada)
        <div class="mb-4">
            <label class="block mb-1">Fecha programada</label>
            <input type="date" wire:model="fecha_programada" class="w-full border rounded px-3 py-2">
            @error('fecha_programada') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        @endif

        <div class="mb-4">
            <label class="block mb-1">Turno</label>
            <select wire:model="turno" class="w-full border rounded px-3 py-2">
                <option value="">Seleccione</option>
                <option value="1">Mañana</option>
                <option value="2">Tarde</option>
                <option value="3">Noche</option>
            </select>
            @error('turno') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-green-600 btn text-white px-4 py-2 rounded">Enviar Solicitud</button>
    </form>
    <style>
        .btn{
            background-color: var(--color-green-600) /* oklch(0.627 0.194 149.214) */;
            border-radius: 0.25rem /* 4px */;
        }
    </style>
</div>


