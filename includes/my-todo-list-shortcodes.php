<?php
// List todo
function mtl_list_todos($atts, $content = null)
{
    global $post;
    // Create attribute and set defults
    $atts = shortcode_atts(array(
        'title' => 'My Todos',
        'count' => 10,
        'category' => 'all'
    ));

    // check category attributs
    if($atts['category']  == "all")
    {
        $terms = '';
    }
    else
    {
        $terms =  array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }

    // Quert Argument
    $args = array(
        'post_type'     => 'todo',
        'post_status'   => 'publish',
        'orderby'       => 'due_date',
        'order'         => 'ASC',
        'posts_per_page'=> $atts['count'],
        'tax_query'     => $terms
    );

    // Fetch  Todos
    $todos = WP_Query($args);
    if($todos ->have_posts())
    {
        // get categories slug
        $category = str_replace('-', '', $atts['category']);
        $category = strtolower($category);

        // Init output
        $output .= '<div class = "todo-list">';
        while($todos->have_posts())
        {
            $todos->the_post();

            // get filed values
            $priority = get_post_meta(get_the_ID(), 'priority', true);
            $details = get_post_meta(get_the_ID(), 'details', true);
            $due_data = get_post_meta(get_the_ID(), 'due_data', true);

            $output .= '<div class="todo">';
            $output .= '<h4>'.get_the_title().'</h4>';
            $output .= '<div>'.$details.'</div>';
            $output .= '<div class ="priority-'.strtolower($priority).'">Priority:'.$priority.'</div>';
            $output .= '<div class ="due_data-'.strtolower($due_data).'">Due Data:'.$due_data.'</div>';
            $output .= '</div>';
        }
        $output .= '</div>';

        // Reset Post Data
        wp_reset_postdata();

        return $output;
    }
    else
    {
        return '<p>No Todos</p>';
    }
}
// Todo List Shortcode
add_shortcode('todo', 'mtl_list_todos');
?>