<nav id="sidebar">
            <div class="sidebar-header">
                <h3>Coogle</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Willkommen, <?php echo$_SESSION['username']?>!</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="/main/index">Neuste Rezepte</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Account</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="/main/profile?id=<?php echo $_SESSION["id"] ?>">Profil</a>
                        </li>
                        <li>
                            <a href="#">Einstellungen</a>
                        </li>
                        <li>
                            <a href="/main/user_recipes">Deine Rezepte</a>
                        </li>
                        <li>
                            <a href="/main/create_recipe">Rezept erstellen</a>
                        </li>
                        <li>
                            <a href="#">Favoriten</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../account/logout">Logout</a>
                </li>
            </ul>
        </nav>