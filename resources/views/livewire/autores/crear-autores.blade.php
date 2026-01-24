<div class="flex flex-row-reverse">
    <button class="bg-indigo-500 hover:bg-indigo-700 rounded-xl p-2 text-white font-bold mb-2" wire:click="$set('openCrear', true)">
        <i class="fas fa-add mr-1"></i>NUEVO
    </button>
    <x-dialog-modal wire:model="openCrear">
        <x-slot name="title">Añadir Autor</x-slot>
        <x-slot name="content">
            <x-label for="nombre">Nombre:</x-label>
            <x-input type="text" class="w-full mb-3" wire:model="cform.nombre"
                placeholder="Nombre..." id="nombre" name="nombre"></x-input>
            <x-input-error for="cform.nombre"/>
            <x-label for="apellidos">Apellidos:</x-label>
            <x-input type="text" class="w-full mb-3 " wire:model="cform.apellidos"
                placeholder="Apellidos..." id="apellidos" name="apellidos"/>
            <x-input-error for="cform.apellidos" />
            <x-label for="nacionalidad">Nacionalidad:</x-label>
            <x-input type="text" class="w-full mb-3" wire:model="cform.nacionalidad"
                placeholder="Nacionalidad..." id="nacionalidad" name="nacionalidad"/>
            <x-input-error for="cform.nacionalidad"/>
            <x-label for="fecha_nacimiento">Fecha Nacimiento:</x-label>
            <x-input type="date" class="mb-3" wire:model="cform.fecha_nacimiento"
                id="fecha_nacimiento" name="fecha_nacimiento"/>
            <x-input-error for="cform.fecha_nacimiento"/>
            <x-label for="biografia">Biografia:</x-label>
            <textarea class="w-full rounded-lg" wire:model="cform.biografia"
                placeholder="Biografia..." id="biografia" name="biografia"></textarea>
            <x-input-error for="cfrom.biografia"/>
        </x-slot>
        <x-slot name="footer">
            <x-button class="bg-red-500 hover:bg-red-700 mr-2" wire:click="cancelar">
                <i fas fa-xmark></i>CANCELAR
            </x-button>
            <x-button class="bg-indigo-500 hover:bg-indigo-700" wire:click="crearAutor">
                <i fas fa-save></i>GUARDAR
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

