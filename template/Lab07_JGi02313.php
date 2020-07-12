<?php

// Please rename me according to the naming convention

// require the config
require_once("inc/config.inc.php");
// require all the entities
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Facility.class.php");
require_once("inc/Entity/Reservation.class.php");
// require all the utilities: PDO and DAO(s)
require_once("inc/Utility/FacilityDAO.class.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/ReservationDAO.class.php");
//Initialize the DAO(s)
FacilityDAO::initialize('Facility');
ReservationDAO::initialize('Reservation');

//If there was post data from an edit form then process it
if (!empty($_POST)) {

    // if it is an edit (remember the hidden input)
    if (!empty($_POST['action'] == 'edit')){
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['ReservationDate']) 
        && !empty($_post['length'])){
        //Assemble the Reservation to update        
        $ReservationToUpdate = ReservationDAO::getReservation($_POST["reservationid"]);
        //Send the Reservation to the DAO to be updated
        reservationDao::updateReservation($ReservationToUpdate);
        }
        else {
            echo "<h3 style='color: red;'><strong>one or more of your inputs are empty</strong></h3>";
        }
    }

    // it is not an edit... it means create a new record
    else {
        //Checking to make sure form entries are not empty
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['ReservationDate']) 
        && !empty($_post['length'])){
        //Assemble the Reservation to Insert/Create
        $newreservation = new Reservation;
        $newreservation->setName($_POST['name']);
        $newreservation->setEmail($_POST['email']);
        $newreservation->setFacilityID($_POST['facilityid']);
        $newreservation->setReservationDate($_POST['ReservationDate']);
        $newreservation->setReservationLength($_POST['length']);

        //Send the Reservation to the DAO for creation
        ReservationDAO::createReservation($newreservation);

        }
        //This error message will be displayed at the top in red if one or more of the inputs are empty
        else {
            echo "<h3 style='color: red;'><strong>one or more of your inputs are empty</strong></h3>";
        }


    }
        

    
}

//If there was a delete that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "delete")  {
    //Use the DAO to delete the corresponding Reservation
        ReservationDAO::deleteReservation($_GET['id']);
    
}

// Display the header (remeber to set the title/heading)
// Call the HTML header
Page::header();
// List all reservations.
// Note: You need to use the results from the corresponding DAO that gives you the reservation list
$reservations = ReservationDAO::getReservationList();
Page::listReservations($reservations);

//If there was a edit that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
    // Use the DAO to pull that specific reservation
    // Hint: notice the url link for delete.... you should have something similar with edit
    // And you can access it through $_GET
    
    $reservation = ReservationDAO::getReservation($_GET["id"]);
    
    // Render the  Edit Section form with the reservation to edit. 
    // Rememver to use the correct DAO to get the facility list
    $facilities = FacilityDAO::getFacility();
    Page::editReservationForm($reservation, $facilities);
    
    
} else {
    // Otherwise, it is a create reservation form
    $facilities = FacilityDAO::getFacility();
    Page::createReservationForm($facilities);
}

// Finally I need to call the last function from the HTML
Page::footer();



