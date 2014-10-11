<?php

class GroupController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth');
    }

    public function getGroups()
    {
        $groups = Group::all();

        return View::make('groups')->with('groups', $groups);
    }

}
