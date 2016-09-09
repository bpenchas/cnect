<?php

function post_guest_author($post_ID = null) {
    if ($post_ID == null) $post_ID = get_the_ID();

    // Get the existing value from the database.
    $author = get_post_meta( $post_ID, 'guest_author', true );
    return empty( $author ) ? '' : $author;
}

class GuestAuthors {

    private static $initialized = false;
    private static $post_type = 'post';

    /**
     * Instantiate.
     *
     * All custom functionality will be hooked into the "init" action.
     *
     * @static
     * @access public
     * @since 3.2
     */
    public static function setup() {
        add_action( 'widgets_init', array( __CLASS__, 'init' ) );
    }
    
    /**
     * Initializes the plugin on every page load.
     */
    public static function init() {
        if ( ! self::$initialized ) {
            self::init_hooks();
        }
    }

    /**
     * Initializes WordPress hooks.
     */
    private static function init_hooks() {
        self::$initialized = true;

        add_action( 'add_meta_boxes_' . self::$post_type, array( __CLASS__, 'add_meta_boxes'      )        );
        add_action( 'save_post',                          array( __CLASS__, 'save_post'           ), 10, 3 );
    }

    /**
     * Add all extra meta boxes for this post type.
     */
    public static function add_meta_boxes() {
        add_meta_box( 'guest-author-meta-box', 'Author', array( __CLASS__, 'author' ), self::$post_type, 'side' );
    }

    /**
     * Output the author box.
     */
    public static function author( $post ) {

        wp_nonce_field( 'guest-author-nonce', 'guest-author-nonce');

        // Get the existing value from the database.
        $author = get_post_meta( $post->ID, 'guest_author', true );

        ?>

        <p>
            <em>Who wrote this post?</em>
        </p>
        <p>
            <label for="guest-author">Author Name</label><br />
            <input id="guest-author" name="guest-author" placeholder="John Doe" type="text" class="widefat" value="<?php echo empty( $author ) ? '' : $author; ?>" />
        </p>

        <?php
    }

    /**
     * Save post metadata when a post is saved.
     *
     * @param int $post_id The ID of the post.
     * @param post $post the post.
     */
    public static function save_post( $post_id, $post, $update ) {

        // Bail if we didn't come from the post editing screen.
        if ( ! wp_verify_nonce( $_POST[ 'guest-author-nonce' ], 'guest-author-nonce' ) )
            return;

        // Update the post's metadata.
        update_post_meta( $post_id, 'guest_author', $_POST[ 'guest-author'] );
        
    }

} // GuestAuthors

GuestAuthors::setup();