<x-app-layout>
    @include('layouts.itemdemande')
    <x-slot name="header">
        <div class="flex items-center justify-between px-0">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Demandes') }}
            </h2>
            <div class="flex items-center justify-between my-4">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" data-tooltip-target="tooltip-new"
                    type="button"
                    class="inline-flex items-center justify-center w-14 h-14 font-medium bg-orange-400 rounded-full hover:bg-gray-700 group focus:ring-4 focus:ring-blue-200 focus:outline-none dark:focus:ring-gray-700">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                    <span class="sr-only">New item</span>
                </button>
            </div>
            <div id="tooltip-new" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Demander une course
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>


        </div>
    </x-slot>

    <div class=" py-12 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Motifs
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lieu de depart
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destination
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date et Heure de deplacement
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Nbr de passagers
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Statut
                    </th>
                    
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($demandes as $i => $item)
                    <tr class="bg-white border-b dark:bg-gray-800">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $i + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->motif }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->lieu_depart }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->destination }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->date_deplacement }}

                        </td>
                        <td class="px-6 py-4">
                            {{ $item->nbre_passagers }}

                        </td>
                        <td class="px-6 py-4">
                            {{ $item->status }}

                        </td>
                        <td>
                            <a href="#"
                                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-orange-600 to-orange-500 group-hover:from-orange-600 group-hover:to-orange-300 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                <span
                                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Editer
                                </span>
                            </a>
                        </td>
                        <td>
                            <a
                                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-orange-300 group-hover:from-orange-600 group-hover:to-orange-300 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                <span
                                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                   Supprimer
                                </span>
                            </a>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
