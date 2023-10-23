<section class="mt-10">
    <div class="mx-auto mmax-w-fit px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex items-center justify-between d p-4">
                <div class="flex">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input  type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                            placeholder="Search" required="">
                    </div>
                </div>
                <div class="flex space-x-3">
                    <div class="flex space-x-3 items-center">
                        <label class="w-40 text-sm font-medium text-gray-900">User Type :</label>
                        <select 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="">All</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">Folio</th>
                            <th scope="col" class="px-4 py-3">No.</th>
                            <th scope="col" class="px-4 py-3">
                                <button>
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </th>
                            <th scope="col" class="px-4 py-3"></th>
                            <th scope="col" class="px-4 py-3">Fecha de recepcion</th>
                            <th scope="col" class="px-4 py-3">Hora de recepcion</th>
                            <th scope="col" class="px-4 py-3">
                                Cliente
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Cesavedac
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Supervisanr
                            </th>
                            <th scope="col" class="px-4 py-3">
                                H. C.
                            </th>
                            <th scope="col" class="px-4 py-3">
                                C. C.
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Croquis
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Fecha resultados analistas
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Fecha resultados clientes
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Reporte entregado
                            </th>
                            <th scope="col" class="px-4 py-3">
                                Desecho de muestras
                            </th>
                            <th scope="col" class="px-4 py-3">
                                PDF
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr class="border-b dark:border-gray-700">
                            <td scope="row"
                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                MFQ-{{ $order->folio }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $order->numero_muestras }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="w-8 h-8 rounded-full bg-{{ $order->aguas_alimentos === 'Aguas' ? 'blue':'yellow' }}-500"></div>
                            </td>
                            <td class="px-4 py-3">
                                <a href="/orders/{{ $order->id }}/edit">
                                    <i class="fas fa-eye text-blue-400"></i>
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                {{ $order->fecha_recepcion }}
                            </td>
                            <td class="px-4 py-3">
                                {{ substr($order->hora_recepcion, 0, 5) }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $order->cliente->cliente }}
                            </td>
                            <td class="px-4 py-3">
                                @if ((int) $order->cesavedac === 1)
                                    <div class="w-8 h-8 rounded-full bg-{{ (int) $order->reporte_cesavedac_entregado ? 'green':'red' }}-500"></div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if ($order->supervision !== false)
                                    <div class="w-8 h-8 rounded-full bg-{{ (int)$order->supervision === 1 ? 'green':'red' }}-500"></div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if(isset($order->siralab))
                                    <div class="w-8 h-8 rounded-full bg-{{ (int)$order->siralab->hoja_campo === 1 ? 'green':'red' }}-500"></div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if(isset($order->siralab))
                                    <div class="w-8 h-8 rounded-full bg-{{ (int)$order->siralab->cadena_custodia === 1 ? 'green':'red' }}-500"></div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if(isset($order->siralab))
                                    <div class="w-8 h-8 rounded-full bg-{{ (int)$order->siralab->croquis === 1 ? 'green':'red' }}-500"></div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                2023-08-18
                            </td>
                            <td class="px-4 py-3">
                                2023-08-21
                            </td>
                            <td class="px-4 py-3">
                                <div class="w-8 h-8 rounded-full bg-red-500"></div>
                            </td>
                            <td class="px-4 py-3">
                                <button class="px-4 py-2 rounded-md border-transparent bg-yellow-500 text-white">
                                    Desechar
                                </button>
                            </td>
                            <td>
                                <button class="px-4 py-2 rounded-md border-transparent bg-green-400 text-white">
                                    PDF
                                </button>
                            </td>
                        </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="py-4 px-3">
                <div class="flex ">
                    <div class="flex space-x-4 items-center mb-3">
                        <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:show-content
        btn-bg-color='bg-blue-500'
        btn-text-color='text-white'
        btn-id='die-screen'
        btn-text='Hellow world'
        bg-color='bg-white'>
        <p>Hola mundo</p>
    </livewire::show-content>
</section>