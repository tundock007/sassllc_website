<?php
/**
 * Single Post Template
 */

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

<!-- Hero Section -->
<section class="hero" style="padding: 4rem 0; background: linear-gradient(135deg, #1a2942 0%, #2d4a6a 100%);">
    <div class="container" style="max-width: 900px;">
        <div style="margin-bottom: 1.5rem;">
            <a href="<?php echo home_url('/blog'); ?>" style="color: #3B82F6; text-decoration: none; font-weight: 500;">
                ← Back to Blog
            </a>
        </div>
        
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; color: #94A3B8; font-size: 0.9rem;">
            <span>📅 <?php echo get_the_date('M j, Y'); ?></span>
            <span>•</span>
            <span><?php echo get_the_category_list(', '); ?></span>
            <?php if (get_the_author()) : ?>
                <span>•</span>
                <span>By <?php the_author(); ?></span>
            <?php endif; ?>
        </div>
        
        <h1 style="color: white; font-size: 2.5rem; line-height: 1.2;"><?php the_title(); ?></h1>
    </div>
</section>

<!-- Featured Image -->
<?php if (has_post_thumbnail()) : ?>
<section style="padding: 0; margin-bottom: 3rem;">
    <div class="container" style="max-width: 1100px;">
        <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 8px 16px rgba(0,0,0,0.1);">
            <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; display: block;')); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Post Content -->
<section style="padding: 0 0 5rem;">
    <div class="container" style="max-width: 800px;">
        <article style="background: white; padding: 3rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
            <div class="post-content" style="line-height: 1.8; color: var(--text-color);">
                <?php the_content(); ?>
            </div>
            
            <?php if (has_tag()) : ?>
                <div style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid #F3F4F6;">
                    <strong style="color: var(--text-color); margin-right: 0.75rem;">Tags:</strong>
                    <?php
                    $tags = get_the_tags();
                    if ($tags) :
                        foreach ($tags as $tag) :
                    ?>
                        <a href="<?php echo get_tag_link($tag->term_id); ?>" 
                           style="display: inline-block; padding: 0.4rem 1rem; background: #F3F4F6; color: var(--text-color); text-decoration: none; border-radius: 20px; font-size: 0.85rem; margin: 0.25rem;"
                           onmouseover="this.style.background='var(--primary-color)'; this.style.color='white'"
                           onmouseout="this.style.background='#F3F4F6'; this.style.color='var(--text-color)'">
                            <?php echo $tag->name; ?>
                        </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            <?php endif; ?>
        </article>
        
        <!-- Author Bio -->
        <?php if (get_the_author_meta('description')) : ?>
        <div style="margin-top: 3rem; padding: 2rem; background: #F9FAFB; border-radius: 12px; border-left: 4px solid var(--primary-color);">
            <div style="display: flex; gap: 1.5rem; align-items: start;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 2rem; flex-shrink: 0;">
                    <?php echo strtoupper(substr(get_the_author(), 0, 1)); ?>
                </div>
                <div>
                    <h4 style="margin-bottom: 0.5rem; color: var(--text-color);">About <?php the_author(); ?></h4>
                    <p style="color: var(--text-light); line-height: 1.6; margin: 0;">
                        <?php echo get_the_author_meta('description'); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Navigation -->
        <div style="margin-top: 3rem; display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>
            
            <div>
                <?php if ($prev_post) : ?>
                    <a href="<?php echo get_permalink($prev_post->ID); ?>" 
                       style="display: block; padding: 1.5rem; background: white; border: 2px solid #E5E7EB; border-radius: 10px; text-decoration: none; transition: border-color 0.2s;"
                       onmouseover="this.style.borderColor='var(--primary-color)'" onmouseout="this.style.borderColor='#E5E7EB'">
                        <div style="color: var(--text-light); font-size: 0.85rem; margin-bottom: 0.5rem;">← Previous</div>
                        <div style="color: var(--text-color); font-weight: 600;"><?php echo get_the_title($prev_post->ID); ?></div>
                    </a>
                <?php endif; ?>
            </div>
            
            <div>
                <?php if ($next_post) : ?>
                    <a href="<?php echo get_permalink($next_post->ID); ?>" 
                       style="display: block; padding: 1.5rem; background: white; border: 2px solid #E5E7EB; border-radius: 10px; text-decoration: none; text-align: right; transition: border-color 0.2s;"
                       onmouseover="this.style.borderColor='var(--primary-color)'" onmouseout="this.style.borderColor='#E5E7EB'">
                        <div style="color: var(--text-light); font-size: 0.85rem; margin-bottom: 0.5rem;">Next →</div>
                        <div style="color: var(--text-color); font-weight: 600;"><?php echo get_the_title($next_post->ID); ?></div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

<!-- CTA Section -->
<section style="padding: 4rem 0; background: linear-gradient(135deg, #1a2942 0%, #2d4a6a 100%);">
    <div class="container" style="text-align: center;">
        <h2 style="color: white; margin-bottom: 1rem;">Need Professional Help?</h2>
        <p style="color: #E2E8F0; max-width: 600px; margin: 0 auto 2rem;">
            Get expert accounting, tax preparation, and IRS resolution services tailored to your needs.
        </p>
        <a href="<?php echo home_url('/contact'); ?>" class="btn" style="background: #3B82F6; border-color: #3B82F6;">
            Get Free Consultation
        </a>
    </div>
</section>

<style>
.post-content h2,
.post-content h3,
.post-content h4 {
    color: var(--text-color);
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.post-content h2 {
    font-size: 1.875rem;
    border-bottom: 2px solid #F3F4F6;
    padding-bottom: 0.5rem;
}

.post-content h3 {
    font-size: 1.5rem;
}

.post-content h4 {
    font-size: 1.25rem;
}

.post-content p {
    margin-bottom: 1.25rem;
}

.post-content ul,
.post-content ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.post-content li {
    margin-bottom: 0.75rem;
    line-height: 1.8;
}

.post-content a {
    color: var(--primary-color);
    text-decoration: underline;
}

.post-content blockquote {
    margin: 2rem 0;
    padding: 1.5rem 2rem;
    background: #F9FAFB;
    border-left: 4px solid var(--primary-color);
    font-style: italic;
    color: #4B5563;
}

.post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 2rem 0;
}

.post-content code {
    background: #F3F4F6;
    padding: 0.2rem 0.5rem;
    border-radius: 4px;
    font-family: 'Courier New', monospace;
    font-size: 0.9em;
}

.post-content pre {
    background: #1F2937;
    color: #F9FAFB;
    padding: 1.5rem;
    border-radius: 8px;
    overflow-x: auto;
    margin: 2rem 0;
}

.post-content pre code {
    background: none;
    padding: 0;
    color: inherit;
}
</style>

<?php get_footer(); ?>
