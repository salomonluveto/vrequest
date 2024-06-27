<x-app-layout>
    @include('layouts.itemdemande')
    <x-slot name="header">
        <div class="flex items-center justify-between px-0">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Demandes') }}
            </h2>
            <div class="flex items-center justify-between my-4">
                <a href="{{ route('demandes.create') }}" data-tooltip-target="tooltip-new" type="button"
                    class="inline-flex items-center justify-center w-14 h-14 font-medium bg-orange-400 rounded-full hover:bg-gray-700 group focus:ring-4 focus:ring-blue-200 focus:outline-none dark:focus:ring-gray-700">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                    <span class="sr-only">New item</span>
                </a>
            </div>
            <div id="tooltip-new" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-1 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Demander une course
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

        </div>
    </x-slot>
    @if(session('success'))
        <div class="flex p-4 mb-4 text-sm rounded-lg bg-green-500 " id="success-message">
            {{session('success')}}
        </div>
        <script>
            // Faire disparaître le message de succès après 5 secondes
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 5000) 
        </script>
    @endif
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
                    {{-- <th></th>
                    <th></th> --}}
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    {{-- <th></th> --}}
                    
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
                <!--
                        <td class="px-6 py-4">
                            <a href="{{route('demandes.edit', $item->id)}}"
                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                    Editer
                            </a>
                        </td> 
                        <td>  
                            <a onclick="supprimer(event);" data-modal-target="delete-modal"
                                data-modal-toggle="delete-modal" href="{{ route('demandes.destroy', $item->id) }}"
                                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    Supprimer
                            </a>
                        </td>
                        <td>
                            <a href="{{route('envoyermailauchefcharroi')}}"
                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                    Valider
                            </a>
                        </td>
                        <td>
                            <a onclick="supprimer(event);" data-modal-target="delete-modal"
                                data-modal-toggle="delete-modal" href="{{ route('demandes.destroy', $item->id) }}"
                                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    Annuler
                            </a>

                        </td>
                    -->

                    <td>
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{$i}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                </svg>
                                
                                
                                <!-- Dropdown menu -->
                                <div id="dropdownDots{{$i}}"  class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <a href="{{route('demandes.edit', $item->id)}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editer</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('demandes.destroy', $item->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Supprimer</a>
                                        </li>
                                        <li>
                                            <a href="{{route('envoyermailauchefcharroi')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Valider</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('demandes.destroy', $item->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Annuler</a>
                                        </li>
                                    </ul>
                                    {{-- <div class="py-2">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated link</a>
                                    </div> --}}
                                </div>
                            </button>  
                            {{-- <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                            </svg>
                            </button>  --}}
                            
                            <!-- Dropdown menu -->
                            {{-- <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editer</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Supprimer</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Valider</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Valider</a>
                                </li>
                                </ul>
                                <div class="py-2">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated link</a>
                                </div>
                            </div>  --}}
                        </td>     
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-deleteDemande :message="__('Voulez-vous vraiment supprimer cette demande ?')" />
    
</x-app-layout>
