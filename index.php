<?php get_header(); ?>

	<div>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			Body of the post
		<?php endwhile; else : ?>
			No posts
		<?php endif; ?>
	</div>

    <div class="main-content">
        <a href="#" class="button">Click Me</a>
    </div>

<?php
//get_sidebar();
get_footer();