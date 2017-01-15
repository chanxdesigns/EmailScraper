<?php

namespace App\Database;


class DB {

    // The Database instance
    private static $db;

    /**
     * Initialize Database Connection
     * @param $dbconn String
     * @param $dbuser String
     * @param $dbpass String
     *
     * @return \PDO
     **/
    public static function init () {
        var_dump(getenv('DB_HOST'));
        if (!self::$db) {
            try {
//                self::$db = new \PDO(getenv('DB_HOST') array(
//                    \PDO::ATTR_PERSISTENT => true
//                ));
            }
            catch (\PDOException $err) {
                echo "Connection failed: ".$err;
            }
        }
        else {
            return self::$db;
        }

        return self::$db;
    }
}