<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/">
<!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="Unimatic Watches">

	<title><?php bloginfo( 'name' );?><?php wp_title( '|', true, 'left' );  ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<script>var iealert=true;</script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/images/shared/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php bloginfo( 'template_directory' ); ?>/images/shared/favicon.ico" type="image/x-icon">

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/socicon.css" />

	<?php wp_head(); ?>

	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-ui.min.js"></script>
	<!-- <script src="<?php //bloginfo('template_directory'); ?>/js/jquery.ui.touch-punch.min.js"></script> -->

</head>






<body <?php body_class( 'class-name' ); ?>>
	<div id="the-site">
		<div id="site-container">
            <!-- Header -->

			<?php
			$landing='';
			if(is_front_page()){
				if(get_field('landing_page')){
					$landing='landing';
					//
					$landing_id=get_field('landing_page');
			        //
			        $title=get_the_title($landing_id);
			        //
			        $content_post = get_post($landing_id);
			        $content = $content_post->post_content;
			        $content = apply_filters('the_content', $content);
			        //
			        $image=get_the_post_thumbnail_url($landing_id);
					//
					echo '<div id="landing-page" style="background-color:'.get_field("bgcolor",$landing_id).'">';
						echo '<div class="table">';

							echo '<div class="cell col colsx" style="background-image:url('.$image.')">';
							echo '</div>';
							echo '<div class="cell col coldx">';
								$url=get_field('url',$landing_id);
								if($url){
									echo '<a href="'.get_permalink($url).'">';
								}
								if(get_field('immagine_mobile',$landing_id)){
									echo '<img class="img-mobile" src="'.get_field('immagine_mobile',$landing_id).'" />';
								}
								echo '<h1>'.$title.'</h1>';
								echo $content;
								if($url){
									echo '</a>';
								}
							echo '</div>';
						echo '</div>';

						echo '<div id="scroll_down"></div>';
					echo '</div>';
				}
			}
			?>
            <header id="main-header" class="<?php echo $landing; ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'primary_menu', 'container' => 'container', 'menu_class' => 'primary_menu')); ?>
				<a id="unimatic" href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/shared/unimatic.png"></a>
			</header>
			<div id="site-content">
