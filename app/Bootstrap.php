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
        // add some pre-defined routes here
        $router->addConfig(Yaf_Registry::get("config")->routes);

        //  http://***/product/list/22/foo
        //    [module] =>
        //    [controller] => product
        //    [action] => info
        //    [method] => GET
        //    [params:protected] => Array
        //        (
        //            [id] => 22
        //            [name] => foo
        //        )

        $route = new Yaf_Route_Rewrite(
     　    '/product/list/:id/:name',
     　    array(
        　　　　'controller' => 'product',
        　　　　'action' => 'info'
        　　)
        );
        $router->addRoute('dummy', $route);
    }

    public function _initView(Yaf_Dispatcher $dispatcher) {
    }

    public function _initLoader($dispatcher) {
        // register Composer
        // Yaf_Loader::import(APPLICATION_PATH . "/vendor/autoload.php");
        Yaf_Loader::getInstance()->registerLocalNameSpace(array("DB"));

        // register database
        Yaf_Loader::import(APPLICATION_PATH . "/app/library/Database.php");
    }
}
