<?php
class IndexController extends Yaf_Controller_Abstract {
      public function indexAction($name, $val) {
          // route args handling
          // DB_Demo_
          // $name = $this->getRequest()->getParam('name');
          // $val = $this->getRequest()->getParam('value');

          // db manipulation
          $cursor = Database::getInstance();
          $rows = $cursor->query('SELECT role_job FROM tbllog_create;');
          $res = $rows->fetch(PDO::FETCH_ASSOC);
          foreach ($res as $content) {
              // getView(): fooAction get /views/foo/foo.phtml
              $this->getView()->content = $content;
          }
          // self: class ,$this :object
      }
}
