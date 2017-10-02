<!-- 01. Navbar -->
<section id="dropdown-menu-0">
    <nav class="navbar navbar-dropdown bg-color  navbar-fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.php" class="navbar-logo"><img src="img/logo-2.png" alt="Mobirise"></a>
                <a class="text-white" href="index.php">Castle of Learning</a>
            </div>

            <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                <div class="hamburger-icon"></div>
            </button>

            <ul class="nav-dropdown collapse pull-xs-right navbar-toggleable-sm nav navbar-nav" id="exCollapsingNavbar">
            <li class="nav-item"><a class="nav-link link" href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="nav-item dropdown open"><a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="https://mobirise.com/" aria-expanded="true"><i class="fa fa-list-alt"></i> Categories</a>
                <div class="dropdown-menu">
                    <?php
                      $query = "SELECT * FROM categories ORDER BY id DESC";
                      $run = mysqli_query($con,$query);
                      if(mysqli_num_rows($run) > 0){
                          while($row = mysqli_fetch_array($run)){
                              $category = ucfirst($row['category']);
                              $id = $row['id'];
                              echo "<a class='dropdown-item' href='index.php?cat=".$id."'>$category</a>";
                          }
                      }
                      else{
                          echo "<a class='dropdown-item' href='#'>No Categories Yet</a>";
                      }
                    ?>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link link" href="contact-us.php"><i class="fa fa-phone"></i> Contact Us</a></li><li class="nav-item"><a class="nav-link link" href="admin/index.php"><i class="fa fa-book"></i> Admin</a></li></ul>
        </div>
    </nav>
</section>
