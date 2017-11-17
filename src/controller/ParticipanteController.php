<?php
class  ParticipanteController {
	
	private $page;
	
	public function __construct($page) {
		$this->page = $page;
	}
	
	public function index() {
		include $this->page->getRaiz ();
	}
}