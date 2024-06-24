
@if ($modelname[$j]==='Site')
             
@foreach ($per_site as $permission)

        @if (in_array($permission, $tab))
    

        <td class="px-7 py-4">
            @if ($permission==='lire_site')
                <div class="flex items-center">
                    <input data-modal-target="des-site"  data-modal-toggle="des-site"  onclick="DesLireS(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='enregistrer_site')
                <div class="flex items-center">
                    <input data-modal-target="des-site"  data-modal-toggle="des-site"   onclick="DesEnregistrerS(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='modifier_site')
                <div class="flex items-center">
                    <input data-modal-target="des-site"  data-modal-toggle="des-site"   onclick="DesModifierS(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='supprimer_site')
                <div class="flex items-center">
                    <input data-modal-target="des-site"  data-modal-toggle="des-site"   onclick="DesSupprimerS(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif
        </td>
        @endif

        
        @if (!in_array($permission, $tab))


        <td class="px-7 py-4" >
            @if ($permission === 'lire_site')
                <div class="flex items-center">
                    <input data-modal-target="check-site"  data-modal-toggle="check-site"  id="checkbox" onclick="LireS(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'enregistrer_site')
                <div class="flex items-center">
                    <input data-modal-target="check-site"  data-modal-toggle="check-site"  id="checkbox" onclick="EnregistrerS(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'modifier_site')
                <div class="flex items-center">
                    <input data-modal-target="check-site"  data-modal-toggle="check-site"  id="checkbox" onclick="ModifierS(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'supprimer_site')
                <div class="flex items-center">
                    <input data-modal-target="check-site"  data-modal-toggle="check-site"  id="checkbox" onclick="SupprimerS(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif
        
        </td>
    
        @endif
        
        
  
        
@endforeach


@endif


<x-site.checkboxAddPermission/>

<x-site.checkboxDesPermission/>

