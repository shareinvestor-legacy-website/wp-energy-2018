<?php

namespace BlazeCMS\Http\Admin;


use Auth;

use BlazeCMS\Requests\UserEditRequest;
use BlazeCMS\Requests\UserProfileRequest;
use BlazeCMS\Requests\UserStoreRequest;
use BlazeCMS\Requests\UserUpdateRequest;
use BlazeCMS\Services\RoleService;
use BlazeCMS\Services\UserService;
use Illuminate\Http\Request;


class UserController extends AdminController
{

    private $userService;
    private $roleService;


    public function __construct(UserService $userService, RoleService $roleService)
    {

        $this->userService = $userService;
        $this->roleService = $roleService;
    }


    public function index(Request $request)
    {

        $username = $request->username;
        $email = $request->email;
        $users = $this->userService->query($request);


        return view('auth.user.index', compact('username', 'email', 'users'));
    }


    public function create()
    {
        $roles = $this->roleService->all();
        $role_names = [];

        return view('auth.user.create', compact('roles', 'role_names'));
    }


    public function store(UserStoreRequest $request)
    {
        $this->userService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\UserController@index');

    }


    public function edit(UserEditRequest $request,$id)
    {

        $user = $this->userService->find($id);
        $roles = $this->roleService->all();
        $role_names = $user->roles->pluck('name')->all();

        return view('auth.user.edit', compact('user','roles', 'role_names'));
    }


    public function update(UserUpdateRequest $request, $id)
    {
        $this->userService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }



    public function profile()
    {


        $user = $this->userService->find(Auth::user()->id);
        $roles = $this->roleService->all();
        $role_names = $user->roles->pluck('name')->all();

        return view('auth.user.profile', compact('user','roles', 'role_names'));
    }


    public function updateProfile(UserProfileRequest $request)
    {
        $this->userService->updateProfile($request);
        flash_success('The info has been successfully updated');

        return back();
    }



    public function destroy($id)
    {

        $this->userService->destroy($id);

        flash_success('The item has successfully deleted');

        return redirect()->action('Admin\UserController@index');
    }


}
