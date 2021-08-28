<html>
    <head>
        <title>Shopping</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
    <center>
        <table width="1000px" style="margin-top:20px;" border="1px solid" cellpadding="5px" >
            <caption>All Order</caption>
            <tr style="background-color: gray;color:white;"><td>Orderid</td><td>pid</td><td>name</td><td>rate</td><td>qty</td><td>total</td></tr>
        <?php
        session_start();
        include './header.php';
        include '../connection/DataUtility.php';
        try {
            $userid=$_SESSION['userid'];
            $sql="select t.orderid,p.pid,p.name,p.rate,1 as qty,p.rate as total from tb_order o,temp_order t,product p where (  t.orderid=o.orderid and t.pid=p.pid)";
            
            $ob=new DataUtility();
            $result=$ob->DQL($sql);
            $total=0;
            while ($row=$result->fetch_assoc())
            {
                $total+=$row['total'];
                echo "<tr><td>".$row['orderid']."</td><td>".$row['pid']."</td><td>".$row['name']."</td><td>".$row['rate']."</td><td>".$row['qty']."</td><td>".$row['total']."</td></tr>";
            }
} catch (Exception $ex) {
            
}
        ?>
            <tr><td colspan="5">Total</td><td><?php echo $total;?></td></tr>
        </table>
       </center>
    </body>
</html>

