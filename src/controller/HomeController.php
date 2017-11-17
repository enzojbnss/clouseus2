<?php
require_once 'src/view/Page.php';

class HomeController{
	
	private $page;
	
	public function __construct($page) {
		$this->page = $page;
	}

	public function index() {
		include $this->page->getRaiz ();
	}
	
	
}
