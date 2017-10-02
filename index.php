<?php 
ob_start();
require_once('inc/db.php');?>
<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v3.12.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v3.12.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="img/logo-1.png">
  <title>Castle of Learning</title>
  <meta name="description" content="">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&subset=latin,cyrillic">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700&subset=latin,vietnamese,latin-ext">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
  <link rel="stylesheet" href="assets/puritym/css/style.css">
  <link rel="stylesheet" href="assets/dropdown-menu/style.light.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <link rel="stylesheet" href="assets1/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets1/tether/tether.min.css">
  <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets1/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets1/theme/css/style.css">
  <link rel="stylesheet" href="assets1/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="assets1/mobirise-gallery/style.css">
  
  <link rel="stylesheet" href="css/font-awesome.css">
  
  
</head>
<body>
<?php
      require_once('inc/navbar.php');
      $number_of_posts = 3;
      
      if(isset($_GET['page'])){
          $page_id = $_GET['page'];
      }
      else{
          $page_id = 1;
      }
      
      if(isset($_GET['cat'])){
          $cat_id = $_GET['cat'];
          $cat_query = "SELECT * FROM categories WHERE id = $cat_id";
          $cat_run = mysqli_query($con, $cat_query);
          $cat_row = mysqli_fetch_array($cat_run);
          $cat_name = $cat_row['category'];
      }
      
      
      if(isset($_POST['search'])){
          $search = $_POST['search-title'];
          $all_posts_query = "SELECT * FROM posts WHERE status = 'publish'";
          $all_posts_query .= " and tags LIKE '%$search%'";
          $all_posts_run = mysqli_query($con, $all_posts_query);
          $all_posts = mysqli_num_rows($all_posts_run);
          $total_pages = ceil($all_posts / $number_of_posts);
          $posts_start_from = ($page_id - 1) * $number_of_posts;
      }
      else{
          $all_posts_query = "SELECT * FROM posts WHERE status = 'publish'";
          if(isset($cat_name)){
              $all_posts_query .= " and categories = '$cat_name'";
          }
          $all_posts_run = mysqli_query($con, $all_posts_query);
          $all_posts = mysqli_num_rows($all_posts_run);
          $total_pages = ceil($all_posts / $number_of_posts);
          $posts_start_from = ($page_id - 1) * $number_of_posts;
      }  
?>

<section class="mbr-section mbr-section-full mbr-parallax-background mbr-after-navbar" id="banner" data-video="img/banner">
    <div class="mbr-table-cell">
        <div class="mbr-overlay" style="opacity: 0; background-color: rgb(255, 255, 255);"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-xs-center">
                    <h1 class="mbr-section-title display-1" style="font-size: 60px; margin-bottom: 15px;"><strong>Knowledge</strong> Is <strong>Power</strong></h1>
                    <p class="lead" style="font-size: 18px;">Are you a tech-phsyco? Or pationate enough to learn something new about Computer Science &amp; other stuffs? Then you're just in the right place. There is always something to learn in this world. We offer you to learn awesome topics. What are you waiting for? Go, develop your skills &amp; keep your knowledge updated.<br></p>
                </div>
            </div>
            <a style="font-size: 30pt;" href="#header3-2" class="mb-arrow"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</section>


<section class="mbr-section mbr-section__container article" id="header3-2" style="background-color: rgb(255, 248, 224); padding-top: 20px; padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-2">Recent &amp; Popular Posts</h3>
                <small class="mbr-section-subtitle">For more posts go to post section</small>
            </div>
        </div>
    </div>
</section>

