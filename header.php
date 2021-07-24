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

            class ale_demo_category extends ale_demo_base {

            static function add_term( $params_array ) {

            self::check_params( __CLASS__, __FUNCTION__, $params_array, array(
            'term_name' => 'Param is required!',
            'taxonomy'  => 'Param is required',
            ) );

            wp_insert_term( $params_array['term_name'], // the term
            $params_array['taxonomy'], // the taxonomy
            array(
            'description' => $params_array['description'],
            'parent'      => $params_array['parent_id']
            ) );

            $parent_term = term_exists( $params_array['term_name'], $params_array['taxonomy'] ); // array is returned if taxonomy is given
            $new_term_id = $parent_term['term_id']; // get numeric term id

            if ( ! empty( $params_array['ale_type_icon'] ) ) {
            $type_icon_url = ale_demo_media::get_image_url_by_ale_id( $params_array['ale_type_icon'] );
            $type_icon_id  = ale_demo_media::get_by_ale_id( $params_array['ale_type_icon'] );

            $type_icon = array( 'id' => $type_icon_id, 'url' => $type_icon_url );
            Tax_Meta_Class::update_tax_meta( $new_term_id, 'ale_image_field_id', $type_icon );
            }

            // keep a list of installed category ids so we can delete them later if needed
            $ale_stacks_demo_terms_id   = get_option( 'ale_demo_terms_id' );
            if(!is_array($ale_stacks_demo_terms_id)) {
            $ale_stacks_demo_terms_id = array();
            }
            $ale_stacks_demo_terms_id[] = array( 'id' => $new_term_id, 'taxonomy' => $params_array['taxonomy'] );

            update_option( 'ale_demo_terms_id', $ale_stacks_demo_terms_id );

            return $new_term_id;
            }

            static function remove_term() {
            $ale_stacks_demo_terms_id = get_option( 'ale_demo_terms_id' );
            if ( is_array( $ale_stacks_demo_terms_id ) ) {
            foreach ( $ale_stacks_demo_terms_id as $ale_stacks_demo_term ) {
            wp_delete_term( $ale_stacks_demo_term['id'], $ale_stacks_demo_term['taxonomy'] );
            }
            }
            //Clear removed terms id
            update_option( 'ale_demo_terms_id', '' );
            }

            static function add_category( $params_array ) {

            self::check_params( __CLASS__, __FUNCTION__, $params_array, array(
            'category_name' => 'Param is required!',
            ) );

            if ( empty( $params_array['parent_id'] ) ) {
            $new_cat_id = wp_create_category( $params_array['category_name'] );
            } else {
            $new_cat_id = wp_create_category( $params_array['category_name'], $params_array['parent_id'] );
            }

            //update category descriptions
            if ( ! empty( $params_array['description'] ) ) {
            wp_update_term( $new_cat_id, 'category', array(
            'description' => $params_array['description']
            ) );
            }

            // keep a list of installed category ids so we can delete them later if needed
            $ale_stacks_demo_categories_id   = get_option( 'ale_demo_categories_id' );
            if(!is_array($ale_stacks_demo_categories_id)) {
            $ale_stacks_demo_categories_id = array();
            }
            $ale_stacks_demo_categories_id[] = $new_cat_id;
            update_option( 'ale_demo_categories_id', $ale_stacks_demo_categories_id );

            return $new_cat_id;
            }

            static function remove() {
            $ale_stacks_demo_categories_id = get_option( 'ale_demo_categories_id' );
            if ( is_array( $ale_stacks_demo_categories_id ) ) {
            foreach ( $ale_stacks_demo_categories_id as $ale_stacks_demo_category_id ) {
            wp_delete_category( $ale_stacks_demo_category_id );
            }
            }
            //Clear removed categories id
            update_option( 'ale_demo_categories_id', '' );
            }
            }