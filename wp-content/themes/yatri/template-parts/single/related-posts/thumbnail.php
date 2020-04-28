<?php
if ('' !== get_the_post_thumbnail()) {
    ?>
    <figure class="feature-image">

        <a href="<?php the_permalink(); ?>">
            <?php

            $size = sanitize_text_field(yatri_get_option('blog_archive_page_thumbnail_size'));
            the_post_thumbnail($size);

            ?>
        </a>

    </figure>
    <?php
}
?>