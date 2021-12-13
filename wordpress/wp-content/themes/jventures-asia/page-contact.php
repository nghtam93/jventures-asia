<?php
/**
 * Template Name: Page Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="page__header">
  <div class="container">
    <h1 class="page__header__title"><?php echo wp_get_attachment_image( get_field('icon'), array('45', '45') ); ?><?php the_title() ?></h1>
  </div>
</section>
<div class="page__contact">
  <div class="container">

    <div class="page__contact__thumb">
      <div class="dnfix__thumb">
        <?php the_post_thumbnail('large',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
      </div>
    </div>

    <div class="page__contact__form">
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <?php echo do_shortcode(get_field('form')) ?>
    </div>

    <div class="el__boxs">
      <div class="el__boxs__title"><?php _e('Contact','dntheme'); ?></div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
          <div class="el__box">
            <div class="el__box__thumb dnfix__thumb -contain">
              <img src="<?php echo get_theme_file_uri('assets/img/contact-phone.png') ?>" alt="">
            </div>
            <div class="el__box__title"><?php _e('Phone','dntheme'); ?>: <strong><?php the_field('hotline', 'option'); ?></strong></div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="el__box">
            <div class="el__box__thumb dnfix__thumb -contain">
              <img src="<?php echo get_theme_file_uri('assets/img/contact-address.png') ?>" alt="">
            </div>
            <div class="el__box__title"><?php _e('Address','dntheme'); ?>: <strong><?php the_field('address','option'); ?></strong></div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="el__box">
            <div class="el__box__thumb dnfix__thumb -contain">
              <img src="<?php echo get_theme_file_uri('assets/img/contact-mail.png') ?>" alt="">
            </div>
            <div class="el__box__title"><?php _e('E-mail','dntheme'); ?>: <strong><a href="mailto:<?php the_field('email', 'option'); ?>"></a><?php the_field('email', 'option'); ?></strong></div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php endwhile; ?>
<?php get_footer();