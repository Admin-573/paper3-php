<?php
include "init.php";
$getID = $_GET[$bid];
$delete = "delete from $book where $bid=$getID";
$queryExe = mysqli_query($con,$delete);
if(!$queryExe){
    ?>
    <script type="text/javascript">
        alert("Book Not Deleted");
    </script>
<?php
} else {
    ?>
        <script type="text/javascript">
            alert("Book Deleted");
            window.open("http://localhost/paper3/index.php","_self")
        </script>
    <?php
}
?>