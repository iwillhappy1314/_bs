<?php

namespace WenpriseSpaceName;

class Init
{
    /**
    * 存储单例实例
    */
    private static ?Init $instance = null;

    
    /**
    * 私有克隆方法，防止克隆对象
    */
    private function __clone() {
    }

    /**
    * 私有反序列化方法，防止反序列化创建对象
    */
    private function __wakeup() {
    }

    /**
    * 获取单例实例的静态方法
    */
    public static function get_instance(): ?Init
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }


     /**
    * 私有构造函数，防止直接实例化
    */
    private function __construct() {
        add_action('init', array($this, 'init'));
    }


    function init(){
        $classes = [
            Frontend::class,
        ];

        foreach ($classes as $class) {
            new $class;
        }
    }
}
