@if ($modelname[$j]==='Demande')
                    
@foreach ($per_demande as $permission)

        @if (in_array($permission, $tab))
    

        <td class="px-7 py-4">
            @if ($permission==='lire_demande')
                <div class="flex items-center">
                    <input data-modal-target="des-demande"  data-modal-toggle="des-demande"  onclick="DesLireD(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='enregistrer_demande')
                <div class="flex items-center">
                    <input data-modal-target="des-demande"  data-modal-toggle="des-demande"   onclick="DesEnregistrerD(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='modifier_demande')
                <div class="flex items-center">
                    <input data-modal-target="des-demande"  data-modal-toggle="des-demande"   onclick="DesModifierD(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='supprimer_demande')
                <div class="flex items-center">
                    <input data-modal-target="des-demande"  data-modal-toggle="des-demande"   onclick="DesSupprimerD(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif
        </td>
        @endif

        
        @if (!in_array($permission, $tab))


        <td class="px-7 py-4" >
            @if ($permission === 'lire_demande')
                <div class="flex items-center">
                    <input data-modal-target="check-demande"  data-modal-toggle="check-demande"  id="checkbox" onclick="LireD(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'enregistrer_demande')
                <div class="flex items-center">
                    <input data-modal-target="check-demande"  data-modal-toggle="check-demande"  id="checkbox" onclick="EnregistrerD(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'modifier_demande')
                <div class="flex items-center">
                    <input data-modal-target="check-demande"  data-modal-toggle="check-demande"  id="checkbox" onclick="ModifierD(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'supprimer_demande')
                <div class="flex items-center">
                    <input data-modal-target="check-demande"  data-modal-toggle="check-demande"  id="checkbox" onclick="SupprimerD(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif
        
        </td>
    
        @endif
        
        
  
        
@endforeach


@endif


<x-demande.checkboxAddPermission/>

<x-demande.checkboxDesPermission/>

