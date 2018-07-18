<?php
global $post;
$page_slug=$post->post_name;
include "pages/{$page_slug}.php";