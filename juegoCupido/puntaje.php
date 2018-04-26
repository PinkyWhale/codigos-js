<?php 

	class Puntaje{

	public $link;

	function Puntaje(){

		$link = mysql_connect('localhost','wwwwedlu_cupUser','onZ]Zd^iT;8T');

		if(!$link){

			$this->link = false;

		}else{

			$this->link = $link;

			mysql_select_db('wwwwedlu_cupido',$this->link);

					
		}

	}


	private function buscarJugador($jugadorEmail){
	
		$id = false;

		$sql = "select * from puntaje where email='".$jugadorEmail."'";

		$rs = mysql_query($sql,$this->link);

		if(!empty($rs)){

			$jug = mysql_fetch_assoc($rs);

			$id = $jug['id'];

		}

		return $id;

	}


	function guardarPuntaje($nickName,$email,$puntaje){


		if($this->buscarJugador($email) == false){

			if($this->guardarDatos($email,$puntaje,$nickName)== true)

				return true;

		}else{

			if($this->actualizarPuntaje($email,$puntaje)== true){

				return true;
			}

		}

		return false;
	}


	
	function actualizarPuntaje($jugadorEmail,$puntos){

		$pts = $this->obtenerPuntajeAnterior($jugadorEmail);

		if($puntos > $pts){

			$sql = "update puntaje set puntos=".$puntos." where email='".$jugadorEmail."'";

			$rs = mysql_query($sql,$this->link);

			if(mysql_affected_rows()==1){

				return true;
		
			}else{

				return false;
			}
		}	
		
		else{

			return true;
		}

	}

	private function obtenerPuntajeAnterior($jugadorEmail){

		$pts = 0;

		$sql = "select * from puntaje where email='".$jugadorEmail."'";

		$rs = mysql_query($sql,$this->link);

		if(!empty($rs)){

			$jug = mysql_fetch_assoc($rs);

			$pts = $jug['puntos'];

		}

		return $pts;

	}



	function guardarDatos($jugadorEmail,$puntos,$nickName){

		$sql = "insert into puntaje (puntos,email,nick) values (".$puntos.",'".$jugadorEmail."','".$nickName."')";

		$rs = mysql_query($sql,$this->link);

		if(mysql_affected_rows()==1){

			return true;
	
		}else{

			return false;
		}

	}

} // EndClass