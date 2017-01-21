<?php

namespace Core;

class Walker extends \Walker_Page {
  public function start_el(&$output, $page, $depth = 0, $args = [], $current_page = 0) {
    extract($args, EXTR_SKIP);
    $currentPage = get_post($current_page);
    $class = [];

    if (
      $page->ID == $current_page ||
      $currentPage && in_array( $page->ID, $currentPage->ancestors) ||
      is_singular('calls') && Frontend::get_id_by_template('calls') == $page->ID
    ) {
      $class[] = 'selected';
    }


    if (!$args['depth'] && $page->post_parent) return false;

    $class = implode(' ', $class);
    $class = $class ? ' class="' . esc_attr( $class ) . '"' : '';

    $output .= '<li '.( $class ).'>';
    $output .= '<a href="'. get_permalink( $page->ID ) .'">'. apply_filters( 'the_title', $page->post_title, $page->ID ) .'</a>';
  }

  public function end_el(&$output, $page, $depth = 0, $args = [], $current_page = 0) {
    $output .= '</li>';
  }
}


class SubWalker extends \Walker_Page {
  public function start_lvl(&$output, $depth = 0, $args = []) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }


  public function start_el(&$output, $page, $depth = 0, $args = [], $current_page = 0) {
    extract( $args, EXTR_SKIP );
    $page_object = get_post( $current_page );
    $class = [];

    if ($depth) {
      $indent = str_repeat("\t", $depth);
    } else {
      $indent = '';
    }


    if ($page->ID == $current_page) {
      $class[] = 'selected';
    } else if (in_array($page->ID, $page_object->ancestors) && $args['has_children']) {
      $class[] = 'selected';
    } else if (is_singular('post') && Frontend::get_id_by_template('news') == $page->ID) {
      $class[] = 'selected';
    }

    if ($args['has_children']) {
     $class[] = 'parent';
    }

    $class = implode(' ', $class);
    $class = $class ? ' class="' . esc_attr( $class ) . '"' : '';

    $output .= $indent . '<li'. $class .'>';
    $output .= '<a href="'. get_permalink( $page->ID ) .'">'. apply_filters( 'the_title', $page->post_title, $page->ID ) .'</a>';
  }


  public function end_lvl(&$output, $depth = 0, $args = []) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }
}
