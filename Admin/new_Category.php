<html>
    <head>
        <title>Shopping</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
        <?php
        include './header.php';
        include '../connection/DataUtility.php';
        $catid="";
        $name="";
        $dis="";
        if(isset($_GET['submit']))
        {
          $catid=$_GET['txtcatid'];
          $name=$_GET['txtname'];
          $dis=$_GET['dis'];
          $ob=new DataUtility();
          $sql="insert into category(catid,name,dis) values('$catid','$name','$dis')";
          $re=$ob->DML($sql);
          echo $re;
        }
        
        ?>
    <center>
         
        <form name="frm" action="new_Category.php" method="get">
            <table width="700px" style="margin-top:20px;"  cellpadding="5px" >
                <tr><td>Category ID</td><td> <input type="text" name="txtcatid" value="<?php  echo $catid;?>"/></td></tr>
           <tr><td> Category Name ID</td><td><input type="text" name="txtname" value="<?php  echo $name;?>"/></td></tr>
           <tr><td>Description</td><td> <textarea name="dis"><?php  echo $dis;?></textarea></td></tr>
           <tr><td></td><td> <input type="submit" name="submit" value="Save"/></td></tr>
           
                        </table>
            
        </form>
             
    </center>
    </body>
</html>

