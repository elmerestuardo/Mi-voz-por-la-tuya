<?php
class Instruccion{
  private $servidor;
  private $usuario;
  private $clave;
  private $bd;

  public function __construct(){
    $this->servidor="localhost";
    $this->usuario="mivozpor_admin";
    $this->clave="MXDhS!|gV8&";
    $this->bd="mivozpor_datos";
  }
  private function Interrogantes($parametros){
    $interrogantes="";
    if(count($parametros)>0){
      foreach ($parametros as $parametro) {
        $interrogantes=$interrogantes."?,";
      }
      return substr($interrogantes, 0, -1);
    }
    else{
      return "";
    }
  }
  private function TiposDeDato($parametros){
    $tipos = "";
    foreach ($parametros as $parametro) {
      $tipos=$tipos.$parametro->getTipo();
    }
    return $tipos;
  }
  private function VincularValores($parametros){
    if(count($parametros)){
      $contador=0;
      $comando="\$orden->bind_param('".$this->TiposDeDato($parametros)."',";
      foreach ($parametros as $parametro) {
        $comando=$comando."\$datos[".$contador."],";
        $contador++;
      }
      $comando= substr($comando, 0, -1);
      $comando=$comando.");";
      return $comando;
    }
    else{
      return "";
    }
  }
  private function VincularResultados($numerocolumnas){
    $comando="\$orden->bind_result(";
    for ($i=0; $i <$numerocolumnas ; $i++) {
      $comando=$comando."\$resultados[".$i."],";
    }
    $comando= substr($comando, 0, -1);
    $comando=$comando.");";
    return $comando;
  }
  public function Ejecutar($procedimiento,$parametros){
    $conexion = new mysqli($this->servidor, $this->usuario, $this->clave, $this->bd);
    mysqli_set_charset($conexion, 'utf8');
    if ($conexion->connect_error) {
      die("Error en la conexion: " . $conexion->connect_error);
    }
    $sql ="call ".$procedimiento."(".$this->Interrogantes($parametros).")";
    $orden = $conexion->prepare($sql);
    eval($this->VincularValores($parametros));
    $contador=0;
    foreach ($parametros as $parametro) {
      $datos[$contador]=$parametro->getDato();
      $contador++;
    }
    $orden->execute();
    $orden->bind_result($resultado);
    $orden->fetch();
    $orden->close();
    $conexion->close();
    return $resultado;
  }
  public function Consultar($procedimiento,$numerocolumnas,$parametros){
    $conexion = new mysqli($this->servidor, $this->usuario, $this->clave, $this->bd);
    mysqli_set_charset($conexion, 'utf8');
    if ($conexion->connect_error) {
      die("Error en la conexion: " . $conexion->connect_error);
    }
    $sql ="call ".$procedimiento."(".$this->Interrogantes($parametros).")";
    $orden = $conexion->prepare($sql);
    eval($this->VincularValores($parametros));
    $contador=0;
    foreach ($parametros as $parametro) {
      $datos[$contador]=$parametro->getDato();
      $contador++;
    }
    $orden->execute();
    eval($this->VincularResultados($numerocolumnas));
    while ($orden->fetch()) {
      $resultado[]=json_decode( json_encode($resultados), true);
    }
    $orden->close();
    $conexion->close();
    return $resultado;
  }
}
?>
