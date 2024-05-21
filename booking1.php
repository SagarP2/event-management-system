<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <style type="text/css">
            #regiration_form fieldset:not(:first-of-type) {
                display: none;
            }
        </style>
        <title>Booking Form</title>
    </head>
    <body>
        <div class="container">
            <h1></h1>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <form id="regiration_form" novalidate action="#"  method="post">
                <fieldset>
                    <h2>Step 1: Select Event </h2><br>
                    <div class="form-group">
                        <label for="sel1" class="form-label">Event list (select one):</label><br>
                        <select class="form-control" id="sel1" name="sellist1">
                            <option value="" selected>-- Select Event --</option>

                             <?php
                            // Assuming you have a database connection
                            $conn = new mysqli("localhost", "root", "", "event");

                            // Check the connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Fetch events from the database
                            $query = "SELECT E_id, event from tbl_event";
                            $result = $conn->query($query);

                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['E_id']}'>{$row['event']}</option>";
                            }

                            // Close the database connection
                            $conn->close();
                            ?>
                        </select>
                        <br>

                    </div>
                    
                    <input type="button" name="data[password]" class="next btn btn-info" value="Next" />
                </fieldset>
                <fieldset>
                    <h2> Step 2: Select Venues</h2>
                    <div class="form-group">
                                               <label for="sel1" class="form-label">Venues list (select one):</label><br>
                        <select class="form-control" id="sel1" name="sellist1">
                            <option value="" selected>-- Select Venue --</option>

                          <?php
                            // Fetch venues from the database
                            $conn = new mysqli("localhost", "root", "", "event");

                            // Check the connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $query = "SELECT V_Id, Venue_Name FROM tbl_venues";
                            $result = $conn->query($query);

                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['V_Id']}'>{$row['Venue_Name']}</option>";
                            }

                            // Close the database connection
                            $conn->close();
                            ?>
                        </select>
                        <br>
                    </div>
                    
                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                    <input type="button" name="next" class="next btn btn-info" value="Next" />
                </fieldset>
                <fieldset>
                    <h2>Step 3: Package</h2>
                    <div class="form-group">
                      
                        
                        <label for="sel1" class="form-label">Package list (select one):</label><br>
                        <select class="form-control" id="sel1" name="sellist1">
                            <option value="" selected>-- Select Package --</option>

                              <?php
                            // Fetch packages from the database
                            $conn = new mysqli("localhost", "root", "", "event");

                            // Check the connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $query = "SELECT P_Id, P_Name FROM tbl_package";
                            $result = $conn->query($query);

                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['P_Id']}'>{$row['P_Name']}</option>";
                            }

                            // Close the database connection
                            $conn->close();
                            ?>
                        </select>
                        <br>
                    </div>
                    <div class="form-group">
                       
                    </div>
                     
                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                    <input type="button" name="next" class="next btn btn-info" value="Next" />

                </fieldset>
                  <fieldset>
                    <h2>Step 4: Booking</h2>
                    <div class="form-group">
                        
                        <label for="sel1" class="form-label">Booking Date : </label><br>
                        <input type="date" name="eventdate" placeholder="MM/DD/YYYY"><br>
                        <label for="sel1" class="form-label">Event Date : </label><br>
                        <input type="date" name="eventdate" placeholder="MM/DD/YYYY">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="address">No of People :</label>
                        <input type="number"  class="form-control" name="data[address]" placeholder="">
                    </div>
                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                    <input type="submit" name="submit" class="submit btn btn-success" value="Submit" id="submit_data" />
                </fieldset>
            </form>
        </div>
    </body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "event");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $event = isset($_POST['event']) ? $_POST['event'] : '';
    $venue = isset($_POST['venue']) ? $_POST['venue'] : '';
    $package = isset($_POST['package']) ? $_POST['package'] : '';
    $booking_data = isset($_POST['booking_date']) ? $_POST['booking_date'] : '';
    $event_date = isset($_POST['event_date']) ? $_POST['event_date'] : '';
    $no_of_people = isset($_POST['no_of_people']) ? $_POST['no_of_people'] : '';

    // Example: Insert data into tbl_booking
    $sql = "INSERT INTO tbl_booking1 (event,venue,package, booking_data, event_date, no_of_people)
            VALUES ('$event', '$venue', '$package', '$booking_data', '$event_date', '$no_of_people')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<script type="text/javascript">
    $(document).ready(function () {
        var current = 1, current_step, next_step, steps;
        steps = $("fieldset").length;
        $(".next").click(function () {
            current_step = $(this).parent();
            next_step = $(this).parent().next();
            next_step.show();
            current_step.hide();
            setProgressBar(++current);
        });
        $(".previous").click(function () {
            current_step = $(this).parent();
            next_step = $(this).parent().prev();
            next_step.show();
            current_step.hide();
            setProgressBar(--current);
        });
        setProgressBar(current);
        // Change progress bar action
        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                    .css("width", percent + "%")
                    .html(percent + "%");
        }
    });
</script>



