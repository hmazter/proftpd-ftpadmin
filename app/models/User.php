<?php

class User extends Eloquent  {

	protected $table = 'users';
	protected $hidden = array('passwd');

    public function group() {
        return $this->hasOne('Group', 'gid', 'gid');
    }
}
