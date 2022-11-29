<?php

add_filter('get_search_form', function($form) {
    $value = get_search_query() ? get_search_query() : '';
    $form = '<form action="'.esc_url(home_url("/")).'" class="search-form input-group"><input name="s" class="form-control widget_input" value="'.esc_attr($value).'" placeholder="'.esc_attr__('Search', 'zix').'" type="search">
        <button type="submit"><i class="ti-search"></i></button>
    </form>';
    return $form;
}); ?>
