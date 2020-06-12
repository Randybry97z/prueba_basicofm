<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);

		if ( $wp_query->found_posts ) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results. */
				_n(
					'We found %s result for your search.',
					'We found %s results for your search.',
					$wp_query->found_posts,
					'twentytwenty'
				),
				number_format_i18n( $wp_query->found_posts )
			);
		} else {
			$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
		}
	} elseif ( ! is_home() ) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	if ( $archive_title || $archive_subtitle ) {
		?>

		<header class="archive-header has-text-align-center header-footer-group">

			<div class="archive-header-inner section-inner medium">

				<?php if ( $archive_title ) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
				<?php } ?>

				<?php if ( $archive_subtitle ) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->

		<?php
	}

		$url = "https://fernandafamiliar.soy/wp-json/wp/v2/posts";

		$request = curl_init($url);

		//convert arguments to json

		curl_setopt($request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
		curl_setopt($request, CURLOPT_HEADER, false);
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($request, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($request, CURLOPT_CUSTOMREQUEST, "GET");
		$response = curl_exec($request);
		$response_obj = json_decode($response);
		$result = $response_obj;
		
		foreach ($result as $post) {
			echo '<div class="container" style="display:block; border-radius: 20px; margin-top:25px; margin-left:5%; background-color: #fff; width:90%; height:200px; padding:5px;">';
			echo '<img style="width:25%; height:100%; display:inline-block; float:left; margin-right:inherit margin-left:20px;" src="https://i.pinimg.com/originals/ca/76/0b/ca760b70976b52578da88e06973af542.jpg">';
			echo "<div class='card' style=' display: inline-block; float:right; width: 70%; height:100%;'>";
				echo '<h3 style="font-size:20px; margin: 5px;">'.$post->title->rendered.'</h3>';
				$date_entered = date('Y-m-d', strtotime($post->date));
				$date_updated = date('Y-m-d', strtotime($post->date_gmt));
				echo '<span class="date-entered" style="display: inline-block; font-size:10px; color: #525252;">Publicado el: '.$date_entered.'</span>';
				echo '<span class="date-update" style="display: inline-block; float:right; font-size:10px; color: #525252;">Actualizado: '.$date_updated.'</span>';
				echo '<p>'.substr($post->content->rendered,0,250).'... <a href='.$post->link.' target="_blank">Ver mas</a></p>';
			echo '</div>';
			echo '</div>';
		
		}
		
			echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';

		?>

		<div class="no-search-results-form section-inner thin">

			<?php
			get_search_form(
				array(
					'label' => __( 'search again', 'twentytwenty' ),
				)
			);
			?>

		</div><!-- .no-search-results -->


	<?php get_template_part( 'template-parts/pagination' ); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
