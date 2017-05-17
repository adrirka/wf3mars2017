<!DOCTYPE html>
<html lang="en">
<head <?php language_attributes();  // langage du site ?>>

    <title><?php bloginfo('name'); /*nom du site*/ wp_title(' _ ', true, 'left'); ?></title>
    <meta charset="<?php bloginfo('charset'); // encodage du site ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); //chemin vers le dossier du thème actif ?>/css/bootstarp.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); //chemin vers le dossier du thème actif ?>/style.css">
    <script type="text/javascript" src="<?php bloginfo('template_directory'); //chemin vers le dossier du thème actif ?>/js/js.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <?php wp_head(); // intègre des éléments indispensable à WP comme les fichiers css, js liés au plugin ou a wordpress en général. ?>
  
</head>

<body <?php body_class(); ?>>
    <header>

        <div>
            <a href="<?php echo get_site_url; ?>/" class="nomDuSite">
            <?php bloginfo('name'); ?></a>
        </div>
        <nav>
              <?php wp_nav_menu(array( 'theme_location' => 'primary')); // menu principal?>
              <div class="clear"></div>  
        </nav>

        <div id="description">
            <p><?php bloginfo('description'); //description du site ?></p>
        </div>
      

        <?php do_shortcode('[ultimate_ajax_login template=popmodal]'); // do-shortcode est une fonction interne à wordPress permettant d'insérer des shortcodes?>
        
    </header>
    <div class="clear"></div>
    <?php get_sidebar('ENTETE'); // appelle le fichier SIDEBAR-ENTETE.php ?>
    <section>
        <div class="conteneur">

    
</body>
