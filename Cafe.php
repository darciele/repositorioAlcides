<?php
class Cafe{
	private $idCafe;
	private $nome;
	private $torra;
	private $regiao;

	public function consulta($id){
		$dao = new Dao();
		
		$array = array(":ID"=>$id);

		$resultado = $dao->select("SELECT * FROM cafe WHERE id = :ID", $array);
		if(count($resultado)>0){
			$cafe = $resultado[0];

			$this->setIdCafe($cafe['id']);
			$this->setNome($cafe['nome']);
			$this->setTorra($cafe['torra']);
			$this->setRegiao($cafe['regiao']);
		}
		
	}

	public function getIdCafe(){
		return $this->idCafe;
	}
	public function setIdCafe($value){
		$this->idCafe = $value;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setNome($value){
		$this->nome = $value;
	}
	public function getTorra(){
		return $this->torra;
	}

	public function setTorra($value){
		$this->torra = $value;
	}
	public function getRegiao(){
		return $this->regiao;
	}

	public function setRegiao($value){
		$this->regiao = $value;
	}

	public function __toString(){
		return json_encode(array(
			"id"=>$this->getIdCafe(),
			"nome"=>$this->getNome(),
			"torra"=>$this->getTorra(),
			"regiao"=>$this->getRegiao()));	
	}
}
?>