<!-- Posts -->
<section style="background-color: rgb(255, 248, 224);">
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="background-color: rgb(255, 248, 224);">
                <?php
                    $slider_query = "SELECT posts.id, posts.title, users.first_name, users.last_name, users.username, posts.date, posts.image, posts.author, posts.views, posts.status FROM posts, users WHERE status = 'publish' AND users.username=posts.author ORDER BY posts.id DESC LIMIT 5";
                    $slider_run = mysqli_query($con, $slider_query);
                    if(mysqli_num_rows($slider_run) > 0){
                        $count = mysqli_num_rows($slider_run);
                ?>
                <section class="mbr-slider mbr-section mbr-section__container carousel slide mbr-section-nopadding" data-ride="carousel" data-keyboard="false" data-wrap="true" data-pause="false" data-interval="4000" id="slider3-1">
                    <div class=" container boxed-slider" style="padding-top: 0px; padding-bottom: 0px; width: 100%;">
                        <div>
                            <div>
                                <ol class="carousel-indicators">
                                    <?php
                                      for($i = 0; $i < $count; $i++){
                                          if($i == 0){
                                              echo "<li data-app-prevent-settings='' data-target='#slider3-1' data-slide-to='".$i."' class='active'></li>";
                                          }
                                          else{
                                              echo "<li data-app-prevent-settings='' data-target='#slider3-1' data-slide-to='".$i."'></li>";
                                          }
                                      }
                                    ?>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <?php 
                                        $check = 0;
                                          while($slider_row = mysqli_fetch_array($slider_run)){
                                              $slider_id = $slider_row['id'];
                                              $slider_image = $slider_row['image'];
                                              $slider_title = $slider_row['title'];
                                              $slider_author = $slider_row['first_name'];
                                              $slider_author .= " ";
                                              $slider_author .= $slider_row['last_name'];
                                              $check = $check + 1;
                                              if($check == 1){
                                                  echo "<div class='mbr-section mbr-section-hero carousel-item dark center active' data-bg-video-slide='false'>";
                                              }
                                              else{
                                                  echo "<div class='mbr-section mbr-section-hero carousel-item dark center' data-bg-video-slide='false'>";
                                              }
                                    ?>
                                        <div class="mbr-table-cell">
                                            <div class="mbr-overlay"></div>
                                            
                                            <div class="container-slide">
                                                <a href="post.php?post_id=<?php echo $slider_id;?>"><img src="img/<?php echo $slider_image;?>"></a>
                                                <div class="row" style="margin-top: -200px;">
                                                    <div class="wtf col-md-8 col-md-offset-2 text-xs-center">
                                                        <a href="post.php?post_id=<?php echo $slider_id;?>"><h2 class="mbr-section-title display-1" style="font-size: 30px;"><?php echo substr($slider_title,0,50)."...";?></h2></a>
                                                        <p class="mbr-section-lead lead" style="font-size: 20px;">By: <?php echo $slider_author;?><br>21 July 2017</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }}?>
                                </div>

                                <a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#slider3-1">
                                    <span class="icon-prev" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#slider3-1">
                                    <span class="icon-next" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <div class="col-md-4">
                <div class="widgets">
                   <form action="index.php" method="post">
                       <div class="box">
                            <div class="container-4">
                                <input type="text" id="search" placeholder="Search for..." name="search-title">
                                <button class="icon" type="submit" name="search"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                   </form>
                </div>
               
                <div class="widgets" style="font-family: Montserrat;">
                    <?php 
                    $p_query = "SELECT * FROM posts WHERE status = 'publish' ORDER BY views DESC LIMIT 4";
                    $p_run = mysqli_query($con,$p_query);
                    if(mysqli_num_rows($p_run) > 0){
                        while($p_row = mysqli_fetch_array($p_run)){
                            $p_id = $p_row['id'];
                            $p_date = getdate($p_row['date']);
                            $p_day = $p_date['mday'];
                            $p_month = $p_date['month'];
                            $p_year = $p_date['year'];
                            $p_title = $p_row['title'];
                            $p_image = $p_row['image'];
                            $p_views = $p_row['views'];
                    ?>
                    
                    <div style="height: 1px;"></div>
                    
                    <div class="row">
                        <div class="col-xs-5">
                            <a href="post.php?post_id=<?php echo $p_id;?>"><img style="width: 100%;-webkit-border-top-right-radius: 5px;-webkit-border-bottom-right-radius: 5px;-moz-border-top-right-radius: 5px;-moz-border-bottom-right-radius: 5px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;-webkit-border-top-left-radius: 5px;-webkit-border-bottom-left-radius: 5px;-moz-border-top-left-radius: 5px;-moz-border-bottom-left-radius: 5px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;" src="img/<?php echo $p_image;?>" alt="Image 1"></a>
                        </div>
                        <div class="col-xs-7 details">
                            <a style="color: #00075c;" href="post.php?post_id=<?php echo $p_id;?>"><h6><?php echo substr($p_title,0,30)."...";?></h6></a>
                            <p style="font-size: 12px; font-family: Lora; color:darkgreen;"><i class="fa fa-clock-o"></i> <?php echo "Views: $p_views<br><i class='fa fa-clock-o'></i> Published At: $p_day $p_month $p_year";?></p>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    else{
                        echo "<h3>No Post Available</h3>";
                    }
                    ?>
                </div><!--widgets close-->
            </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-section__container article" id="header3-2" style="background-color: rgb(255, 248, 224); padding-top: 40px; padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-2">All Posts</h3>
                <small class="mbr-section-subtitle">All posts are in the reverse order according to date</small>
            </div>
        </div>
    </div>
</section>

<section style="background-color: rgb(255, 248, 224);">
    <div class="container">
        <div class="row">
           <div class="col-md-12">
                <?php
                
                if(isset($_POST['search'])){
                    $search = $_POST['search-title'];
                    $query = "SELECT * FROM posts WHERE status = 'publish'";
                    $query .= " and tags LIKE '%$search%'";
                    $query .= " ORDER BY id DESC LIMIT $posts_start_from, $number_of_posts";
                }
                else{
                    $query = "SELECT * FROM posts WHERE status = 'publish'";
                    if(isset($cat_name)){
                        $query .= " and categories = '$cat_name'";
                    }
                    $query .= " ORDER BY id DESC LIMIT $posts_start_from, $number_of_posts";
                }
                $run = mysqli_query($con,$query);
                if(mysqli_num_rows($run) > 0){
                    while($row = mysqli_fetch_array($run)){
                        $id = $row['id'];
                        $date = getdate($row['date']);
                        $day = $date['mday'];
                        $month = $date['month'];
                        $year = $date['year'];
                        $title = $row['title'];
                        $author = $row['author'];
                        $author_image = $row['author_image'];
                        $categories = $row['categories'];
                        $tags = $row['tags'];
                        $post_data = $row['post_data'];
                        $views = $row['views'];
                        $status = $row['status'];
                        $image = $row['image'];
                ?>
                
                <div style="margin-top: 20px; margin-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="post.php?post_id=<?php echo $id;?>"><img src="img/<?php echo $image;?>" alt="Post Image" style="width: 100%;-webkit-border-top-right-radius: 5px;-webkit-border-bottom-right-radius: 5px;-moz-border-top-right-radius: 5px;-moz-border-bottom-right-radius: 5px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;-webkit-border-top-left-radius: 5px;-webkit-border-bottom-left-radius: 5px;-moz-border-top-left-radius: 5px;-moz-border-bottom-left-radius: 5px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;"></a>
                        </div>
                        <div class="col-md-6">
                            <center>
                                <a href="post.php?post_id=<?php echo $id;?>"><h2><?php echo substr($title,0,50)."...";?></h2></a>
                                <p>Written by: <span><?php echo ucfirst($author);?></span><br>Published Date: <?php echo $day;?> <?php echo $month;?> <?php echo $year;?></p>
                            
                            <div class="desc">
                                <?php echo substr($post_data,0,250)."...";?>
                            </div>
                            <a href="post.php?post_id=<?php echo $id;?>"><button class="btn btn-success">Read More</button></a>
                            <div style="color: gray;">
                                <span class="first"><i class="fa fa-folder"></i><a href="#"> <?php echo ucfirst($categories);?></a></span> | 
                                <span class="sec"><i class="fa fa-comment"></i><a href="post.php?post_id=<?php echo $id;?>"> Comment</a></span>
                            </div>
                            </center>
                        </div>
                    </div>
                </div>
                
                <?php
                     }
                }
                else{
                    echo "<center><h2>No Posts Available</h2></center>";
                }
                ?>

                <nav id="pagination">
                  <ul class="pagination">
                    <?php
                      for($i = 1; $i <= $total_pages; $i++){
                          echo "<li class='".($page_id == $i ? 'active': ' ')."'><a href='index.php?page=".$i."&".(isset($cat_name)?"cat=$cat_id":" ")."'>$i</a></li>";
                      }
                      ?>
                  </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-section__container article" id="header3-2" style="background-color: rgb(255, 248, 224); padding-top: 50px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-2">Search by Category</h3>
            </div>
        </div>
    </div>
</section>

<section class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" id="gallery4-3" data-filter="true" style="background-color: rgb(255, 248, 224); padding-top: 0rem; padding-bottom: 0rem;">
    <!-- Filter -->
    <div class="mbr-gallery-filter container gallery-filter-active">
        <ul>
            <li class="mbr-gallery-filter-all active">All</li>
        </ul>
    </div>
    
    <!-- Gallery -->
    <div class="mbr-gallery-row">
        <div class=" mbr-gallery-layout-default">
            <div>
                <div>
                    <?php
                        $slider_query = "SELECT posts.categories, posts.id, posts.title, users.first_name, users.last_name, users.username, posts.date, posts.image, posts.author, posts.views, posts.status FROM posts, users WHERE status = 'publish' AND users.username=posts.author ORDER BY posts.id DESC LIMIT 5";
                        $slider_run = mysqli_query($con, $slider_query);
                        if(mysqli_num_rows($slider_run) > 0){
                              $count = mysqli_num_rows($slider_run);
                              $check = 0;
                              while($slider_row = mysqli_fetch_array($slider_run)){
                                  $slider_id = $slider_row['id'];
                                  $slider_image = $slider_row['image'];
                                  $slider_title = $slider_row['title'];
                                  $slider_cat = $slider_row['categories'];
                                  $slider_author = $slider_row['first_name'];
                                  $slider_author .= " ";
                                  $slider_author .= $slider_row['last_name'];
                    ?>
                    <div class="mbr-gallery-item mbr-gallery-item__mobirise3 mbr-gallery-item--p1" data-tags="<?php echo $slider_cat;?>" data-video-url="false">
                        <a href="post.php?post_id=<?php echo $slider_id;?>">
                        <div data-slide-to="<?php echo $slider_id;?>">
                            <img alt="" src="img/<?php echo $slider_image;?>" style="width: 100%;-webkit-border-top-right-radius: 5px;-webkit-border-bottom-right-radius: 5px;-moz-border-top-right-radius: 5px;-moz-border-bottom-right-radius: 5px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;-webkit-border-top-left-radius: 5px;-webkit-border-bottom-left-radius: 5px;-moz-border-top-left-radius: 5px;-moz-border-bottom-left-radius: 5px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;">
                            
                            <span class=" fa fa-pencil"></span>
                            <span class="mbr-gallery-title"><?php echo $slider_title;?></span>
                        </div>
                        </a>
                    </div>
                    <?php }}?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>


<section class="mbr-section" id="msg-box3-q" style="background-color: rgb(255, 248, 224); padding-top: 3rem; padding-bottom: 0rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="assets/images/logo.png" alt="" style="width: 100%;-webkit-border-top-right-radius: 5px;-webkit-border-bottom-right-radius: 5px;-moz-border-top-right-radius: 5px;-moz-border-bottom-right-radius: 5px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;-webkit-border-top-left-radius: 5px;-webkit-border-bottom-left-radius: 5px;-moz-border-top-left-radius: 5px;-moz-border-bottom-left-radius: 5px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;">
            </div>
            
            <div class="col-md-10">
                <div class="container">
                    <div class="row text-xs-center">
                        <h2 class="mbr-section-title display-3"><strong>About Admin</strong></h2>
                        <div class="lead"><p style="font-size: 1.0rem;">Hello, I'm Azmain Yakin Srizon, an average tech-lover. At present, I'm studying in CSE dept. of RUET. Having a background of Computer Science &amp; Engineering, I got pationate about different programing &amp; developing related works. From my passion, I got motivated to build-up this simple website which can give you the opportunity you're seeking for. I know how hard it is to find what you need for developing a skill. Don't worry now. I've gathered different tutorials &amp; attached them in my website. You now have all of them in one single website. Search, learn &amp; keep your level up...</p></div>          
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="mbr-section mbr-section-small" id="social-buttons2-i" style="background-color: rgb(255, 248, 224); padding-top: 1.5rem; padding-bottom: 1.5rem;">
    

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h2 class="mbr-section-title h1"><em>Be Social With Us</em></h2>
            </div>
            <div class="col-sm-8 text-xs-right">
                <a class="btn btn-social socicon-bg-twitter" title="Twitter" target="_blank" href="https://twitter.com"><i class="socicon socicon-twitter"></i></a> 
                <a class="btn btn-social socicon-bg-facebook" title="Facebook" target="_blank" href="https://www.facebook.com"><i class="socicon socicon-facebook"></i></a> 
                <a class="btn btn-social socicon-bg-google" title="Google+" target="_blank" href="https://plus.google.com"><i class="socicon socicon-google"></i></a> 
                <a class="btn btn-social socicon-bg-youtube" title="YouTube" target="_blank" href="https://www.youtube.com"><i class="socicon socicon-youtube"></i></a> 
                <a class="btn btn-social socicon-bg-instagram" title="Instagram" target="_blank" href="https://instagram.com"><i class="socicon socicon-instagram"></i></a> 
                <a class="btn btn-social socicon-bg-pinterest" title="Pinterest" target="_blank" href="https://www.pinterest.com"><i class="socicon socicon-pinterest"></i></a> 
                <a class="btn btn-social socicon-bg-tumblr" title="Tumblr" target="_blank" href="http://tumblr.com"><i class="socicon socicon-tumblr"></i></a> 
                <a class="btn btn-social socicon-bg-linkedin" title="LinkedIn" target="_blank" href="https://www.linkedin.com"><i class="socicon socicon-linkedin"></i></a> </div>
        </div>
    </div>
</section>

<?php
    require_once('inc/footer.php');
?>




    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smooth-scroll/SmoothScroll.js"></script>
    <script src="assets/jarallax/jarallax.js"></script>
    <script src="assets/puritym/js/script.js"></script>
    <script src="assets/dropdown-menu/script.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.poptrox.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets1/tether/tether.min.js"></script>
    <script src="assets1/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets1/smooth-scroll/smooth-scroll.js"></script>
    <script src="assets1/viewport-checker/jquery.viewportchecker.js"></script>
    <script src="assets1/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
    <script src="assets1/masonry/masonry.pkgd.min.js"></script>
    <script src="assets1/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets1/theme/js/script.js"></script>
    <script src="assets1/mobirise-gallery/player.min.js"></script>
    <script src="assets1/mobirise-gallery/script.js"></script>
  
  
</body>
</html>