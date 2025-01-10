<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Feed_The_People_Themes
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

			<!-- check for ACF -->
			<?php if (function_exists('the_field')): ?>

				<!-- Splash -->
				<?php if (get_field('page_title')): ?>
					<h1><?php the_field('page_title') ?></h1>
					<?php endif; ?>

				<?php if (get_field('page_subtitle')): ?>
					<p><?php the_field('page_subtitle') ?></p>
					<?php endif; ?>

				<?php if (have_rows('page_menu_items')): ?>
					<ul>
						<?php while (have_rows('page_menu_items')): the_row() ?>
							<li>
								<a><?php echo get_sub_field('section_title') ?></a>
								<?php echo wp_get_attachment_image(get_sub_field('section_background'), 'full', false); ?>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>

				<!-- Works -->
				<?php if (get_field('works_title')): ?>
					<h2><?php the_field('works_title') ?></h2>
					<?php endif; ?>

				<?php if (have_rows('works')): ?>
					<ul>
						<?php while (have_rows('works')): the_row() ?>
							<li>
								<a><?php echo get_sub_field('work_title') ?></a>
								<?php echo the_sub_field('work_content') ?>
							
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>

				<!-- About -->
				<?php if (get_field('about_title')): ?>
					<h2><?php the_field('about_title') ?></h2>
					<?php endif; ?>

				<?php if (get_field('about_description')): ?>
					<p><?php the_field('about_description') ?></p>
					<?php endif; ?>

				<!-- Contact CTA -->
				<?php if (get_field('contact_title')): ?>
					<h2><?php the_field('contact_title') ?></h2>
					<?php endif; ?>

				<?php if (get_field('button_text')): ?>
					<p><?php the_field('button_text') ?></p>
					<?php endif; ?>

				<!-- Team Section -->	
				<?php if (get_field('team_title')): ?>
					<h2><?php the_field('team_title') ?></h2>
					<?php endif; ?>

				<?php if (get_field('team_description')): ?>
					<p><?php the_field('team_description') ?></p>
					<?php endif; ?>

				<?php if (have_rows('team_members')): ?>
					<ul>
						<?php while (have_rows('team_members')): the_row() ?>
							<li>
								<p><?php echo get_sub_field('name') ?></p>
								<p><?php echo get_sub_field('title') ?></p>
								<?php echo wp_get_attachment_image(get_sub_field('photo'), 'full', false); ?>
								<p><?php echo get_sub_field('linkedin') ?></p>
								<p><?php echo get_sub_field('instagram') ?></p>
								<p><?php echo get_sub_field('facebook') ?></p>
								<p><?php echo get_sub_field('twitter') ?></p>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>

				<!-- Affiliate Section -->
				<?php if (get_field('affiliates_title')): ?>
					<h2><?php the_field('affiliates_title') ?></h2>
					<?php endif; ?>

				<?php if (have_rows('affiliate_logos')): ?>
					<ul>
						<?php while (have_rows('affiliate_logos')): the_row() ?>
							<li>
								<p><?php echo get_sub_field('affiliate_name') ?></p>
								<?php echo wp_get_attachment_image(get_sub_field('affiliate_logo'), 'full', false); ?>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>

			<?php endif; ?>



			

		<?php endwhile; // End of the loop.?>

	</main><!-- #main -->

<?php

get_footer();
