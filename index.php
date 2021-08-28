<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>My Shopping Site</title>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <!--[if IE 6]>
        <link rel="stylesheet" type="text/css" href="iecss.css" />
        <![endif]-->
        <script type="text/javascript" src="js/boxOver.js"></script>
        
        <script type="text/javascript" src="js/sliderman.1.3.8.js"></script>
        <link rel="stylesheet" type="text/css" href="css/sliderman_1.css" />
    </head>
    <body>
        <?php
        session_start();
        $orderid = NULL;
        if (isset($_SESSION['orderid'])) {
           
            $orderid = $_SESSION['orderid'];
        }
        if ($orderid == NULL) {
            $now = new DateTime('now');
            $month = $now->format('m');
            $year = $now->format('Y');
            $date=$now->format('d');
            $hour=$now->format('h');
            $minute=$now->format('i');
            $seconds=$now->format('s');
            //echo $month."  ".$year." ".$date." ".$hour." ".$minute." ".$seconds;
            $orderid=$year."".$month."".$date."".$hour."".$minute."".$seconds;
            $_SESSION['orderid']=$orderid;
        }
        ?>
        <div id="main_container">
            <div id="header">
                <div >
                    <div class="languages">
                        
                      </div>
                    <div> 
                        
                        <div id="slider_container_1">

				<div id="SliderName">

					<a href="#1">
                                            <img src="img/s1.jpg" title="Description from Image Title" width="900px" height="300px" />
					</a>
					<div class="SliderNameDescription">
                                            <img src="img/s1.jpg" height="40" style="float:left;margin-right:5px;" />
						<strong>Nulla luctus congue fermentum.</strong><br />Integer <a href="javascript:void(0);">elementum</a> convallis lorem eu volutpat. Suspendisse fermentum arcu in lorem fringilla ultricies. Nam vel diam nisi.
					</div>
					<a href="#2">
                                            <img src="img/s2.jpg" />
					</a>
                                    <img src="img/s3.jpg" />
					<div class="SliderNameDescription"><a href="#3">Link</a></div>
                                        <img src="img/s4.jpg" />
					<div class="SliderNameDescription"><strong>Nullam nec velit vel leo tristique commodo.</strong><br />Nulla facilisi. Fusce lacus massa, ullamcorper sed hendrerit quis, venenatis eget tortor.</div>
				</div>
				<div class="c"></div>
				<div id="SliderNameNavigation"></div>
				<div class="c"></div>

				<script type="text/javascript">

					// we created new effect and called it 'demo01'. We use this name later.
					Sliderman.effect({name: 'demo01', cols: 10, rows: 5, delay: 10, fade: true, order: 'straight_stairs'});

					var demoSlider = Sliderman.slider({container: 'SliderName', width: 640, height: 300, effects: 'demo01',
					display: {
						pause: true, // slider pauses on mouseover
						autoplay: 3000, // 3 seconds slideshow
						always_show_loading: 200, // testing loading mode
						description: {background: '#ffffff', opacity: 0.5, height: 50, position: 'bottom'}, // image description box settings
						loading: {background: '#000000', opacity: 0.2, image: 'img/loading.gif'}, // loading box settings
						buttons: {opacity: 1, prev: {className: 'SliderNamePrev', label: ''}, next: {className: 'SliderNameNext', label: ''}}, // Next/Prev buttons settings
						navigation: {container: 'SliderNameNavigation', label: '&nbsp;'} // navigation (pages) settings
					}});

				</script>

				<div class="c"></div>
			</div> 
                    </div>
                </div>
                <div id="logo"> 
                     </div>
            </div>
            <div id="main_content">
                <div id="menu_tab">
                   <?php
                           include './menu.php';
                   ?>
                </div>
                <!-- end of menu tab -->
               
                <div class="left_content">
                    <div class="title_box">Categories</div>      
                    <ul class="left_menu">
<?php
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
                        <div class="product_img"><a href="#"><img src="images/p1.jpg" alt="" border="0" width="150px" /></a></div>
                        <div class="prod_price"><span class="reduce">Rs. 350</span> <span class="price">Rs.270</span></div>
                    </div>
                    <div class="title_box">Newsletter</div>
                    <div class="border_box">
                        <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
                        <a href="#" class="join">subscribe</a> </div>
                    <div class="banner_adds"> <a href="#"><img src="images/bann2.jpg" alt="" border="0" /></a> </div>
                </div>
                <!-- end of left content -->
                <div class="center_content">


<?php
$ob = new DataUtility();
$catid = NULL;
if (isset($_GET['catid']))
    $catid = $_GET['catid'];

$sql = "";
if ($catid == NULL) {
    $sql = "select pid,name,rate,disrate,photo from product";
} else {
    $sql = "select pid,name,rate,disrate,photo from product where catid='$catid'";
    //echo $sql;
}
$result = $ob->DQL($sql);
while ($row = $result->fetch_assoc()) {
    ?>
                        <div class="prod_box">
                            <div class="center_prod_box">
                                <div class="product_title"><a href="#"><?php echo $row['name']; ?></a></div>
                                <div class="product_img" ><a href="#">
                                        <img src="ShowImage_1.php?pid=<?php echo $row['pid'] ?>" alt="" border="0" style="width:130px; height: 150px;"   /></a></div>
                                <div class="prod_price"><span class="reduce">Rs. <?php echo $row['rate']; ?></span>
                                    <span class="price">Rs.<?php echo $row['disrate']; ?></span></div>
                            </div>
                            <div class="prod_details_tab">  <a href="detail.php?pid=<?php echo $row['pid'] ?>" class="prod_details">Details</a> </div>
                        </div>
    <?php
}
?>    

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
                    <div class="banner_adds"> </div>
                </div>
                <!-- end of right content -->
            </div>
            <!-- end of main content -->
            <div class="footer">
                <div class="left_footer"> <img src="images/footer_logo.png" alt="" width="89" height="42"/> </div>
                <div class="center_footer"> Student name.Saurabh verma,<br />
                    <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
                    <img src="images/payment.gif" alt="" /> </div>
                <div class="right_footer"> <a href="#">home</a> <a href="#">about</a> <a href="#">sitemap</a> <a href="#">rss</a> <a href="#">contact us</a> </div>
            </div>
        </div>
        </body>
</html>
