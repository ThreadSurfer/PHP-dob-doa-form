<?php


/*
+-----------------+-------------+------+-----+---------+----------------+
| Field           | Type        | Null | Key | Default | Extra          |
+-----------------+-------------+------+-----+---------+----------------+
| ReservationID   | smallint(5) | NO   | PRI | NULL    | auto_increment |
| Name            | varchar(50) | YES  |     | NULL    |                |
| Email           | varchar(50) | YES  |     | NULL    |                |
| FacilityID      | tinyint(3)  | YES  | MUL | NULL    |                |
| ReservationDate | date        | YES  |     | NULL    |                |
| Length          | tinyint(3)  | YES  |     | NULL    |                |
| Venue           | tinytext    | YES  |     | NULL    |                |
+-----------------+-------------+------+-----+---------+----------------+
*/
class Reservation {

    // We need all columns except the venue!

    // Attributes, make sure they match the column names!

    // ReservationID	 Name	Email	FacilityID ReservationDate Length
    private $ReservationID;
    private $Name;
    private $Email;
    private $FacilityID;
    PRIVATE $FacilityName;    
    private $ReservationDate;
    private $Length;

    //Setters
    function setReservationID(int $reservationid){
        $this->ReservationID = $reservationid;
    }
    function setName(string $name){
        $this->Name = $name;
    }
    function setEmail(string $email){
        $this->Email = $email;
    }
    function setFacilityID(string $facilityid){
        $this->FacilityID = $facilityid;
    }
    function setReservationDate(string $reservationdate){
        $this->ReservationDate = $reservationdate;
    }
    function setReservationLength(int $reservationLength){
        $this->Length = $reservationLength;
    }

    //Getters
    function getReservationID() : int{
        return $this->ReservationID;
    }
    function getName() : string{
        return $this->Name;
    }
    function getEmail() : string {
        return $this->Email;
    }
    function getFacilityID() : int {
        return $this->FacilityID;
    }
    function getFacilityName() : string{
        return $this->FacilityName;
    }
    function getReservationDate() : string{
        return $this->ReservationDate;
    }
    function getLength() : int{
        return $this->Length;
    }
}