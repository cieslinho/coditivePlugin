<?php
function tax_calculator_cpt(){
    register_post_type('entries', [
        'labels' => ['Entries',
        'name' => 'Tax Entries',
        'singular_name' => 'Tax Entry',
        'menu_name' => 'Tax Form Data',
        'name_admin_bar' => 'Tax Calculator Entry',
        'add_new' => 'Add new','Tax Calculator Entry', 
        'add_new_item' => 'Add new Tax Calculator Entry', 
        'edit_item' => 'Edit Tax Calculator Entry', 
        'view_item' => 'View Tax Calculator Entry', 
        'all_items' => 'All Tax Calculator Entries', 
        'search_items' => 'Search Tax Calculator Entries', 
        'not_found' => 'No Tax Calculator Entries found', 
        'not_found_in_trash' => 'No Tax Calculator Eintries found in trash', 

        
    ],
    'public' => false,
    'has_archive' => false,
    'show_ui' => true,
    'supports' => ['title'],
'menu_position' => 2,
]);
}

add_action('init', 'tax_calculator_cpt');
