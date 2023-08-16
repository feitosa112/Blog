<?php require_once "bootstrap.php" ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand">OnlineMagazine Home</a>
    <ul class="navbar-nav ml-auto">

        <?php if(isset($_SESSION['loggedUser'])): ?>
            <li class="nav-item">
                <a href="user.php?id=<?php echo $_SESSION['loggedUser']->id ?>" class="nav-link"><?php echo $_SESSION['loggedUser']->name ?></a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">Logout</a>
            </li>
        <?php else:?>
            <li class="nav-item">
                <a href="login_register.php" class="nav-link">Login/Register</a>
            </li>
        <?php endif ?>

        
    </ul>
</nav>


