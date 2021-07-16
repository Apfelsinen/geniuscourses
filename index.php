<?php get_header(); ?>
<?php get_template_part('partials/page_heading');

//Sidebar position based on theme options
$apf_sidebar_position = apf_get_option('blog_sidebar_position');
$sidebar_class = '';

if($apf_sidebar_position){
    $sidebar_class = 'sidebar_position_'. $apf_sidebar_position;
}
?>

<?php if(apf_get_option('blog_grid_layout') == 'cameron'){ ?>
    <div class="blog_posts flex_container">
        <div class="story apf_blog_archive cameron_layout content cf">

            <?php

            if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php get_template_part('partials/blog/cameron_preview' ); ?>
            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound')?>
            <?php endif; ?>

            <?php get_template_part('partials/pagination'); ?>
        </div>
    </div>

<?php } else { ?>

    <div class="content_wrapper blog_posts flex_container <?php  echo esc_attr($sidebar_class); ?> cf">

        <?php if($apf_sidebar_position  !== 'no'){
            get_sidebar();
        } ?>

        <!-- Content -->
        <div class="story apf_blog_archive content cf">
            <?php
            //Columns Settings
            $apf_blog_columns = apf_get_option('default_blog_columns');
            $apf_columns_class = '';
            if($apf_blog_columns){
                $apf_columns_class = 'apf_blog_columns_'.$apf_blog_columns;
            }
            //Text Align Settings
            $apf_blog_text_align = apf_get_option('default_blog_text_align');
            $apf_text_align_class = '';
            if($apf_blog_text_align){
                $apf_text_align_class = 'apf_blog_text_align_'.$apf_blog_text_align;
            }
            //Grid type
            $blog_grid_type = 'blog_grid grid';
            if(apf_get_option('blog_grid_layout') == 'vintage'){
                $blog_grid_type = 'blog_grid vintage-grid';
            } else if(apf_get_option('blog_grid_layout') == 'furniture'){
                $blog_grid_type = 'blog_grid furniture-grid';
            } else if(apf_get_option('blog_grid_layout') == 'brigitte'){
                $blog_grid_type = 'blog_grid brigitte-grid';
            }

            $apf_title_for_heading = '';
            if(apf_get_option('page_heading_style') == 'parallax_three'){
                if(apf_get_option('archiveblogtitle')){ $apf_title_for_heading = apf_get_option('archiveblogtitle'); };
                echo '<h2 class="post_title blog_title">'.esc_attr($apf_title_for_heading).'</h2>';
            }
            ?>
            <div class="<?php echo esc_attr($blog_grid_type)." ".esc_attr($apf_columns_class)." ".esc_attr($apf_text_align_class); ?>">
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php
                    if(apf_get_option('blog_grid_layout') == 'vintage'){
                        get_template_part('partials/blog/vintage_preview' );
                    } elseif(apf_get_option('blog_grid_layout') == 'furniture'){
                        get_template_part('partials/blog/furniture_preview' );
                    } elseif(apf_get_option('blog_grid_layout') == 'brigitte'){
                        get_template_part('partials/blog/brigitte_preview' );
                    } elseif(apf_get_option('blog_grid_layout') == 'pixel'){
                        get_template_part('partials/blog/pixel_preview' );
                    } elseif(apf_get_option('blog_grid_layout') == 'jade'){
                        get_template_part('partials/blog/jade_preview' );
                    } else {
                        get_template_part('partials/postpreview' );
                    }?>
                <?php endwhile; else: ?>
                    <?php get_template_part('partials/notfound')?>
                <?php endif; ?>
            </div>
            <?php get_template_part('partials/pagination'); ?>
        </div>

    </div>
<?php } ?>
<?php get_footer(); ?>