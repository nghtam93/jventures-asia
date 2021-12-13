<?php
/**
 * Template part for displaying posts
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$categories = get_the_category(get_the_ID());
$cat_name = $categories[0]->name;
$cat_link = get_category_link($categories[0]);
?>

<div class="single__wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">

        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="single__date"><?php get_item_date() ?></div>

        <?php if(get_field('video_url')): ?>
          <div class="ratio ratio-16x9 mb-4">
            <?php the_field('video_url') ?>
          </div>
        <?php endif; ?>

        <ul class="single__share">
          <li><a href="https://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" class="-fb" target="_blank"><span class="icon-facebook-circle"></span></a></li>
          <li><a href="https://twitter.com/intent/tweet?&url=<?php the_permalink() ?>" class="-tw" target="_blank"><span class="icon-twitter-circle"></span></a></li>
          <li><a href="https://telegram.me/share/url?url=<?php the_permalink() ?>&text=<?php the_title() ?>" class="-tele" target="_blank"><span class="icon-telegram-circle"></span></a></li>
        </ul>

        <div class="entry-content"><?php the_content() ?></div>

        <?php
            related_category_fix(
                array(
                    'posts_per_page'    => 6,
                    'related_title'     => __( 'Maybe you are interested', 'dntheme' ),
                    'template_type'     => '', // slider , widget
                    'template'          => 'content-archive-video',
                    'set_taxonomy'      => null,
                    'class_item'        => 'col-lg-4 col-sm-6 d-md-flex',
                )
            );
        ?>

      </div>
      <div class="col-lg-4 d-none d-lg-block">
        <?php get_sidebar('blog'); ?>
      </div>
    </div>
  </div>
</div>