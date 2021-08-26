<?php
    $completed_date = get_field('completed_date');
    $project_manager = get_field('project_manager');
    $gallery = get_field('gallery');
    $categories = get_the_terms(get_the_ID(), 'port_cat');
    $tags = get_the_terms(get_the_ID(), 'port_tag');
?>
<div class="container <?php if( $gallery ) { echo 'flex'; } ?>">

    <?php if( $gallery ) { ?>
        <div class="gallery" id="gallery" style="display:none;">
            <?php foreach( $gallery as $image ) { ?>
                <img alt="<?php echo esc_attr($image['alt']); ?>" src="<?php echo esc_url($image['sizes']['port-gallery']); ?>" data-image="<?php echo esc_url($image['url']); ?>" data-description="<?php the_title(); ?>">    
            <?php } ?>
        </div>
    <?php } ?>

    <div class="content">
        <?php if(has_excerpt()) { ?>
            <p><?php the_excerpt(); ?></p>
        <?php } ?>
        <?php if($completed_date || $project_manager || $categories || $tags) { ?>
            <table>
                <?php if($completed_date) { ?>
                    <tr>
                        <th><?php echo __('Date', 'wcd'); ?></th>
                        <td><?php echo $completed_date; ?></td>
                    </tr>
                <?php } ?>
                <?php if($project_manager) { ?>
                    <tr>
                        <th><?php echo __('Project Manager', 'wcd'); ?></th>
                        <td><?php echo $project_manager['display_name']; ?></td>
                    </tr>
                <?php } ?>
                    <?php if($categories) { ?>
                    <tr>
                        <th><?php echo __('Categories', 'wcd'); ?></th>
                        <td><?php echo wcd_portfolio_taxonomy('port_cat') ?></td>
                    </tr>
                <?php } ?>
                    <?php if($tags) { ?>
                        <tr>
                            <th><?php echo __('Tags', 'wcd'); ?></th>
                            <td><?php echo wcd_portfolio_taxonomy('port_tag') ?></td>
                        </tr>
                    <?php } ?>
            </table>
        <?php } ?>
            <?php if( have_rows('timeline') ) { ?>
            <ul class="timeline">
                <?php  while( have_rows('timeline') ) : the_row(); ?>
                <li class="timeline-item" data-date="<?php echo get_sub_field('date'); ?>">
                    <p class="title"><?php echo get_sub_field('title'); ?><p>
                    <p class="desc"><?php echo get_sub_field('description'); ?><p>
                </li>
                <?php endwhile; ?>
            </ul>
        <?php } ?>
    </div>
</div>