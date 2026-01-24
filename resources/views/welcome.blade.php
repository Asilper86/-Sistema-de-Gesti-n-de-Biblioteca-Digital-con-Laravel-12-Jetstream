<x-mios.base>
    <h1 class="font-lg font-bold mb-2">Listado de libros Disponibles</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">

        @foreach ($libros as $item)
            <article
                @class(["bg-white rounded-xl shadow border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col group", 'cols-span-1 md:col-span-2' => $loop->first,])>

                <div class="relative h-64 overflow-hidden bg-gray-100">
                    <img src="{{ Storage::url($item->portada) }}" alt="Portada del libro"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span
                        class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-indigo-600 text-xs font-bold px-3 py-1 rounded-full border border-gray-200 uppercase tracking-wide">
                        {{ $item->category->nombre }}
                    </span>
                </div>

                <div class="p-5 flex flex-col flex-grow">

                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-900 leading-tight mb-1 line-clamp-2">
                            {{ $item->titulo }}
                        </h3>
                        <p class="text-sm font-medium text-gray-500">
                            Por <span class="text-gray-900">{{ $item->author->nombre }}. {{ $item->author->apellidos }}</span>
                        </p>
                    </div>

                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <div class="grid grid-cols-3 gap-2 text-center">

                            <div class="flex flex-col">
                                <span
                                    class="text-[10px] uppercase text-gray-400 font-semibold tracking-wider">Año</span>
                                <span class="text-sm font-bold text-gray-700">{{ $item->año_publicacion }}</span>
                            </div>

                            <div class="flex flex-col border-l border-r border-gray-100">
                                <span
                                    class="text-[10px] uppercase text-gray-400 font-semibold tracking-wider">Editorial</span>
                                <span class="text-sm font-bold text-gray-700  px-1">{{ $item->editorial }}</span>
                            </div>

                            <div class="flex flex-col">
                                <span
                                    class="text-[10px] uppercase text-gray-400 font-semibold tracking-wider">Págs</span>
                                <span class="text-sm font-bold text-gray-700">{{ $item->num_paginas }}</span>
                            </div>

                        </div>
                    </div>

                </div>
            </article>
        @endforeach


    </div>
    <div class="mt-2">
        {{ $libros->links() }}
    </div>
</x-mios.base>
