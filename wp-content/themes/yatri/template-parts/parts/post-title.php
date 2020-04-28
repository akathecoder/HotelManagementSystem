<header class="post-title yatri-content-item">
    <?php

    $entry_title_tag = 'h2';

    if (is_single() && !is_page()) {

        $yatri_heading_tags = array_keys(yatri_heading_tags());

        $heading_tag = yatri_get_option('single_post_heading_tag');

        if (in_array($heading_tag, $yatri_heading_tags)) {

            $entry_title_tag = $heading_tag;
        }
    }

    echo '<' . esc_attr($entry_title_tag) . ' class="entry-title">';

    if (!is_singular()) {

        echo '<a href="' . esc_url(get_the_permalink()) . '">';
    }


    echo get_the_title();

    if (!is_singular()) {
        echo '</a>';
    }

    echo '</' . esc_attr($entry_title_tag) . '>';


    ?>
</header>