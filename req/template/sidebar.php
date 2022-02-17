<nav id="sidebar">
    <div class="sidebar-header">
        <a href="/dashboard/index"><h3 class="sidebar-header-headline">Coogle</h3></a>
    </div>

    <ul class="list-unstyled components">
        <p>Willkommen, <?php echo $_SESSION['username'] ?>!</p>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="/dashboard/index">Neuste Rezepte</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Account</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="/dashboard/profile?id=<?php echo $_SESSION["id"] ?>">Profil</a>
                </li>
                <li>
                    <a href="/dashboard/user_recipes">Deine Rezepte</a>
                </li>
                <li>
                    <a href="/dashboard/create_recipe">Rezept erstellen</a>
                </li>
            </ul>
        </nav>