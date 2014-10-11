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

        return Response::json(true);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return Response::json(true);
    }
}
