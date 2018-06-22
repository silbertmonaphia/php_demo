<?php
class BaseController extends Yaf_Controller_Abstract {
      public function init() {
          // Yaf_Controller_Abstract will invoke init() method automatically
          // when it's instantialized
          if ($this->getRequest()->isXmlHttpRequest()){
              //Yaf_Dispatcher::getInstance()->autoRender(False);
              Yaf_Dispatcher::getInstance()->disableView();
          }
          Yaf_Dispatcher::getInstance()->disableView();
      }
      
      public function __errResponseJson($errcode = -1, $errmsg = 'failed') {
            $res = array('errcode' => $errcode, 'errmsg' => $errmsg);
            $this->getResponse()->setBody(json_encode($res));
      }

      public function __responseJson($data = NULL, $errcode = 0, $errmsg ='success') {
            $res = array('errcode' => $errcode, 'errmsg' => $errmsg, 'data' => $data);
            $this->getResponse()->setBody(json_encode($res));
      }
}
