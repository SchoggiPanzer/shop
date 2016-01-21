<?php

class Product {
    private $title;
    private $description;
    private $price;
    private $mimetype;
    private $image;
    private $pid;
    private $langcode;

    public static function getAllProducts() {
        $products = array();
        $res = DB::doQuery("SELECT t.title, t.description, t.pid, t.langcode, p.price FROM translation t INNER JOIN product p ON t.pid = p.id");
        if($res) {
            while ($product = $res->fetch_object(get_class())) {
                $products[] = $product;
            }
        }
        return $products;
    }

     public static function getMiniProducts($lang) {
        $products = array();
        $res = DB::doQuery("SELECT t.title, t.description, t.pid, p.price, i.mimetype, i.image FROM
              translation t INNER JOIN product p ON t.pid = p.id INNER JOIN image i ON p.id = i.pid WHERE
              t.langcode = '$lang' AND p.cid = 1");
        if($res) {
            while ($product = $res->fetch_object(get_class())) {
                $products[] = $product;
            }
        }
        return $products;
    }

     public function getNormalProducts($lang) {
        $products = array();
        $res = DB::doQuery("SELECT t.title, t.description, t.pid, p.price, i.mimetype, i.image FROM
              translation t INNER JOIN product p ON t.pid = p.id INNER JOIN image i ON p.id = i.pid WHERE
              t.langcode = '$lang' AND p.cid = 2");
        if($res) {
            while ($product = $res->fetch_object(get_class())) {
                $products[] = $product;
            }
        }
        return $products;
    }

    static public function getProductById($id, $lang) {
        $res = DB::doQuery("SELECT t.title, t.description, t.pid, p.price FROM translation t INNER JOIN product p ON t.pid = p.id WHERE p.id = '$id' AND t.langcode = '$lang'");
        if($res){
            $prod = $res->fetch_assoc();
        }
        return $prod;
    }

    public function getId() {
        return $this->pid;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getMime() {
       return $this->mimetype;
    }

    public function getImage() {
        return $this->image;
    }

    public function getLangcode() {
        return $this->langcode;
    }
}