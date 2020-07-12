<?php
class Page  {

    public static $title = "PDO CRUD";

    static function header()   { ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <meta charset="utf-8">
                <meta name="author" content="Joel">
                <title><?php echo "Lab 07: PDO CRUD - Joel Giladi - 300302313" ?></title>   
                <link href="css/styles.css" rel="stylesheet">     
            </head>
            <body>
                <header>
                    <h1><?php echo "Lab 07: PDO CRUD - Joel Giladi - 300302313" ?></h1>
                </header>
                <article>
    <?php }

    static function footer()   { ?>
        <!-- Start the page's footer -->            
                </article>
            </body>

        </html>

    <?php }

    static function listReservations(Array $reservations)    {
    ?>
        <!-- Start the page's show data form -->
        <section class="main">
        <h2>Current Data</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th> <!-- ReservationID -->
                    <!-- ... -->
                    <th>Name</th>
                    <th>Facility</th>
                    <th>Date</th>
                    <th>Length</th>
                    <th>Edit</th>
                    <th>Delete</th>
            </thead>
            <?php

                // List all the reservations
                $count = 0;
                foreach($reservations as $reservation)  {
                
                    // make sure to use the correct tr class
                    // echo "<tr class=
                    $count ++;
                    if($count % 2 != 0){

                    echo '<tr>';
                    echo '<td>'.$reservation->getReservationID().'</td>';
                    echo '<td>'.$reservation->getName().'</td>';
                    echo '<td>'.$reservation->getFacilityName().'</td>';
                    echo '<td>'.$reservation->getReservationDate().'</td>';
                    echo '<td>'.$reservation->getLength().'</td>';
                    echo '<td><a href="'.$_SERVER["PHP_SELF"].'?action=edit&id='.$reservation->getReservationID().'">
                            Edit</a></td>';
                    
                    // ... Fill me with your code ...
                    echo '<td><a href="?action=delete&id='.$reservation->getReservationId().'">Delete</td>';
                    echo "</tr>";
                    }
                    else {
                        echo '<tr class="evenRow">';
                        echo '<td>'.$reservation->getReservationID().'</td>';
                        echo '<td>'.$reservation->getName().'</td>';
                        echo '<td>'.$reservation->getFacilityName().'</td>';
                        echo '<td>'.$reservation->getReservationDate().'</td>';
                        echo '<td>'.$reservation->getLength().'</td>';
                        echo '<td><a href="'.$_SERVER["PHP_SELF"].'?action=edit&id='.$reservation->getReservationID().'">
                                Edit</a></td>';
                        
                        // ... Fill me with your code ...
                        echo '<td><a href="?action=delete&id='.$reservation->getReservationId().'">Delete</td>';
                        echo "</tr>";
                    }
                } 
        
        echo '</table>
            </section>';
  
    }

    static function createReservationForm(Array $facilities)   { ?>        
        <!-- Start the page's add entry form -->
        <section class="form1">
                <h2>Create Reservation</h2>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                            <td>Facility</td>
                            <td>
                            <select name="facilityid">
                            <?php
                                foreach ($facilities as $facility)   {
                                
                                    // list all facility names from the database read                                   
                                    echo '<option value='.$facility->getFacilityID().'>'.$facility->getFacilityName().'</option>';
                                }
                            ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><input type="date" name="ReservationDate"></td>
                        </tr>
                        <tr>
                            <td>Length</td>
                            <td><input type="number" min="1" max="7" step="1" name="length"></td>
                        </tr>
                    </table>
                    <!-- Use input type hidden to let us know that this action is to create -->
                    <input type="hidden" name="action" value="create">
                    <input type="submit" value="Add Reservation">
                </form>
            </section>

    <?php }

    static function editReservationForm(Reservation $reservationToEdit, Array $facilities)   {  ?>        
        <!-- Start the page's edit entry form -->
        <section class="form1">
            <h2>Edit Reservation - <?php echo $_GET['id'] ?></h2>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <table>
                    <tr>
                        <td>Reservation ID</td>
                        <td><?php echo $_GET['id'] ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" value="<?php echo $reservationToEdit->getName();?>"></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><input type="date" name="ReservationDate" value="<?php echo $reservationToEdit->getReservationDate();?>"></td>
                    </tr>
                    <tr>
                        <td>Length</td>
                        <td><input type="number" min="1" max="7" step="1" name="length" value="<?php echo $reservationToEdit->getLength(); ?>"></td>
                    </tr>
                    <tr>
                        <td>Facility</td>
                        <td>
                        <select name="facilityid">
                        <?php
                            foreach ($facilities as $facility)   {
                            
                                // list all facility names from the database read
                                // make sure the corresponding facility for this reservation is selected
                                if ($facility->getFacilityID() == $reservationToEdit->getFacilityID())
                                    echo '<option value='.$facility->getFacilityID().' selected>'.$facility->getFacilityName().'</option>';
                                
                                else 
                                echo '<option value='.$facility->getFacilityID().'>'.$facility->getFacilityName().'</option>';
                            }
                        ?>
                        </select>
                        </td>



                    </tr>
                </table>


                <!-- We need another hidden input for reservation id here. Why? -->
                <input type="hidden" name="reservationid" value="<?php echo $_GET['id']; ?>">
                
                <!-- Use input type hidden to let us know that this action is to edit -->
                <input type="hidden" name="action" value="edit">
                <input type="submit" value="Edit Reservation">                
            </form>
        </section>

<?php }

}