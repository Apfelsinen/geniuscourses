<?php get_header(); ?>

	<div>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			Telo posta
		<?php endwhile; else : ?>
			Netu postov
		<?php endif; ?>
	</div>
    

<?php
//get_sidebar();
get_footer();
