<?php the_post(); ?>

<div class="wrap articlesum">
<a href="<?php the_permalink(); ?>#postcontainer">
    <div class="imageholder">
        <?php the_post_thumbnail('thumbnail', array(
            'class' => 'articleimage'
            )); ?>
    </div>
    <div class="textover">
        <h2 class="articletitle"><?php echo get_the_category()[0]->cat_name; ?></h2>
        <h3 class="articlesubtitle"><?php the_title(); ?></h3>
    </div>
</a>
</div>