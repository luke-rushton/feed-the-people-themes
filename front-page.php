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


				<div class="splash-section">
					<!-- Splash -->
					<?php if (get_field('page_title')): ?>
						<h1><?php the_field('page_title') ?></h1>
						<?php endif; ?>
						
						<?php if (get_field('page_subtitle')): ?>
							<p class="subtitle"><?php the_field('page_subtitle') ?></p>
							<?php endif; ?>

					<?php if (get_field('company_logo')): ?>
						<?php echo wp_get_attachment_image(get_field('company_logo'), 'full', false, ["class" => "company-logo"]); ?>
					<?php endif; ?>
							
							<?php if (have_rows('page_menu_items')): ?>
								<ul class="content-list">
									<?php while (have_rows('page_menu_items')): the_row() ?>
										<li>
											<a><?php echo get_sub_field('section_title') ?></a>
										</li>
									<?php endwhile; ?>
								</ul>
								<ul class="splash-list">
									<?php while (have_rows('page_menu_items')): the_row() ?>
										<li>
											<?php $background = get_sub_field('section_background') ?>
											<div class="splash-background" style="background-image: url('<?php echo $background;?>')"></div>
										</li>
									<?php endwhile; ?>
								</ul>
						<?php endif; ?>
						<!-- arrow symbol -->
						 <div class="arrow-div">
						 <svg  xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path fill="#FFFFFF" d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z"/></svg>
						 </div>
				</div>
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
								<p><?php echo get_sub_field('affiliate_link') ?></p>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>

			<?php endif; ?>



			

		<?php endwhile; // End of the loop.?>

	</main><!-- #main -->

<?php

get_footer();
