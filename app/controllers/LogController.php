<?php

class LogController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth');
    }

    public function getTransfers()
    {
        $transfers = Transfer::orderBy('when', 'desc')->paginate(50);
        return View::make('logs.transfers')->with(
            array(
                'transfers'    => $transfers
            )
        );
    }

    public function getLogins()
    {
        $logins = Login::orderBy('when', 'desc')->paginate(50);
        return View::make('logs.logins')->with(
            array(
                'logins'    => $logins
            )
        );
    }

}
