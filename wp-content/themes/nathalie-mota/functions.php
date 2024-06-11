// Register Custom API Routes
function nathalie_mota_register_api_routes() {
    register_rest_route('nathalie-mota/v1', '/photos', array(
        'methods' => 'GET',
        'callback' => 'nathalie_mota_get_photos',
        'permission_callback' => '__return_true'
    ));
}
add_action('rest_api_init', 'nathalie_mota_register_api_routes');

function nathalie_mota_get_photos($data) {
    $paged = isset($data['page']) ? $data['page'] : 1;
    $category = isset($data['category']) ? $data['category'] : '';
    $format = isset($data['format']) ? $data['format'] : '';
    $order = isset($data['sort']) ? $data['sort'] : 'desc';

    $args = array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => 8,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => $order,
    );

    if ($category) {
        $args['category_name'] = $category;
    }

    if ($format) {
        $args['meta_query'] = array(
            array(
                'key' => 'format',
                'value' => $format,
                'compare' => '='
            )
        );
    }

    $query = new WP_Query($args);
    $photos = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $photos[] = array(
                'title' => get_the_title(),
                'source_url' => wp_get_attachment_url(get_the_ID())
            );
        }
    }

    wp_reset_postdata();
    return $photos;
}

