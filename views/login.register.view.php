<?php require_once "partials/header.php" ?>

<div class="jumbotron text-center">
    <h3>Login/register</h3>
</div>



<div class="container">
    <div class="row">
        <div class="col-6">
            <h4>Register</h4>
            <form action="login_register.php" method="POST" >
                <input style="background-color: <?php if($user->registerError){echo "red";} ?>;" type="text" name="register_name" placeholder="Name" class="form-control"><br>
                <input style="background-color: <?php if($user->registerError){echo "red";} ?>;" type="text" name="register_surname" placeholder="Surname" class="form-control" ><br>
                <input style="background-color: <?php if($user->registerError){echo "red";} ?>;" type="text" name="register_username" placeholder="UserName" class="form-control" ><br>
                <input style="background-color: <?php if($user->registerError){echo "red";} ?>;" type="email" name="register_email" placeholder="Email" class="form-control" ><br>
                <input style="background-color: <?php if($user->registerError){echo "red";} ?>;" type="password" name="register_password" placeholder="Password" class="form-control" ><br>
                
                <button class="btn btn-primary form-control"name="registerBtn">Register</button>
            </form>
            <?php if($user->register_result): ?>
                <div class="alert alert-success">Uspjesna registracija.Ulogujte se</div>
            <?php elseif($user->userExist): ?>
                <div class="alert alert-danger">Korisnik vec postoji u bazi</div>
            <?php endif ?>
            <?php if($user->registerError): ?>
                <div class="alert alert-danger">Morate unijeti sva polja</div>
            <?php endif ?>
        </div>

        <div class="col-6">
            <h4>Login</h4>
            <form action="login_register.php" method="POST">
            <input type="text" name="login_email" placeholder="email" class="form-control" required><br>
            <input type="password" name="login_password" placeholder="password" class="form-control" required><br>
            <button class="btn btn-warning form-control"name="loginBtn">Login</button>
            </form>
            <?php if($user->loggedUser): ?>
                <div class="alert alert-success">Uspjesno logovanje <a href="index.php">Idi na pocetnu stranicu</a></div>
            <?php elseif(isset($_POST['loginBtn'])): ?>
                <div class="alert alert-danger">Username ili password pogresni</div>
            <?php endif ?>
        </div>
    </div>
</div>