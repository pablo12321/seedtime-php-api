<?php
/*
* Modulo: Post
* Version: 0.1A
* Dependencias:
* --Database.
* --Imagen.
* --Usuario.
*
* Manejador de Posts.
*/
class Post extends Database {
	private $id, $contenido, $autor, $fecha,$tags,$img;
	private $table;
	private $datos = array();
	public function __construct() {
		$this->table = "posts";
		if(parent::Create($this->table,
		"id INT UNSIGNED AUTO_INCREMENT,titulo VARCHAR(128),contenido TEXT,	autor INT,fecha DATE,tags VARCHAR(256),	img INT,PRIMARY KEY(id)")){
			return true;
		}
		else{
			return false;
		}
	}
	public function getTable(){
		return $this->table;
	}
	public function getAll($max = 0){
		if($max = 0){
			return parent::SelectAll("*",$this->table);
		}
		else{
			return parent::SelectAll("*",$this->table,1,1,=,$max);
		}
	}
	public function setId($id){
		$this->id = $id;
		$this->datos = parent::Select("*",$this->table,"id",$id);
		if($this->datos != false){
			$this->contenido = $this->datos[1];
			$this->autor = $this->datos[2];
			$this->fecha = $this->datos[3];
			$this->tags = $this->datos[4];
			$this->img = $this->datos[5];
			return true;
		}
		else{
			return false;
		}
	}
	public function getId(){
		if($this->id != null){
			return $this->id;
		}
		else{
			return false;
		}
	}
	public function getContenido(){
		if($this->contenido != null){
			return $this->contenido;
		}
		else{
			return false;
		}
	}
	public function setContenido($contenido){
		$this->contenido = $contenido;
	}
	public function getAutor(){
		if($this->autor != null){
			return $this->autor;
		}
		else{
			return false;
		}
	}
	public function setAutor($autor){
		$this->autor = $autor;
	}
	public function getFecha(){
		if($this->fecha != null){
			return $this->fecha;
		}
		else{
			return false;
		}
	}
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}
	public function getTags(){
		if($this->tags != null){
			return $this->tags;
		}
		else{
			return false;
		}
	}
	public function setTags($tags){
		$this->tags = $tags;
	}
	public function getImagen(){
		if($this->img != null){
			return $this->img;
		}
		else{
			return false;
		}
	}
	public function setImagen($img){
		if(!empty($img)){
			$this->img = $img;
		}
	}
	public function Save(){
		return parent::Insert($this->table,array("contenido" => $this->contenido,"autor" => $this->autor,"fecha" => $this->fecha, "tags" => $this->tags,"img" => $this->img));
	}
	public function Actualizar(){
		if($this->id != null){
			return parent::Update($this->table,array("contenido" =>$this->contenido,"autor" =>$this->autor,"fecha" =>$this->fecha,"tags" =>$this->tags,"img" =>$this->img),"id",$this->id);
		}
		else{
			return false;
		}
	}
	public function Eliminar(){
		if($this->id != null){
			return parent::Delete($this->table,"id",$this->id);
		}
		else {
			return flase;
		}
	}
}
?>
