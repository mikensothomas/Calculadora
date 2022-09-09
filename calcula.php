<?php
interface Operacoes {
    public function somar();
    public function subtrair();
    public function multiplicar();
    public function dividir();    
}
class Calculadora implements Operacoes{
    private float $n1 = 0;
    private float $n2 = 0;

    public function _construct(string $n1, string $n2){
        $this->formatarvalidar($n1, $n2);

        $this->n1 = floatval($n1);
        $this->n1 = floatval($n1);
    }
private function formatarvalidar($n1, $n2) {
     $n1 = str_replaca(',', '.', $n1);
     $n2 = str_replaca(',', '.', $n2);

     if (!is_numeric($n1) || !is_numeric($n2)){
         throw new Exception("Informe numeric válido ", 1);
         
     }
}

public function somar(){
    return $this->n1 + $this->n2;
}
public function multiplicar(){
    return $this->n1 * $this->n2;
}
public function subtrair(){
    return $this->n1 - $this->n2;
}
public function dividir(){
    try {
        return $this->n1 / $this->n2;
    }catch (\DivisaoByZeroError $th) {
       throw new DivisaoByZeroError("Não pode dividir um número por zero");
    }
  }

}

?>