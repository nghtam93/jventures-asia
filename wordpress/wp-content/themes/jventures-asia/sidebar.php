<?php
/**
 * The sidebar containing the main widget area
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */

// if ( ! is_active_sidebar( 'sidebar-1' ) ) {
// 	return;
// }
?>

<aside class="widget-area widget__fix">
  <div class="sidebar__inner">

    <?php if(is_single()):
        $categories = get_the_category(get_the_ID());
        ?>
        <div class="widget">
          <div class="widget-title"><?php _e('EDITOR’S CHOICE','dntheme'); ?></div>
            <div class="widget__content">
            <?php
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 3,
              'cat' => $categories[0]->term_id,
              'meta_key' => '_jsFeaturedPost',
              "meta_value" => 'yes'
            );
            $the_query = new WP_Query( $args ); ?>
            <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="new__item">
                      <a href="<?php the_permalink(); ?>" class="new__item__wrap">
                        <div class="new__item__thumb ef--zoomin">
                          <div class="dnfix__thumb">
                            <?php the_post_thumbnail('medium',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                          </div>
                        </div>
                        <div class="new__item__meta">
                          <h3 class="new__item__title text__truncate -n2"><?php the_title() ?></h3>
                          <div class="new__item__date"><?php get_item_date() ?></div>
                        </div>
                      </a>
                    </div>
                <?php endwhile;?>
              <?php
              wp_reset_postdata();
            else :
              get_template_part( 'template-parts/content', 'none' );
            endif; ?>
          </div>
        </div>
    <?php endif ?>

  </div>
</aside>
