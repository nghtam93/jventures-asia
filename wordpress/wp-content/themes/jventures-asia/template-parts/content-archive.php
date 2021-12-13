<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$categories = get_the_category();

?>

<div class="new__item">
  <a href="<?php the_permalink(); ?>" class="new__item__wrap">
    <div class="new__item__thumb ef--zoomin">
      <div class="dnfix__thumb">
        <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
      </div>
    </div>
    <div class="new__item__meta">
      <h3 class="new__item__title text__truncate -n2"><?php the_title() ?></h3>
      <div class="new__item__date"><?php get_item_date() ?></div>
    </div>
  </a>
</div>