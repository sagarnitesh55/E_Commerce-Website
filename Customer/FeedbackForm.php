<?php
include '../connection/DataUtility.php';
try {

    if (isset($_GET['submit'])) {
        include '';
        $userid = $_SESSION['userid'];
        $q1 = $_GET['q1'];
        $q2 = $_GET['q2'];
        $q3 = $_GET['q3'];
        $q4 = $_GET['q4'];
        $msg = $_GET['txt_sussation'];
        $ob = new DataUtility();
        $sql = "insert into feedback(userid,q1,q2,q3,q4,msg) values('$userid','$q1','$q2','$q3','$q4','$q5')";
        $result = $ob->DML($sql);
        if ($result > 0) {
            echo "Successfully Save FeedBack!";
        } else {
            //echo "Error:" + $sql;
            echo "Successfully Save FeedBack!";
        }
    }
} catch (Exception $ex) {
    echo"Error !" + $ex;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>OnLine Book Store </title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!--  Free CSS Templates from www.templatemo.com -->
         <center>
             <div id="templatemo_container" style="width: 1000px">
            <?php include './header.php'; ?>

           
                <div style="text-align:left; padding-top: 20px;  font-size: 12px;">
                    <h1>Feed Back Form</h1>
                    <form  name="Cat_form" action="FeedbackForm.jsp" method="get">
                        <table style="width: 600px;" cellspacing="5px" cellpadding="5px" >
                            <tr><td>How long have you used
                                    our products/service?</td></tr>
                            <tr><td><table><tr><td><input type="radio" name="q1" value="Less than 6 months"/>Less than 6 months</td></tr>
                                        <tr><td><input type="radio" name="q1"  value="1 year to less than 3 years" />1 year to less than 3 years</td></tr>
                                        <tr><td><input type="radio" name="q1" value="years to less than 5 years"/> years to less than 5 years</td></tr>
                                        <tr><td><input type="radio" name="q1" value="5 years or more"/>5 years or more</td></tr></table></td></tr>

                            <tr><td>How frequently do you purchase
                                    from us?</td></tr>
                            <tr><td><table><tr><td><input type="radio" name="q2"value="Every day"/>Every day</td></tr>
                                        <tr><td><input type="radio" name="q2"value="Every week"/>Every week</td></tr>
                                        <tr><td><input type="radio" name="q2"value="Every 2 - 3 weeks"/>Every 2 - 3 weeks</td></tr>
                                        <tr><td><input type="radio" name="q2"value="Every month"/>Every month</td></tr></table></td></tr>

                            <tr><td>How would you rate your
                                    overall satisfaction with us?</td></tr>
                            <tr><td><table><tr><td><input type="radio" name="q3"value="Very satisfi ed"/>Very satisfi ed</td></tr>
                                        <tr><td><input type="radio" name="q3"value="Somewhat satisfi ed"/>Somewhat satisfi ed</td></tr>
                                        <tr><td><input type="radio" name="q3"value="Neutral"/>Neutral</td></tr>
                                        <tr><td><input type="radio" name="q3"value="Somewhat dissatisfi ed">Somewhat dissatisfi ed</td></tr></table></td></tr>

                            <tr><td>How likely is it that you
                                    would recommend us to a
                                    friend/colleague?</td></tr>
                            <tr><td><table><tr><td><input type="radio" name="q4"value="Very likely"/>Very likely</td></tr>
                                        <tr><td><input type="radio" name="q4"value="Somewhat likely"/>Somewhat likely</td></tr>
                                        <tr><td><input type="radio" name="q4"value="Neutra"/>Neutra</td></tr>
                                        <tr><td><input type="radio" name="q4"value="Somewhat unlikely"/>Somewhat unlikely</td></tr></table></td></tr>


                            <tr><td>Do you have any suggestions
                                    for improving our products/
                                    services?</td><td><textarea  name="txt_sussation"  ></textarea></td></tr>

                            <tr><td></td><td><input type="submit" name="btnsubmit" value="  Save  " /></td></tr>


                        </table>
                    </form>

                </div>
           


        </div> <!-- end of container -->
         </center>
    </body>
</html>
