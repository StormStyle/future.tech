<?php

function mytheme_register_menus() {
    register_nav_menus([
        'primary' => __('Header Menu', 'header__menu'),
    ]);
}
add_action('after_setup_theme', 'mytheme_register_menus');


class Header_Menu_Walker extends Walker_Nav_Menu {

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Классы для <li>
        $classes = ['header__menu-item'];
        $class_names = implode(' ', $classes);

        $output .= '<li class="' . esc_attr($class_names) . '">';

        // Классы для <a>
        $link_classes = ['header__menu-link'];
        if (in_array('current-menu-item', $item->classes)) {
            $link_classes[] = 'is-active';
        }
        $link_class_names = implode(' ', $link_classes);

        // Атрибуты ссылки
        $attributes  = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $title       = apply_filters('the_title', $item->title, $item->ID);

        $output .= '<a' . $attributes . ' class="' . esc_attr($link_class_names) . '">';
        $output .= $title;
        $output .= '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }
}