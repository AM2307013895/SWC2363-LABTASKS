<!DOCTYPE hmtl PUBLIC "-/W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            Klinik Ajwa
        </title>
    </head>

    <body>
        <?php
        //Call file to connect to server
        include ("header.php");
        ?>

        <?php
        //This is query inserts a record in the clinic table
        //Has form been submitted?
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
            $error = array(); //Initialise an error array

            //Check for a FirstName
            if (empty($_POST ['FirstName'])) {
                $error [] = 'You forgot to enter your first name.';
            } else {
                $n = mysqli_real_escape_string ($connect, trim ($_POST ['FirstName']));
            }

            //Check for LastName
            if (empty($_POST['LastName'])) {
                $error [] = 'You forgot to enter your last name.';
            } else {
                $l = mysqli_real_escape_string ($connect, trim ($_POST ['LastName']));
            }

            //Check for a specialisation
            if (empty($_POST ['Specialisation'])) {
                $error [] = 'You forgot to enter your specialisation.';
            } else {
                $i = mysqli_real_escape_string ($connect, trim ($_POST ['Specialisation']));
            }

            //Check for a password
            if (empty($_POST['Password'])) {
                $error [] = 'You forgot to enter your password.';
            } else {
                $d = mysqli_real_escape_string ($connect, trim ($_POST ['Password']));
            }

            //Register the user in the database
            //Make the query:
            $q = "Insert INTO doktor (FirstName, LastName, Specialisation, Password) VALUES ('$n', '$l', '$i', '$d')";
            $result = @mysqli_query ($connect, $q); //Run the query

            //If it runs
            if ($result) {
                echo '<h1>Thank You</h1>';
                exit();
            } else { //If it didn't run
                //Message
                echo '<h1>System Error</h1>';
                //Debugging message
                echo '<p>' .mysqli_error($connect).'<br><br>Query: ' .$q. '</p>';
            } //End of if (result)

            mysqli_close($connect); //Close the database connection
            exit();
        } //End of the main submit conditional
        ?>

        <h2> Register Doktor </h2>
        <h4> * required field</h4>
        <form action = "registerDoktor.php" method = "post">
            <p>
                <label class = "label" for = "FirstName"> First Name : *</label>
                <input id = "FirstName" type = "text" name = "FirstName" size = "30" maxlength = "150" value = "
                    <?php 
                    if(isset($_POST['FirstName'])) echo $_POST ['FirstName']; 
                    ?>
                ">
            </p>
            <p>
                <label class = "label" for = "LastName"> Last Name : *</label>
                <input id = "LastName" type = "text" name = "LastName" size = "30" maxlength = "60" value = "
                    <?php 
                    if(isset($_POST['LastName'])) echo $_POST ['LastName']; 
                    ?>
                ">
            </p>
            <p>
                <label class = "label" for = "Specialisation"> Specialisation : *</label>
                <input id = "Specialisation" type = "text" name = "Specialisation" size = "12" maxlength = "12" value = "
                    <?php 
                    if(isset($_POST['Specialisation'])) echo $_POST ['Specialisation']; 
                    ?>
                "/>
            </p>
            <p>
                <label class = "label" for = "Password"> Password : *</label>
                <input id = "Password" type = "text" name = "Password" size = "12" maxlength = "12" value = "
                    <?php 
                    if(isset($_POST['Password'])) echo $_POST ['Password']; 
                    ?>
                ">
            </p>
            <p>
                <input id = "submit" type = "submit" name = "submit" value = "Register" /> &nbsp;&nbsp;
                <input id = "reset" type = "reset" name = "reset" value = "Clear All" />
            </p>
        </form>
        <br />
        <br />
        <br />
    </body>
</html>