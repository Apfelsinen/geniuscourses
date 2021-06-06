<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
    wp_nav_menu(
      array(
          'theme_location' => 'header_nav',
          'menu_class' => 'myclass'
      )
    );

    get_search_form();

    $name = 'Alex Sochirka aka "CRIKOVA"';
    $name2 = 'Alex Sochirka aka <strong>CRIKOVA</strong>"';

    //esc_attr() - attributes escape
    //esc_html() - html escape
    //esc_url() - link escape
    //wp_kses() -
    $name3 = 'Alex <a hreff="#">Sochirka</a> aka <strong>CRIKOVA</strong>';

?>

    <input name=""author" value="<?php echo esc_attr($name); ?>" />
    <!-- esc_attr обязателе в html атрибьютах иначе будуд ошибки, к примеру текст в двойных ковычках не выводится -->
    <?php echo esc_html($name2); ?>
    <!-- esc_html, html не интерпретируются, как теги -->
    <a href="<?php echo esc_url(home_url("/")) ?>">Home</a>
<?php
    $args = array(
            'a' => array(
                    'href' => array()
            ),
            'strong' => array(
            )
    );
    echo wp_kses($name3, $args);
?>