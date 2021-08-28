<html>
    <head>
        <title>Shopping</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
    <center>
        <table width="1000px" style="margin-top:20px;" border="1px solid" cellpadding="5px" >
            <caption>All Order</caption>
            <tr style="background-color: gray;color:white;"><td>cid</td><td>pid</td><td> Name</td><td>rate</td>
                <td>Offer Rate</td><td>Unit</td><td>Size</td><td>weight</td><td>color</td></tr>
        <?php
        session_start();
        include './header.php';
        include '../connection/DataUtility.php';
        try {
            $userid=$_SESSION['userid'];
            $sql="select * from product";
            
            $ob=new DataUtility();
            $result=$ob->DQL($sql);
           
            while ($row=$result->fetch_assoc())
            {
                
                echo "<tr><td>".$row['catid']."</td><td>".$row['pid']."</td><td>".$row['name']."</td><td>".$row['rate']
                        ."</td><td>".$row['disrate']."</td><td>".$row['unit']."</td><td>".$row['size']."</td><td>".$row['weight']."</td><td>".$row['color']."</td></tr>";
            }
} catch (Exception $ex) {
            
}
        ?>
            
        </table>
       </center>
    </body>
</html>

