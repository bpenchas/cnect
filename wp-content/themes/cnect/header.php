<?php  

// require 'processing.php';

?>


<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Ubuntu:bold" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
        <?php wp_head(); ?>
    </head>
<body>
    <div class="titlewrap">
        <div class="titleholder">
            <?php
            if (is_home()) { ?>
                <video autoplay="true" loop="true" preload="auto" class='titleimage'>
                    <source src="<?php echo get_stylesheet_directory_uri() . '/images/cnect_page_slow.mp4'; ?>" type="video/mp4" />
                </video>
            <?php } elseif (is_category()){ ?>
                <img class="titleimage" src="<?php echo category_featured_image_URL(get_cat_ID(single_cat_title("", false))); ?>">
            <?php } ?>
            
        </div>
        <div id="overlay">
            <img src="<?php echo get_stylesheet_directory_uri() . '/images/cutout.png'; ?>" class="titleimage">
        </div>

        <span class="titlespan" style="float:left;">
        <?php wp_nav_menu(array(
            'theme_location' => 'main_navigation',
            'container' => 'span',
            'container_class' => 'centermenu',

        )); ?>
        </span>      

        <div id="lefttitlebox">
            <?php
                if (is_category()) {
                    echo '<h1 id="title">';
                    single_cat_title();
                    echo '</h1>';
                } else {
                    ?>
                    <h6>CENTRAL NETWORK OF</h6>
                    <h6>ENTREPRENEURIAL COLLEGIATE TEAMS</h6>
                    <h1 id="title">CNECT</h1>
            <?php
                }
            ?>
            
        </div>
        <div id="titlecaption">

            <?php if (!is_home()) { ?>

                <h5 class="caption"><?php echo category_subtitle($category_id); ?></h5>
                <h5 class="subcaption"><?php echo str_replace("\n", "<br />", category_tagline($category_id)); ?></h5>

            <?php } else { ?>

                <h5 class="caption">Welcome to CNECT</h5>
                <h5 class="subcaption">Engage in larger conversation about entrepreneurship with students all around the world.</h5>
            
            <?php } ?>

        </div>
    </div>
    <div class="toplabel toplabelstart">
        <div class="innerlabel">
            <h3 class="innertext">Connecting <span><a href="http://bases.stanford.edu/">BASES</a></span><span><a href="http://coreatcu.com/">CORE</a></span>
            <span><a href="http://www.nuisepic.com/">EPIC</a></span><span><a href="http://www.harvardventures.org/">Harvard Ventures</a></span>
            <span><a href="http://sparksc.org/">Spark SC</a></span><span><a href="http://whitman.syr.edu/programs-and-academics/academics/eee/index.aspx">Syracuse EEE Program </a></span></h3>
        </div>
    </div>
    
            