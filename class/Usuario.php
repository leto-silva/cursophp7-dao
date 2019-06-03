<?php

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}

    public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

    public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}


    public function loadById($id){

    	$sql = new Sql();

    	$results = $sql->select("select * from tb_usuarios where idusuario = :ID", array(
    		":ID"=>$id
    	));

    	if (count($results) > 0){

    		$row = $results[0];

    		$this->setIdusuario($row["idusuario"]);
    		$this->setDeslogin($row["deslogin"]);
    		$this->setDessenha($row["dessenha"]);
    		$this->setDtcadastro( new DateTime($row["dtcadastro"]));

    	}


    }

    public function login($login ,$password){

        $sql = new Sql();

    	  $results = $sql->select("select * from tb_usuarios where deslogin = :LOGIN and dessenha = :PASSWORD", array(
    		":LOGIN"=>$login,
    		":PASSWORD"=>$password
    		    	));

    	if (count($results) > 0){

    		$row = $results[0];

    		$this->setIdusuario($row["idusuario"]);
    		$this->setDeslogin($row["deslogin"]);
    		$this->setDessenha($row["dessenha"]);
    		$this->setDtcadastro( new DateTime($row["dtcadastro"]));

    	} else {
        
    		throw new Exception("Login e/ou senha inválidos.");	

    	}

    }


   public static function getList(){

   		$sql = new Sql();

   		return $sql->select("select * from tb_usuarios order by deslogin;");
   }

   public function search($login){

   		$sql = new Sql();

   		return $sql->select("select * from tb_usuarios where deslogin like :SEARCH order by deslogin", array(
   				':SEARCH'=>"%".$login ."%"

   		));
   }
  
   
   public function __construct( $login ="", $password="" ){

     $this->setDeslogin($login);
     $this->setDessenha($password);
   }

    public function __toString(){

    	return json_encode(array(
  		    "idusuario"=>$this->getIdusuario(),
  		    "deslogin"=>$this->getDeslogin(),
  		    "dessenha"=>$this->getDessenha(),
  		    "dtcadastro"=>$this->getDtcadastro()->format("d-m-Y H:i:s")	
    	));
    }

    public function setData($data){
  
      $this->setIdusuario($data["idusuario"]);
      $this->setDeslogin($data["deslogin"]);
      $this->setDessenha($data["dessenha"]);
      $this->setDtcadastro( new DateTime($data["dtcadastro"]));
    }

    public function Insert(){

      $sql = new Sql();


      $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(":LOGIN" => $this->getDeslogin(), ":PASSWORD"=>$this->getDessenha() ) );

      if (count($results) > 0) {
         $this->setData($results[0]);

      }


    }
    

    public function Delete(){

      $sql = new Sql();

      $results = $sql->select("Delete from tb_usuarios where idusuario=:ID", array(
        ':ID' => $this->getIdusuario()));

      $this->setIdusuario(0);
      $this->setDeslogin("");
      $this->setDessenha("");
      $this->setDtcadastro(new DateTime());
    }

}



?>