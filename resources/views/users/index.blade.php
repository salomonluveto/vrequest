<x-app-layout>

   

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table id="user" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Numero
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
    
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $i=>$item)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{$i+1}}
                    </th>
                    <td class="px-6 py-4">
                      {{$item->username}}
                    </td>
                    <td class="px-6 py-4">
                        
                        <a href="{{route('user_role.show',$item->id)}}" ><button type="button" class="text-white bg-orange-400 hover:bg-orange-00 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">roles</button></a>  
    
                    </td>
                   
                </tr>
                @endforeach
               
             
            </tbody>
        </table>
    </div>
    <script>
        new DataTable('#user', {
                info: false,
                ordering: false,
                paging: false
            });
     </script>
</x-app-layout>