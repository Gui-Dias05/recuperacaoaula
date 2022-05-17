<?php
require_once "conf/Conexao.php";
class Quadrado{
    
    private $lado;
    private $cor; 
    public function __construct($lado, $cor){ 
        $this->setlado  ($lado);
        $this->setcor ($cor);
    }
    public function getLado() {return $this->lado;}
    public function getCor() {return $this->cor;}
    public function setLado($lado) {return $this->lado = $lado;}
    public function setCor($cor) {return $this->cor = $cor;}

public function Area(){
$area = $this->lado * $this->lado;
return $area;

}
public function Perimetro(){
    $perimetro = $this->lado + $this->lado+ $this->lado + $this->lado;
    return $perimetro;
     
}
public function Diagonal(){
    $diagonal = $this->lado * 1.44;
    return $diagonal;
}

public function __toString(){
    return  "[Quadrado]<br>Lado: ".$this->getLado()."<br>".
            "Cor: ".$this->getCor()."<br>".
            "Area: ".$this->Area()."<br>".
            "Perimetro: ".$this->Perimetro()."<br>".
            "Diagonal: ".$this->Diagonal()."<br>";
}

public function Salvar(){
    $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO quadrado (lado,cor) VALUES(:lado, :cor)');
            $stmt->bindValue(':lado', $this->getLado());
            $stmt->bindValue(':cor', $this->getCor());
            return $stmt->execute();

}

public function listarVenda($id){
         require_once("conf/Conexao.php");
         $conexao = Conexao::getInstance();

         $consulta = $pdo->query("SELECT id, lado, cor
                                     FROM quadrado
                                     WHERE id LIKE '$id%' 
                                     ORDER BY id");
             }
}

?>