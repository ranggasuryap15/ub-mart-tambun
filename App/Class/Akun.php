<?php

include (__DIR__ . "/../Config/Config.php");

class Akun extends Config {
	private $username='';
	private $password='';
	private $nama_kasir='';
	private $no_hp='';
	private $role='';
	
	private $hasil= false;
	private $message ='';
	
	public function __get($atribute) {
	if (property_exists($this, $atribute)) {
    	return $this->$atribute;
		}
	}

	public function __set($atribut, $value){
		if (property_exists($this, $atribut)) {
			$this->$atribut = $value;
		}
	}

	public function AddUser(){
		$sql = "INSERT INTO akun(username, password, nama_kasir, no_hp, role) VALUES ('$this->username', '$this->password', '$this->nama_kasir', '$this->no_hp', '$this->role')";				
		$this->hasil = $this->connection->exec($sql);
				
		if($this->hasil)
			$this->message ='Data berhasil ditambahkan!';					
		else
			$this->message ='Data gagal ditambahkan!';	
	}
	
	public function UpdateUser(){
		$sql = "UPDATE akun SET username = '$this->username', password='$this->password', nama_kasir='$this->nama_kasir', no_hp='$this->no_hp', role='$this->role'
		WHERE username = '$this->username'";
		$this->hasil = $this->connection->exec($sql);
			
		if($this->hasil)
			$this->message ='Data berhasil diubah!';								
		else
			$this->message ='Data gagal diubah!';								
	}
		
		
	public function DeleteUser(){
		$sql = "DELETE FROM akun WHERE username=$this->username";
		$this->hasil = $this->connection->exec($sql);

		if($this->hasil)
			$this->message ='Data berhasil dihapus!';								
		else
			$this->message ='Data gagal dihapus!';
	}

	public function ValidateAkun($username){
		$sql = "SELECT * FROM akun WHERE username = '$username'";
		$resultOne = $this->connection->query($sql);

		if ($resultOne->rowCount() == 1){
			while ($data = $resultOne->fetch(PDO::FETCH_OBJ)) {
				$this->hasil = true;
				$this->username = $data->username;
				$this->password=$data->password;
				$this->nama_kasir=$data->nama_kasir;
				$this->no_hp=$data->no_hp;
				$this->role=$data->role;
			}
		}
	}
	
	public function SelectOneAkun(){
		$sql = "SELECT * FROM akun WHERE username = '$this->username'";
		$result = $this->connection->query($sql);
		
		if($result->rowCount() == 1){
			while ($data = $result->fetch(PDO::FETCH_OBJ))
			{
				$this->userid = $data->userid;
				$this->email = $data->email;
				$this->password = $data->password;
				$this->fname = $data->fname;
				$this->lname = $data->lname;
				$this->nohp = $data->nohp;
				$this->foto = $data->foto;
				$this->idrole = $data->idrole;
			}
		}		
	}
	
	public function SelectAllAkun(){
		$sql = "SELECT u.*, r.role FROM user u, role r WHERE u.idrole=r.idrole ORDER BY userid";
		$result = $this->connection->query($sql);
		
		$arrResult = Array();
		$i=0;
		if($result->rowCount() > 0){
			while($data= $result->fetch(PDO::FETCH_OBJ))
			{
				$objAkun = new Akun();
				$objAkun->userid = $data->userid;
				$objAkun->email = $data->email;
				$objAkun->password = $data->password;
				$objAkun->fname=$data->fname;
				$objAkun->lname=$data->lname;
				$objAkun->nohp=$data->nohp;
				$objAkun->foto=$data->foto;
				$objAkun->idrole=$data->idrole;
				$objAkun->role=$data->role;
				$arrResult[$i] = $objAkun;
				$i++;
			}
		}
		return $arrResult;
	}
	
	public function SelectAllUserByUserid($currentuserid){
		if ($currentuserid == NULL)
			$sql = "SELECT * FROM Akun WHERE userid IS NULL";
		else
			$sql = "SELECT * FROM Akun WHERE userid = $currentuserid";				
		$result = $this->connection->query($sql);
			
		$arrResult = Array();
		$cnt=0;
		if($result->rowCount() > 0){				
			while ($data= $result->fetch(PDO::FETCH_OBJ))
			{
				$objAkun = new Akun(); 
				$objAkun->userid = $data->userid;
				$objAkun->email = $data->email;
				$objAkun->password = $data->password;
				$objAkun->fname=$data->fname;
				$objAkun->lname=$data->lname;
				$objAkun->nohp=$data->nohp;
				$objAkun->foto=$data->foto;
				$objAkun->idrole=$data->idrole;
				$arrResult[$cnt] = $objAkun;
				$cnt++;
			}
		}
		return $arrResult;
	}
}
?>