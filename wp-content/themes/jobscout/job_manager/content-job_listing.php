<?php

/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $post;
$job_salary   = get_post_meta(get_the_ID(), '_job_salary', true);
$job_featured = get_post_meta(get_the_ID(), '_featured', true);
$company_name = get_post_meta(get_the_ID(), '_company_name', true);

?>
<article <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr($post->geolocation_lat); ?>" data-latitude="<?php echo esc_attr($post->geolocation_long); ?>">

	<figure class="company-logo">
		<?php the_company_logo('thumbnail'); ?>
	</figure>

	<div class="job-title-wrap">

		<h3 class="entry-title">
			<a href="<?php the_job_permalink(); ?>"><?php wpjm_the_job_title(); ?></a>
		</h3>

		<?php if ($company_name) { ?>
			<div class="company-name" id="time-date">
				<?php the_job_publish_date(); ?>
			</div>
			<div>
				<?php
				if (get_option('job_manager_enable_types')) {
					$types = wpjm_get_the_job_types();
					if (!empty($types)) : foreach ($types as $jobtype) : ?>
							<li id="item-job-type" class="job-type <?php echo esc_attr(sanitize_title($jobtype->slug)); ?>">
								<div id="container">
									<div class=""><?php echo esc_html($jobtype->name); ?> </div>
									<div class="item-information"><?php the_company_name(); ?></div>
									<div class="item-information"><?php the_job_location(true); ?></div>
								</div>
							</li>
				<?php endforeach;
					endif;
				}
				?>

			</div>
		<?php } ?>

		<div class="entry-meta">
			<?php
			do_action('job_listing_meta_start');

			// if( $job_salary ){
			//     echo '<div class="salary-amt">
			//         <span class="currency"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M334.89 121.63l43.72-71.89C392.77 28.47 377.53 0 352 0H160.15c-25.56 0-40.8 28.5-26.61 49.76l43.57 71.88C-9.27 240.59.08 392.36.08 412c0 55.23 49.11 100 109.68 100h292.5c60.58 0 109.68-44.77 109.68-100 0-19.28 8.28-172-177.05-290.37zM160.15 32H352l-49.13 80h-93.73zM480 412c0 37.49-34.85 68-77.69 68H109.76c-42.84 0-77.69-30.51-77.69-68v-3.36c-.93-59.86 20-173 168.91-264.64h110.1C459.64 235.46 480.76 348.94 480 409zM285.61 310.74l-49-14.54c-5.66-1.62-9.57-7.22-9.57-13.68 0-7.86 5.76-14.21 12.84-14.21h30.57a26.78 26.78 0 0 1 13.93 4 8.92 8.92 0 0 0 11-.75l12.73-12.17a8.54 8.54 0 0 0-.65-13 63.12 63.12 0 0 0-34.17-12.17v-17.6a8.68 8.68 0 0 0-8.7-8.62H247.2a8.69 8.69 0 0 0-8.71 8.62v17.44c-25.79.75-46.46 22.19-46.46 48.57 0 21.54 14.14 40.71 34.38 46.74l49 14.54c5.66 1.61 9.58 7.21 9.58 13.67 0 7.87-5.77 14.22-12.84 14.22h-30.61a26.72 26.72 0 0 1-13.93-4 8.92 8.92 0 0 0-11 .76l-12.84 12.06a8.55 8.55 0 0 0 .65 13 63.2 63.2 0 0 0 34.17 12.17v17.55a8.69 8.69 0 0 0 8.71 8.62h17.41a8.69 8.69 0 0 0 8.7-8.62V406c25.68-.64 46.46-22.18 46.57-48.56.02-21.5-14.13-40.67-34.37-46.7z"></path></svg></span>
			//         <span class="salary">'. esc_html( $job_salary ) .'</span>
			//     </div>';
			// }
			?>


			<?php

			do_action('job_listing_meta_end');
			?>
		</div>
	</div>
	<span> <?php
			if (is_search() || !is_singular() && 'summary' === get_theme_mod('blog_content', 'full')) {
				the_excerpt();
			} else {

				$excerpt = wp_trim_words(get_the_content(), 30);
				$content1 = substr($excerpt, 0, 70);
				$content2 = substr($excerpt, 70, 100);
				$content3 = substr($excerpt, 110, 140);
				if($content1){
				echo

						"<ul style='margin:0px !important'>
									<li style='font-size: 12px;color: #6e6e6e;font-weight: 500;'>$content1</li>
									<li style='font-size: 12px;color: #6e6e6e;font-weight: 500;'>$content2</li>
								 
								<li style='
									font-size: 12px;
    							color: #6e6e6e;
   						 font-weight: 500;'
								>$content3</li></ul>";

				}

				// the_content( __( 'Continue reading', 'twentytwenty' ) );s
			}
			?></span>

	<!-- <div class="item-content"> fokeijgruhgdngfogdusg</div> -->

	<?php if ($job_featured) { ?>
		<div class="featured-label"><?php esc_html_e('Featured', 'jobscout'); ?></div>
	<?php } ?>

</article>