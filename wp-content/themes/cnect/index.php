<?php get_header(); ?>
    
    
    </div>
    </div>
<?php
if (have_posts()) {

    while (have_posts()) { 

        the_post();
        ?>
        <div id="postcontainer">

            <div id="post" <?php post_class(); ?>>
                <header class="articleheader">
                    <span class="leftupper red"><?php the_tags(); ?></span>
                    <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;" }>
                    <h2><?php the_title(); ?></h2>
                    </a>
                </header>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('thumbnail');
                } ?>
                <div class="postbody">
                    <?php the_content(); ?>
                </div>
            </div>

        </div>
        <?php
$withcomments = "1";
?>
    <?php
    }

}

get_footer();