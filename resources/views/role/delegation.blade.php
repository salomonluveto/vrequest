
@if ($modelname[$j]==='Delegation')
             
@foreach ($per_delegation as $permission)

        @if (in_array($permission, $tab))
    

        <td class="px-7 py-4">
            @if ($permission==='lire_delegation')
                <div class="flex items-center">
                    <input data-modal-target="des-delegation"  data-modal-toggle="des-delegation"  onclick="DesLired(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='enregistrer_delegation')
                <div class="flex items-center">
                    <input data-modal-target="des-delegation"  data-modal-toggle="des-delegation"   onclick="DesEnregistrerd(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='modifier_delegation')
                <div class="flex items-center">
                    <input data-modal-target="des-delegation"  data-modal-toggle="des-delegation"   onclick="DesModifierd(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='supprimer_delegation')
                <div class="flex items-center">
                    <input data-modal-target="des-delegation"  data-modal-toggle="des-delegation"   onclick="DesSupprimerd(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif
        </td>
        @endif

        
        @if (!in_array($permission, $tab))


        <td class="px-7 py-4" >
            @if ($permission === 'lire_delegation')
                <div class="flex items-center">
                    <input data-modal-target="check-delegation"  data-modal-toggle="check-delegation"  id="checkbox" onclick="Lired(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'enregistrer_delegation')
                <div class="flex items-center">
                    <input data-modal-target="check-delegation"  data-modal-toggle="check-delegation"  id="checkbox" onclick="Enregistrerd(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'modifier_delegation')
                <div class="flex items-center">
                    <input data-modal-target="check-delegation"  data-modal-toggle="check-delegation"  id="checkbox" onclick="Modifierd(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'supprimer_delegation')
                <div class="flex items-center">
                    <input data-modal-target="check-delegation"  data-modal-toggle="check-delegation"  id="checkbox" onclick="Supprimerd(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif
        
        </td>
    
        @endif
        
        
  
        
@endforeach


@endif


<x-delegation.check/>

<x-delegation.des/>

