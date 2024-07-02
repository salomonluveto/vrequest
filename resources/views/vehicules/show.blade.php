<x-app-layout>
   
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Liste des vehicules') }}
        </div>
    </x-slot>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg my-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Plaque
                </th>
                <th scope="col" class="px-6 py-3">
                    Marque
                </th>
                <th scope="col" class="px-6 py-3">
                    Capacité
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($result->isNotEmpty())
                @foreach ($result as $vehicule)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vehicule->plaque }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $vehicule->marque }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $vehicule->capacite }}
                        </td>
                        <td class="px-6 py-4">
                                <a onclick="#" href="#" data-modal-target="crud-modal1" data-modal-toggle="crud-modal1"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" >Affecter</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td colspan="4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Aucun résultat trouvé.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

</x-app-layout>