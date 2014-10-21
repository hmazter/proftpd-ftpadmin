<?php

class HomeController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth');
    }

    public function dashboard()
    {
        $transferData = Transfer::getStructuredAmountData(30);
        $logins = Login::limit(10)->orderBy('when', 'desc')->get();
        $transfers = Transfer::limit(10)->orderBy('when', 'desc')->get();

        return View::make('dashboard')->with(
            array(
                'transferData' => $transferData,
                'logins'       => $logins,
                'transfers'    => $transfers,
                'serverStatus' => FTPUtils::acceptingConnections()
            )
        );
    }

    public function charts()
    {
        $transferData = Transfer::getStructuredAmountData(30);
        $logins = Login::getStructuredLoginData(30);

        return View::make('charts')->with(
            array(
                'transferData'  => $transferData,
                'logins'        => $logins
            )
        );
    }

}
