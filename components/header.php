<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/write-post.php">Write</a>
                </li>
            </ul>
            <?php

            if (isset($_SESSION['auth']) && $_SESSION['auth']) {
                $username = $_SESSION['username'];
                echo "<div><a href='/submit.php?type=logout' class='btn btn-danger'>$username: Logout</a></div>";
            }
            ?>


        </div>
    </div>
</nav>
