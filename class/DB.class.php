<?php
class DB extends mysqli{

    const HOST      = "127.0.0.1";
    const USER      = "shop";
    const PW        = "shop";
    const DB_NAME   = "db_webshop";

    static private $instance;

    public function __construct() {
        parent::__construct(self::HOST, self::USER, self::PW, self::
        DB_NAME);
    }

    public static function getInstance() {
        if ( !self::$instance ) {
            @self::$instance = new self();
            if(self::$instance->connect_errno > 0){
                die("Unable to connect to database [".self::$instance->
                    connect_error."]");
            }
        }
        self::$instance->set_charset("utf8");
        return self::$instance;
    }
    public static function doQuery($sql) {
        return self::getInstance()->query($sql);
    }
}

