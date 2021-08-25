<?php if ( comments_open() && !post_password_required() ) {
    comments_template( '', true );
} ?>