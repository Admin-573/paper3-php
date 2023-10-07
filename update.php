<?php
    include "init.php";
    $getID = $_GET[$bid];
    $queryExe = "select * from $book where $bid=$getID";
    $data = mysqli_query($con,$queryExe);
    $row = mysqli_fetch_array($data);
?>
<html>
    <head>
        <title>Update Book</title>
    </head>
<body>
<center>
            <h1>Update Book</h1>
            <form action="" method="post">
            <table>
                <tr>
                    <td>
                        Book ID
                    </td>   
                    <td>
                        <input type="number" name="bid" disabled value='<?php echo $row[$bid]; ?>'/> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Update Book Title
                    </td>   
                    <td>
                        <input type="text" name="btitle" value='<?php echo $row[$btitle]; ?>'/> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Update Book Author
                    </td>   
                    <td>
                        <input type="text" name="bauthor" value='<?php echo $row[$bauthor]; ?>'/> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Update Book Price
                    </td>   
                    <td>
                        <input type="number" name="bprice" value='<?php echo $row[$bprice]; ?>'/> 
                    </td>
                </tr> 
                <tr>
                    <td>
                        
                    </td>   
                    <td style="text-align: center;">
                        <input type="submit" name="btn_upd" value="Update Book"/> 
                    </td>
                </tr>  
            </table>
            </form>
</center>
</body>
</html>
<?php
    include "init.php";

    if(isset($_POST['btn_upd'])){
        
        $upd_title = $_POST[$btitle];
        $upd_author = $_POST[$bauthor];
        $upd_price = $_POST[$bprice];

        $update = "update $book set $btitle='$upd_title' ,$bauthor='$upd_author', $bprice=$upd_price where $bid=$getID";
        $queryExe = mysqli_query($con,$update);

        if(!$queryExe){
            ?>
                <script type="text/javascript">
                    alert("Book Not Updated");
                </script>
            <?php
        } else {
            ?>
                <script type="text/javascript">
                    alert("Book Updated");
                    window.open("http://localhost/paper3/index.php","_self")
                </script>
            <?php
        }
    }
?>
