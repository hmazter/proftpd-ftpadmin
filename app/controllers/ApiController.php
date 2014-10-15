<?php

class ApiController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth');
    }

    public function getOnlineCount()
    {
        return Response::json(
            array(
                'count' => FTPUtils::count()
            )
        );
    }

    public function getOnlineList()
    {
        return Response::json(
            array(
                'online' => FTPUtils::who()
            )
        );
    }

}
