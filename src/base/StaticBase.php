<?php
/**
 * Author: WangSx
 * DateTime: 2019-11-27 23:38
 */

namespace Keepondream\serviceSingleInstance\Base;

/**
 * Author: WangSx
 * DateTime: 2019-11-27 23:50
 * Class StaticBase
 * @package Keepondream\serviceSingleInstance\Base
 */
abstract class StaticBase implements InstanceInterface
{
    /**
     * @var array
     */
    private static $instanceArray = [];

    /**
     * Description: init
     * Author: WangSx
     * DateTime: 2019-11-27 23:38
     * @return mixed
     */
    private static function init()
    {
        $className = get_called_class();
        if (!array_key_exists($className, self::$instanceArray)) {
            self::$instanceArray[$className] = new static();
        }

        return self::$instanceArray[$className];
    }

    /**
     * Description: callStatic
     * Author: WangSx
     * DateTime: 2019-11-27 23:38
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::init()->{$name}(...$arguments);
    }

    /**
     * Description: called func
     * Author: WangSx
     * DateTime: 2019-11-27 23:38
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        $method_exists = method_exists($this, $name);
        if (!$method_exists) {
            $name = '_' . ucfirst($name);
            $method_exists_called = method_exists($this, $name);
            if (!$method_exists_called) {
                $className = get_called_class();
                throw new \Exception($className . ' has not found method : ' . $name . '()' . ' ; ');
            }
        }

        return $this->{$name}(...$arguments);
    }

}