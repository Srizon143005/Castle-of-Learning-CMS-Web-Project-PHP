<?php require_once('inc/top.php');
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
else if(isset($_SESSION['username']) && $_SESSION['role'] == 'author'){
    header('Location: index.php');
}

if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
}

if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    if(isset($_SESSION['username']) and $_SESSION['role'] == 'admin'){
        $del_query = "DELETE FROM categories WHERE id = '$del_id'";
        if(mysqli_query($con, $del_query)){
            $del_msg = "Category Has Been Deleted";
        }
        else{
            $del_error = "Category Has not Been Deleted";
        }
    }
}

if(isset($_POST['submit'])){
    $cat_name = mysqli_real_escape_string($con, $_POST['cat-name']);
    
    if(empty($cat_name)){
        $error = "Must Fill This Field";
    }
    else{
        $check_query = "SELECT * FROM categories WHERE category = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if(mysqli_num_rows($check_run) > 0){
            $error = "Category Already Exist";
        }
        else{
            $insert_query = "INSERT INTO categories (category) VALUES ('$cat_name')";
            if(mysqli_query($con, $insert_query)){
                $msg = "Category Has Been Added";
            }
            else{
                $error = "Category Has not Been Added";
            }
        }
    }
}

if(isset($_POST['update'])){
    $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));
    
    if(empty($cat_name)){
        $up_error = "Must Fill This Field";
    }
    else{
        $check_query = "SELECT * FROM categories WHERE category = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if(mysqli_num_rows($check_run) > 0){
            $up_error = "Category Already Exist";
        }
        else{
            $update_query = "UPDATE `categories` SET `category` = '$cat_name' WHERE `categories`.`id` = $edit_id";
            if(mysqli_query($con, $update_query)){
                $up_msg = "Category Has Been Updated";
            }
            else{
                $up_error = "Category Has not Been Updated";
            }
        }
    }
}
?>
  </head>
  <body>
    <div id="wrapper">
<?php require_once('inc/header.php');?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php');?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-folder-open"></i> Categories <small>Different Categories</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-folder-open"></i> Categories</li>
                    </ol>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category">Category Name:</label>
                                    <?php
                                    if(isset($msg)){
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    }
                                    else if(isset($error)){
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" placeholder="Category Name" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Add Category" name="submit" class="btn btn-primary">
                            </form>
                            <?php
                            if(isset($_GET['edit'])){
                                $edit_check_query = "SELECT * FROM categories WHERE id = $edit_id";
                                $edit_check_run = mysqli_query($con, $edit_check_query);
                                if(mysqli_num_rows($edit_check_run) > 0){
                                    
                               $edit_row = mysqli_fetch_array($edit_check_run);
                                    $up_category = $edit_row['category'];
                            ?>
                            <hr>
                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category">Update Category Name:</label>
                                    <?php
                                    if(isset($up_msg)){
                                        echo "<span class='pull-right' style='color:green;'>$up_msg</span>";
                                    }
                                    else if(isset($up_error)){
                                        echo "<span class='pull-right' style='color:red;'>$up_error</span>";
                                    }
                                    ?>
                                    <input type="text" value="<?php echo $up_category;?>" placeholder="Category Name" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Update Category" name="update" class="btn btn-primary">
                            </form>
                            <?php 
                             }
                            }
                            ?>
                        </div>
                        <div class="col-md-6"><br>
                           <?php
                            $get_query = "SELECT * FROM categories ORDER BY id DESC";
                            $get_run = mysqli_query($con, $get_query);
                            if(mysqli_num_rows($get_run) > 0){
                                
                                if(isset($del_msg)){
                                        echo "<span class='pull-right' style='color:green;'>$del_msg</span>";
                                    }
                                    else if(isset($del_error)){
                                        echo "<span class='pull-right' style='color:red;'>$del_error</span>";
                                    }
                            ?>
                            
                            
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                    while($get_row = mysqli_fetch_array($get_run)){
                                        $category_id = $get_row['id'];
                                        $category_name = $get_row['category'];
                                    ?>
                                    <tr>
                                        <td><?php echo $category_id;?></td>
                                        <td><?php echo ucfirst($category_name);?></td>
                                        <td><a href="categories.php?edit=<?php echo $category_id;?>"><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="categories.php?del=<?php echo $category_id;?>"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <?php
                            }
                            else{
                                echo "<center><h3>No Categories Found</h3></center>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php require_once('inc/footer.php');?>