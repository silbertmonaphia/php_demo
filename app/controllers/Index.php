<?php
class IndexController extends BaseController {
      public function indexAction() {
          // route args handling
          // DB_Demo_
          // $name = $this->getRequest()->getParam('name');
          // $val = $this->getRequest()->getParam('value');

          // db manipulation
          $cursor = Database::getInstance();
          $rows = $cursor->query('SELECT count(1) FROM tbllog_create;');
          $count = $rows->fetch(PDO::FETCH_ASSOC);

          // getView(): fooAction get /views/foo/foo.phtml
          // $this->getView()->content = $content;

          return $this->__responseJson($count);

          // self: class ,$this :object
      }
}
