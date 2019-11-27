<?php
/**
 * Description:
 * Author: WangSx
 * DateTime: 2019-11-27 23:42
 */

namespace Keepondream\serviceSingleInstance;


use Keepondream\serviceSingleInstance\Base\StaticBase;

/**
 * Author: WangSx
 * DateTime: 2019-11-27 23:47
 * Class Service
 * @package Keepondream\serviceSingleInstance
 * @method static $this getInstance()
 */
class Service extends StaticBase
{
    /**
     * Description: 获取实例自己
     * Author: WangSx
     * DateTime: 2019-11-27 23:49
     * @return $this
     */
    public function _getInstance()
    {
        return $this;
    }

}