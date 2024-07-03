@props(['vehicules','chauffeurs','demandes'])
<x-app-layout>
   
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('details de la Demande') }}
            </h2>
        </div>
    </x-slot>
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
                            <th scope="col" class="px-6 py-3">id</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Ticket</th>
                            <th scope="col" class="px-6 py-3">Motifs</th>
                            <th scope="col" class="px-6 py-3">Lieu de depart</th>
                            <th scope="col" class="px-6 py-3">Destination</th>
                            <th scope="col" class="px-6 py-3">Date et Heure de deplacement</th>
                            <th scope="col" class="px-6 py-3">Nbr de passagers</th>                            
                            <th scope="col" class="px-6 py-3">vehicule</th>
                            <th scope="col" class="px-6 py-3">chauffeur</th>
                            <th scope="col" class="px-6 py-3">commentaire</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $demandes->id }}</td>
                                <td class="px-6 py-4">{{ $demandes->date }}</td>
                                <td class="px-6 py-4">{{ $demandes->ticket }}</td>
                                <td class="px-6 py-4">{{ $demandes->motif }}</td>
                                <td class="px-6 py-4">{{ $demandes->lieu_depart }}</td>
                                <td class="px-6 py-4">{{ $demandes->destination }}</td>
                                <td class="px-6 py-4">{{ $demandes->date_deplacement }}</td>
                                <td class="px-6 py-4">{{ $demandes->nbre_passagers }}</td>
                                @if ($courses->count() > 0)
                                @foreach ($courses as $course)
                                <td class="px-6 py-4">{{ $course->vehicule->plaque }}</td>
                                <td class="px-6 py-4">{{ $course->chauffeur->user->username }}</td>
                                <td class="px-6 py-4">{{ $course->commentaire }}</td>
                                
                            </tr>
                        @endforeach
                        @else
                            <p class="my-4 px-4">Aucune course associée à cette demande.</p>
                        @endif
                    </tbody>                      
                </table>
                </div>            

<x-savecourse :vehicules="$vehicules" :chauffeurs="$chauffeurs" :demandes="$demandes" :message="__('Voulez-vous enregistrer une course ?')" />
    <x-slot name="scripts">      
    </x-slot>
</x-app-layout>
