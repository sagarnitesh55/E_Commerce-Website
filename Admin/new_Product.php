<html>
    <head>
        <title>Shopping</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
        <?php
        include './header.php';
        include '../connection/DataUtility.php';
        $catid = "";
        $pid = "";
        $name = "";
        $rate = "";
        $disrate="";
        $weight = "";
        $unit = "";
        $size = "";
        $color = "";
        $dis = "";
        if (isset($_POST['submit']) && $_FILES['fl']['size'] > 0) {

            $catid = $_POST['catid'];
            $pid = $_POST['txtpid'];
            $name = $_POST['txtname'];
            $rate = $_POST['txtrate'];
            $disrate=$_POST['disrate'];
            $weight = $_POST['txtweight'];
            $size = $_POST['txtsize'];
            $color = $_POST['txtcolor'];
            $unit = $_POST['txtunit'];
            $dis = $_POST['dis'];


            
            $tmpName = $_FILES['fl']['tmp_name'];
            

            $fp = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            $content = addslashes($content);
            fclose($fp);
            
            $ob = new DataUtility();
            $sql = "insert into product (catid,pid,name,rate,disrate,unit,size,weight,color,dis,photo)"
                    . " values('$catid','$pid','$name','$rate','$disrate','$unit','$size','$weight','$color','$dis','$content')";
            $re = $ob->DML($sql);
            echo $re;
        }
        ?>
    <center>
        <form name="frm" action="new_Product.php" method="post" enctype="multipart/form-data">
            <table width="700px" style="margin-top:20px;"  cellpadding="5px">
                <caption>New Product</caption>
                <tr><td>Category</td><td>
                        <select name="catid" style="width:170px;">
                            <?php
                            $ob = new DataUtility();
                            $sql = "select catid from category";
                            $result = $ob->DQL($sql);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option>
                                    <?php echo $row['catid']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select></td>
                </tr>

                <tr><td> Product ID</td><td><input type="text" name="txtpid" value="<?php echo $pid; ?>" /></td><tr>
                <tr><td> Name</td><td> <input type="text" name="txtname" value="<?php echo $name; ?>"/></td><tr>
                <tr><td> Rate  </td><td><input type="text" name="txtrate" value="<?php echo $rate; ?>"/></td><tr> 
                    <tr><td> Offer Rate  </td><td><input type="text" name="disrate" value="<?php echo $disrate; ?>"/></td><tr> 
                <tr><td>Unit</td><td><input type="text" name="txtunit" value="<?php echo $unit; ?>"/></td></tr>

                <tr><td>Color</td><td><input type="text" name="txtcolor" value="<?php echo $color; ?>"/></td><tr>
                <tr><td>Weight</td><td><input type="text" name="txtweight" value="<?php echo $weight; ?>"/></td><tr>
                <tr><td>Size</td><td><input type="text" name="txtsize" value="<?php echo $size; ?>"/></td><tr>
                <tr> <td> Photo</td><td> <input type="file" name="fl" /></td></tr>
                <tr><td>Description</td><td><textarea name="dis" style="width:170px;"><?php echo $dis; ?></textarea></td></tr>
                <tr><td></td><td><input type="submit" name="submit" value="Save"/></td></tr>

            </table>
        </form>
    </center>
</body>
</html>

