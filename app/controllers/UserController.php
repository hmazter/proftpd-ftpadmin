<?php

class UserController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth');
    }

    public function getUsers()
    {
        $users = User::all();
        $groups = Group::all();

        return View::make('users.users')->with(
            array(
                'users' => $users,
                'groups' => $groups
            )
        );
    }

    public function getUser($id = 0)
    {
        $user = User::find($id);
        return Response::json($user);
    }

    public function saveUser()
    {
        $id = Input::get('id');
        $fields = Input::only(array('userid', 'userid', 'gid', 'homedir', 'shell'));
        $user = User::updateOrCreate(array('id' => $id), $fields);
        if(Input::has('passwd')) {      // update stored password with mysql password function
            DB::update('UPDATE users SET passwd = PASSWORD(?) WHERE id=?', array(Input::get('passwd'), $user->id));
        }
        return Response::json(true);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return Response::json(true);
    }

    public function online()
    {
        return View::make('users.online')->with(
            array(
                'online'    => FTPUtils::count(),
                'users'     => FTPUtils::who()
            )
        );
    }
}
