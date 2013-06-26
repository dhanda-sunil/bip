<?php
/*
Plugin Name: Guest Posts
Plugin URI: 
Description: Give an opportunity to your unregistered readers to post on your Blog.
Version: 1.1.1
Author: ericgrld
Author URI: 
Requires at least: 3.0
Tested Up to: 3.5
Stable Tag: 1.1.1
License: GPL v2
*/



function guestposts_shortcode( $atts ) {
    extract ( shortcode_atts (array(
        'cat' => '1',
        'author' => '1',
        'thanks' => get_bloginfo('home'),
    ), $atts ) );

    return '<form class="guests-post" action="'. plugin_dir_url("guest-posts.php") .'guest-posts/guest-posts-submit.php" method="post">
        <strong>' . __('Post Title:', 'guest-posts') . '</strong><br>
            <input type="text" name="title" size="60" required="required" placeholder="' . __('Post title here', 'guest-posts') . '"><br>
        <strong>' . __('Story', 'guest-posts') . '</strong>
        '. wp_nonce_field() .'
            <textarea rows="15" cols="72" required="required" name="story" placeholder="' . __('Start writing your post here', 'guest-posts') . '"></textarea><br>
        <strong>' . __('Tags', 'guest-posts') . '</strong><br>
            <input type="text" name="tags" size="60" placeholder="' . __('Comma Separated Tags', 'guest-posts') . '"><br><br>
        <strong>' . __('Your Name', 'guest-posts') . '</strong><br>
            <input type="text" name="author" size="60" required="required" placeholder="' . __('Your name here', 'guest-posts') . '"><br>
        <strong>' . __('Your Email', 'guest-posts') . '</strong><br>
            <input type="email" name="email" size="60" required="required" placeholder="' . __('Your Email Here', 'guest-posts') . '"><br>
        <strong>' . __('Your Website', 'guest-posts') . '</strong><br>
            <input type="text" name="site" size="60" placeholder="' . __('Your Website Here', 'guest-posts') . '"><br><br><br>
        <input type="hidden" value="'. $cat .'" name="category"><input type="hidden" value="'. $author .'" name="authorid">
        <input type="hidden" value="'. $thanks .'" name="thanks">
        <input type="hidden" value="'. str_replace('/wp-content/themes', '', get_theme_root()) .'/wp-blog-header.php" name="rootpath">
        <input type="submit" value="' . __('Submit The Post', 'guest-posts') . '"> <input type="reset" value="' . __('Reset', 'guest-posts') . '"><br>
        </form>
        ';
    }
add_shortcode( 'guest-posts', 'guestposts_shortcode' );

?>
