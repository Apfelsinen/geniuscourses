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
  $name = 'Alex Sochirka aka strongCRIKOVA"';



?>

    <input name=""author" value="<?php echo esc_attr($name); ?>" />
    <!-- esc_attr обязателе в html атрибьютах иначе будуд ошибки, к примеру текст в двойных ковычках не выводится -->