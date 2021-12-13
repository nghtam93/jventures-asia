<?php
/**
 * Template Name: Page Home
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

<section class="home-news">
  <div class="container">
    <div class="el__box wow fadeInUp">
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
      );
      $the_query = new WP_Query( $args ); ?>

      <?php if ( $the_query->have_posts() ) : $i=0; ?>
        <div class="row">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++; ?>
          <?php if($i==1): ?>
            <div class="col-lg-7">
              <div class="el__item -large ef--shine">
                <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                  <div class="el__item__thumb">
                    <div class="dnfix__thumb">
                      <?php the_post_thumbnail('medium',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                    </div>
                  </div>
                  <div class="el__item__meta">
                    <h3 class="el__item__title text__truncate -n2"><?php the_title(); ?></h3>
                    <div class="d-flex align-items-center">
                      <div class="el__item__date"><span class="icon-clock"></span><?php get_item_date() ?></div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-5">
            <?php else: ?>
              <div class="el__item -small ef--shine">
                <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                  <div class="el__item__thumb">
                    <div class="dnfix__thumb">
                      <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                    </div>
                  </div>
                  <div class="el__item__meta">
                    <h3 class="el__item__title text__truncate -n3"><?php the_title(); ?></h3>
                  </div>
                </a>
              </div>
            <?php endif; ?>
        <?php endwhile;?>
            </div> <!-- .col-lg-5 -->
        </div>
        <?php
        wp_reset_postdata();
      else :
        get_template_part( 'template-parts/content', 'none' );
      endif; ?>

    </div>

    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 5,
      'offset' => 4
    );
    $the_query = new WP_Query( $args ); ?>

    <?php if ( $the_query->have_posts() ) : ?>
      <div class="el__slider js-slick__news1">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="el__item__wrap">
          <div class="el__item -slider ef--shine">
              <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                <div class="el__item__thumb">
                  <div class="dnfix__thumb">
                    <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                  </div>
                </div>
                <div class="el__item__meta">
                  <h3 class="el__item__title text__truncate -n3"><?php the_title(); ?></h3>
                </div>
              </a>
            </div>
        </div>
      <?php endwhile;?>
      </div>
      <?php
      wp_reset_postdata();
    else :
      get_template_part( 'template-parts/content', 'none' );
    endif; ?>

  </div>
</section>


<?php
$cat_include = get_field('section1');;
// $cat_include = $dn_options[ 'home-news'];
$taxonomy = 'category';
$showpost = 6;

$args = array(
    'taxonomy' => 'category',
    'hide_empty' => false,
    'include' =>$cat_include,
    'orderby'  => 'include'
);

$terms = get_terms($args);
if ( $terms && !is_wp_error( $terms ) ) :
  foreach ( $terms as $term ) {
  ?>

  <section class="home-news -s1">
    <div class="container">
      <header class="sc__header">
        <h2 class="sc__header__title"><a href="<?php echo get_term_link($term); ?>"><?php echo wp_get_attachment_image( get_field('icon',$term), array('45', '45') ); ?><?php echo $term->name ?></a></h2>
      </header>
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => $showpost,
        'cat'=> $cat_include
      );
      $the_query = new WP_Query( $args ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
        <div class="row wow fadeInUp">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="col-md-6 col-lg-4 item__wrap">
            <?php get_template_part( 'template-parts/content','archive'); ?>
          </div>
        <?php endwhile;?>
        </div>
        <?php
        wp_reset_postdata();
      else :
        get_template_part( 'template-parts/content', 'none' );
      endif; ?>
    </div>
  </section>
  <?php } ?>
<?php endif;?>

<?php
$args = array(
  'post_type' => 'video',
  'posts_per_page' => 7
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

<?php
$cat_parent_include = get_field('section2_parent');
?>
<section class="home-3box">
  <div class="container">
    <header class="sc__header">
      <h2 class="sc__header__title"><a href="<?php echo get_term_link($term); ?>"><?php echo wp_get_attachment_image( get_field('icon',$cat_parent_include), array('45', '45') ); ?><?php echo $cat_parent_include->name ?></a></h2>
    </header>

    <div class="row wow fadeInUp">
    <?php
    $cat_include = get_field('section2');
    $taxonomy = 'category';
    $showpost = 4;

    $args = array(
        'taxonomy' => 'category',
        'hide_empty' => false,
        'include' =>$cat_include,
        'orderby'  => 'include'
    );

    $terms = get_terms($args);
    if ( $terms && !is_wp_error( $terms ) ) :
      foreach ( $terms as $term ) {
      ?>
        <div class="col-lg-4 col-sm-6">
          <div class="el__box">
            <div class="el__box__header">
              <h3 class="el__box__title"><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name ?></a></h3>
            </div>
            <div class="el__box__content">
            <?php
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => $showpost,
              'cat'=> $cat_include
            );
            $the_query = new WP_Query( $args ); ?>
            <?php if ( $the_query->have_posts() ) : $j=0; ?>
              <div class="row wow fadeInUp">
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $j++; ?>

                <?php if($j==1): ?>
                  <div class="el__item -large ef--shine">
                    <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb">
                          <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                        </div>
                      </div>
                      <div class="el__item__meta">
                        <h3 class="el__item__title text__truncate -n2"><?php the_title() ?></h3>
                        <div class="el__item__date"><?php get_item_date() ?></div>
                      </div>
                    </a>
                  </div>
                <?php else: ?>
                  <div class="el__item -small ef--shine">
                    <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb">
                          <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                        </div>
                      </div>
                      <div class="el__item__meta">
                        <h3 class="el__item__title text__truncate -n3"><?php the_title() ?></h3>
                        <div class="el__item__date"><?php get_item_date() ?></div>
                      </div>
                    </a>
                  </div>
                <?php endif ?>
              <?php endwhile;?>
              </div>
              <?php
              wp_reset_postdata();
            else :
              get_template_part( 'template-parts/content', 'none' );
            endif; ?>
            </div> <!-- .el__box__content -->
            <a href="<?php echo get_term_link($term); ?>" class="el__box__readmore"><?php _e('View more','dntheme'); ?></a>
          </div> <!-- .el__box -->
        </div> <!-- .col-lg-4 col-sm-6 -->
      <?php } ?>
    <?php endif;?>
    </div>
  </div>
</section>


<?php
if( have_rows('section3') ):
    while( have_rows('section3') ) : the_row();
      $categoryz = get_sub_field('category');
      $templatez = get_sub_field('template');

      $args = array(
          'taxonomy' => 'category',
          'hide_empty' => false,
          'include' =>$categoryz,
          'orderby'  => 'include'
      );

      $terms = get_terms($args);
      if ( $terms && !is_wp_error( $terms ) ) :
        foreach ( $terms as $term ) {

          if($templatez == 'slider'):
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 5,
              'cat'=> $categoryz
            );
            ?>
            <section class="home-news-slider wow fadeInUp">
              <div class="container">
                <header class="sc__header -white">
                  <h2 class="sc__header__title"><a href="<?php echo get_term_link($term); ?>"><?php echo wp_get_attachment_image( get_field('icon',$term), array('45', '45') ); ?><?php echo $term->name ?></a></h2>
                </header>
                <?php
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() ) :?>
                  <div class="el__slider js-slick__news2">
                  <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                    <div class="el__item__wrap">
                      <div class="el__item -slider ef--shine">
                          <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                            <div class="el__item__thumb">
                              <div class="dnfix__thumb">
                                <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                              </div>
                            </div>
                            <div class="el__item__meta">
                              <h3 class="el__item__title text__truncate -n3"><?php the_title() ?></h3>
                              <div class="el__item__date"><?php get_item_date() ?></div>
                            </div>
                          </a>
                      </div>
                    </div>
                  <?php endwhile;?>
                  </div>
                  <?php
                  wp_reset_postdata();
                else :
                  get_template_part( 'template-parts/content', 'none' );
                endif; ?>
              </div>
            </section>
          <?php else:
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 12,
              'cat'=> $categoryz
            );
            ?>
            <section class="home-3box">
              <div class="container js-loadmore__wrap">
                  <header class="sc__header">
                    <h2 class="sc__header__title"><a href="<?php echo get_term_link($term); ?>"><?php echo wp_get_attachment_image( get_field('icon',$term), array('45', '45') ); ?><?php echo $term->name ?></a></h2>
                  </header>

                  <?php
                  $the_query = new WP_Query( $args ); ?>
                  <?php if ( $the_query->have_posts() ) : $j=0; ?>
                    <div class="row wow fadeInUp js-loadcontent">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $j++; ?>

                      <?php if($j<=3): ?>
                        <div class="col-lg-4 col-md-4">
                          <div class="el__item -large ef--shine">
                            <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                              <div class="el__item__thumb">
                                <div class="dnfix__thumb">
                                  <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                                </div>
                              </div>
                              <div class="el__item__meta">
                                <h3 class="el__item__title text__truncate -n2"><?php the_title() ?></h3>
                                <div class="el__item__date"><?php get_item_date() ?></div>
                              </div>
                            </a>
                          </div>
                        </div>
                      <?php else: ?>
                        <div class="col-lg-4 ">
                          <div class="el__item -small ef--shine">
                            <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                              <div class="el__item__thumb">
                                <div class="dnfix__thumb">
                                  <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                                </div>
                              </div>
                              <div class="el__item__meta">
                                <h3 class="el__item__title text__truncate -n3"><?php the_title() ?></h3>
                                <div class="el__item__date"><?php get_item_date() ?></div>
                              </div>
                            </a>
                          </div>
                        </div>
                      <?php endif ?>
                    <?php endwhile;?>
                    </div>
                    <?php
                    wp_reset_postdata();
                  else :
                    get_template_part( 'template-parts/content', 'none' );
                  endif; ?>
                  <div class="text-center">
                    <div class="el__readmore -s2 js-loadmore" data-post_type="post" data-catid="<?php echo $categoryz ?>" data-template="small3" data-number="10"><?php _e('Load more articles','dntheme'); ?></div>
                  </div>
              </div>
            </section>
          <?php endif; ?>
        <?php }
      endif;
    endwhile;
endif;
?>
<?php endwhile; ?>
<?php get_footer();