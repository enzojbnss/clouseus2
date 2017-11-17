<?php
require_once 'src/dao/TipoEmailDao.php';
require_once 'src/utils/Result.php';
use src\dao\TipoEmailDao;
use src\utils\Result;



class TipoEmailController {
	
	public  function lista() {
		$dao = new TipoEmailDao();
		$result = new Result($dao->getLista());
		$result->useJson();
	}
}