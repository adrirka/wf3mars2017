<?php
/* Template Name: Modèle Trois Colonnes */
get_header(); ?>

    <div class="modele-trois-colonnes-colonne-gauche"></div>
        <div id="primary" class="site-content modele-trois-colonnes-colonne-centrale">
            <div id="content" role="main">

                <?php while( have_posts() ) : the_post();
                    get_template_part('content', 'page');
                    comments_template('', true);
                    endwhile;              
                ?>
                

            </div>
        </div>

        <div class="modele-trois-colonnes-colonne-droite"></div>
        <div class="clear"></div>

<?php get_footer(); ?>





