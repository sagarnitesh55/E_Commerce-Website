<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Tools Shop</title>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <!--[if IE 6]>
        <link rel="stylesheet" type="text/css" href="iecss.css" />
        <![endif]-->
        <script type="text/javascript" src="js/boxOver.js"></script>
    </head>
    <body>
        <div id="main_container">
            <div id="header">
                <div class="top_right">
                    <div class="languages">
                        <div class="lang_text">Languages:</div>
                        <a href="#" class="lang"><img src="images/en.gif" alt="" border="0" /></a> <a href="#" class="lang"><img src="images/de.gif" alt="" border="0" /></a> </div>
                    <div class="big_banner"> <a href="#"><img src="images/banner728.jpg" alt="" border="0" /></a> </div>
                </div>
                <div id="logo"> <a href="#"><img src="images/logo.png" alt="" border="0" width="182" height="85" /></a> </div>
            </div>
            <div id="main_content">
                <div id="menu_tab">
                     <?php
                           include './menu.php';
                   ?>
                </div>
                <!-- end of menu tab -->
                <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
                <div class="left_content">
                    <div class="title_box">Categories</div>      
                    <ul class="left_menu">
                        <?php
                        session_start();
                        include './connection/DataUtility.php';
                        $ob = new DataUtility();
                        $sql = "select catid,name from category";
                        $result = $ob->DQL($sql);
                        $i = 0;
                        while ($row = $result->fetch_assoc()) {
                            if ($i % 2 == 1) {
                                ?>
                                <li class="odd"><a href="index.php?catid=<?php echo $row['catid']; ?>"><?php echo $row['name']; ?></a></li>
                                <?php
                            } else {
                                ?>             

                                <li class="even"><a href="index.php?catid=<?php echo $row['catid']; ?>"><?php echo $row['name']; ?></a></li>
                                <?php
                            }
                            $i++;
                        }
                        ?>
                    </ul>
                    <div class="title_box">Special Products</div>
                    <div class="border_box">
                        <div class="product_title"><a href="#">Makita 156 MX-VL</a></div>
                        <div class="product_img"><a href="#"><img src="images/p1.jpg" alt="" border="0"  /></a></div>
                        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
                    </div>
                    <div class="title_box">Newsletter</div>
                    <div class="border_box">
                        <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
                        <a href="#" class="join">subscribe</a> </div>
                    <div class="banner_adds"> <a href="#"><img src="images/bann2.jpg" alt="" border="0" /></a> </div>
                </div>
                <!-- end of left content -->
                <div class="center_content">
                    <div class="prod_box" style="font-size: 16px;">
                        Your Order is success. <br>
                        <table width="600px">
                            <tr><td>Orderid</td><td>PID</td><td>Product</td><td>Rate</td><td>Offer Rate</td><td>Qty</td><td>Total</td></tr>
                            <?php
                            $ob = new DataUtility();
                            $orderid = $_SESSION['orderid'];
                            $sql = "";
                            $sql = "select t.orderid,t.pid,p.name,p.rate,p.disrate,1,p.rate as total from temp_order t,product p where t.orderid='$orderid' and t.pid=p.pid";
                            $ob = new DataUtility();
                            $result = $ob->DQL($sql);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr><td><?php echo $row['orderid'] ?></td><td><?php echo $row['pid'] ?></td><td><?php echo $row['name'] ?></td><td><?php echo $row['rate'] ?></td><td><?php echo $row['rate'] ?></td><td>1</td><td><?php echo $row['rate'] ?></td></tr>
                                <?php
                            }
                            $_SESSION['orderid']=NULL;
                             $_SESSION['userid']=NULL;
                            ?> 
                        </table>
                       
                    </div>
                    
                </div>
                
                <!-- end of center content -->
                <div class="right_content">
                    <div class="title_box">Search</div>
                    <div class="border_box">
                        <input type="text" name="newsletter" class="newsletter_input" value="keyword"/>
                        <a href="#" class="join">search</a> </div>
                   <?php
                                         include './cartStatus.php';
                                         ?>
                    <div class="title_box">What is new</div>
                    <div class="border_box">
                        <div class="product_title"><a href="#">Motorola 156 MX-VL</a></div>
                        <div class="product_img"><a href="#"><img src="images/p2.jpg" alt="" border="0" /></a></div>
                        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
                    </div>
                    <div class="title_box">Manufacturers</div>
                    <ul class="left_menu">
                        <li class="odd"><a href="#">Bosch</a></li>
                        <li class="even"><a href="#">Samsung</a></li>
                        <li class="odd"><a href="#">Makita</a></li>
                        <li class="even"><a href="#">LG</a></li>
                        <li class="odd"><a href="#">Fujitsu Siemens</a></li>
                        <li class="even"><a href="#">Motorola</a></li>
                        <li class="odd"><a href="#">Phillips</a></li>
                        <li class="even"><a href="#">Beko</a></li>
                    </ul>
                    <div class="banner_adds"> <a href="#"><img src="images/bann1.jpg" alt="" border="0" /></a> </div>
                </div>
                <!-- end of right content -->
            </div>
            <!-- end of main content -->
            <div class="footer">
                <div class="left_footer"> <img src="images/footer_logo.png" alt="" width="89" height="42"/> </div>
                <div class="center_footer"> Template name. All Rights Reserved 2008<br />
                    <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
                    <img src="images/payment.gif" alt="" /> </div>
                <div class="right_footer"> <a href="#">home</a> <a href="#">about</a> <a href="#">sitemap</a> <a href="#">rss</a> <a href="#">contact us</a> </div>
            </div>
        </div>
      
</html>
