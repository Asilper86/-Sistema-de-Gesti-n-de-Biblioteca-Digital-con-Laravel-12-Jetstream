<div class="container mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-4">
        <x-input type="search" wire:model.live="buscar" placeholder="Busca..." />
        @livewire('libros.crear-libros')

    </div>
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left text-sm text-gray-500">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 cursor-pointer" wire:click="ordenar('id')">
                            <i class="fas fa-sort mr-1"></i>ID
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 cursor-pointer" wire:click="ordenar('titulo')">
                            <i class="fas fa-sort mr-1"></i>Libro</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 cursor-pointer" wire:click="ordenar('category_id')">
                            <i class="fas fa-sort mr-1"></i>Categoría
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 cursor-pointer " wire:click="ordenar('editorial')">
                            <i class="fas fa-sort mr-1"></i>Editorial
                        </th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-center cursor-pointer" wire:click="ordenar('año_publicacion')">
                            <i class="fas fa-sort mr-1"></i>Año</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-center cursor-pointer" wire:click="ordenar('num_paginas')">
                            <i class="fas fa-sort mr-1"></i>Págs.</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @foreach ($libros as $item)
                        <tr class="hover:bg-gray-50 transition-colors duration-200 group">

                            <td class="px-6 py-4 font-mono text-xs text-gray-400">
                                {{ $item->id }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="h-16 w-12 flex-shrink-0 overflow-hidden rounded shadow-sm border border-gray-200">
                                        <img src="{{ Storage::url($item->portada) }}" alt="Portada Clean Code"
                                            class="h-full w-full object-cover">
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-gray-900 text-base leading-tight">
                                            {{ $item->titulo }}
                                        </span>
                                        <span class="text-xs text-gray-500 mt-1">
                                            por <span class="font-medium text-gray-700">{{ $item->author->nombre }}
                                                {{ $item->author->apellidos }}</span>
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-medium text-indigo-700 border border-indigo-100">
                                    {{ $item->category->nombre }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $item->editorial }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <span
                                    class="inline-block bg-gray-100 rounded px-2 py-1 text-xs font-medium text-gray-600">
                                    {{ $item->año_publicacion }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-center text-xs text-gray-500 font-mono">
                                {{ $item->num_paginas }}
                            </td>

                            <td class="px-6 py-4 text-right">
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
        <div class="m-2">
            {{ $libros->links() }}
        </div>

    </div>

    <x-dialog-modal wire:model="openEditar">
        <x-slot name="title">Editar Libro</x-slot>
        <x-slot name="content">
            <x-label for="titulo" value="Titulo:" />
            <x-input type="text" id="titulo" name="titulo" placeholder="Titulo..." class="w-full mb-4"
                wire:model="uform.titulo" />
            <x-input-error for="uform.titulo" />

            <x-label for="autor" value="Autor:" />
            <select class="rounded-lg w-full mb-4" name="autor" id="autor" wire:model="uform.author_id">
                <option value="">Seleccione un autor...</option>
                @foreach ($autores as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }} {{ $item->apellidos }}</option>
                @endforeach
            </select>
            <x-input-error for="uform.author_id" />

            <x-label value="Categoria:" />
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-3 max-h-48 overflow-y-auto pr-2">
                    @foreach ($categorias as $item)
                        <label
                            class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                            <input type="radio" id="cat_{{ $item->id }}" value="{{ $item->id }}"
                                name="categoria_seleccionada" wire:model="uform.category_id"
                                class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="text-sm text-gray-700 font-medium select-none">
                                {{ $item->nombre }}
                            </span>
                        </label>
                    @endforeach
                </div>
                <x-input-error for="uform.category_id" />
            </div>

            <x-label for="editorial" value="Editorial:" />
            <select class="w-full mb-4 rounded-lg" name="editorial" id="editorial" wire:model="uform.editorial">
                <option value="">Selecciona la editorial...</option>
                @foreach ($libros as $item)
                    <option value="{{ $item->editorial }}">{{ $item->editorial }}</option>
                @endforeach
            </select>
            <x-input-error for="uform.editorial" />

            <x-label for="año_publicacion" value="Año Publicacion:" />
            <x-input type="number" class="w-full mb-4" id="año_publicacion" name="año_publicacion"
                wire:model="uform.año_publicacion" />
            <x-input-error for="uform.año_publicacion" />

            <x-label for="num_paginas" value="Numero de Paginas:" />
            <x-input type="number" class="w-full mb-4" id="num_paginas" wire:model="uform.num_paginas"
                name="num_paginas" />
            <x-input-error for="uform.num_paginas" />

            <x-label for="uimagen" value="Imagen:" />
            <div class="w-full h-80 bg-gray-200 relative rounded-lg mt-2">
                <input type="file" class="hidden" name="cimagen" wire:model="uform.portada" id="cimagen"
                    accept="image/*">
                <label for="uimagen"
                    class="absolute bottom-2 right-2 text-white rounded-lg p-2 bg-indigo-500 hover:bg-indigo-700">
                    <i class="fas fa-upload mr-1"></i>IMAGEN
                </label>
                @isset($uform->portada)
                    <img src="{{ $uform->portada->temporaryUrl() }}" alt="" class="w-full h-full object-center bg-no-repeat">
                @else
                    <img src="{{ Storage::url($uform->book?->portada) }}" class="w-full h-full object-center bg-no-repeat" alt="">
                @endisset
            </div>
            <x-input-error for="uform.portada" />
        </x-slot>
        <x-slot name="footer">
            <x-button class="bg-red-500 hover:bg-red-700 mr-2" wire:click="cancelar">
                <i class="fas fa-xmark mr-1"></i>CANCELAR
            </x-button>
            <x-button class="bg-indigo-500 hover:bg-indigo-700" wire:click="update">
                <i class="fas fa-edit mr-1"></i>EDITAR
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
