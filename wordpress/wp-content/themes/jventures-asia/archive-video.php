<?php
/**
 * The template for displaying archive pages
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */

get_header();
$term = get_queried_object();
$term_id = $term->term_id;
$term_parent_id = $term->parent;
?>

<?php if(is_post_type_archive()): ?>
  <?php
  $args = array(
    'post_type' => 'video',
    'posts_per_page' => 7,
    'meta_key' => '_jsFeaturedPost',
    "meta_value" => 'yes'
  );
  $the_query = new WP_Query( $args ); ?>
  <?php if ( $the_query->have_posts() ) : $i=0; ?>
    <section class="home-video wow fadeInUp">
      <div class="container">
        <div class="row">
          <?php while ( $the_query->have_posts() ) : $the_query->the_post();$i++; ?>
            <?php if($i==1): ?>
              <div class="col-lg-8">
                <div class="el__item -large ef--zoomin">
                  <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                    <div class="el__item__thumb">
                      <div class="dnfix__thumb">
                        <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                      </div>
                      <div class="el__item--play"></div>
                    </div>
                    <div class="el__item__meta">
                      <h3 class="el__item__title text__truncate -n2"><?php the_title() ?></h3>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="el__box">
                  <div class="el__box__header">
                    <div class="el__box__sub"><?php _e('Currently Playing','dntheme'); ?></div>
                    <div class="el__box__title text-truncate"><?php _e('Celebrities, athletes and influencers flock to help...','dntheme'); ?></div>
                  </div>
                  <div class="el__box__content">

            <?php else: ?>
                    <div class="el__item -small ef--shine">
                      <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                        <div class="el__item__thumb">
                          <div class="dnfix__thumb">
                            <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                          </div>
                        </div>
                        <div class="el__item__meta">
                          <h3 class="el__item__title text__truncate -n2"><?php the_title() ?></h3>
                          <div class="el__item__tax"><?php _e('J Ventures TV','dntheme'); ?></div>
                        </div>
                      </a>
                    </div>
            <?php endif; ?>
          <?php endwhile;?>
                  </div> <!-- .el__box__content -->
              </div> <!-- .col-lg-4 -->
        </div>
      </div>
    </section>
    <?php
    wp_reset_postdata();
  else :
    get_template_part( 'template-parts/content', 'none' );
  endif; ?>
<?php endif; ?>

<section class="page__header text-center">
  <div class="container">
    <?php the_archive_title() ?>
  </div>
</section>

<div class="archive__content">
  <div class="container">
    <div class="js-loadmore__wrap">
      <?php
      if ( have_posts() ) : //$i=0;
          echo '<div class="row js-loadcontent">';
          while ( have_posts() ) : the_post(); //$i++;
            ?>
            <div class="col-lg-4 col-sm-6 d-md-flex">
              <?php get_template_part( 'template-parts/content','archive-video'); ?>
            </div>
          <?php
          endwhile;
          echo '</div>';
          //dntheme_paging_nav();
      else :
            get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>

      <div class="text-center">
        <div class="el__readmore js-loadmore" data-post_type="video" data-catid="<?php echo $term_id ?>" data-number="10"><?php _e('Load more articles','dntheme'); ?></div>
      </div>
    </div>
  </div>
</div>

<?php get_footer();
