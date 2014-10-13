<?php

class Transfer extends Eloquent  {

	protected $table = 'transfers';


    /**
     * Get transferred amount grouped by date and type
     *
     * @param int   $days   number of days to get back in time
     * @return array
     */
    public static function getStructuredAmountData($days){
        $transferData = DB::table('transfers')
            ->select(DB::raw("date(`when`) as transfer_date, sum(size) as amount, type"))
            ->groupBy("transfer_date")
            ->groupBy("type")
            ->orderBy('transfer_date', 'desc')
            ->limit($days / 2)
            ->get();

        // Add all days with 0 values
        $transferDataStructured = array();
        for($day = 0; $day < $days; $day++){
            $transferDataStructured[date('Y-m-d', strtotime("- {$day}days"))] = array(
                'RETR'  => 0,
                'STOR'  => 0
            );
        }

        // add data from database to matched dates
        foreach($transferData as $row){
            if(isset($transferDataStructured[$row->transfer_date])) {
                $transferDataStructured[$row->transfer_date][$row->type] = $row->amount;
            }
        }

        return $transferDataStructured;
    }

    /**
     * Get the size of this transfer in human readable size with unit
     *
     * @return string       size with correct unit
     */
    public function sizeFormatted()
    {
        $units = array('B', 'KiB', 'MiB', 'GiB', 'TiB');
        $unit_count = 0;
        $size = $this->size;
        while ($size > 1024) {
            $size = $size / 1024;
            $unit_count++;
        }
        return number_format($size, 2) . " ".$units[$unit_count];
    }
}
