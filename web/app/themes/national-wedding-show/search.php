<?php get_header(); ?>

    <section>

        <h1><?php echo sprintf( '%s Search Results for ', $wp_query->found_posts ); echo get_search_query(); ?></h1>

        <?php get_template_part('components/loop'); ?>

        <?php get_template_part('components/pagination'); ?>

    </section>

<?php get_footer(); ?>
