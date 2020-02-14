<div class="wiget-recent">
<?php 
$args = array(      
    'posts_per_page' => $number   
);

$loop = new WP_Query( $args ); 
if ( have_posts() ) : while (   $loop->have_posts() ) :   $loop->the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
        <div class="post-image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
        </div>        
        <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(''); ?></a></h3>        
    </article>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>