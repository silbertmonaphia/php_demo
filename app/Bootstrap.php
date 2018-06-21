<?php
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
         $router = Yaf_Dispatcher::getInstance()->getRouter();
         $router->addConfig(Yaf_Registry::get("config")->routes);
#         $route = new Yaf_Route_Rewrite(
#     　　    'product/:name/:value',
#     　　    array(
#         　　　　'controller' => 'Index',
#         　　　　'action' => 'index'
#         　　)
#         );
#         $router->addRoute('product', $route);
    }

    public function _initView(Yaf_Dispatcher $dispatcher) {
    }

    public function _initAutoload() {
        // register Composer
        // Yaf_Loader::import(APPLICATION_PATH . "/vendor/autoload.php");
        // register database
        Yaf_Loader::import(APPLICATION_PATH . "/app/library/Database.php");
    }
}
