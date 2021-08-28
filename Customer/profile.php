<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>College Placement cell </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <script>
            function validate()
            {
                var fname = document.register_form.txt_firstname.value;

                if (fname === null || fname === "") {
                    alert("First Name can't be blank");
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div class="example">
            <?php
            include './header.php';
            ?>
            <div style="margin-top: 50px; ">
                <?php
                include '../connection/DataUtility.php';
                $userid = $_SESSION["userid"];
                $firstname = "";
                $lastname = "";
                $add1 = "";
                $add2 = "";
                $mobile = "";
                $email = "";

                $pin = "";
                $city = "";
                $state = "";

                if ($_SERVER["REQUEST_METHOD"] != "POST") {


                    $ob = new DataUtility();

                    $sql = "select FirstName,LastName,Address1,Address2,mobile,email,Pin,City,State from user_profile where userid='$userid'";
                    //secho ''.$sql;
                    $result = $ob->DQL($sql);

                    if ($row = $result->fetch_assoc()) {

                        $firstname = $row['FirstName'];
                        $lastname = $row['LastName'];
                        $add1 = $row['Address1'];
                        $add2 = $row['Address2'];
                        $mobile = $row['mobile'];
                        $email = $row['email'];

                        $city = $row['City'];
                        $state = $row['State'];
                    }
                }
                ?>
                <form name="register_form" action="profile.php" method="post" onsubmit="return validate()">

                    <table  width="600px" cellpading="10px" cellspacing="10px" >
                        <tr><td>First Name</td><td><input type="text" name="txt_firstname" value="<?php echo $firstname; ?>"/></td></tr>
                        <tr><td>Last Name</td><td><input type="text" name="txt_lastname" value="<?php echo $lastname; ?>"/></td></tr>
                        <tr><td>Mobile</td><td><input type="text" name="txt_mobile" value="<?php echo $mobile; ?>"/></td></tr>
                        <tr><td>Email</td><td><input type="text" name="txt_email" value="<?php echo $email; ?>"/></td></tr> 
                        <tr><td>Address1</td><td><input type="text" name="txt_add1" value="<?php echo $add1; ?>"/></td></tr>
                        <tr><td>Address2</td><td><input type="text" name="txt_add2" value="<?php echo $add2; ?>"/></td></tr>                     
                        <tr><td>City</td><td><input type="text" name="txt_city" value="<?php echo $city; ?>"/></td></tr>
                        <tr><td>Pin</td><td><input type="text" name="txt_pin" value="<?php echo $pin; ?>"/></td></tr>
                        <tr><td>State</td><td><input type="text" name="txt_state" value="<?php echo $state; ?>"/></td></tr>

                        <tr><td></td><td><input type="submit" name="submit" value=" Update "/></td></tr>
                    </table>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $firstname = $_POST['txt_firstname'];
                        $lastname = $_POST['txt_lastname'];
                        $add1 = $_POST['txt_add1'];
                        $add2 = $_POST['txt_add2'];
                        $mobile = $_POST['txt_mobile'];
                        $email = $_POST['txt_email'];

                        $pin = $_POST['txt_pin'];
                        $city = $_POST['txt_city'];
                        $state = $_POST['txt_state'];


                        $sql = "update  user_profile set FirstName='$firstname',LastName='$lastname',Address1='$add1',"
                                . " Address2='$add2',mobile='$mobile',email='$email',City='$city',Pin='$pin'"
                                . " ,State='$state' where userid='$userid'";
                        $ob = new DataUtility();
                        $result = $ob->DML($sql);
                        echo '' . $result;
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>

