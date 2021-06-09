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
    __('Hello','geniuscourses'); //Возвращает значение
    _e('Hello','geniuscourses'); //Выводит значение

    $name = __('Hello','geniuscourses'); //переменная хранит значение

    //По мимо интерлизации их необходимо эскейпить

    $city = "Chisinau";
    $country = "Moldova";

    printf(esc_html__('My city is %1$s and my country is %2$s', 'geniuscourses'),$city,$country);

    echo wp_kses(__('Alex <strong>Sochirca</strong>','geniuscourses'),array('strong'=>array()))
?>