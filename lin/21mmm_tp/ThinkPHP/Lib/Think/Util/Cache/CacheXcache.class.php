<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://domain All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: name
// +----------------------------------------------------------------------
// $Id$

/**
 +------------------------------------------------------------------------------
 * Xcache缓存类
 +------------------------------------------------------------------------------
 * @category   Think
 * @package  Think
 * @subpackage  Util
 * @author    name
 * @version   $Id$
 +------------------------------------------------------------------------------
 */
class CacheXcache extends Cache
{

    /**
     +----------------------------------------------------------
     * 架构函数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     */
    public function __construct($options='')
    {
        if ( !function_exists('xcache_info') ) {
            throw_exception(L('_NOT_SUPPERT_').':Xcache');
        }
        $this->type = strtoupper(substr(__CLASS__,6));
		$this->expire = isset($options['expire'])?$options['expire']:C('DATA_CACHE_TIME');
    }

    /**
     +----------------------------------------------------------
     * 读取缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     +----------------------------------------------------------
     * @return mixed
     +----------------------------------------------------------
     */
    public function get($name)
    {
		$this->Q(1);
		if (xcache_isset($name)) {
			return xcache_get($name);
		}
        return false;
    }

    /**
     +----------------------------------------------------------
     * 写入缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     * @param mixed $value  存储数据
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function set($name, $value,$expire='')
    {
		$this->W(1);
		if(empty($expire)) {
			$expire = $this->expire ;
		}
		return xcache_set($name, $value, $expire);
    }

    /**
     +----------------------------------------------------------
     * 删除缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function rm($name)
    {
		return xcache_unset($name);
    }

}//类定义结束
?>