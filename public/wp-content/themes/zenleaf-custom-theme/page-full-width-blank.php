<?php

/**
 * Template Name: Full width blank
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();

?>
<div id="content">
<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        the_content();
    endwhile; 
endif; 
?>
</div>
<?php
get_footer();
?>