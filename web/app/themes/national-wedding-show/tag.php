<?php get_header(); ?>

    <section>

        <h1>Tag Archive: <?php echo single_tag_title('', false); ?></h1>

        <?php get_template_part('components/loop'); ?>

        <?php get_template_part('components/pagination'); ?>

    </section>

<?php get_footer(); ?>
