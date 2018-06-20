<?php
/**
 * @name Bootstrap
 * @author smona
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf_Bootstrap_Abstract {

    public function _initConfig() {
		// save app.ini config to global Registry
		$arrConfig = Yaf_Application::app()->getConfig();
		Yaf_Registry::set('config', $arrConfig);
    }

    public function _initPlugin(Yaf_Dispatcher $dispatcher) {
		// register a SamplePlugin
		$create = new CreatePlugin();
		$dispatcher->registerPlugin($create);
    }

    public function _initRoute(Yaf_Dispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
    }
	
    public function _initView(Yaf_Dispatcher $dispatcher) {
		//在这里注册自己的view控制器，例如smarty,firekylin
    }
    
    public function _initAutoload() {
        // register Composer
        // Yaf_Loader::import(APPLICATION_PATH . "/vendor/autoload.php");
        // register database
        Yaf_Loader::import(APPLICATION_PATH . "/app/library/Database.php");
    }
}
