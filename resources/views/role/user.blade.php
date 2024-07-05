
           
       
                  @if ($modelname[$j]==='User')
                    
                    @foreach ($per as $permission)

                            @if (in_array($permission, $tab))
                        

                            <td class="px-7 py-4">
                                @if ($permission==='lire')
                                    <div class="flex items-center">
                                        <input data-modal-target="des-modal"  data-modal-toggle="des-modal"   onclick="Dlire(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                    </div>
                                @endif


                                @if ($permission==='enregistrer')
                                    <div class="flex items-center">
                                        <input data-modal-target="des-modal"  data-modal-toggle="des-modal"   onclick="Denregistrer(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                    </div>
                                @endif


                                @if ($permission==='modifier')
                                    <div class="flex items-center">
                                        <input data-modal-target="des-modal"  data-modal-toggle="des-modal"   onclick="Dmodifier(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                    </div>
                                @endif


                                @if ($permission==='supprimer')
                                    <div class="flex items-center">
                                        <input data-modal-target="des-modal"  data-modal-toggle="des-modal"   onclick="Dsupprimer(event)" id="checkbox-all-search" name="{{$permission}}" @checked(true) type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <a id="d-{{$permission}}" href="{{route('desactiver_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                    </div>
                                @endif
                            </td>
                            @endif

                            
                            @if (!in_array($permission, $tab))


                            <td class="px-7 py-4" >
                                @if ($permission === 'lire')
                                    <div class="flex items-center">
                                        <input data-modal-target="check-modal"  data-modal-toggle="check-modal"  id="checkbox" onclick="Lire(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                                        <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                        
                                    </div>
                                @endif


                                @if ($permission === 'enregistrer')
                                    <div class="flex items-center">
                                        <input data-modal-target="check-modal"  data-modal-toggle="check-modal"  id="checkbox" onclick="Enregistrer(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                                        <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                        
                                    </div>
                                @endif


                                @if ($permission === 'modifier')
                                    <div class="flex items-center">
                                        <input data-modal-target="check-modal"  data-modal-toggle="check-modal"  id="checkbox" onclick="Modifier(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                                        <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                        
                                    </div>
                                @endif


                                @if ($permission === 'supprimer')
                                    <div class="flex items-center">
                                        <input data-modal-target="check-modal"  data-modal-toggle="check-modal"  id="checkbox" onclick="Supprimer(event)"  type="checkbox" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 rounded focus:ring-v-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="checkbox_{{$permission}}">
                                        <a id="check-{{$permission}}" href="{{route('assign_permission',['name' => $permission, 'role' => $roleId])}}"></a>
                                        
                                    </div>
                                @endif
                            
                            </td>
                        
                            @endif
                            
                            
                      
                            
                    @endforeach

           
                @endif
                    
   
<x-checkboxDes/>
<x-checkboxAdd/>