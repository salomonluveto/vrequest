<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $manager = UserInfo::where('user_id',Session::get('authUser')->id)->get();
        foreach ($manager as $value) {
            $manager_email = $value->email_manager;
        }
      $user = Session::get('authUser');
      $roles = $user->roles;
      $role = [];
      foreach($roles as $item){
        $role[] = $item->name;
      }

      if(count($role)==0){
        return view('profile.edit',compact('manager_email'));
      }
    
        
        return view('profile.edit',compact('manager_email','role'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
       
       

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
