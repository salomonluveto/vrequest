
@if ($modelname[$j]==='Chauffeur')
             
@foreach ($per_chauffeur as $permission)

        @if (in_array($permission, $tab))
    

        <td class="px-7 py-4">
            @if ($permission==='lire_chauffeur')
                <div class="flex items-center">
                    <input data-modal-target="des-chauffeur"  data-modal-toggle="des-chauffeur"  onclick="DesLireC(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='enregistrer_chauffeur')
                <div class="flex items-center">
                    <input data-modal-target="des-chauffeur"  data-modal-toggle="des-chauffeur"   onclick="DesEnregistrerC(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='modifier_chauffeur')
                <div class="flex items-center">
                    <input data-modal-target="des-chauffeur"  data-modal-toggle="des-chauffeur"   onclick="DesModifierC(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='supprimer_chauffeur')
                <div class="flex items-center">
                    <input data-modal-target="des-chauffeur"  data-modal-toggle="des-chauffeur"   onclick="DesSupprimerC(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif
        </td>
        @endif

        
        @if (!in_array($permission, $tab))


        <td class="px-7 py-4" >
            @if ($permission === 'lire_chauffeur')
                <div class="flex items-center">
                    <input data-modal-target="check-chauffeur"  data-modal-toggle="check-chauffeur"  id="checkbox" onclick="LireC(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'enregistrer_chauffeur')
                <div class="flex items-center">
                    <input data-modal-target="check-chauffeur"  data-modal-toggle="check-chauffeur"  id="checkbox" onclick="EnregistrerC(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'modifier_chauffeur')
                <div class="flex items-center">
                    <input data-modal-target="check-chauffeur"  data-modal-toggle="check-chauffeur"  id="checkbox" onclick="ModifierC(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'supprimer_chauffeur')
                <div class="flex items-center">
                    <input data-modal-target="check-chauffeur"  data-modal-toggle="check-chauffeur"  id="checkbox" onclick="SupprimerC(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif
        
        </td>
    
        @endif
        
        
  
        
@endforeach


@endif


<x-chauffeur.checkboxAddPermission/>

<x-chauffeur.checkboxDesPermission/>

