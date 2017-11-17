<?php
require_once 'src/dao/UFDao.php';
require_once 'src/utils/Result.php';


use src\dao\UFDao;
use src\utils\Result;


class UfController {
	public  function lista() {
		$dao = new UFDao();
		$result = new Result($dao->getLista());
		$result->useJson();
	}
}