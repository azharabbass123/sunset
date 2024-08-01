<?php

/*
@package sunsettheme

========================
    WALKER NAV CLASS
========================
*/

class Sunset_Walker_Nav_Primary extends Walker_Nav_menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    { //ul
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    { //li a span

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        // Ensure $args is an object and has the necessary properties
        $walker_has_children = isset($args->walker) && isset($args->walker->has_children) ? $args->walker->has_children : false;

        $classes[] = $walker_has_children ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if ($depth && $walker_has_children) {
            $classes[] = 'dropdown-submenu';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $attributes .= $walker_has_children ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

        // Check for the existence of properties before accessing them
        $before = isset($args->before) ? $args->before : '';
        $link_before = isset($args->link_before) ? $args->link_before : '';
        $link_after = isset($args->link_after) ? $args->link_after : '';
        $after = isset($args->after) ? $args->after : '';

        $item_output = $before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $link_before . apply_filters('the_title', $item->title, $item->ID) . $link_after;
        $item_output .= ($depth == 0 && $walker_has_children) ? ' <b class="caret"></b></a>' : '</a>';
        $item_output .= $after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
