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
                var oldpass = document.register_form.txt_oldpass.value;
                var newpass = document.register_form.txt_newpass.value;
                var cpass = document.register_form.txt_confpass.value;
                if (oldpass === null || oldpass === "") {
                    alert("Old Password can't be blank");
                    return false;
                }
                else if (newpass === null || newpass === "") {
                    alert("New Password can't be blank");
                    return false;
                }
                else if (newpass !== cpass) {
                    alert("New Password and confirm password is not matched!");
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
            <div style="margin-top: 50px; color: black; ">
                <form name="register_form" action="changepassword.php" method="post" onsubmit="return validate()">

                    <table  width="600px" cellpading="10px" cellspacing="10px" >
                        <tr><td>Old Password</td><td><input type="password" name="txt_oldpass"/></td></tr>
                        <tr><td>New Password</td><td><input type="password" name="txt_newpass"/></td></tr>
                        <tr><td>Confirm Password</td><td><input type="password" name="txt_confpass"/></td></tr>
                        <tr><td></td><td><input type="submit" name="submit" value=" Save "/></td></tr>


                    </table>
                    <?php
                     include '../connection/DataUtility.php';
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                       
                        $oldpass = $_POST['txt_oldpass'];
                        $newpass = $_POST['txt_newpass'];
                        $cpass = $_POST['txt_confpass'];
                        $userid = $_SESSION["userid"];
                       $ob=new DataUtility();
                        $sql = "update system_user set password='$newpass' where userid='$userid' and password='$oldpass'";
                       $result = $ob->DML($sql);
                       echo $result;
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>

