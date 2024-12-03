<?php get_header(); ?>

<main class="main">
    <header class="header" style="background-image: url('<?= get_the_post_thumbnail_url() ?>');">
        <h1 class="header__title"><?php the_title() ?></h1>
    </header>
    <!-- PARTIE RECYCLAGE-->
    <?php
    $paramRecyclage = array(
        'post_type' => 'recyclage',
        'order' => 'asc',
        'orderby' => 'date',
        'showposts' => 1,
    );

    $the_queryRecyclage = new WP_Query($paramRecyclage);
    while ($the_queryRecyclage->have_posts()): $the_queryRecyclage->the_post();

    /* Enlève les balises <p> généré par ACF */
    $paraRecyclage_1 = strip_tags(get_field('paragraphe_1'), '<strong>');
    $paraRecyclage_2 = strip_tags(get_field('paragraphe_2'), '<strong>');
    $paraRecyclage_3 = strip_tags(get_field('paragraphe_3'), '<strong>');
    $paraRecyclage_4 = strip_tags(get_field('paragraphe_4'), '<strong>');

    ?>
    <section class="recyclage">
        <h2 class="recyclage__title">Le recyclage et la revalorisation</h2>
        <!-- line gradient -->
        <svg
                class="recyclage__line"
                xmlns="http://www.w3.org/2000/svg"
                width="387"
                height="8"
                viewBox="0 0 387 8"
                fill="none"
        >
            <path
                    d="M4 3.99512L383.018 4.00032"
                    stroke="url(#paint0_linear_325_188)"
                    stroke-width="7"
                    stroke-linecap="round"
            />
            <defs>
                <linearGradient
                        id="paint0_linear_325_188"
                        x1="59"
                        y1="5.49991"
                        x2="268.5"
                        y2="3.50233"
                        gradientUnits="userSpaceOnUse"
                >
                    <stop offset="0.579654" stop-color="#BF87C7" />
                    <stop offset="1" stop-color="#744DCF" />
                </linearGradient>
            </defs>
        </svg>

        <article class="recyclage__article">
            <img
                    class="recyclage__image"
                    src="<?php the_field('image') ?>"
                    alt="<?php the_title(); ?>"
            />

            <!-- Paragraphes -->
            <div class="recyclage__sectionP">
                <p class="recyclage__paragraphe">
                    <?= $paraRecyclage_1 ?>
                </p>

                <p class="recyclage__paragraphe">
                    <?= $paraRecyclage_2 ?>
                </p>

                <p class="recyclage__paragraphe">
                    <?= $paraRecyclage_3 ?>
                </p>

                <p class="recyclage__paragraphe">
                    <?= $paraRecyclage_4 ?>
                </p>
            </div>
        </article>
    </section>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

    <!-- PARTIE COLLECTE-->
    <section class="collecte">
        <h2 class="collecte__title">Les points de collecte</h2>
        <!-- line gradient -->
        <svg
                class="collecte__line"
                xmlns="http://www.w3.org/2000/svg"
                width="387"
                height="8"
                viewBox="0 0 387 8"
                fill="none"
        >
            <path
                    d="M4 3.99512L383.018 4.00032"
                    stroke="url(#paint0_linear_325_189)"
                    stroke-width="7"
                    stroke-linecap="round"
            />
            <defs>
                <linearGradient
                        id="paint0_linear_325_189"
                        x1="59"
                        y1="5.49991"
                        x2="268.5"
                        y2="3.50233"
                        gradientUnits="userSpaceOnUse"
                >
                    <stop offset="0.579654" stop-color="#BF87C7" />
                    <stop offset="1" stop-color="#744DCF" />
                </linearGradient>
            </defs>
        </svg>

        <!-- MAP -->

        <div id="map"></div>

        <!-- mettre la page contact dans le href-->
        <p class="collecte__paragraphe">
            Envie d’installer des collecteurs ?
            <a class="collecte__paragraphe--contact" href="/contact/">Me contacter</a>
        </p>
    </section>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map("map").setView([46.1591126, -1.1520434], 10); // La Rochelle et niveau de zoom initial

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "© OpenStreetMap contributors",
        }).addTo(map);

        var markers = [];


        var monIcone = L.icon({
            iconUrl: '<?= get_stylesheet_directory_uri() ?>/img/Marqueur_map.svg',
            iconSize: [25, 41], // taille de l'icône
            iconAnchor: [13, 41], // point de l'icône qui correspondra à la position du marqueur
            popupAnchor: [-1, -33] // point par rapport auquel la pop-up s'ouvrira
        });

        function addMarker(location, map, titre_lieu, nbr_collecteur, ramassage) {
            var marker = L.marker(location, {icon: monIcone}).addTo(map)
                .bindPopup(`<span>${titre_lieu}</span><br>Nombre de collecteur(s) : ${nbr_collecteur} <br> Prochain ramassage ${ramassage}`)
            marker.on('click', function () {
                this.openPopup();
            });
            markers.push(location);
            console.log("Coordonnées enregistrées : " , location);
        }

        <?php
        $paramMap = array(
            'post_type' => 'map',
            'order' => 'asc',
            'orderby' => 'date',
        );

        $the_queryMap = new WP_Query($paramMap);
        while($the_queryMap->have_posts(  )): $the_queryMap->the_post();

            $title = get_field('titre_lieu');
            $collecteur = get_field('nombre_de_collecteurs');
            $ramassage = get_field('prochain_ramassage');
        ?>

            addMarker({ lat: <?php the_field('latitude') ?>, lng: <?php the_field('longitude') ?> }, map, "<?= $title ?>", "<?= $collecteur ?>", "<?= $ramassage ?>");

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    });
</script>

<?php get_footer(); ?>
