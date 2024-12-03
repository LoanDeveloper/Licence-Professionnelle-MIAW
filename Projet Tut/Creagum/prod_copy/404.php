<?php get_header();?>

<main class="main">
    <section class="error">
        <div class="error__logotitre">
            <img
                class="error__logo"
                src="<?= $logo_couleur ?>"
                alt="Creagum Logo couleur"
            />
            <div class="error__titre">
                <h1 class="error__error">ERREUR</h1>
                <h2 class="error__nombre">404</h2>
            </div>
        </div>
        <h3 class="error__page">Cette page n'existe pas</h3>
    </section>
</main>

<?php get_footer(); ?>