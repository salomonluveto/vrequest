@props(['vehicules','chauffeurs','demandes'])
<x-app-layout>
    @include('layouts.itemvehicule')
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Liste des courses') }}
            </h2>
            <form class="flex items-center max-w-sm  mr-4 my-4 " method="GET" action="{{route('vehicules.search')}}">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-400 "
                        placeholder="Ecris la capacité..." name="search" required />
                </div>
                <button type="submit"
                    class="p-2.5 ms-2 text-sm font-medium text-white bg-orange-400 rounded-lg border  hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-450 dark:hover:bg-orange-700 dark:focus:ring-orange-400">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                   
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
    </x-slot>

    <div class="flex text-end items-center justify-end my-4">
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"  data-tooltip-target="tooltip-new" type="button" class="inline-flex items-center justify-center w-14 h-14 font-medium bg-orange-400 rounded-full hover:bg-gray-700 group focus:ring-4 focus:ring-blue-200 focus:outline-none dark:focus:ring-gray-700">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
            <span class="sr-only">New item</span>
        </button>
    </div>
    <div id="tooltip-new" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Ajouter une course
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>  
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-4">

                @if (session('success'))
            <div id="alert-3" class="flex items-center p-4 mb-4 text-orange-800 rounded-lg bg-orange-100 dark:bg-gray-800 dark:text-orange-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Alert</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-orange-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </button>
              </div>
            @endif
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">N°</th>
                            <th scope="col" class="px-6 py-3">vehicule</th>
                            <th scope="col" class="px-6 py-3">chauffeur</th>
                            <th scope="col" class="px-6 py-3">demande</th>
                            <th scope="col" class="px-6 py-3">status</th>
                            <th scope="col" class="px-6 py-3">commentaire</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $course->id }}</td>
                                <td class="px-6 py-4">{{ $course->vehicule->plaque }}</td>
                                <td class="px-6 py-4">{{ $course->chauffeur->user->username }}</td>
                                <td class="px-6 py-4">{{ $course->demande->motif }}</td>
                                <td class="px-6 py-4">{{ $course->status }}</td>
                                <td class="px-6 py-4">{{ $course->commentaire }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>                      
                </table>
                </div>            
<x-savecourse :vehicules="$vehicules" :chauffeurs="$chauffeurs" :demandes="$demandes" :message="__('Voulez-vous enregistrer une course ?')" />
    <x-slot name="scripts">      
    </x-slot>
</x-app-layout>
