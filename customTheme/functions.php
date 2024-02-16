<?php get_header(); ?>
<!-- Post -->
<article class="box post post-excerpt">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <header>
                <h2><a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a></h2>
                <?php if (has_excerpt()): ?>
                    <p>
                        <?php echo get_the_excerpt(); ?>
                    </p>
                <?php endif; ?>
            </header>
            <div class="info">
                <span class="date">
                    <?php echo get_the_date(); ?>
                </span>
                <ul class="stats">
                    <li><a href="#" class="icon fa-comment">
                            <?php comments_number('0', '1', '%'); ?>
                        </a></li>
                    <!-- Add more stats if needed -->
                </ul>
            </div>
            <a href="<?php the_permalink(); ?>" class="image featured">
                <?php the_post_thumbnail(); ?>
            </a>
            <div>
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
</article>
<!-- Pagination -->
<div class="pagination">
    <?php echo paginate_links(); ?>
</div>
<?php get_footer(); ?>

<?php function register_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu'),
            'footer-menu' => __('Footer Menu'),
            'sidebar-menu' => __('Sidebar Menu'),
        )
    );
}