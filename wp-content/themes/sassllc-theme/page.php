<?php
/**
 * Default Page Template
 */

get_header();
?>

<section style="padding: 5rem 0;">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
