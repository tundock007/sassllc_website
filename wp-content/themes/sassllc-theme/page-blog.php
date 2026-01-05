<?php
/**
 * Template Name: Blog Page
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero" style="padding: 4rem 0; background: linear-gradient(135deg, #1a2942 0%, #2d4a6a 100%);">
    <div class="container">
        <h1 style="color: white;">Insights & Updates</h1>
        <p style="color: #E2E8F0;">Expert financial advice, tax tips, and industry insights to help your business thrive.</p>
    </div>
</section>

<!-- Blog Posts Section -->
<section style="padding: 5rem 0;">
    <div class="container">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $blog_query = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 9,
            'paged' => $paged,
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ($blog_query->have_posts()) :
        ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2.5rem;">
                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <article style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;" 
                             onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.15)'"
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)'">
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div style="height: 200px; overflow: hidden; background: #F3F4F6;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                                </a>
                            </div>
                        <?php else : ?>
                            <div style="height: 200px; background: linear-gradient(135deg, #1a2942, #2d4a6a); display: flex; align-items: center; justify-content: center;">
                                <span style="font-size: 3rem; color: rgba(255,255,255,0.3);">📝</span>
                            </div>
                        <?php endif; ?>
                        
                        <div style="padding: 1.75rem;">
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; color: #6B7280; font-size: 0.875rem;">
                                <span>📅 <?php echo get_the_date('M j, Y'); ?></span>
                                <span>•</span>
                                <span><?php echo get_the_category_list(', '); ?></span>
                            </div>
                            
                            <h3 style="margin-bottom: 0.75rem; font-size: 1.25rem; line-height: 1.4;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--text-color); text-decoration: none; transition: color 0.2s;"
                                   onmouseover="this.style.color='var(--primary-color)'" onmouseout="this.style.color='var(--text-color)'">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            
                            <p style="color: #6B7280; line-height: 1.6; margin-bottom: 1.25rem; font-size: 0.9rem;">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                            
                            <a href="<?php the_permalink(); ?>" class="btn" style="display: inline-block; padding: 0.6rem 1.25rem; font-size: 0.9rem;">
                                Read More →
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <?php if ($blog_query->max_num_pages > 1) : ?>
                <div style="margin-top: 4rem; display: flex; justify-content: center; gap: 0.5rem;">
                    <?php
                    echo paginate_links(array(
                        'total' => $blog_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                        'type' => 'list',
                        'before_page_number' => '<span style="display: inline-block; padding: 0.5rem 1rem; background: white; border: 2px solid #E5E7EB; border-radius: 6px; color: var(--text-color); transition: all 0.2s;">',
                        'after_page_number' => '</span>'
                    ));
                    ?>
                </div>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <div style="text-align: center; padding: 4rem 2rem;">
                <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.5;">📝</div>
                <h2 style="margin-bottom: 1rem; color: var(--text-color);">No Posts Yet</h2>
                <p style="color: var(--text-light); max-width: 500px; margin: 0 auto;">
                    We're working on creating valuable content for you. Check back soon for expert financial advice, tax tips, and business insights!
                </p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Submit Guest Post Section -->
<section style="padding: 4rem 0; background: linear-gradient(135deg, #F9FAFB 0%, #F3F4F6 100%);">
    <div class="container">
        <div style="max-width: 700px; margin: 0 auto; background: white; padding: 2.5rem; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.08);">
            <div style="text-align: center; margin-bottom: 2rem;">
                <h2 style="margin-bottom: 0.5rem; font-size: 1.75rem;">Submit a Guest Post</h2>
                <p style="color: #6B7280; font-size: 0.9rem; margin: 0;">Share your expertise and insights with our community</p>
            </div>
            
            <?php
            $post_submitted = false;
            $post_errors = array();
            
            if (isset($_GET['post']) && $_GET['post'] === 'submitted') {
                $post_submitted = true;
            }
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_post'])) {
                // Verify nonce
                if (!isset($_POST['post_nonce']) || !wp_verify_nonce($_POST['post_nonce'], 'submit_post_action')) {
                    $post_errors[] = 'Security verification failed. Please try again.';
                } else {
                    // Sanitize inputs
                    $post_title = sanitize_text_field($_POST['post_title'] ?? '');
                    $post_author_name = sanitize_text_field($_POST['post_author_name'] ?? '');
                    $post_author_email = sanitize_email($_POST['post_author_email'] ?? '');
                    $post_category = intval($_POST['post_category'] ?? 0);
                    $post_content = wp_kses_post($_POST['post_content'] ?? '');
                    $honeypot = $_POST['website_url_post'] ?? '';
                    
                    // Validate
                    if (empty($post_title)) {
                        $post_errors[] = 'Title is required.';
                    }
                    if (empty($post_author_name)) {
                        $post_errors[] = 'Author name is required.';
                    }
                    if (empty($post_author_email) || !is_email($post_author_email)) {
                        $post_errors[] = 'Valid email is required.';
                    }
                    if (empty($post_content)) {
                        $post_errors[] = 'Content is required.';
                    }
                    if (str_word_count($post_content) < 100) {
                        $post_errors[] = 'Content must be at least 100 words.';
                    }
                    
                    // Anti-spam: Check honeypot
                    if (!empty($honeypot)) {
                        wp_redirect(add_query_arg('post', 'submitted', get_permalink()));
                        exit;
                    }
                    
                    // If no errors, create post
                    if (empty($post_errors)) {
                        $new_post_id = wp_insert_post(array(
                            'post_title' => $post_title,
                            'post_content' => $post_content,
                            'post_type' => 'post',
                            'post_status' => 'pending', // Requires admin approval
                            'post_category' => $post_category > 0 ? array($post_category) : array(),
                            'meta_input' => array(
                                '_guest_author_name' => $post_author_name,
                                '_guest_author_email' => $post_author_email
                            )
                        ));
                        
                        if ($new_post_id) {
                            wp_redirect(add_query_arg('post', 'submitted', get_permalink()));
                            exit;
                        } else {
                            $post_errors[] = 'Failed to submit post. Please try again.';
                        }
                    }
                }
            }
            ?>
            
            <?php if ($post_submitted) : ?>
                <div style="background: linear-gradient(135deg, #D1FAE5, #A7F3D0); color: #065F46; padding: 1.5rem; border-radius: 12px; text-align: center; box-shadow: 0 4px 12px rgba(16,185,129,0.2);">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">✓</div>
                    <strong style="font-size: 1.1rem;">Thank you for your submission!</strong>
                    <p style="margin: 0.5rem 0 0; font-size: 0.9rem; opacity: 0.9;">Your guest post will be reviewed and published after approval</p>
                </div>
            <?php else : ?>
                <?php if (!empty($post_errors)) : ?>
                    <div style="background: #FEE2E2; color: #991B1B; padding: 1rem; border-radius: 10px; margin-bottom: 1.25rem; border-left: 4px solid #DC2626; font-size: 0.9rem;">
                        <ul style="margin: 0; padding-left: 1.25rem;">
                            <?php foreach ($post_errors as $error) : ?>
                                <li><?php echo esc_html($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="" style="display: grid; gap: 1.25rem;">
                    <?php wp_nonce_field('submit_post_action', 'post_nonce'); ?>
                    
                    <!-- Honeypot field -->
                    <input type="text" name="website_url_post" style="display: none;" tabindex="-1" autocomplete="off">
                    
                    <!-- Title -->
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: #374151;">Post Title *</label>
                        <input type="text" name="post_title" required 
                               placeholder="Enter a compelling title"
                               style="width: 100%; padding: 0.7rem; border: 2px solid #E5E7EB; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.2s;"
                               onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#E5E7EB'"
                               value="<?php echo isset($_POST['post_title']) ? esc_attr($_POST['post_title']) : ''; ?>">
                    </div>
                    
                    <!-- Name and Email Grid -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: #374151;">Your Name *</label>
                            <input type="text" name="post_author_name" required 
                                   style="width: 100%; padding: 0.7rem; border: 2px solid #E5E7EB; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.2s;"
                                   onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#E5E7EB'"
                                   value="<?php echo isset($_POST['post_author_name']) ? esc_attr($_POST['post_author_name']) : ''; ?>">
                        </div>
                        
                        <div>
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: #374151;">Your Email *</label>
                            <input type="email" name="post_author_email" required 
                                   style="width: 100%; padding: 0.7rem; border: 2px solid #E5E7EB; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.2s;"
                                   onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#E5E7EB'"
                                   value="<?php echo isset($_POST['post_author_email']) ? esc_attr($_POST['post_author_email']) : ''; ?>">
                        </div>
                    </div>
                    
                    <!-- Category -->
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: #374151;">
                            Category <span style="font-weight: 400; color: #9CA3AF; font-size: 0.85rem;">(Optional)</span>
                        </label>
                        <select name="post_category" 
                                style="width: 100%; padding: 0.7rem; border: 2px solid #E5E7EB; border-radius: 8px; font-size: 0.95rem; transition: border-color 0.2s; background: white;"
                                onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#E5E7EB'">
                            <option value="0">Select a category</option>
                            <?php
                            $categories = get_categories(array('hide_empty' => false));
                            foreach ($categories as $category) :
                                $selected = (isset($_POST['post_category']) && $_POST['post_category'] == $category->term_id) ? 'selected' : '';
                            ?>
                                <option value="<?php echo $category->term_id; ?>" <?php echo $selected; ?>><?php echo $category->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <!-- Content -->
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: #374151;">Post Content * <span style="font-weight: 400; color: #9CA3AF; font-size: 0.85rem;">(Minimum 100 words)</span></label>
                        <textarea name="post_content" required rows="12"
                                  style="width: 100%; padding: 0.7rem; border: 2px solid #E5E7EB; border-radius: 8px; font-size: 0.95rem; resize: vertical; transition: border-color 0.2s; font-family: inherit; line-height: 1.6;"
                                  onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#E5E7EB'"
                                  placeholder="Write your blog post content here. Share your insights, tips, or expertise..."><?php echo isset($_POST['post_content']) ? esc_textarea($_POST['post_content']) : ''; ?></textarea>
                        <p style="color: #9CA3AF; font-size: 0.8rem; margin: 0.5rem 0 0;">You can use basic HTML formatting (paragraphs, headings, lists, bold, italic, links).</p>
                    </div>
                    
                    <button type="submit" name="submit_post" class="btn" 
                            style="width: 100%; padding: 0.9rem; font-size: 1rem; font-weight: 600; border-radius: 8px; transition: transform 0.2s, box-shadow 0.2s;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.15)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow=''">
                        Submit Guest Post
                    </button>
                    
                    <p style="text-align: center; color: #9CA3AF; font-size: 0.8rem; margin: -0.5rem 0 0;">
                        🔒 Your post will be reviewed before being published
                    </p>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Newsletter Signup -->
<section style="padding: 4rem 0; background: linear-gradient(135deg, #1a2942 0%, #2d4a6a 100%);">
    <div class="container" style="text-align: center;">
        <h2 style="color: white; margin-bottom: 1rem;">Stay Informed</h2>
        <p style="color: #E2E8F0; max-width: 600px; margin: 0 auto 2rem;">
            Get the latest financial tips, tax updates, and business insights delivered to your inbox.
        </p>
        <div style="max-width: 500px; margin: 0 auto; display: flex; gap: 0.75rem;">
            <input type="email" placeholder="Enter your email" 
                   style="flex: 1; padding: 0.9rem 1.25rem; border: 2px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.1); color: white; border-radius: 8px; font-size: 1rem;"
                   onfocus="this.style.borderColor='#3B82F6'; this.style.background='rgba(255,255,255,0.15)'"
                   onblur="this.style.borderColor='rgba(255,255,255,0.2)'; this.style.background='rgba(255,255,255,0.1)'">
            <button class="btn" style="background: #3B82F6; border-color: #3B82F6; padding: 0.9rem 1.75rem; white-space: nowrap;">
                Subscribe
            </button>
        </div>
        <p style="color: #94A3B8; font-size: 0.8rem; margin-top: 1rem;">
            🔒 We respect your privacy. Unsubscribe at any time.
        </p>
    </div>
</section>

<?php get_footer(); ?>
