<header>
     
    <nav>
        <ul class="navbar">
            <li><img src="img/logo.png" alt="logo" class="logo"></li>
            <li><a href="index.php">Accueil</a></li>
            <li class="menu"><a href="categorie.php?cat=all">Activité nautique</a>
                <ul class="deroulement">
                    <li><a href="categorie.php?cat=1">Subaquatique</a></li>
                    <li><a href="categorie.php?cat=2">Sports de glisse</a></li>
                    <li><a href="categorie.php?cat=3">Loisirs nautique</a></li>
                    <li><a href="categorie.php?cat=4">Navigation</a></li>
                </ul>
            </li>
            <?php if(isset($_SESSION['mail'])):?>
            <li><a href="mon_compte.php">Mon compte</a></li>
            <?php else :?>
            <li><a href="login.php">Connexion</a></li>
            <?php endif;?>
            <li><a href="panier.php">Panier</a></li>
        </ul>
    </nav>
</header>
