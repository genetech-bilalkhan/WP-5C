<?php

function register_scripts(){
  wp_enqueue_style('custom-style', get_stylesheet_uri());
}
add_action('Custom-style', register_scripts());

?>