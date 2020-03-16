<?php
    $enable_ann = get_field( 'hp_enable_announcement', 'option' );
?>
<?php if ( $enable_ann ) : ?>
    <?php
        $title = get_field( 'hp_announcement_title', 'option' );
        $title_alignment = get_field( 'hp_announcement_title_alignment', 'option' );
        $message = get_field( 'hp_announcement_message', 'option' );
        $bg_color = get_field( 'hp_announcement_bg', 'option' );
        $text_color = get_field( 'hp_announcement_text', 'option' );
    ?>
    <div
        class="container-fluid container-covid"
        style="
        <?php
            echo $bg_color ? 'background-color:' . $bg_color . ';' : '';
            echo $text_color ? 'color:' . $text_color . ';' : '';
        ?>
        "
    >
        <section class="covid-info">
            <div class="container">
                <h3
                    class="covid-info__title info-banner__text"
                    style="
                    <?php
                        echo $title_alignment ? 'text-align:' . $title_alignment . ';' : 'left';
                        echo $text_color ? 'color:' . $text_color . ';' : '';
                    ?>"
                >
                    <?php echo $title; ?>
                </h3>
                <?php if ( $message ) : ?>
                    <p class="covid-info__message page-description">
                        <?php echo $message; ?>
                    </p>
                <?php endif; ?>
            </div>
        </section>
    </div>
<?php endif; ?>
