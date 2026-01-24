<div class="flex flex-row-reverse">
    <div>
        <button class="bg-indigo-500 hover:bg-indigo-700 rounded-xl p-2 text-white font-bold mb-2" wire:click="$set('openCrear', true)">
            <i class="fas fa-add mr-1"></i>NUEVO
        </button>
    </div>
    <x-dialog-modal wire:model="openCrear">
        <x-slot name="title">
            Añadir Categoria
        </x-slot>
        <x-slot name="content">
            <x-label value="Nombre:" for="nombre"/>
            <x-input type="text" class="w-full mb-4" placeholder="Nombre..." id="nombre" name="nombre" wire:model="cform.nombre"/>
            <x-input-error for="cform.nombre"/>
            <x-label value="Descripcion:" for="descripcion"/>
            <textarea name="descripcion" id="descripcion" wire:model="cform.descripcion"
                 placeholder="Ingresa la descripcion..." class="w-full rounded-lg"></textarea>
            <x-input-error for="cform.descripcion"/>

        </x-slot>
        <x-slot name="footer">
            <x-button class="bg-red-500 hover:bg-red-700 mr-2 font-bold" wire:click="cancelarCategoria">
                <i class="fas fa-xmark mr-1"></i>CANCELAR
            </x-button>
            <x-button class="bg-indigo-500 hover:bg-indigo-700 font-bold" wire:click="guardarCategoria">
                <i class="fas fa-save mr-1"></i>GUARDAR
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
