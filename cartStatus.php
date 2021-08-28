<div class="shopping_cart" style="height: 200px;">
    <div class="title_box">Shopping cart</div>
    <table width="180px" >
        
        <?php
        $ob = new DataUtility();
        $orderid = $_SESSION['orderid'];
        $sql = "";
        $sql = "select t.orderid,t.pid,p.name,p.rate,p.disrate,1,p.rate as total from temp_order t,product p where t.orderid='$orderid' and t.pid=p.pid";
        $ob = new DataUtility();
        $result = $ob->DQL($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr><td><?php echo $row['pid'] ?></td><td><?php echo $row['name'] ?></td><td><?php echo $row['disrate'] ?></td></tr>
            <?php
        }
        ?> 
    </table>
    <div class="cart_icon" style="margin-left: 50px;"><a href="CartDetail.php"><img src="images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
</div>

