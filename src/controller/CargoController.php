<?php
require_once 'src/dao/CargoDao.php';
require_once 'src/utils/Result.php';
use src\dao\CargosDao;
use src\utils\Result;

class CargoController {
	
	public  function lista() {
		$dao = new CargosDao();
		$result = new Result($dao->getLista());
		$result->useJson();
	}
}