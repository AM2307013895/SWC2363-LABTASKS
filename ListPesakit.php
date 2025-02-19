<!DOCTYPE hmtl PUBLIC "-/W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            Klinik Ajwa
        </title>
        <link rel = "stylesheet" type = "text/css" href = "includes.css" />
    </head>

    <body>
        <?php
        include ("header.php");
        ?>

        <?php
        //Make the query
        $q = "SELECT ID_P, FirstName_P, LastName_P, Insurance_Number, Diagnose FROM Pesakit ORDER BY ID_P";

        //Run the query
        $result = @mysqli_query ($connect, $q);

        //If it ran without a problem, display the records
        if($result) {
            //Table heading
            echo '<table border="2">
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
                        Patient ID
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
                        Insurance Number
                    </b>
                </td>
                <td>
                    <b>
                        Diagnose
                    </b>
                </td>
            </tr>';

            //Fetch and print all the records
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo 
                '<tr>
                    <td>
                        <a href = "edit_pesakit.php?id='.$row['ID_P'].'">Edit</a>
                    </td>
                    <td>
                        <a href = "delete_pesakit.php?id='.$row['ID_P'].'">Delete</a>
                    </td>
                    <td>
                        '.$row['ID_P'].'
                    </td>
                    <td>
                        '.$row['FirstName_P'].'
                    </td>
                    <td>
                        '.$row['LastName_P'].'
                    </td>
                    <td>
                        '.$row['Insurance_Number'].'
                    </td>
                    <td>
                        '.$row['Diagnose'].'
                    </td>
                </tr>';
            }
            
            //Close the table
            echo '</table>';

            //Free up the resources
            mysqli_free_result ($result);
        } else { //If failed to run
            //Error message
            echo '<p class ="error">The current student could not be retrieved. We apologies for any inconvenience.</p>';

            //Debugging message
            echo '<p>' .mysqli_error($connect). '<br><br/>Query: '.$q.'</p>';
        } //end of if (result)

        //Close the database connection
        mysqli_close($connect);
        ?>
        </div>
        </div>
    </body>
</html>