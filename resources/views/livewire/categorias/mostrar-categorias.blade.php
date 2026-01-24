<div>
    <div class="max-w-7xl mx-auto p-6">
        @livewire('categorias.crear-categorias')
        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md  ">

            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 cursor-pointer"
                            wire:click="ordenar('id')">
                            <i class="fas fa-sort mr-1"></i>ID
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 cursor-pointer"
                            wire:click="ordenar('nombre')">
                            <i class="fas fa-sort mr-1"></i>Nombre
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Descripción</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach ($categorias as $item)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 font-mono text-xs text-gray-400">{{ $item->id }}</td>
                            <td class="px-6 py-4">
                                <span class="font-semibold text-gray-700">{{ $item->nombre }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <p class="max-w-xs truncate text-gray-500">
                                    {{ $item->descripcion }}
                                </p>
                            </td>
                            <td>
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
    <x-dialog-modal wire:model="openEditar">
        <x-slot name="title">
            Editar Categoria
        </x-slot>
        <x-slot name="content">
            <x-label value="Nombre:" for="nombre" />
            <x-input type="text" class="w-full mb-4" placeholder="Nombre..." id="nombre" name="nombre"
                wire:model="uform.nombre" />
            <x-input-error for="uform.nombre" />
            <x-label value="Descripcion:" for="descripcion" />
            <textarea name="descripcion" id="descripcion" wire:model="uform.descripcion" placeholder="Ingresa la descripcion..."
                class="w-full rounded-lg"></textarea>
            <x-input-error for="uform.descripcion" />

        </x-slot>
        <x-slot name="footer">
            <x-button class="bg-red-500 hover:bg-red-700 mr-2 font-bold" wire:click="cancelarCategoria">
                <i class="fas fa-xmark mr-1" ></i>CANCELAR
            </x-button>
            <x-button class="bg-indigo-500 hover:bg-indigo-700 font-bold" wire:click="update">
                <i class="fas fa-save mr-1"></i>GUARDAR
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
