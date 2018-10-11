<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/28/2016
 * Time: 21:35
 */

namespace BlazeCMS\Services;
;

use Auth;
use BlazeCMS\Models\User;
use Illuminate\Http\Request;


class UserService implements ServiceInterface
{

    public function find($id)
    {
        return User::findOrFail($id);
    }


    public function all()
    {
        return User::all();
    }


    public function query(Request $request)
    {
        $users = User::query()->whereNotIn('username', ['sysadmin', Auth::user()->username]);


        if ($request->filled('username'))
            $users->where('username', 'like', "%{$request->username}%");

        if ($request->filled('email'))
            $users->where('email', 'like', "%{$request->email}%");


        $users->orderBy('username');


        return $users->paginate(setting('admin.paginate.auth.user.perPage'));
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_active = $request->is_active;
        $user->save();


        if ($request->filled('role_names'))
            $user->syncRoles($request->role_names);


        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->filled('password'))
            $user->password = bcrypt($request->password);

        $user->is_active = $request->is_active;
        $user->save();


        if ($request->filled('role_names'))
            $user->syncRoles($request->role_names);


    }


    public function updateProfile(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->email = $request->email;
        if ($request->filled('password'))
            $user->password = bcrypt($request->password);

        $user->save();

    }


    public function destroy($id)
    {
        $tag = User::findOrFail($id);

        $tag->delete();
    }


}