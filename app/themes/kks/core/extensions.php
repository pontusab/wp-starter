<?php
add_filter('terms_clauses', function($clauses, $taxonomy, $args) {
  if ( isset( $args['post_type'] ) && ! empty( $args['post_type'] ) && $args['fields'] !== 'count' ) {
    global $wpdb;

    $post_types = [];

    if ( is_array( $args['post_type'] ) ) {
      foreach ( $args['post_type'] as $cpt ) {
        $post_types[] = "'" . $cpt . "'";
      }
    } else {
      $post_types[] = "'" . $args['post_type'] . "'";
    }

    if ( ! empty( $post_types ) ) {
      $clauses['fields'] = 'DISTINCT ' . str_replace( 'tt.*', 'tt.term_taxonomy_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields'] ) . ', COUNT(p.post_type) AS count';
      $clauses['join'] .= ' LEFT JOIN ' . $wpdb->term_relationships . ' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id LEFT JOIN ' . $wpdb->posts . ' AS p ON p.ID = r.object_id';
      $clauses['where'] .= ' AND (p.post_type IN (' . implode( ',', $post_types ) . ') OR p.post_type IS NULL)';
      $clauses['orderby'] = 'GROUP BY t.term_id ' . $clauses['orderby'];
    }
  }

  return $clauses;
}, 10, 3);

// Enable previews for researchers
add_filter('posts_results', function($posts) {
  if (empty($posts)) return;

  if (!empty($_GET['preview'])) {
    if ($_GET['preview'] == true) {
      $post_id = $posts[0]->ID;
      $post_type = $posts[0]->post_type;
      $posts[0]->post_status = 'publish';
    }
  }

  return $posts;
}, 10, 2);

// add_filter('acf/validate_value/name=phone', function($valid, $value, $field, $input) {
//   if (!$valid) return $valid;
//
//   if ($value && empty($value)) {
//     $valid = 'Not a valid phonenumber';
//     return false;
//   }
//
//   return $valid;
// }, 10, 4);
