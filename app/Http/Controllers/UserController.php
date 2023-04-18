<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminChangePasswordRequest;
use App\Http\Requests\AdminUpdateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        try{
            $users = User::orderByDesc('id')->whereRoleId(1)->get();
            return view('admin.user.index', compact('users'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function changePassword(AdminChangePasswordRequest $request){
        try{
            User::whereRoleId(2)->first()->update(['password' => Hash::make($request->password)]);
            return redirect()->back()->with('success', 'Üstünlikli üýtgedildi');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function updateProfile(AdminUpdateProfileRequest $request){
        try{
            User::whereRoleId(2)->first()->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'username' => $request->username,
            ]);
            return redirect()->back()->with('success', 'Üstünlikli üýtgedildi');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, User $user)
    {
        try{
            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'phone' => $request->phone,
                'status' => (boolean)$request->status
            ]);
            return redirect()->back()->with('success', 'Üstünlikli üýtgedildi.');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();
            return redirect()->back()->with('success', 'Üstünlikli pozuldy.');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
