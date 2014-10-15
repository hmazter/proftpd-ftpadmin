<?php

class Login extends Eloquent  {

	protected $table = 'logins';

    public static function getStructuredLoginData($days)
    {
        $logins = Login::
            selectRaw('date(`when`) as date, count(*) as logins')
            ->groupBy('date')
            ->get();

        // Add all days with 0 values
        $loginDataStructured = array();
        for($day = 0; $day < $days; $day++){
            $loginDataStructured[date('Y-m-d', strtotime("- {$day}days"))] = 0;
        }

        foreach ($logins as $login) {
            $loginDataStructured[$login->date] = $login->logins;
        }

        return $loginDataStructured;
    }
}
