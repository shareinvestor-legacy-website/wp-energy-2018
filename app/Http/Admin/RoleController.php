<?php

namespace BlazeCMS\Http\Admin;


use BlazeCMS\Requests\RoleRequest;
use BlazeCMS\Services\RoleService;
use Illuminate\Http\Request;


class RoleController extends AdminController
{

    private $roleService;


    public function __construct(RoleService $roleService)
    {

        $this->roleService = $roleService;

        //repopulate permission if newly added
        $this->roleService->populate();
    }



    public function index(Request $request)
    {



        $name = $request->name;
        $roles = $this->roleService->query($request);


        return view('auth.role.index', compact('name', 'roles'));
    }


    public function create()
    {
        $auths = config('user.auth');

        return view('auth.role.create', compact('auths'));
    }


    public function store(RoleRequest $request)
    {
        $text = $this->roleService->store($request);
        flash_success('The items has been successfully created');

        return redirect()->action('Admin\RoleController@index');

    }


    public function edit($id)
    {
        $auths = config('user.auth');
        $role = $this->roleService->find($id);


        return view('auth.role.edit', compact('role', 'auths'));
    }


    public function update(RoleRequest $request, $id)
    {
        $this->roleService->update($request, $id);
        flash_success('The items has been successfully updated');

        return back();
    }


    public function destroy($id)
    {

        $this->roleService->destroy($id);

        flash_success('The item has successfully deleted');

        return redirect()->action('Admin\RoleController@index');
    }


}
