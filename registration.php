<?php include('server.php') ?>

<form method="post" action="registration.php">
    <div class="container">
        <h1>Enregistrement</h1>
        <p>Veuillez remplir ce formulaire pour vous inscrire</p>
        <hr>

        <label for="firstName">Prénom</label>
        <input type="text" placeholder="Entrez votre prénom" name="firstName" id="firstName" required>

        <label for="lastName">Nom</label>
        <input type="text" placeholder="Entrez votre nom" name="lastName" id="lastName" required>

        <label for="phone">Télphone</label>
        <input type="tel" placeholder="06.01.43.17.84" name="phone" id="phone" required>

        <label for="address">Adresse</label>
        <input type="text" placeholder=" 6 rue Jean Moulin, 33000, Bordeaux" name="address" id="address" required>

        <label for="age">Age</label>
        <input type="text" placeholder="23" name="age" id="age">

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>


        <hr>

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <button type="submit" class="registerbtn" name="reg_user">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
</form>