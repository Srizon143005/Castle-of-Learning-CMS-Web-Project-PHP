<?php require_once('inc/top.php');?>
  </head>
  <body style="background-color: rgb(255, 248, 224);">
<?php require_once('inc/header.php');?>
   
<?php
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    
    $views_query = "UPDATE `posts` SET `views` = views + 1 WHERE `posts`.`id` = $post_id";
    mysqli_query($con, $views_query);
    
    $query = "SELECT * FROM posts WHERE status = 'publish' and id = $post_id";
    $run = mysqli_query($con, $query);
    if(mysqli_num_rows($run) > 0){
        $row = mysqli_fetch_array($run);
        $id = $row['id'];
        $date = getdate($row['date']);
        $day = $date['mday'];
        $month = $date['month'];
        $year = $date['year'];
        $title = $row['title'];
        $image = $row['image'];
        $author_image = $row['author_image'];
        $author = $row['author'];
        $categories = $row['categories'];
        $post_data = $row['post_data'];
    }
    else{
        header('Location: index.php');
    }
}      
?>
    
    <div class="jumbotron">
        <div class="container">
            <div id="details" class="animated fadeInLeft">
                <h1>Post <span>Description</span></h1>
                <p>Description of post is available here. Just read...</p>
            </div>
        </div>
        <img src="img/banner.jpg" alt="Top Image">
    </div>
    
    <section style="background-color: rgb(255, 248, 224); color: black;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post">
                        <div class="row">
                            <div class="col-md-2 post-date">
                                <div class="day"><?php echo $day;?></div>
                                <div class="month"><?php echo $month;?></div>
                                <div class="year"><?php echo $year;?></div>
                            </div>
                            <div class="col-md-8 post-title">
                                <a href="post.php?post_id=<?php echo $id;?>"><h2><?php echo $title;?></h2></a>
                                <p>Written by: <span><?php echo ucfirst($author);?></span></p>
                            </div>
                            <div class="col-md-2 profile-picture">
                                <img src="img/<?php echo $author_image;?>" alt="Profile Picture" class="img-circle">
                            </div>
                        </div>
                        <a href="img/<?php echo $image;?>"><img src="img/<?php echo $image;?>" alt="Post Image"></a>
                        <div class="desc">
                            <?php echo $post_data;?>
                        </div>
                        
                        <div class="bottom">
                            <span class="first"><i class="fa fa-folder"></i><a href="#"> <?php echo ucfirst($categories);?></a></span>|
                            <span class="sec"><i class="fa fa-comment"></i><a href="#"> Comment</a></span>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
                
                <div class="col-md-4" style="margin-top: 15px;">
                    <div class="author">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="img/<?php echo $author_image;?>" alt="Profile Image" class="img-circle">
                            </div>
                            <div class="col-sm-9">
                                <h4><?php echo ucfirst($author);?></h4>
                                <?php
                                $bio_query = "SELECT * FROM users WHERE username = '$author'";
                                $bio_run = mysqli_query($con, $bio_query);
                                if(mysqli_num_rows($bio_run) > 0){
                                    $bio_row = mysqli_fetch_array($bio_run);
                                    $author_details = $bio_row['details'];
                                
                                ?>
                                <p><?php echo $author_details;?></p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    $c_query = "SELECT * FROM comments WHERE status = 'approve' and post_id = $post_id ORDER BY id DESC";
                    $c_run = mysqli_query($con,$c_query);
                    if(mysqli_num_rows($c_run) > 0){
                    ?>
                    <div class="comment">
                       <h3>Comments</h3>
                       <?php
                        while($c_row = mysqli_fetch_array($c_run)){
                            $c_id = $c_row['id'];
                            $c_name = $c_row['name'];
                            $c_username = $c_row['username'];
                            $c_image = $c_row['image'];
                            $c_comment = $c_row['comment'];
                        ?>
                       <hr>
                        <div class="row single-comment">
                            <div class="col-sm-2">
                                <img src="img/<?php echo $c_image;?>" alt="Profile Picture" class="img-circle">
                            </div>
                            <div class="col-sm-10">
                                <h4><?php echo ucfirst($c_name);?></h4>
                                <p><?php echo $c_comment;?></p>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <?php }
                    
                    if(isset($_POST['submit'])){
                        $cs_name = $_POST['name'];
                        $cs_email = $_POST['email'];
                        $cs_website = $_POST['website'];
                        $cs_comment = $_POST['comment'];
                        $cs_date = time();
                        if(empty($cs_name) or empty($cs_email) or empty($cs_comment)){
                          $error_msg = "All (*) feilds are Required";  
                        }
                        else{
                            $cs_query = "INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES (NULL, '$cs_date', '$cs_name', 'user', '$post_id', '$cs_email', '$cs_website', 'unknown-picture.png', '$cs_comment', 'pending')";
                            if(mysqli_query($con, $cs_query)){
                                $msg = "Comment Submited and waiting for Approval";
                                $cs_name = "";
                                $cs_email = "";
                                $cs_website = "";
                                $cs_comment = "";
                            }
                            else{
                                $error_msg = "Comment has not be sumited";
                            }
                        }
                    }
                    ?>
                    
                    <div class="comment-box">
                        <div class="row">
                            <div class="col-xs-12">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="full-name">Full Name:*</label>
                                        <input type="text" value="<?php if(isset($cs_name)){echo $cs_name;}?>" name="name" id="full-name" class="form-control" placeholder="Full Name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email">Email Address:*</label>
                                        <input type="text" name="email" id="email" class="form-control" value="<?php if(isset($cs_email)){echo $cs_email;}?>" placeholder="Email Address">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="website">Website:</label>
                                        <input type="text" name="website" id="website" class="form-control" value="<?php if(isset($cs_website)){echo $cs_website;}?>" placeholder="Website Url">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="comment">Comment:*</label>
                                        <textarea id="comment" name="comment" cols="30" rows="10" placeholder="Your Comment Should be Here" class="form-control"><?php if(isset($cs_comment)){echo $cs_comment;}?></textarea>
                                    </div>
                                    
                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit Comment">
                                    <?php
                                    if(isset($error_msg)){
                                        echo "<span style='color:red;' class='pull-right'>$error_msg</span>";
                                    }
                                    else if(isset($msg)){
                                        echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
            <div class="related-posts">
            <h3>Related Posts</h3><hr>
            <div class="row">
               <?php
                $r_query = "SELECT * FROM posts WHERE status = 'publish' AND title LIKE '%$title%' LIMIT 4";
                $r_run = mysqli_query($con,$r_query);
                while($r_row = mysqli_fetch_array($r_run)){
                    $r_id = $r_row['id'];
                    $r_title = $r_row['title'];
                    $r_image = $r_row['image'];
                ?>
                <div class="col-sm-3">
                    <a href="post.php?post_id=<?php echo $r_id;?>">
                        <img src="img/<?php echo $r_image;?>" alt="Slider One" style="width: 100%;">
                        <h4><?php echo $r_title;?></h4>
                    </a>
                </div>
                <?php }?>
            </div>
            </div>
                    
        </div>
    </section>
<?php require_once('inc/footer.php');?>