<?php

class Country {

    protected $countryCode;
    protected $countryName;
    protected $population;
    protected $database;
    public $recentHydro;
    public $recentCarbon;

    function __construct($countryCode, $database){

        $sql = file_get_contents('sql/getCountry.sql');
	    $params = array(
		    'code' => $countryCode
	    );
	    $statement = $database->prepare($sql);
	    $statement->execute($params);
	    $countries = $statement->fetchAll(PDO::FETCH_ASSOC);
        $country = $countries[0];
        $this->countryName = $country['name'];
        $this->countryCode = $country['code'];
        $this->population = $country['population'];

        $sql = file_get_contents('sql/getRecentHydro.sql');
	    $params = array(
		    'code' => $this->countryCode
	    );
	    $statement = $database->prepare($sql);
	    $statement->execute($params);
        $value = $statement->fetchAll(PDO::FETCH_ASSOC);
        $first_value = $value[0];
        $this->recentHydro = $first_value['value'];

        $sql = file_get_contents('sql/getRecentCarbon.sql');
	    $params = array(
		    'code' => $this->countryCode
	    );
	    $statement = $database->prepare($sql);
	    $statement->execute($params);
        $value = $statement->fetchAll(PDO::FETCH_ASSOC);
        $first_value = $value[0];
        $this->recentCarbon = $first_value['value'];
    }

    function getCounryCode(){
        return $this->countryCode;
    }

    function getCountryName(){
        return $this->countryName;
    }

    function setCountryCode($value){
        $this->$countryCode = $value;
    }

    function setCountryName($value){
        $this->$countryName = $value;
    }

    function getPopulation(){
        return $this->population;
    }

    //per capita functions
    function perCapitaHydro(){
       
         return( (($this->recentHydro) * 1000000) /(double)$this->population);

        

    }

    function perCapitaCarbon(){
        
       return( (($this->recentCarbon) * 1000000 ) / (double)$this->population);

       

    }


}

?>