<?php

class Vehiculo{
  public $matricula;
  public $potencia;
  public $velocidadMedia;


public function __construct($matricula, $potencia, $velocidadMedia){
  $this->matricula = $matricula;
  $this->potencia = $potencia; //Para referenciar a un valor del interior de la clase siempre usamos this
  $this->velocidadMedia = $velocidadMedia;
}

public function calcularTiempo($distancia){ //Valor que entra
  if ($this->velocidadMedia < 1){
    return "Error: La velocidad tiene que ser mas que 0";
  }
  $tiempo = $distancia / $this->velocidadMedia;
  return $tiempo;

}
}

class Terrestre extends Vehiculo{
  public $NumRuedas;
  public $CapacidadMaletero;
  public $RailesCarretera;

  public function __construct($matricula, $potencia, $velocidadMedia, $NumRuedas, $CapacidadMaletero, $RailesCarretera)
  {
      parent::__construct($matricula, $potencia, $velocidadMedia);
      $this->NumRuedas = $NumRuedas;
      $this->CapacidadMaletero = $CapacidadMaletero;
      $this->RailesCarretera = $RailesCarretera;
  }
}

class Maritimo extends Vehiculo{
  public $EsloraTotal;
  public $EsloraFlotacion;
  public $NumHelices;

  public function __construct($matricula, $potencia, $velocidadMedia, $EsloraTotal, $EsloraFlotacion, $NumHelices)
  {
    parent::__construct($matricula, $potencia, $velocidadMedia);
    $this->EsloraTotal = $EsloraTotal;
    $this->EsloraFlotacion = $EsloraFlotacion;
    $this->NumHelices = $NumHelices;
  }

  public function CalcularPrecio(){
    $precio = 2500*$this->EsloraTotal*$this->potencia;
    return $precio;
  }
}
