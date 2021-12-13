<?php
/**
 * The template for displaying search results pages
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */

get_header(); ?>
<div class="wrap__page">

	<section class="page__header">
      <div class="container">
        <?php if ( have_posts() ) : ?>
			<h1 class="page__header__title"><?php printf( __( 'Search with keywords: %s', 'dntheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page__header__title"><?php _e( 'Nothing Found', 'dntheme' ); ?></h1>
		<?php endif; ?>
      </div>
    </section>

	<div class="page__content sc__wrap">

		<div class="archive__content">
			<div class="container">
				<?php
				if ( have_posts() ) :
					echo ' <div class="row">';
                    while ( have_posts() ) : the_post(); ?>
                         <div class="col-md-6 col-lg-4">
                            <?php get_template_part( 'template-parts/content','archive'); ?>
                        </div>
                    <?php
                    endwhile;
                    echo '</div>';
                    dntheme_paging_nav();
				else : ?>
					<div class="box-search">
						<p class="mb-3 text-center"><?php _e( 'Sorry, but nothing matched your search term. Please try again with some different keywords.', 'dntheme' ); ?></p>

						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div><!-- .wrap -->
</div>
<?php get_footer();