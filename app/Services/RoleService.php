<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/28/2016
 * Time: 21:35
 */

namespace BlazeCMS\Services;


use BlazeCMS\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class RoleService implements ServiceInterface
{


    //if add new permission, try repopulate
    public function populate()
    {
        $modules = config('user.auth');

        foreach ($modules as $module) {
            foreach ($module['permissions'] as $permission => $desc) {
                try {
                    Permission::findByName($permission);
                } catch (Exception $e) {
                    Permission::create(['name' => $permission]);
                }
            }
        }
    }

    private function synPermissions(Request $request, Role $role)
    {

        $permissions = $request->except(['name', '_token', '_method']);
        $role->syncPermissions($permissions);
    }

    public function all()
    {
        return Role::orderBy('name')->get();

    }

    public function query(Request $request)
    {
        $roles = Role::query();


        if ($request->filled('name'))
            $roles->where('name', 'like', "%{$request->name}%");


        $roles->orderBy('name');


        return $roles->paginate(setting('admin.paginate.auth.role.perPage'));
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->save();

        $this->synPermissions($request, $role);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        $this->synPermissions($request, $role);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();
    }


    public function find($id)
    {
        return Role::findOrFail($id);
    }
}