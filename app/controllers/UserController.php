<?php

class UserController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth');
    }

    public function getUsers()
    {
        $users = User::all();

        return View::make('users')->with('users', $users);
    }

}
