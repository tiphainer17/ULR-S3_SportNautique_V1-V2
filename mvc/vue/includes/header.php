<header>
     
    <nav>
        <ul class="navbar">
            <li><img src="img/logo.png" alt="logo" class="logo"></li>
            <li><a href="index.php">Accueil</a></li>
            <li class="menu"><a href="index.php?categories=categorieAll">Activité nautique</a>
                <ul class="deroulement">
                    <li><a href="index.php?categories=categorie1">Subaquatique</a></li>
                    <li><a href="index.php?categories=categorie2">Sports de glisse</a></li>
                    <li><a href="index.php?categories=categorie3">Loisirs nautique</a></li>
                    <li><a href="index.php?categories=categorie4">Navigation</a></li>
                </ul>
            </li>
            <?php if(isset($_SESSION['mail'])):?>
            <li><a href="index.php?personnes=mon_compte">Mon compte</a></li>
            <?php else :?>
            <li><a href="index.php?personnes=login">Connexion</a></li>
            <?php endif;?>
            <li><a href="index.php?panier=monPanier">Panier</a></li>
        </ul>
    </nav>
</header>
