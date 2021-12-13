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

<?php if($term_parent_id == 0): ?>
  <section class="news_larger d-none d-md-block">
    <div class="container">
    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 5,
      'cat' => $term_id,
      'meta_key' => '_jsFeaturedPost',
      "meta_value" => 'yes'
    );
    $the_query = new WP_Query( $args ); ?>
    <?php if ( $the_query->have_posts() ) : $i=0; ?>
          <div class="sc__wrap">
            <div class="row gx-1">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++; ?>

              <?php if($i==1): ?>
                <div class="col-lg-6">
                  <div class="news__item -large ef__zoomin">
                    <a href="<?php the_permalink(); ?>">
                      <div class="el__thumb dnfix__thumb">
                        <?php the_post_thumbnail('medium',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                      </div>
                      <h3 class="el__title text__truncate -n2"><?php the_title() ?></h3>
                    </a>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="row gx-1">
                  <?php else: ?>
                    <div class="col-md-6">
                      <div class="news__item -small ef__zoomin">
                        <a href="<?php the_permalink(); ?>">
                          <div class="el__thumb dnfix__thumb">
                            <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                          </div>
                          <div class="el__meta">
                            <h3 class="el__title text__truncate -n2"><?php the_title() ?></h3>
                          </div>
                        </a>
                      </div>
                    </div>
                  <?php endif; ?>
            <?php endwhile;?>
                  </div> <!-- .row gx-1 -->
                <div> <!-- .col-lg-6 -->
            </div>
          <div>
      <?php
      wp_reset_postdata();
    else :
      get_template_part( 'template-parts/content', 'none' );
    endif; ?>
    </div>
  </section><!-- End section news2col -->
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
              <?php get_template_part( 'template-parts/content','archive'); ?>
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
        <div class="el__readmore js-loadmore" data-post_type="post" data-catid="<?php echo $term_id ?>" data-number="10"><?php _e('Load more articles','dntheme'); ?></div>
      </div>
    </div>

  </div>
</div>

<?php get_footer();
