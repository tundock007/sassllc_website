<?php
/**
 * Default Index Template
 */

get_header();
?>

<section style="padding: 5rem 0;">
    <div class="container">
        <h1>Latest Posts</h1>
        
        <?php if (have_posts()) : ?>
            <div class="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card" style="background: var(--background-alt); padding: 2rem; border-radius: 12px;">
                        <h2 style="font-size: 1.5rem;">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p style="color: var(--text-light); font-size: 0.875rem; margin-bottom: 1rem;">
                            <?php echo get_the_date(); ?>
                        </p>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="padding: 0.5rem 1rem;">Read More</a>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
