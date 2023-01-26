<?php 

class Stipendio {

    private $mensile;
    private $tredicesima;
    private $quattordicesima;

    public function __construct($mensile, $tredicesima, $quattordicesima){
        
        $this -> setMensile($mensile);
        $this -> setTredicesima($tredicesima);
        $this -> setQuattordicesima($quattordicesima);
    }

    public function getMensile() {

        return $this -> mensile;
    }
    public function setMensile($mensile){
        
        $this -> mensile = $mensile;
    }

    public function getTredicesima() {

        return $this -> tredicesima;
    }
    public function setTredicesima($tredicesima){
        
        $this -> tredicesima = $tredicesima;
    }

    public function getQuattordicesima() {

        return $this -> quattordicesima;
    }
    public function setQuattordicesima($quattordicesima){
        
        $this -> quattordicesima = $quattordicesima;
    }

    public function getStipendioAnnuale(){

        $mesi = 12;
        if ($this->tredicesima){
            $mesi += 1;

            if ($this->quattordicesima){
                $mesi += 1;
            }
        }
        return $mesi * $this->mensile;
    }

    public function getHmtlStipendio(){

        return "mensile" . $this->getMensile() . "<br>" .
            "tredicesima" . $this->getTredicesima() . "<br>" .
            "quattordicesima" . $this->getQuattordicesima() . "<br>" .
            "stipendio annuo" . $this->getStipendioAnnuale();        
    }
}



class Persona {

    private $nome;
    private $cognome;
    private $dataDiNascita;
    private $luogoDiNascita;
    private $codiceFiscale;

    public function __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale){

        $this -> setNome($nome);
        $this -> setCognome($cognome);
        $this -> setDataDiNascita($dataDiNascita);
        $this -> setLuogoDiNascita($luogoDiNascita);
        $this -> setCodicefiscale($codiceFiscale);
    }

    public function getNome() {

        return $this -> nome;
    }
    public function setNome($nome){
        
        $this -> nome = $nome;
    }

    public function getCognome() {

        return $this -> cognome;
    }
    public function setCognome($cognome){
        
        $this -> cognome = $cognome;
    }

    public function getDataDiNascita() {

        return $this -> dataDiNascita;
    }
    public function setDataDiNascita($dataDiNascita){
        
        $this -> dataDiNascita = $dataDiNascita;
    }

    public function getLuogoDiNascita() {

        return $this -> luogoDiNascita;
    }
    public function setLuogoDiNascita($luogoDiNascita){
        
        $this -> luogoDiNascita = $luogoDiNascita;
    }

    public function getCodiceFiscale() {

        return $this -> codiceFiscale;
    }
    public function setCodiceFiscale($codiceFiscale){
        
        $this -> codiceFiscale = $codiceFiscale;
    }

    public function getHmtlPersona(){

        return $this->nome . "<br>" .
            $this->cognome . "<br>" .
            $this->dataDiNascita . "<br>" .
            $this->luogoDiNascita . "<br>" .
            $this->codiceFiscale;
    }
}

class Impiegato extends Persona {

    private $dataDiAssunzione;
    private $stipendio;
    

    public function __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale, $dataDiAssunzione, Stipendio $stipendio ){

        parent::__construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale);

        $this -> setDataDiAssunzione($dataDiAssunzione);
        $this -> setStipendio($stipendio);
    }

    public function getDataDiAssunzione() {

        return $this -> dataDiAssunzione;
    }
    public function setDataDiAssunzione($dataDiAssunzione){
        
        $this -> dataDiAssunzione = $dataDiAssunzione;
    }

    public function getStipendio() {

        return $this -> stipendio;
    }
    public function setStipendio($stipendio){
        
        $this -> stipendio = $stipendio;
    }

}

class Capo extends Persona {

    private $dividendo;
    private $bonus;

    public function __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale, $dividendo, $bonus){

        parent::__construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale);

        $this -> setDividendo($dividendo);
        $this -> setBonus($bonus);
        
    }

    public function getDividendo() {

        return $this -> dividendo;
    }
    public function setDividendo($dividendo){
        
        $this -> dividendo = $dividendo;
    }

    public function getBonus() {

        return $this -> bonus;
    }
    public function setBonus($bonus){
        
        $this -> bonus = $bonus;
    }
}


$persona1 = new Persona("luca", "rossi", "12-03-2020", "Varese", "SCHLRT99M09L382V");

echo $persona1 -> getHmtlPersona();

echo  "<br><br> " ;

$stipendio1 = new Stipendio("1500", 1, 1);

echo $stipendio1->getHmtlStipendio();


echo  "<br><br> " ;