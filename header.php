<?php 
/*-----------------------------------------------------------------------------------*/
// Theme Header - Displays the <head> section and everything up to .site-main
// @since 1.0
/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6"><![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"><![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"><![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<?php wp_head(); ?>
<?php themebeagle_head(); // action hook ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

	<?php
		global $post;
		$hideheadstuff = array();
		if ( is_singular() && get_post_meta($post->ID, 'tb_hide_head_stuff', true) ) { $hideheadstuff = get_post_meta($post->ID, 'tb_hide_head_stuff', true); }
		if ( tb_option('show_fixednav') && !is_page_template('page-landing.php') && !in_array('hide_fixednav', $hideheadstuff) ) { ?>
			<div class="darkheader">
				<?php get_template_part( 'nav-fixed' ); ?>
			</div>
		<?php } 
	?>

	<?php themebeagle_before_site_container(); // action hook ?>

	<!-- OUTER SITE CONTAINER (.site-container) -->
	<div class="site-container">

		<?php
			global $post;
			$hidehead = '';
			if ( is_singular() ) {
				$hidehead = get_post_meta($post->ID, 'tb_hide_head', true); 
			}
			if ( ! $hidehead && ! is_page_template('page-landing.php') ) { 
				get_template_part( 'site-header' ); 
			}
		?>

		<?php themebeagle_before_site_inner(); // action hook ?>

		<!-- INNER SITE CONTAINER (.site-inner) -->
		<div class="site-inner">

			<div class="site-inner-wrap">

			<div class="tb-col-border narrow"></div>

			<div class="tb-col-border wide"></div>

			<!-- PRIMARY CONTENT AREA (#primary) -->
			<div id="primary" class="content-area">

				<!-- CONTENT AREA (.site-content) -->
				<main id="content" class="site-content" itemprop="mainContentOfPage">

					<?php themebeagle_site_content(); // action hook ?>