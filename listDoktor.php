<!DOCTYPE hmtl PUBLIC "-/W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            Klinik Ajwa
        </title>
        <link rel = "stylesheet" type = "text/css" hfref = "includes.css" />
    </head>

    <body>
        <?php
        include ("header.php");
        ?>

        <?php
        //Make the query
        $q = "SELECT ID, FirstName, LastName, Specialisation, Password FROM Doktor ORDER BY ID";

        //Run the query
        $result = @mysqli_query ($connect, $q);

        //If it ran without a problem, display the records
        if($result) {
            //Table heading
            echo '<table border = "2">
            <tr>
                <td>
                    <b>
                        Edit
                    </b>
                </td>
                <td>
                    <b>
                        Delete
                    </b>
                </td>
                <td>
                    <b>
                        ID
                    </b>
                </td>
                <td>
                    <b>
                        First Name
                    </b>
                </td>
                <td>
                    <b>
                        Last Name
                    </b>
                </td>
                <td>
                    <b>
                        Specialisation
                    </b>
                </td>
                <td>
                    <b>
                        Password
                    </b>
                </td>
            </tr>';

            //Fetch and print all the records
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo 
                '<tr>
                    <td>
                        <a href = "edit_doktor.php?id='.$row['ID'].'">Edit</a>
                    </td>
                    <td>
                        <a href = "delete_doktor.php?id='.$row['ID'].'">Delete</a>
                    </td>
                    <td>
                        '.$row['ID'].'
                    </td>
                    <td>
                        '.$row['FirstName'].'
                    </td>
                    <td>
                        '.$row['LastName'].'
                    </td>
                    <td>
                        '.$row['Specialisation'].'
                    </td>
                    <td>
                        '.$row['Password'].'
                    </td>
                </tr>';
            }

            //Close the table
            echo '</table>';

            //Free up the resources
            mysqli_free_result($result);
        } else { //If failed to run
            //Error message
            echo 
            '<p class = "error">
                The current student could not be retrieved. We apologise for any inconvenience.
            </p>';

            //Debugging message
            echo '<p>' .mysqli_error($connect). '<br><br/>Query: ' .$q. '</p>';
        } //End of if(result)

        //Close the database connection
        mysqli_close($connect);
        ?>
        </div>
        </div>
    </body>
</html>