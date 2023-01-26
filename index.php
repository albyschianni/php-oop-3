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

    public function getHtmlPersona(){

        return "Nome: " . $this->nome . "<br>" .
            "Cognome: " . $this->cognome . "<br>" .
            "Data di Nascita: " . $this->dataDiNascita . "<br>" .
            "Luogo di Nascita: " . $this->luogoDiNascita . "<br>" .
            "Codice Fiscale: " . $this->codiceFiscale;
    }
}

class Impiegato extends Persona {

    private $dataDiAssunzione;
    private Stipendio $stipendio;
    

    public function __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale, $dataDiAssunzione, Stipendio $stipendio){

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
    public function setStipendio(Stipendio $stipendio){
        
        $this -> stipendio = $stipendio;
    }

    public function getHtmlImpiegato(){

        return parent:: getHtmlPersona() . "<br>" .
            "Stipendio annuale: " . $this->getStipendio()->getStipendioAnnuale() . "<br>" .
            "Data di assunzione: " . $this->getDataDiAssunzione();

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

    public function getRedditoAnuale(){

        return $this->dividendo * 12 + $this->bonus;
    }

    public function getHtmlCapo(){

        return parent:: getHtmlPersona() . "<br>" .
               "Dividendo: " . $this -> dividendo . "<br>" .
               "Bonus: " . $this -> bonus . "<br>" .
               "Reddito Annuale: " . $this-> getRedditoAnuale();
    }
}


$impiegato1 = new Impiegato("Luca", "Rossi", "12-03-1970", "Varese", "SCHLRT99M09L382V","12-10-1990", new Stipendio(1500,true,true));

echo $impiegato1 -> getHtmlImpiegato();

echo  "<br><br> " ;

$capo1 = new Capo("Luciano", "Maggi", "12-3-1970", "Milano", "CJBCJENCICNE99", 2500, 10000);

echo $capo1->getHtmlCapo();

