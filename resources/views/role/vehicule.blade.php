
           
       
                  @if ($modelname[$j]==='Vehicule')
                    
                  @foreach ($per_vehicule as $permission)

                          @if (in_array($permission, $tab))
                      

                          <td class="px-7 py-4">
                              @if ($permission==='lire_vehicule')
                                  <div class="flex items-center">
                                      <input data-modal-target="des-vehicule"  data-modal-toggle="des-vehicule"   onclick="DlireV(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                      <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                  </div>
                              @endif


                              @if ($permission==='enregistrer_vehicule')
                                  <div class="flex items-center">
                                      <input data-modal-target="des-vehicule"  data-modal-toggle="des-vehicule"   onclick="DenregistrerV(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                      <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                  </div>
                              @endif


                              @if ($permission==='modifier_vehicule')
                                  <div class="flex items-center">
                                      <input data-modal-target="des-vehicule"  data-modal-toggle="des-vehicule"   onclick="DmodifierV(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                      <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                  </div>
                              @endif


                              @if ($permission==='supprimer_vehicule')
                                  <div class="flex items-center">
                                      <input data-modal-target="des-vehicule"  data-modal-toggle="des-vehicule"   onclick="DsupprimerV(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                      <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                  </div>
                              @endif
                          </td>
                          @endif

                          
                          @if (!in_array($permission, $tab))


                          <td class="px-7 py-4" >
                              @if ($permission === 'lire_vehicule')
                                  <div class="flex items-center">
                                      <input data-modal-target="check-vehicule"  data-modal-toggle="check-vehicule"  id="checkbox" onclick="LireV(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                                      <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                      
                                  </div>
                              @endif


                              @if ($permission === 'enregistrer_vehicule')
                                  <div class="flex items-center">
                                      <input data-modal-target="check-vehicule"  data-modal-toggle="check-vehicule"  id="checkbox" onclick="EnregistrerV(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                                      <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                      
                                  </div>
                              @endif


                              @if ($permission === 'modifier_vehicule')
                                  <div class="flex items-center">
                                      <input data-modal-target="check-vehicule"  data-modal-toggle="check-vehicule"  id="checkbox" onclick="ModifierV(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                                      <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                      
                                  </div>
                              @endif


                              @if ($permission === 'supprimer_vehicule')
                                  <div class="flex items-center">
                                      <input data-modal-target="check-vehicule"  data-modal-toggle="check-vehicule"  id="checkbox" onclick="SupprimerV(event)"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                                      <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                      
                                  </div>
                              @endif
                          
                          </td>
                      
                          @endif
                          
                          
                    
                          
                  @endforeach

         
              @endif
                  
 

<x-vehicule.checkboxAddPermission/>
<x-vehicule.checkboxDesPermission/>