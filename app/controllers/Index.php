<?php
class IndexController extends Yaf_Controller_Abstract {
      public function indexAction() {
          // getView(): fooAction get /views/foo/foo.phtml

          // $name = $this->getRequest()->getParam('name');
          // $val = $this->getRequest()->getParam('value');

          $cursor = Database::getInstance();
          $rows = $cursor->query('SELECT role_job FROM tbllog_create;');
          $res = $rows->fetch(PDO::FETCH_ASSOC);
          foreach ($res as $content) {
              $this->getView()->content = $content;
          }
          // self: class ,$this :object
      }
}
