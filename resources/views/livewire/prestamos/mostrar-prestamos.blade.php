<div>
    <div class="flex min-h-screen items-start justify-center bg-gray-100 p-8">
    
        <div class="w-full max-w-6xl overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-gray-200">
            
            <div class="bg-indigo-600 px-6 py-4 border-b border-indigo-700">
                <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-layer-group"></i>
                    Listado de Préstamos
                </h2>
            </div>
    
            <div class="overflow-x-auto">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-indigo-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold text-indigo-900">
                                <i class="fa-solid fa-hashtag text-indigo-400 mr-1"></i> ID
                            </th>
                            <th scope="col" class="px-6 py-4 font-semibold text-indigo-900">
                                <i class="fa-solid fa-book text-indigo-400 mr-1"></i> Libro
                            </th>
                            <th scope="col" class="px-6 py-4 font-semibold text-indigo-900">
                                <i class="fa-solid fa-user text-indigo-400 mr-1"></i> Usuario (Email)
                            </th>
                            <th scope="col" class="px-6 py-4 font-semibold text-indigo-900">
                                <i class="fa-regular fa-calendar text-indigo-400 mr-1"></i> Fechas
                            </th>
                            <th scope="col" class="px-6 py-4 font-semibold text-indigo-900">
                                <i class="fa-solid fa-tag text-indigo-400 mr-1"></i> Estado
                            </th>
                            <th scope="col" class="px-6 py-4 font-semibold text-indigo-900"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        
                        <tr class="hover:bg-indigo-50/30 transition-colors duration-200">
                            
                            <td class="px-6 py-4 font-medium text-gray-900">
                                #2584
                            </td>
    
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600">
                                        <i class="fa-solid fa-book-open"></i>
                                    </div>
                                    <div class="font-bold text-gray-800">El Señor de los Anillos</div>
                                </div>
                            </td>
    
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <div class="rounded-full bg-gray-100 p-1.5 text-gray-400">
                                        <i class="fa-solid fa-envelope text-xs"></i>
                                    </div>
                                    <span>alumno@instituto.com</span>
                                </div>
                            </td>
    
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1 text-xs">
                                    <div class="flex items-center gap-2 text-emerald-600 font-medium">
                                        <i class="fa-solid fa-circle-arrow-up"></i>
                                        <span>24 Oct 2023</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-400">
                                        <i class="fa-solid fa-circle-arrow-down"></i>
                                        <span>Pendiente</span>
                                    </div>
                                </div>
                            </td>
    
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700 border border-indigo-200 shadow-sm">
                                    <span class="h-1.5 w-1.5 rounded-full bg-indigo-500 animate-pulse"></span>
                                    Prestado
                                </span>
                            </td>
    
                            <td class="px-6 py-4 text-right">
                                <button class="group rounded-lg p-2 text-gray-400 hover:bg-indigo-50 hover:text-indigo-600 transition-all">
                                    <i class="fa-solid fa-ellipsis-vertical text-lg"></i>
                                </button>
                            </td>
                        </tr>
                        
                        
    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
