<?php if(isset($_POST['contact'])) { $error = apf_send_contact($_POST['contact']); }?>
<!doctype html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php get_template_part('partials/preloader'); ?>

<div class="wrapper blogos_site_container"><!-- Wrapper start -->
    <?php
    /*
     * Show the Header based on Theme Options Settings.
     * В config.php прописан Options, секция Styles.
     * Подключаем get_template_part() ВПФункц.
     *
     */
    $apf_design_variant = apf_get_option('design_variant');

    if($apf_design_variant){
        switch ($apf_design_variant){
            case 'zoo' :
            case 'furniture' :
            case 'magazine' :
                get_template_part('partials/header/zoo');
                break;
            case 'blackwhite' :
            case 'stephanie' :
                get_template_part('partials/header/blackwhite');
                break;
            case 'bakery' :
                get_template_part('partials/header/bakery');
                break;
            case 'photography' :
            case 'camping' :
            case 'pixel' :
                get_template_part('partials/header/photography');
                break;
            case 'luxuryshoes' :
                get_template_part('partials/header/luxuryshoes');
                break;
            case 'travelphoto' :
            case 'cv' :
                get_template_part('partials/header/travelphoto');
                break;
            case 'viaje' :
                get_template_part('partials/header/viaje');
                break;
            case 'wedding' :
                get_template_part('partials/header/wedding');
                break;
            case 'creative' :
                get_template_part('partials/header/creative');
                break;
            case 'brigitte' :
            case 'corporate' :
            case 'fashion' :
            case 'pastel' :
            case 'cameron' :
            case 'jade' :
                get_template_part('partials/header/brigitte');
                break;
        }
    } ?>
    <i class="fa fa-id-card" aria-hidden="true"></i>
    <div class="apf_main_container cf"><!-- Main Container Start -->
        <div class="apf_container">

