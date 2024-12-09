<?php 

require_once '../Controllers/listController.php';

class TableView {
  private $controller;
  private $page;
  private $numberOfItems;

  public function __construct($page, $numberOfItems) {
      $this->controller = new ListController();
      $this->page = $page;
      $this->numberOfItems = $numberOfItems;
  }

  public function render() {
      echo $this->controller->getTableRows($this->page, $this->numberOfItems);
  }
}

class PaginationView {
  private $controller;
  private $page;
  private $numberOfItems;

  public function __construct($page, $numberOfItems) {
      $this->controller = new ListController();
      $this->page = $page;
      $this->numberOfItems = $numberOfItems;
  }

  public function render() {
      echo $this->controller->getPagination($this->page, $this->numberOfItems);
  }
}

?>