<?php

class Transfer extends Eloquent  {

	protected $table = 'transfers';


    public static function getStructuredAmountData($limit = 0){
        $transferData = DB::table('transfers')
            ->select(DB::raw("date(`when`) as transfer_date, sum(size) as amount, type"))
            ->groupBy("transfer_date")
            ->groupBy("type")
            ->orderBy('transfer_date', 'desc')
            ->limit($limit)
            ->get();

        $transferDataStructured = array();
        foreach($transferData as $row){
            $transferDataStructured[$row->transfer_date][$row->type] = $row->amount;
        }

        return $transferDataStructured;
    }
}
