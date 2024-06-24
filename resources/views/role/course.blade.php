
@if ($modelname[$j]==='Course')
             
@foreach ($per_course as $permission)

        @if (in_array($permission, $tab))
    

        <td class="px-7 py-4">
            @if ($permission==='lire_course')
                <div class="flex items-center">
                    <input data-modal-target="des-course"  data-modal-toggle="des-course"  onclick="DesLireCr(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='enregistrer_course')
                <div class="flex items-center">
                    <input data-modal-target="des-course"  data-modal-toggle="des-course"   onclick="DesEnregistrerCr(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='modifier_course')
                <div class="flex items-center">
                    <input data-modal-target="des-course"  data-modal-toggle="des-course"   onclick="DesModifierCr(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif


            @if ($permission==='supprimer_course')
                <div class="flex items-center">
                    <input data-modal-target="des-course"  data-modal-toggle="des-course"   onclick="DesSupprimerCr(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                </div>
            @endif
        </td>
        @endif

        
        @if (!in_array($permission, $tab))


        <td class="px-7 py-4" >
            @if ($permission === 'lire_course')
                <div class="flex items-center">
                    <input data-modal-target="check-course"  data-modal-toggle="check-course"  id="checkbox" onclick="LireCr(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'enregistrer_course')
                <div class="flex items-center">
                    <input data-modal-target="check-course"  data-modal-toggle="check-course"  id="checkbox" onclick="EnregistrerCr(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'modifier_course')
                <div class="flex items-center">
                    <input data-modal-target="check-course"  data-modal-toggle="check-course"  id="checkbox" onclick="ModifierCr(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif


            @if ($permission === 'supprimer_course')
                <div class="flex items-center">
                    <input data-modal-target="check-course"  data-modal-toggle="check-course"  id="checkbox" onclick="SupprimerCr(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                    <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                    
                </div>
            @endif
        
        </td>
    
        @endif
        
        
  
        
@endforeach


@endif


<x-course.checkboxAddPermission/>

<x-course.checkboxDesPermission/>

