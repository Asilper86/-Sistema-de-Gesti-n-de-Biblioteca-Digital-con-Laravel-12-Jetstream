<div>
    <div class="max-w-7xl mx-auto p-6">
        @livewire('autores.crear-autores')
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">

                    <thead>
                        <tr
                            class="bg-gray-50 border-b border-gray-100 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                            <th class="px-6 py-4 cursor-pointer" wire:click="ordenar('nombre')">
                                <i class="fas fa-sort mr-1"></i>Autor
                            </th>
                            <th class="px-6 py-4 cursor-pointer" wire:click="ordenar('nacionalidad')">
                                <i class="fas fa-sort mr-1"></i>País
                            </th>
                            <th class="px-6 py-4 cursor-pointer" wire:click="ordenar('fecha_nacimiento')">
                                <i class="fas fa-sort mr-1"></i>Nacimiento
                            </th>
                            <th class="px-6 py-4 hidden md:table-cell">Biografía</th>
                            <th class="px-6 py-4 text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        @foreach ($autores as $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <div class="font-bold text-gray-900">{{ $item->nombre }}</div>
                                            <div class="text-xs text-gray-500">{{ $item->apellidos }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-earth-europe text-gray-400"></i>
                                        <span>{{ $item->nacionalidad }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-regular fa-calendar text-gray-400"></i>
                                        <span>{{ $item->fecha_nacimiento }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 hidden md:table-cell max-w-xs truncate text-gray-500">
                                    {{$item->biografia}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button
                                            class="w-8 h-8 rounded-full bg-indigo-50 text-indigo-600 hover:bg-indigo-100 hover:text-indigo-700 transition-all focus:ring-2 focus:ring-offset-1 focus:ring-indigo-500"
                                            title="Editar" wire:click="editar({{ $item->id }})">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-full bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 transition-all focus:ring-2 focus:ring-offset-1 focus:ring-red-500"
                                            title="Eliminar" wire:click="lanzarAlerta({{ $item->id }})">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="mt-2">
            {{ $autores->links() }}
        </div>
    </div>
    <x-dialog-modal wire:model="openEditar">
        <x-slot name="title">Editar Autor</x-slot>
        <x-slot name="content">
            <x-label for="nombre">Nombre:</x-label>
            <x-input type="text" class="w-full mb-3" wire:model="uform.nombre"
                placeholder="Nombre..." id="nombre" name="nombre"></x-input>
            <x-input-error for="uform.nombre"/>
            <x-label for="apellidos">Apellidos:</x-label>
            <x-input type="text" class="w-full mb-3 " wire:model="uform.apellidos"
                placeholder="Apellidos..." id="apellidos" name="apellidos"/>
            <x-input-error for="uform.apellidos" />
            <x-label for="nacionalidad">Nacionalidad:</x-label>
            <x-input type="text" class="w-full mb-3" wire:model="uform.nacionalidad"
                placeholder="Nacionalidad..." id="nacionalidad" name="nacionalidad"/>
            <x-input-error for="uform.nacionalidad"/>
            <x-label for="fecha_nacimiento">Fecha Nacimiento:</x-label>
            <x-input type="date" class="mb-3" wire:model="uform.fecha_nacimiento"
                id="fecha_nacimiento" name="fecha_nacimiento"/>
            <x-input-error for="uform.fecha_nacimiento"/>
            <x-label for="biografia">Biografia:</x-label>
            <textarea class="w-full rounded-lg" wire:model="uform.biografia"
                placeholder="Biografia..." id="biografia" name="biografia"></textarea>
            <x-input-error for="ufrom.biografia"/>
        </x-slot>
        <x-slot name="footer">
            <x-button class="bg-red-500 hover:bg-red-700 mr-2" wire:click="cancelarEditar">
                <i fas fa-xmark></i>CANCELAR
            </x-button>
            <x-button class="bg-indigo-500 hover:bg-indigo-700" wire:click="update">
                <i fas fa-save></i>GUARDAR
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
