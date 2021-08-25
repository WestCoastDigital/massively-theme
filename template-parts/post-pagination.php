<?php $args = array(
    'prev_text' => '<span class="meta-nav">&larr;</span> %title',
    'next_text' => '%title <span class="meta-nav">&rarr;</span>'
);
echo '<footer id="blog-pagination">';
the_post_navigation( $args );
echo '</footer>';