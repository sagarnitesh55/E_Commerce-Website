<html>
    <head>
        <title>Shopping</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
        <center>
        <table width="1000px" style="margin-top:20px;" border="1px solid" cellpadding="5px" >
            <caption>All Category</caption>
            <tr style="background-color: gray;color:white;"><td>cid</td><td>name</td><td> Description</td></tr>
        <?php
        include './header.php';
        include '../connection/DataUtility.php';
        $ob=new DataUtility();
        $sql="select catid,name,dis from category";
        $re=$ob->DQL($sql);
        while($row=$re->fetch_assoc())
        {
            ?>
    <tr><td><?php echo $row['catid'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['dis'];?></td></tr>
        <?php
        }
        ?>
        </table>

    </body>
    </center>
</html>

