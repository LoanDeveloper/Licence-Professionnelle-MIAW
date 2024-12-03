<?php get_header() ?>

<?php

/* Récupération de l'ID de l'évènement pour afficher les utilisateurs inscrits à cet évènement */
$event_id = get_the_ID();

global $wpdb; ?>

<!-- Boucle pour afficher l'évènement -->

<?php while (have_posts()) : the_post();


/* Enlève les balises <p> généré par ACF */
$description_complete = strip_tags(get_field('description_complete'), '<strong>')

?>

    <main class="main">
        <header class="header_single_event" style="background-image: url('<?php the_field('image') ?>')">
        </header>

        <section class="recolte_event">
            <h1 class="recolte_event__title"><?php the_title(); ?></h1>
            <h2 class="recolte_event__date"><?php the_field('date') ?></h2>
            <h3 class="recolte_event__lieu"><?php the_field('lieu') ?></h3>

            <!--<a href="#form-events" class="recolte_event__button">S'inscrire à l'évènement</a>-->

            <p class="recolte_event__description"><?= $description_complete ?></p>
        </section>

    <?php
        // Vérifiez si l'utilisateur est connecté
        if (is_user_logged_in()) {
            // Obtenez l'ID de l'utilisateur connecté
            $user_id = get_current_user_id();

            // Obtenez les informations de l'utilisateur
            $user_info = get_userdata($user_id);

            // Récupérez le prénom et le nom
            $first_name = $user_info->first_name;
            $last_name = $user_info->last_name;

            // Vérifiez si l'utilisateur est un administrateur
            if (current_user_can('administrator')) {
                echo "<p>Bonjour " . $first_name . " !</p>";

                //Récupération de tout les participant de l'evenement
                $events = $wpdb->get_results($wpdb->prepare("SELECT * FROM creagum_events WHERE idEvent = %d", $event_id));

                // Vérifier s'il y a des résultats pour l'admin
                if ($events && current_user_can('manage_options')) {    ?>
                    <h4>Tableau des utilisateurs qui ont rejoint l'évènement :</h4>
                    <table>
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Mail</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Parcourir les résultats et créer les lignes du tableau
                        foreach ($events as $event) {
                            ?>
                            <tr>
                                <td><?php echo esc_html($event->nom); ?></td>
                                <td><?php echo esc_html($event->prenom); ?></td>
                                <td><?php echo esc_html($event->mail); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo "<p>Personne n'inscrit à cet évènement.</p>";
                }
            //Si l'utilisateur est connécté && n'est pas administrateur
            }else{
                ?>

                <!--Formulaire d'inscription à l'évènement -->
                <form method="post" id="form-events" class="form-events">
                    <label class="form-events__label"  for="nom"></label>
                    <input class="form-events__input" placeholder="Nom" type="text" id="nom" name="nom" required>
        
                    <label class="form-events__label" for="prenom"></label>
                    <input class="form-events__input" placeholder="Prénom" type="text" id="prenom" name="prenom" required>
        
                    <label class="form-events__label" for="email"></label>
                    <input class="form-events__input" placeholder="Email" type="email" id="email" name="email">
        
                    <button class="form-events__submit" type="submit">S'inscrire</button>
                </form>
            <?php
            }

            // Si l'utilisateur n'est pas connecté
        } else {
            ?>
            <!--Formulaire d'inscription à l'évènement -->
            <form method="post" id="form-events" class="form-events">
                    <label class="form-events__label"  for="nom"></label>
                    <input class="form-events__input" placeholder="Nom" type="text" id="nom" name="nom" required>
        
                    <label class="form-events__label" for="prenom"></label>
                    <input class="form-events__input" placeholder="Prénom" type="text" id="prenom" name="prenom" required>
        
                    <label class="form-events__label" for="email"></label>
                    <input class="form-events__input" placeholder="Email" type="email" id="email" name="email">
        
                    <button class="form-events__submit" type="submit">S'inscrire</button>
                </form>
        <?php
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $nom = sanitize_text_field($_POST['nom']);
                $prenom = sanitize_text_field($_POST['prenom']);
                $email = sanitize_email($_POST['email']);
        
                // Valider les données
                if (!empty($nom) && !empty($prenom) && is_email($email)) {

                    //Vérification si l'email n'est pas déjà inscrit
                    $numberOfSameEmail = $wpdb->get_var("SELECT COUNT(*) FROM creagum_events WHERE idEvent = " . $event_id . " AND mail = '" . $email . "'");

                    if ($numberOfSameEmail !== null){
                        if(intval($numberOfSameEmail) === 0){
                            // Préparer la requête
                            $table_name = 'creagum_events';
                            $sql = $wpdb->prepare("INSERT INTO $table_name (nom, prenom, mail, idEvent) VALUES (%s, %s, %s, %s)", $nom, $prenom, $email, $event_id);
    
                            // Exécuter la requête
                            $results = $wpdb->query($sql);
    
                            if ($results){
                                echo "Inscription réussie !";
                            }else{
                                echo "Inscription échouée !";
                            }
    
                        }else if($numberOfSameEmail > 0){
                            echo "Vous êtes déjà inscrit !";
                        }
                    }

                } else {
                    echo "Veuillez entrer votre nom, prénom et une adresse mail valide.";
                }
            }
    ?>
    </main>

    

<?php endwhile; ?>
<!-- ENDWHILE -->
<?php wp_reset_postdata(); ?>


<?php get_footer(); ?>