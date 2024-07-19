<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Se deconnecter') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is disconnected, all of its resources and data will be permanently saved. Before to disconnect, please save any data or information that you wish to retain.') }}
        </p>
    </header>


            
            <button type="submit" data-modal-target="logout-modal"  data-modal-toggle="logout-modal"   class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Se deconnecter</button>

   
</section>
<x-logout/>
