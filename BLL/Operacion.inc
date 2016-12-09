<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include_once $_SERVER['DOCUMENT_ROOT']."/DAL/Instruccion.inc";
include_once $_SERVER['DOCUMENT_ROOT']."/Entidades/Parametro.inc";

class Operacion{
	private $instruccion;
	public function __construct(){
		$this->instruccion= new Instruccion();
	}
	public function EstadoUsuario($nombre){
		$parametro1 = new Parametro($nombre,"s");
		$parametros=array($parametro1);
		return $this->instruccion->Ejecutar("EstadoUsuario",$parametros);
	}
    public function Activacion_Usuario($codigo,$identificador){
		$parametro1= new Parametro($codigo,"i");
        $parametro2= new Parametro($identificador,"i");
		$parametros = array($parametro1,$parametro2);
		return $this->instruccion->Ejecutar("ActivacionUsuario",$parametros);
	}
	public function SustituirClave($identificador,$clave){
		$parametro1= new Parametro($identificador,"s");
		$parametro2= new Parametro(password_hash($clave, PASSWORD_DEFAULT),"s");
		$parametros = array($parametro1,$parametro2);
		return $this->instruccion->Ejecutar("SustituirClave",$parametros);
	}
	public function IdentificadorUsuario($nombre){
		$parametro1 = new Parametro($nombre,"s");
		$parametros =array($parametro1);
		return $this->instruccion->Ejecutar("IdentificadorUsuario",$parametros);
	}
	public function FotosMascota($codigo){
		$parametro1 = new Parametro($codigo,"i");
		$parametros = array($parametro1);
		return $this->instruccion->Consultar("FotosMascota",2,$parametros);
	}
    public function FotosEvento($codigo){
		$parametro1 = new Parametro($codigo,"i");
		$parametros = array($parametro1);
		return $this->instruccion->Consultar("FotosEvento",1,$parametros);
	}
	public function DatosMascota($codigo){
		$parametro1 = new Parametro($codigo,"i");
		$parametros =array($parametro1);
		return $this->instruccion->Consultar("DatosMascota",4,$parametros);
	}
	public function DatosUsuario($codigo){
		$parametro1 = new Parametro($codigo,"i");
		$parametros =array($parametro1);
		return $this->instruccion->Consultar("DatosUsuario",8,$parametros);
	}
    public function DatosEvento($codigo){
		$parametro1 = new Parametro($codigo,"i");
		$parametros =array($parametro1);
		return $this->instruccion->Consultar("DatosEvento",9,$parametros);
	}
    public function DatosUsuarioA($codigo){
		$parametro1 = new Parametro($codigo,"i");
		$parametros =array($parametro1);
		return $this->instruccion->Consultar("ConsultaDatosUsuarioA",9,$parametros);
	}
	public function DatosFormM($codigo){
	$parametro1 = new Parametro($codigo,"i");
	$parametros =array($parametro1);
	return $this->instruccion->Consultar("ConsultaFormM",5,$parametros);
}
	public function CodigoRol($rol){
		$parametro1 = new Parametro($rol,"s");
		$parametros =array($parametro1);
		return $this->instruccion->Ejecutar("CodigoRol",$parametros);
	}
	public function RolUsuario($codigo){
		$parametro1 = new Parametro($codigo,"i");
		$parametros = array($parametro1);
		return $this->instruccion->Ejecutar("RolUsuario",$parametros);
	}
	public function VerificarUsuario($usuario,$clave,$rol){
		$parametro1 = new Parametro($usuario,"s");
		$parametros = array($parametro1);
		$hash= $this->instruccion->Ejecutar("ClaveUsuario",$parametros);
		if(!is_null($hash) && $hash!='0'){
			if(password_verify($clave, $hash)){
				$codigo = $this->instruccion->Ejecutar("CodigoUsuario",$parametros);
				if(!is_null($codigo) && $codigo!=0){
					return $codigo;
				}else{
					return 0;
				}
			}
			else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	public function HabilitarUsuario($codigo){
		$parametro1 = new Parametro($codigo,"s");
		$parametros = array($parametro1);
		return $this->instruccion->Ejecutar("HabilitarUsuario",$parametros);
	}
	public function DeshabilitarUsuario($codigo){
		$parametro1 = new Parametro($codigo,"s");
		$parametros = array($parametro1);
		return $this->instruccion->Ejecutar("DeshabilitarUsuario",$parametros);
	}
	public function ExisteCorreo($correo){
		$parametro1 = new Parametro($correo,"s");
		$parametros = array($parametro1);
		return $this->instruccion->Ejecutar("ExisteCorreo",$parametros);
	}
	public function ExisteUsuario($usuario){
		$parametro1 = new Parametro($usuario,"s");
		$parametros = array($parametro1);
		return $this->instruccion->Ejecutar("ExisteUsuario",$parametros);
	}
	public function IngresoAdopciones($lugar,$fecha,$idper,
	$fechanac,$dpi,$idmascota,$idformulario,$idu)
	{
		$parametro1 = new Parametro($lugar,"s");
		$parametro2 = new Parametro($fecha,"s");
		$parametro3 = new Parametro($idper,"i");
		$parametro4 = new Parametro($fechanac,"s");
		$parametro5 = new Parametro($dpi,"i");
		$parametro6 = new Parametro($idmascota,"i");
		$parametro7 = new Parametro($idformulario,"i");
		$parametro8 = new Parametro($idu,"i");

		$parametros = array($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,$parametro8);
		return $this->instruccion->Ejecutar("IngresoAdopcion",$parametros);
	}
	public function IngresoAlimentos($alimento){
		$parametro1 = new Parametro($alimento,"s");
		$parametros = array($parametro1);
		return $this->instruccion->Ejecutar("IngresoAlimentos",$parametros);
	}
	public function IngresoFotos($ruta,$descripcion,$estado){
		$parametro1 = new Parametro($ruta,"s");
		$parametro2 = new Parametro($descripcion,"s");
		$parametro3 = new Parametro($estado,"i");
		$parametros = array($parametro1,$parametro2,$parametro3);
		return $this->instruccion->Ejecutar("IngresoFotos",$parametros);
	}
	public function IngresoGeneros($genero,$estado){
		$parametro1 = new Parametro($genero,"s");
		$parametro2 = new Parametro($estado,"i");
		$parametros = array($parametro1,$parametro2);
		return $this->instruccion->Ejecutar("IngresoGeneros",$parametros);
	}

	public function IngresoHogaresTemporales($fechainicio,$fechafin,$idpersona,$idmascota,$estado){
		$parametro1 = new Parametro($fechainicio,"s");
		$parametro2 = new Parametro($fechafin,"s");
        $parametro3 = new Parametro($idpersona,"i");
		$parametro4 = new Parametro($idmascota,"i");
		$parametro5 = new Parametro($estado,"i");
		$parametros = array($parametro1,$parametro2,$parametro3,$parametro4,$parametro5);
		return $this->instruccion->Ejecutar("IngresoH1",$parametros);
	}
    public function IngresoHogaresTemporales2($fechainicio,$fechafin,$idpersona,$idmascota,$foto,$estado){
		$parametro1 = new Parametro($fechainicio,"s");
		$parametro2 = new Parametro($fechafin,"s");
        $parametro3 = new Parametro($idpersona,"i");
		$parametro4 = new Parametro($idmascota,"i");
        $parametro5 = new Parametro($foto,"s");
		$parametro6 = new Parametro($estado,"i");
		$parametros = array($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6);
		return $this->instruccion->Ejecutar("IngresoH2",$parametros);
	}
    public function ActualizarHogaresTemporales($fechainicio,$fechafin,$idpersona,$idhogar){
		$parametro1 = new Parametro($fechainicio,"s");
		$parametro2 = new Parametro($fechafin,"s");
        $parametro3 = new Parametro($idpersona,"i");
		$parametro4 = new Parametro($idhogar,"i");
		$parametros = array($parametro1,$parametro2,$parametro3,$parametro4);
		return $this->instruccion->Ejecutar("ActualizarHogar",$parametros);
	}
     public function BorrarHogaresTemporales($idhogar,$idmasco){
		$parametro1 = new Parametro($idhogar,"i");
		$parametro2 = new Parametro($idmasco,"i");
		$parametros = array($parametro1,$parametro2);
		return $this->instruccion->Ejecutar("EliminarHogar",$parametros);
	}
	public function IngresoMascotas($nombre,$edad,$esterilizado,$idraza,$peso,$altura,$idalimento,$idgenero,
$des, $ruta	){
		$parametro1 = new Parametro($nombre,"s");
		$parametro2 = new Parametro($edad,"s");
		$parametro3 = new Parametro($esterilizado,"s");
		$parametro4 = new Parametro($idraza,"i");
		$parametro5 = new Parametro($peso,"s");
		$parametro6 = new Parametro($altura,"s");
		$parametro7 = new Parametro($idalimento,"i");
		$parametro8 = new Parametro($idgenero,"i");
		$parametro9 = new Parametro($des,"s");
		$parametro10 = new Parametro($ruta,"s");
		$parametros = array($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,
		$parametro8,$parametro9,$parametro10);
		return $this->instruccion->Ejecutar("IngresoDeP",$parametros);
	}
	public function ActualizarMascotas($idmascota,$estil,$peso,$altura,$idalimento){
  $parametro1 = new Parametro($idmascota,"i");
	$parametro2 = new Parametro($estil,"s");
	$parametro3 = new Parametro($peso,"s");
	$parametro4 = new Parametro($altura,"s");
	$parametro5 = new Parametro($idalimento,"i");

	$parametros = array($parametro1,$parametro2,$parametro3,$parametro4,$parametro5);
	return $this->instruccion->Ejecutar("aa",$parametros);
}
public function QuitarMascota($idmascota){
$parametro1 = new Parametro($idmascota,"i");
$parametros = array($parametro1);
return $this->instruccion->Ejecutar("QuitarMascota",$parametros);
}
	public function IngresoPersona($nombre,$apellido,$telefono,$direccion,$correo,$estado){
		$parametro1 = new Parametro($nombre,"s");
		$parametro2 = new Parametro($apellido,"s");
		$parametro3 = new Parametro($telefono,"s");
		$parametro4 = new Parametro($direccion,"s");
		$parametro5 = new Parametro($correo,"s");
		$parametro6 = new Parametro($estado,"i");
		$parametros = array($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6);
		return $this->instruccion->Ejecutar("IngresoPersona",$parametros);
	}
	public function IngresoPreguntas($pregunta,$estado){
		$parametro1 = new Parametro($pregunta,"s");
		$parametro2 = new Parametro($estado,"i");
		$parametros = array($parametro1,$parametro2);
		return $this->instruccion->Ejecutar("IngresoPreguntas",$parametros);
	}
	public function IngresoRazas($raza){
		$parametro1 = new Parametro($raza,"s");
		$parametros = array($parametro1);
		return $this->instruccion->Ejecutar("IngresoRazas",$parametros);
	}
	public function IngresoRoles($rol,$estado){
		$parametro1 = new Parametro($rol,"s");
		$parametro2 = new Parametro($estado,"i");
		$parametros = array($parametro1,$parametro2);
		return $this->instruccion->Ejecutar("IngresoRol",$parametros);
	}
	public function IngresoTiposTransaccion($tipo,$estado){
		$parametro1 = new Parametro($tipo,"s");
		$parametro2 = new Parametro($estado,"i");
		$parametros = array($parametro1,$parametro2);
		return $this->instruccion->Ejecutar("IngresoTipoTransaccion",$parametros);
	}
	public function IngresoTransacciones($fecha,$cantidad,$descripcion,$idusuario,$idtipotran,$ruta,$estadofoto,$estado){
		$parametro1 = new Parametro($fecha,"s");
		$parametro2 = new Parametro($cantidad,"d");
		$parametro3 = new Parametro($descripcion,"s");
		$parametro4 = new Parametro($idusuario,"s");
		$parametro5 = new Parametro($idtipotran,"i");
        $parametro6 = new Parametro($ruta,"s");
		$parametro7 = new Parametro($estadofoto,"i");
        $parametro8 = new Parametro($estado,"i");
		$parametros = array($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,$parametro8);
		return $this->instruccion->Ejecutar("IngresoTransacciones1",$parametros);
	}
	public function IngresoUsuarios($usuario,$clave,$correo,$rol,$estado){
		$parametro1 = new Parametro($usuario,"s");
		$parametro2 = new Parametro(password_hash($clave, PASSWORD_DEFAULT),"s");
		$parametro3 = new Parametro($correo,"s");
		$parametro4 = new Parametro($rol,"s");
        $parametro5 = new Parametro($estado,"i");
        $codigo = sha1(password_hash($clave, PASSWORD_DEFAULT));
		$parametro6 = new Parametro($codigo,"s");
		$parametros = array($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6);
		if($this->instruccion->Ejecutar("IngresoUsuario",$parametros)=='1'){
			return $codigo;
		}else{
			return '0';
		}
	}
    public function IngresoUsuariosA($nombre,$apellido,$telefono,$direccion,$usuario,$clave,$correo,$rol,$estado){
        $parametro1 = new Parametro($nombre,"s");
        $parametro2 = new Parametro($apellido,"s");
        $parametro3 = new Parametro($telefono,"s");
        $parametro4 = new Parametro($direccion,"s");
		$parametro5 = new Parametro($usuario,"s");
		$parametro6 = new Parametro(password_hash($clave, PASSWORD_DEFAULT),"s");
		$parametro7 = new Parametro($correo,"s");
		$parametro8 = new Parametro($rol,"s");
        $parametro9 = new Parametro($estado,"i");
        $codigo = sha1(password_hash($clave, PASSWORD_DEFAULT));
		$parametro10 = new Parametro($codigo,"s");
		$parametros = array($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7,$parametro8,$parametro9,$parametro10);
		if($this->instruccion->Ejecutar("IngresoUsuarioA",$parametros)=='1'){
			return $codigo;
		}else{
			return '0';
		}
	}
	public function IngresoVacunas($vacuna,$descrip,$estado){
		$parametro1 = new Parametro($vacuna,"s");
		$parametro2 = new Parametro($descrip,"s");
		$parametro3 = new Parametro($estado,"i");
		$parametros = array($parametro1,$parametro2,$parametro3);
		return $this->instruccion->Ejecutar("IngresoVacunas",$parametros);
	}
	public function IngresoVisitas($fecha,$observa,$idadopciones){
		$parametro1 = new Parametro($fecha,"s");
		$parametro2 = new Parametro($observa,"s");
		$parametro3 = new Parametro($idadopciones,"i");
		$parametros = array($parametro1,$parametro2,$parametro3);
		return $this->instruccion->Ejecutar("IngresoVisitas",$parametros);
	}
	public function IngresoFormulario($encabezado,$terminos){
		$parametro1 = new Parametro($encabezado,"i");
		$parametro2 = new Parametro($terminos,"i");
		$parametros = array($parametro1,$parametro2);
		return $this->instruccion->Ejecutar("IngresoFormulario",$parametros);
	}
	public function IngresoRespuesta($formulario,$pregunta,$respuesta){
		$parametro1 = new Parametro($formulario,"i");
		$parametro2 = new Parametro($pregunta,"i");
		$parametro3 = new Parametro($respuesta,"s");
		$parametros = array($parametro1,$parametro2,$parametro3);
		return $this->instruccion->Ejecutar("IngresoRespuesta",$parametros);
	}
    public function IngresoEvento($titulo,$desc,$lugar,$fecha,$hora,$ruta,$codigous){
		$parametro1 = new Parametro($titulo,"s");
		$parametro2 = new Parametro($desc,"s");
		$parametro3 = new Parametro($lugar,"s");
        $parametro4 = new Parametro($fecha,"s");
        $parametro5 = new Parametro($hora,"s");
        $parametro6 = new Parametro($ruta,"s");
        $parametro7 = new Parametro($codigous,"i");
		$parametros = array($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$parametro6,$parametro7);
		return $this->instruccion->Ejecutar("IngresoEventos",$parametros);
	}
	public function ModPersonas($codigo,$nombre,$apellido,$telefono,$direccion){
		$parametro0 = new Parametro($codigo,"i");
		$parametro1 = new Parametro($nombre,"s");
		$parametro2 = new Parametro($apellido,"s");
		$parametro3 = new Parametro($telefono,"s");
		$parametro4 = new Parametro($direccion,"s");
		$parametros = array($parametro0,$parametro1,$parametro2,$parametro3,$parametro4);
		return $this->instruccion->Ejecutar("ModPersona",$parametros);
	}
    public function ModCredUsuario($codigo,$rol,$estado){
		$parametro0 = new Parametro($codigo,"i");
		$parametro1 = new Parametro($rol,"s");
		$parametro2 = new Parametro($estado,"i");
		$parametros = array($parametro0,$parametro1,$parametro2);
		return $this->instruccion->Ejecutar("ModCredUsuario",$parametros);
	}
    public function updatem(){
		$parametros = array();
		return $this->instruccion->Ejecutar("UpdateMascota",$parametros);
	}
    public function ConsultaUsuarios(){
		return $this->instruccion->Consultar("ConsultaUsuarios",4,null);
	}
    public function ConsultaRoles(){
		return $this->instruccion->Consultar("ConsultaRoles",3,null);
	}
	public function ConsultaMascotas(){
		return $this->instruccion->Consultar("ConsultaMascotas",9,null);
	}

	public function ConsultaMascotasA(){
		return $this->instruccion->Consultar("ConsultaMascotasA",9,null);
	}
	public function ConsultaMascotasE(){
		return $this->instruccion->Consultar("ConsultaFormM",5,null);
	}
	public function ConsultaNombre(){
		return $this->instruccion->Consultar("C_MascotaNombre",2,null);
	}
	public function C_VisitaMascota(){
		return $this->instruccion->Consultar("C_VisitaMascota",2,null);
	}
     public function ConsultaTransaccion1(){
		return $this->instruccion->Consultar("ConsultaTransacciones1",1,null);
	}
    public function ConsultaTransaccion2(){
		return $this->instruccion->Consultar("ConsultaTransacciones2",1,null);
	}
     public function ConsultaTransaccionSin(){
		return $this->instruccion->Consultar("ConsultaTransaccionesSin",2,null);
	}
    public function ConsultaEventos(){
		return $this->instruccion->Consultar("ConsultaEventos",7,null);
	}
    public function ConsultaHistorialEventos(){
		return $this->instruccion->Consultar("ConsultaTodosEventos",7,null);
	}

    public function ConsultaTransaccionesLista(){
		return $this->instruccion->Consultar("ConsultaTransaccionesLista",7,null);
	}
    public function ConsultaTransaccionesListas($fecha1,$fecha2){
        $parametro0 = new Parametro($fecha1,"s");
        $parametro1 = new Parametro($fecha2,"s");
        $parametros = array($parametro0,$parametro1);
		return $this->instruccion->Consultar("ConsultaTransaccionesLista",7,$parametros);
	}
    public function ConsultaTransaccionesBalance($fecha1,$fecha2){
        $parametro0 = new Parametro($fecha1,"s");
        $parametro1 = new Parametro($fecha2,"s");
        $parametros = array($parametro0,$parametro1);
		return $this->instruccion->Consultar("ConsultaBalance",2,$parametros);
	}
     public function ConsultaHogar(){
		return $this->instruccion->Consultar("ConsultaH11",8,null);
	}
    public function ConsultaHogar1(){
		return $this->instruccion->Consultar("ConsultaHogar",5,null);
	}
public function ConsultaHogar2($code){
        $parametro0 = new Parametro($code,"i");
        $parametros = array($parametro0);
		return $this->instruccion->Consultar("ConsultaHogar",6,$parametros);
	}

	public function ConsultaMascotaPr($code){
	        $parametro0 = new Parametro($code,"i");
	        $parametros = array($parametro0);
			return $this->instruccion->Consultar("ConsultaMascotaP",9,$parametros);
		}
	public function ConsultaRazas(){
  return $this->instruccion->Consultar("ConsultaRazas",2,null);
  }
	public function ConsultaAlimento(){
  return $this->instruccion->Consultar("ConsultaAlimento",3,null);
  }
	public function ConsultaGeneros(){
  return $this->instruccion->Consultar("ConsultaGeneros",3,null);
  }
    public function ConsultaPersona(){
		return $this->instruccion->Consultar("ConsultaPersona",3,null);
	}

    public function ConsultaTipoTransa(){
		return $this->instruccion->Consultar("Consultatipotransa",3,null);
	}
     public function ConsultaMascotaHogar(){
		return $this->instruccion->Consultar("ConsultaMascotaHogar",2,null);
	}

	public function ConsultaVisita(){
    return $this->instruccion->Consultar("C_Visita",5,null);
    }
	public function ConsultaAdopcion(){
    return $this->instruccion->Consultar("C_Adopcion",6,null);
    }
		public function ConsultaAdopcionFecha($fecha1,$fecha2){
				$parametro0 = new Parametro($fecha1,"s");
				$parametro1 = new Parametro($fecha2,"s");
				$parametros = array($parametro0,$parametro1);
		return $this->instruccion->Consultar("C_AdopcionFecha",6,$parametros);
	}
	public function ConsultaPreguntas(){
		return $this->instruccion->Consultar("ConsultaPreguntas",3,null);
	}
	public function ConsultaEncabezados(){
		return $this->instruccion->Consultar("ConsultaEncabezados",2,null);
	}
	public function ConsultaTerminos(){
		return $this->instruccion->Consultar("ConsultaTerminos",2,null);
	}
    public function EliminarUsuario($codigo){
        $parametro0 = new Parametro($codigo, "i");
        $parametros = array($parametro0);
        return $this->instruccion->Ejecutar("EliminarUsuario",$parametros);
    }
    public function EliminarEvento($codigo){
        $parametro0 = new Parametro($codigo, "i");
        $parametros = array($parametro0);
        return $this->instruccion->Ejecutar("EliminarEvento",$parametros);
    }
}
?>
