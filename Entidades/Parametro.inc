<?php
class Parametro{
  private $dato;
  private $tipo;
  public function __construct($dato,$tipo)
  {
    $this->dato=$dato;
    $this->tipo=$tipo;
  }
  public function getDato(){
    return $this->dato;
  }
  public function getTipo(){
    return $this->tipo;
  }
  public function setDato($dato){
    $this->dato=$dato;
  }
  public function setTipo($tipo){
    $this->tipo=$tipo;
  }
}
?>
