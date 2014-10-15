<?php

class FTPUtils {

    /**
     * Get the number of users currently connected to the FTP server
     *
     * @return int      the number of connected users
     *
     * Format of ftpcount output:
     *  hmazter@lucy:~$ ftpcount
     *  Master proftpd process 24682:
     *   Service class                      -   2 users
     */
    public  static function count()
    {
        $count = 0;
        $output = array();
        exec('ftpcount', $output, $return);

        if($return == 0) {
            $row = preg_replace('!\s+!', ' ', $output[1]);        // replace multiple spaces with single
            $tokens = explode(' ', $row);
            $count = $tokens[count($tokens)-2];
        }

        return $count;
    }

    /**
     * Get a list of all currently connected users
     *
     * @return array        list with all online users
     *
     * Format of ftpwho output:
     *  hmazter@lucy:~$ ftpwho
     * standalone FTP daemon [24682], up for 1 day,  1 hr 34 min
     * 19354 hmazter  [ 2m44s]  2m43s idle
     * 19586 hmazter  [  1m4s]   1m1s idle
     * Service class                      -   2 users
     */
    public static function who()
    {
        $response = array();
        $output = array();
        exec('ftpwho', $output, $return);

        if($return == 0) {
            for ($i = 1; $i < count($output) - 1; $i++) {
                $row = trim($output[$i]);
                $row = str_replace(array('[', ']'), '', $row);  // remove [ and ]
                $row = preg_replace('!\s+!', ' ', $row);        // replace multiple spaces with single
                $tokens = $tokens = explode(' ', $row);
                $response[] = array(
                    'pid' => $tokens[0],
                    'userid' => $tokens[1],
                    'time' => $tokens[2],
                    'status' => $tokens[4]
                );
            }
        }

        return $response;
    }
} 