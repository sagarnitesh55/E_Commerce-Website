<html>
    <head>
        <title>Shopping</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
    <center>
        <table width="1000px" style="margin-top:20px;" border="1px solid" cellpadding="5px" >
            <caption>All Order</caption>
            <tr style="background-color: gray;color:white;"><td>userid</td><td>First Name</td><td>Last Name</td><td>Address1</td><td>Address2</td><td>City</td></tr>
        <?php
        session_start();
        include './header.php';
        include '../connection/DataUtility.php';
        try {
            $userid=$_SESSION['userid'];
            $sql="select * from user_profile";
            
            $ob=new DataUtility();
            $result=$ob->DQL($sql);
           
            while ($row=$result->fetch_assoc())
            {
                
                echo "<tr><td>".$row['userid']."</td><td>".$row['FirstName']."</td><td>".$row['LastName']."</td><td>".$row['Address1']."</td><td>".$row['Address2']."</td><td>".$row['City']."</td></tr>";
            }
} catch (Exception $ex) {
            
}
        ?>
            
        </table>
       </center>
    </body>
</html>

