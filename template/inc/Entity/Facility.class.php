<?php

Class Facility    {
/*
+--------------+------------+------+-----+---------+----------------+
| Field        | Type       | Null | Key | Default | Extra          |
+--------------+------------+------+-----+---------+----------------+
| FacilityID   | tinyint(3) | NO   | PRI | NULL    | auto_increment |
| FacilityName | char(20)   | YES  |     | NULL    |                |
| Description  | tinytext   | YES  |     | NULL    |                |
+--------------+------------+------+-----+---------+----------------+
*/
    // Make sure to have attributes and get only the fields we need here
    // Save your time :)

    //Attributes
    private $FacilityID;
    private $FacilityName;
    private $Description;

    //Getters
    function getFacilityID(){
        return $this->FacilityID;
    }
    function getFacilityName(){
        return $this->FacilityName;
    }
    function getDecription(){
        return $this->Description;
    }
    
}

?>