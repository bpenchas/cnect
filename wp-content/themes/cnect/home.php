<?php get_header(); ?>

    <div id="subbanner">
        <div class="columncontent" id="content-2">
            <p>CNECT is an online platform for student entrepreneur communities across the nation to share their events, newly found ideas, and opinions on relevant news, thereby creating a program to empower the next generation of college entrepreneurs.</p>
            <p>We hope to bring student-led entrepreneurship organizations into a conversation and ultimately create an information hub for anyone interested in learning more about thought leaders, student entrepreneurs and entrepreneurial opportunities for the upcoming generation.</p>
            <p>The Central Network of Entrepreneurial Collegiate Teams (CNECT) was founded by teams working out of Stanford University (BASES), Columbia University (CORE), Syracuse University, Harvard University, Northwestern University, and others.</p>
        </div>
    </div>
    <div id = 'scroll'>
    <?php

    if (have_posts()) {
        while (have_posts()) {
            the_post();

            ?>

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

        <?php    

        }
    }
?>
</div>
<?php
get_footer();

