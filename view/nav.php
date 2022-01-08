<nav id="nav_bar">
    <a href="./index.php" id="logo" onclick="changeActive('acasa')">FreeTales</a>



    <ul id="menu">
        <li><a href="./index.php" id="a1" onclick="changeActive('acasa')">Acasa</a></li>
        <li><a href="./rezumat.php" id="a2" onclick="changeActive('rezumat')">Rezumat</a></li>
        <li><a href="./original.php" id="a3" onclick="changeActive('original')">Originalul</a></li>
        <li><a href="./personaje.php" id="a4" onclick="changeActive('personaje')">Personaje</a></li>
        <li><a href="./contact.php" id="a5" onclick="changeActive('contact')">Cotact Us</a></li>
    </ul>
    <!--
    <div class="log_reg_div">
        <a href="./regForm.php">Register</a>
        <a href="./loginForm.php">Log In</a>
    </div>
    -->
    <div class="burger_button" onclick="toggleBurgerMenu('.burger_button')">
        <div></div>
    </div>
    <div class="burger_menu">
        <ul>
            <li>
                <span >Themes:</span>
                <div id="theme-btns">
                    <div id="orange-theme-div" onclick="changeTheme('orange')"></div>
                    <div id="purple-theme-div" onclick="changeTheme('purple')"></div>
                    <div id="green-theme-div" onclick="changeTheme('green')"></div>
                </div>
            </li>
            <li><a href="./loginForm.php" onclick="changeActive('')">Log In</a></li>
            <li><a href="./regForm.php" onclick="changeActive('')">Sign Up</a></li>
        </ul>
    </div>
</nav>


