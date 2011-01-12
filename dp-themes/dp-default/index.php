<?php
status_header( 200 );

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">

            <?php if ( is_multisite() ): ?>
                <?php dp_categories_top( $wp_query->query_vars['category_name'] ); ?>
            <?php else: ?>
                <?php if ( isset( $wp_query->query_vars['pagename'] ) && !empty( $wp_query->query_vars['pagename'] )): ?>
                    <?php dp_categories_top( $wp_query->query_vars['pagename'] ); ?>
                <?php elseif ( isset( $wp_query->query_vars['name'] ) && !empty( $wp_query->query_vars['name'] )): ?>
                    <?php dp_categories_top( $wp_query->query_vars['name'] ); ?>
                <?php endif; ?>
            <?php endif; ?>

			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 //get_template_part( 'loop', 'index' );
			?>
            <br /><br />
			</div><!-- #content -->
		</div><!-- #container -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>