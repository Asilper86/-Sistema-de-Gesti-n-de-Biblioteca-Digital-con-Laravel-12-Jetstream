<div class="flex flex-row-reverse">
    <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold rounded-lg p-2"
        wire:click="$set('openCrear',true)">
        <i class="fas fa-add mr-1"></i>NUEVO
    </button>

    <x-dialog-modal wire:model="openCrear">
        <x-slot name="title">Añadir Libro</x-slot>
        <x-slot name="content">
            <x-label for="titulo" value="Titulo:" />
            <x-input type="text" id="titulo" name="titulo" placeholder="Titulo..." class="w-full mb-4"
                wire:model="cform.titulo" />
            <x-input-error for="cform.titulo" />

            <x-label for="autor" value="Autor:" />
            <select class="rounded-lg w-full mb-4" name="autor" id="autor" wire:model="cform.author_id">
                <option value="">Seleccione un autor...</option>
                @foreach ($autores as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }} {{ $item->apellidos }}</option>
                @endforeach
            </select>
            <x-input-error for="cform.author_id" />

            <x-label value="Categoria:" />
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-3 max-h-48 overflow-y-auto pr-2">
                    @foreach ($categorias as $item)
                        <label
                            class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                            <input type="radio" id="cat_{{ $item->id }}" value="{{ $item->id }}"
                                name="categoria_seleccionada" wire:model="cform.category_id"
                                class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="text-sm text-gray-700 font-medium select-none">
                                {{ $item->nombre }}
                            </span>
                        </label>
                    @endforeach
                </div>
                <x-input-error for="cform.category_id" />
            </div>

            <x-label for="editorial" value="Editorial:" />
            <select class="w-full mb-4 rounded-lg" name="editorial" id="editorial" wire:model="cform.editorial">
                <option value="">Selecciona la editorial...</option>
                @foreach ($libros as $item)
                    <option value="{{ $item->editorial }}">{{ $item->editorial }}</option>
                @endforeach
            </select>
            <x-input-error for="cform.editorial" />

            <x-label for="año_publicacion" value="Año Publicacion:" />
            <x-input type="number" class="w-full mb-4" id="año_publicacion" name="año_publicacion"
                wire:model="cform.año_publicacion" />
            <x-input-error for="cform.año_publicacion" />

            <x-label for="num_paginas" value="Numero de Paginas:" />
            <x-input type="number" class="w-full mb-4" id="num_paginas" wire:model="cform.num_paginas"
                name="num_paginas" />
            <x-input-error for="cform.num_paginas" />

            <x-label for="cimagen" value="Imagen:" />
            <div class="w-full h-80 bg-gray-200 relative rounded-lg mt-2">
                <input type="file" class="hidden" name="cimagen" wire:model="cform.portada" id="cimagen"
                    accept="image/*">
                <label for="cimagen"
                    class="absolute bottom-2 right-2 text-white rounded-lg p-2 bg-indigo-500 hover:bg-indigo-700">
                    <i class="fas fa-upload mr-1"></i>IMAGEN
                </label>
                @if ($cform->portada)
                    <img src="{{ $cform->portada->temporaryUrl() }}" alt=""
                        class="w-full h-full object-cover object-center bg-no-repeat">
                @endif
            </div>
            <x-input-error for="cform.portada" />
        </x-slot>
        <x-slot name="footer">
            <x-button class="bg-red-500 hover:bg-red-700 mr-2" wire:click="cancelarLibro">
                <i class="fas fa-xmark mr-1"></i>CANCELAR
            </x-button>
            <x-button class="bg-indigo-500 hover:bg-indigo-700" wire:click="crearLibro">
                <i class="fas fa-save mr-1"></i>GUARDAR
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
