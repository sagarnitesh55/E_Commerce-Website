<?php
session_start();
$pid=null;
try {
    $pid = $_GET['pid'];
    include './connection/DataUtility.php';
    $ob = new DataUtility();
    $orderid = $_SESSION['orderid'];
    echo $orderid;
    $sql = "insert into temp_order (orderid,pid) values ('$orderid','$pid')";
    echo '  '.$sql;
    $result = $ob->DML($sql);
    if ($result == 'Save successfully') {
        ?>
<script type="text/javascript">
            alert('New poduct add to cart success!');
        </script>
        <?php
                header('Location:index.php');

    }
} catch (Exception $ex) {
    header('Location:detail.php?pid=$pid');
}


