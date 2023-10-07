<html>
    <head>
        <title>Library</title>
    </head>
    <body>
        <center>
            <h1>Library Management System</h1>
            <form action="" method="post">
            <table>
                <tr>
                    <td>
                        Book ID
                    </td>   
                    <td>
                        <input type="number" name="bid" required/> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Book Title
                    </td>   
                    <td>
                        <input type="text" name="btitle" required/> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Book Author
                    </td>   
                    <td>
                        <input type="text" name="bauthor" required/> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Book Price
                    </td>   
                    <td>
                        <input type="number" name="bprice" required/> 
                    </td>
                </tr> 
                <tr>
                    <td>
                        
                    </td>   
                    <td style="text-align: center;">
                        <input type="submit" name="btn_add" value="Add Book"/> 
                    </td>
                </tr>  
            </table>
            </form>

            <form action="" method="post">
                <table>
                    <tr>
                        <td>
                            Sort Book
                        </td>   
                        <td>
                            <select name="book_sort[]">
                                <option name="title">Title Wise</option>
                                <option name="author">Author Wise</option>
                                <option name="price">Price Wise</option>
                            </select> 
                        </td>
                        <td>
    
                            
                        </td>   
                        <td style="text-align: center;">
                            <input type="submit" name="btn_sort" value="Sort"/> 
                        </td>
                    </tr>  
                </table>
            </form>
        </center>
    </body>
</html>    

<?php
    include 'init.php';
    
    $create = "create table if not exists $book($bid int primary key,$btitle text,$bauthor text,$bprice text)";
    $queryExe = mysqli_query($con,$create);

    if(isset($_POST['btn_add'])){
        
        $book_id = $_POST[$bid];
        $book_title = $_POST[$btitle];
        $book_author = $_POST[$bauthor];
        $book_price = $_POST[$bprice];

        $sql = "select * from $book where $bid=$book_id";
        $queryExe = mysqli_query($con,$sql);
        $data = mysqli_num_rows($queryExe);

        if($data){
            ?>
                <script type="text/javascript">
                    alert("Book Already Added !")    
                </script>  
            <?php
        } else {
            $insert = "insert into $book values($book_id,'$book_title', '$book_author',$book_price)";
            $queryExe = mysqli_query($con,$insert);
            if($queryExe){
                ?>
                    <script type="text/javascript">
                        alert("Book Added !")    
                        window.open("http://localhost/paper3/index.php","_self")
                    </script>  
                <?php
            }
        }
    } 

    ?>
        <center>
            <table border="1px">
                <tr>
                    <th>Book ID</th>  
                    <th>Book Title</th>  
                    <th>Book Author</th>  
                    <th>Book Price</th>
                    <th colspan=2>Action</th>  
                </tr>
                <tr>
                    <?php
                        include "init.php";

                        if(isset($_POST['btn_sort'])){
                        foreach($_POST['book_sort'] as $sort ){
                            if($sort == 'Title Wise'){
                                $sql = "select * from $book order by $btitle";
                                $queryExe = mysqli_query($con,$sql);
                                $data = mysqli_num_rows($queryExe); 
                            }else if($sort == 'Author Wise'){
                                $sql = "select * from $book order by $bauthor";
                                $queryExe = mysqli_query($con,$sql);
                                $data = mysqli_num_rows($queryExe); 
                            }else if($sort == 'Price Wise'){
                                $sql = "select * from $book order by $bprice";
                                $queryExe = mysqli_query($con,$sql);
                                $data = mysqli_num_rows($queryExe);
                            }
                        }
                        while($row = mysqli_fetch_array($queryExe)){
                            ?>
                                <tr>
                                    <td><?php echo $row[$bid]; ?></td>
                                    <td><?php echo $row[$btitle]; ?></td>
                                    <td><?php echo $row[$bauthor]; ?></td>  
                                    <td><?php echo $row[$bprice]; ?></td>
                                    <td>
                                        <a href="update.php?bid=<?php echo $row[$bid]; ?>">Update</a>
                                            
                                    </td>
                                    <td>
                                        <a href="delete.php?bid=<?php echo $row[$bid]; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php
                        }  
                    }else{

                        $sql = "select * from $book";
                        $queryExe = mysqli_query($con,$sql);
                        $data = mysqli_num_rows($queryExe);
                        while($row = mysqli_fetch_array($queryExe)){
                            ?>
                                <tr>
                                    <td><?php echo $row[$bid]; ?></td>
                                    <td><?php echo $row[$btitle]; ?></td>
                                    <td><?php echo $row[$bauthor]; ?></td>  
                                    <td><?php echo $row[$bprice]; ?></td>
                                    <td>
                                        <a href="update.php?bid=<?php echo $row[$bid]; ?>">Update</a>
                                            
                                    </td>
                                    <td>
                                        <a href="delete.php?bid=<?php echo $row[$bid]; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    ?>
                </tr>  
            </table>
        </center>
    <?php

?>