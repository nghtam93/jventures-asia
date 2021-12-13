<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$logo_img = get_field('logo_footer', 'option');
?>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="footer__item">
            <a href="<?php echo site_url(); ?>" class="footer__logo">
              <?php echo wp_get_attachment_image( $logo_img, 'full' ); ?>
            </a>
            <div class="footer__text"><?php the_field('footer_content', 'option') ?></div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer__item">
            <p class="footer__item__title"><?php _e('FOLLOW US','dntheme'); ?></p>
            <div class="footer__socical">
              <ul class="">
                <li><a href="<?php the_field('fb', 'option') ?>" class="-hover-fb" target="_blank"><span class="icon-facebook-circle"></span></a></li>
                <li><a href="<?php the_field('twitter', 'option') ?>" class="-hover-tw" target="_blank"><span class="icon-twitter-circle"></span></a></li>
                <li><a href="<?php the_field('ytb', 'option') ?>" class="-hover-ytb" target="_blank"><span class="icon-youtube-circle"></span></a></li>
                <li><a href="<?php the_field('telegram', 'option') ?>" class="-hover-tele" target="_blank"><span class="icon-telegram-circle"></span></a></li>
              </ul>
            </div>
            <p><?php _e('Terms of services and Privacy policy','dntheme'); ?></p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer__item -newsletter">
            <p class="footer__item__title"><?php _e('COINTELEGRAPH NEWSLETTER','dntheme'); ?></p>

            <form method="post" action="<?php echo site_url('?na=s') ?>">
              <input type="hidden" name="nlang" value="">
              <input type="text" name="ne" class="form-control input-text" placeholder="<?php _e('Email address','dntheme'); ?>">
              <input type="submit" class="input-submit" value="<?php _e('SUBSCRIBE NOW','dntheme'); ?>">
            </form>

            <p><?php _e('Cointelegraph covers fintech, blockchain and Bitcoin bringing you the latest news and analyses on the future of money.','dntheme'); ?></p>
          </div>
        </div>
      </div>

    </div>

    <div class="copyright">
      <div class="container">
        <p><?php the_field('copyright', 'option'); ?></p>
      </div>
    </div>
  </footer>


  <nav id="menu__mobile" class="nav__mobile">
      <div class="nav__mobile__content">
        <?php
          wp_nav_menu(
          array(
             'theme_location'  => 'primary',
             'container'       => 'ul',
             'container_class' => '',
             'menu_id'         => '',
             'menu_class'      => 'nav__mobile--ul',
          ));
        ?>

        <div class="footer__item text-center">
          <p class="footer__item__title"><?php _e('FOLLOW US','dntheme'); ?></p>
          <div class="footer__socical">
            <ul class="">
              <li><a href="" class="-fb" target="_blank"><span class="icon-facebook-circle"></span></a></li>
              <li><a href="" class="-tw" target="_blank"><span class="icon-twitter-circle"></span></a></li>
              <li><a href="" class="-ytb" target="_blank"><span class="icon-youtube-circle"></span></a></li>
              <li><a href="" class="-tele" target="_blank"><span class="icon-telegram-circle"></span></a></li>
            </ul>
          </div>
        </div>

      </div>
  </nav>
</div> <!-- end .wrapper -->
<?php wp_footer(); ?>
</body>
</html>
