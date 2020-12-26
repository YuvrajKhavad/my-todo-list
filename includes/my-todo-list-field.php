<?php 
function mtl_add_field_metabox()
{
    add_meta_box(
        'mtl_todo_fields',
        __('Todo Fields') , 
        'mtl_todo_fields_callback', 
        'todo', 
        'normal', 
        'default'
    );
}
add_action( 'add_meta_boxes', 'mtl_add_field_metabox' );

// Display Field Metaboxe callback
function mtl_todo_fields_callback($post)
{
    wp_nonce_field( basename(__FILE__), 'wp_todos_nonce' );
    $mtl_todo_stored_meta = get_post_meta($post->ID);
    ?>
    <div class = "wrap todo-form">
        <div class = "form-group">
            <lable for = "priority"><?php esc_html_e( 'Priority' , 'mtl_domain')?></lable>
            <?php
                $priority = array('Low', 'Normal', 'High'); 
                echo "<pre>";
                print_r($priority);
                echo "</pre>";
            ?>
            <select name = "priority" id = "priority">
            
            <?php
                foreach ($priority as $key => $value) {
                    echo $key. "--";
                    echo $value;
                    # code...
                    echo '11-';
                }
                foreach($option_values as $value)
                {
                    echo $value;
                    //$selected = ($value = $mtl_todo_stored_meta['priority'][0])?' selected':'';
                    ?>
                    <?php

                }
            ?>
            </select>
        </div>
    </div>
    <?php
}

?>