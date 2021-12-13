<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="wrapper">

  <header class="header">
      <div class="container d-flex align-items-center">
        <div class="d-lg-none d-lg-none">
          <div class="menu-mb__btn">
            <span class="iconz-bar"></span>
            <span class="iconz-bar"></span>
            <span class="iconz-bar"></span>
          </div>
        </div>

        <?php dntheme_logo(); ?>

        <ul class="header__bitcon ms-auto row d-none d-lg-flex">
          <li class="col">
            <p class="el__item__name">BTC</p>
            <p class="el__item__price">$65,427</p>
            <p class="el__item__percent">+1.85%</p>
          </li>
          <li class="col">
            <p class="el__item__name">ETH</p>
            <p class="el__item__price">$4.678</p>
            <p class="el__item__percent">+2.21%</p>
          </li>
          <li class="col">
            <p class="el__item__name">XRP</p>
            <p class="el__item__price">$1.20</p>
            <p class="el__item__percent">+2.44%</p>
          </li>
          <li class="col">
            <p class="el__item__name">BCH</p>
            <p class="el__item__price">$675</p>
            <p class="el__item__percent">+1.26%</p>
          </li>
          <li class="col">
            <p class="el__item__name">EOS</p>
            <p class="el__item__price">$4.96</p>
            <p class="el__item__percent">+0.79%</p>
          </li>
          <li class="col">
            <p class="el__item__name">DOGE</p>
            <p class="el__item__price">$0.26</p>
            <p class="el__item__percent">+0.06%</p>
          </li>
        </ul>
        <div class="languages ms-lg-5">
          <?php dntheme_get_wmpl() ?>
        </div>

      </div>
  </header>

  <nav class="main__nav -fix d-none d-lg-block" data-toggle="sticky-onscroll">
    <div class="container d-flex align-items-center">
      <?php
      wp_nav_menu(
        array(
           'theme_location'  => 'primary',
           'container'       => 'ul',
           'container_class' => '',
           'menu_id'         => '',
           'menu_class'      => 'el__menu',
        ));
      ?>

      <div class="header__search ms-auto">
        <form role="search" method="get" class="search-form search__form" action="">
          <input type="search" id="" class="search-field" placeholder="<?php _e('Nhập từ khóa cần tìm...','dntheme'); ?>" name="s" />
          <button class="search-submit" type="submit"><span class="icon-search"></span></button>
        </form>
      </div>

    </div>
  </nav>


<?php if(!is_front_page()): ?>
  <div class="dn__breadcrumb <?php echo is_page_template( 'page-contact.php' ) ? 'd-none' : '' ?>" typeof="BreadcrumbList" vocab="https://schema.org/">
    <div class="container">
      <?php if(function_exists('bcn_display'))
      {
          bcn_display();
      }?>
    </div>
  </div>
<?php endif; ?>