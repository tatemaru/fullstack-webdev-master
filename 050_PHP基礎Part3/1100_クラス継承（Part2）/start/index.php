<?php
/**
 * クラス継承
 */
abstract class Person
{
    private $name;
    public $age;
    public static $WHERE = 'Earth';

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
        echo self::$WHERE;
        echo static::$WHERE;
    }

    abstract function hello();

    static function bye() {
        echo 'bye';
    }
}

class Japanese extends Person{

    // public static $WHERE = '日本';

    function __construct($name, $age)
    {
        parent::__construct($name, $age);
        $this->name = $name;
        $this->age = '30';
    }

    function hello() {
        echo 'こんにちは、 ' . $this->name;
        return $this;
    }

    function jusho() {
        echo '住所は ' . static::$WHERE . 'です。';
        return $this;
    }
}

$taro = new Japanese('太郎', 18);
// $taro->jusho();
// $taro->jusho();

// $bob = new Person('Bob', 18);
// $bob->hello();