<!-- Header Start -->
    <header class="header_container">
        <div class="header_container header-content">
          <a href="index.php" class="logo"><h1 class="logo-web">JobsLanding</h1></a>
          <nav class="navbar-container">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About Us</a></li>
              <li><a href="jobs.php">Jobs</a></li>
              <li><a href="apply.php">Apply</a></li>
              <li><a href="enhancements.php">Enhancements</a></li>
                <?php
                    // Kiểm tra trạng thái đăng nhập
                    session_start();
                    if(isset($_SESSION['username'])) {
                        // Nếu đã đăng nhập, hiển thị username và nút logout
                        echo '<li class="user-profile">
                                <a href="profile.php">' . htmlspecialchars($_SESSION['username']) . '</a>
                              </li>';
                        echo '<li><a href="mainlogout.php" class="logout-button">Logout</a></li>';
                    } else {
                        // Nếu chưa đăng nhập, hiển thị nút login và signup
                        echo '<li><a href="user_signup.php" class="login-button">Login</a></li>';
                        echo '<li><a href="user_signup.php" class="signup-button">Sign Up</a></li>';
                    }
                ?>
            </ul>
          </nav>
          <button class="navbar-hamburger">☰</button>
        </div>
      </header>
    <!-- Header End -->