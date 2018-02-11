<?php
/*
 Template Name: Home Page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header('home'); ?>

<div class="content">
	<section class="podcast">
		<div class="podcast-data">
			<?php
				$args = array(
					'posts_per_page' => 1,
					'cat' => '3',
				);
				$q = new WP_Query( $args);
				
				if ( $q->have_posts() ) {
						while ( $q->have_posts() ) {
						$q->the_post();        
							echo "<h1>"; the_title(); echo "</h1>";
							the_excerpt();

						}
						wp_reset_postdata();
				}
			?>
		</div>
		<div class="podcast-player">
			<?php
				$args = array(
					'posts_per_page' => 1,
					'cat' => '3',
				);
				$q = new WP_Query( $args);
				
				if ( $q->have_posts() ) {
						while ( $q->have_posts() ) {
						$q->the_post(); 
							if ( has_post_thumbnail() ) {
								echo "<div class='featured-post-image' data-image='"; the_post_thumbnail_url( 'full' ); echo "'></div>";
							}        
							the_content();
						}
						wp_reset_postdata();
				}
			?>
		</div>
	</section>
	<section class="related-content">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("lower-home-page-left") ) : ?>
		<?php endif;?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("lower-home-page-right") ) : ?>
		<?php endif;?>
	</section>
</div>

<?php get_footer(); ?>

	<script>
		window.onload = function () {
			$( ".featured-post-image" ).each(function() {
				var attr = $(this).attr('data-image');
				$(this).css('background', 'url('+attr+')');
				$(this).css('-webkit-background-size', 'cover');
				$(this).css('-moz-background-size', 'cover');
				$(this).css('background-size', 'cover');
				$(this).css('margin', '1rem auto');
				$(this).css('padding', '1rem');
				$(this).css('width', '400px');
				$(this).css('height', '300px');
			});
		}
	</script>

