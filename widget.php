<div class="wiget-recent">
<div class="container">
    <div class="row">
        
        <?php 
$args = array(      
    'posts_per_page' => $number   
);

$loop = new WP_Query( $args ); 
if ( have_posts() ) : while (   $loop->have_posts() ) :   $loop->the_post(); ?>
<div class="col-6 col-md-12">
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
        <div class="post-image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small'); ?></a>
        </div>        
        <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(''); ?></a></h3>        
    </article>
    </div>
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
        
        </div>
    </div>


</div>