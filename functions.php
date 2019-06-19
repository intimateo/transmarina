<?php 

add_theme_support('post-thumbnails' );
add_image_size('news-size',560,290,true);
function register_my_menus(){
	register_nav_menus( 
		array(
				'menu-header' => __('Menú Principal'),
				'menu-footer' => __('Menú Footer'),
				'menu-productos' => __('Productos'),
				'menu-left' => __('Menú Left')
			)
	);
}
add_action('init', 'register_my_menus' );

function plugin_certifications(){
	register_sidebar(
		array(
			'id' => 'certifications',
			'name' => 'Certifications',
			'description' => 'HTML para certificaciones',
			'before_widget' => '<div class="widgetitem">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="title">',
			'after_title' => '</h1>'
		)
	);
}
add_action('widgets_init','plugin_certifications' );


if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}
add_action('init', 'post_is_in_descendant_category' );

// Use a parent category slug if it exists
function pu_parent_category_hierarchy()
{
    $category = get_queried_object();
    $templates = array();

    // Add default category template files
    $templates[] = "category-{$category->slug}.php";
    $templates[] = "category-{$category->term_id}.php";

    if ( $category->category_parent != 0 )
    {
        $parent = get_category( $category->category_parent );

        if(!empty($parent))
        {
            $templates[] = "category-{$parent->slug}.php";
            $templates[] = "category-{$parent->term_id}.php";
        }
    }

    $templates[] = 'category.php';

    return locate_template( $templates );
}
add_filter( 'category_template', 'pu_parent_category_hierarchy' );



class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="#'   . esc_attr( $item->attr_title ) .'"' : '';

           $prepend = '';
           $append = '';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}


function custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
 
    ?>
        <div>
        	<table>
        		<thead>
        			<tr>
        				<th class="left"><label for="metakeyinput">Name</label></th>
						<th><label for="metavalue">Value</label></th>
        			</tr>
        			<tr>
        				<td>
        					<label for="meta-box-address">Address</label>
        				</td>
        				<td>
        					<textarea name="meta-box-address"><?php echo get_post_meta($object->ID, "meta-box-address", true); ?></textarea>
        				</td>
        			</tr>
        			<tr>
        				<td><label for="meta-box-phone">Phones</label></td>
        				<td><textarea name="meta-box-phone"><?php echo get_post_meta($object->ID, "meta-box-phone", true); ?></textarea></td>
        			</tr>
        			<tr>
        				<td><label for="meta-box-service">Customer Service</label></td>
        				<td><textarea name="meta-box-service"><?php echo get_post_meta($object->ID, "meta-box-service", true); ?></textarea></td>
        			</tr>
        			<tr>
        				<td><label for="meta-box-sales">Contact Sales</label></td>
        				<td><textarea name="meta-box-sales"><?php echo get_post_meta($object->ID, "meta-box-sales", true); ?></textarea></td>
        			</tr>
        			<tr>
        				<td><label for="meta-box-purchasing">Purchasing Departament</label></td>
        				<td><textarea name="meta-box-purchasing"><?php echo get_post_meta($object->ID, "meta-box-purchasing", true); ?></textarea></td>
        			</tr>
        			<tr>
        				<td><label for="meta-box-rrhh">Human Resources</label></td>
        				<td><textarea name="meta-box-rrhh"><?php echo get_post_meta($object->ID, "meta-box-rrhh", true); ?></textarea></td>
        			</tr>
        		</thead>
        	</table>
           

     <?php
}
 
function add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "Contact Data", "custom_meta_box_markup", "page", "normal", "high", null);
}
 
add_action("add_meta_boxes", "add_custom_meta_box");

function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;
 
    if(!current_user_can("edit_post", $post_id))
        return $post_id;
 
    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;
 
    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

   	$meta_box_address_value = "";
   	$meta_box_phone_value = "";
   	$meta_box_service_value = "";
   	$meta_box_sales_value = "";
   	$meta_box_purchasing_value = "";
   	$meta_box_rrhh_value = "";

   	if(isset($_POST["meta-box-address"]))
    {$meta_box_address_value = $_POST["meta-box-address"];}   
    update_post_meta($post_id, "meta-box-address", $meta_box_address_value);

    if(isset($_POST["meta-box-phone"]))
    {$meta_box_phone_value = $_POST["meta-box-phone"];}   
    update_post_meta($post_id, "meta-box-phone", $meta_box_phone_value);

    if(isset($_POST["meta-box-service"]))
    {$meta_box_service_value = $_POST["meta-box-service"];}   
    update_post_meta($post_id, "meta-box-service", $meta_box_service_value);

    if(isset($_POST["meta-box-sales"]))
    {$meta_box_sales_value = $_POST["meta-box-sales"];}   
    update_post_meta($post_id, "meta-box-sales", $meta_box_sales_value);

    if(isset($_POST["meta-box-purchasing"]))
    {$meta_box_purchasing_value = $_POST["meta-box-purchasing"];}   
    update_post_meta($post_id, "meta-box-purchasing", $meta_box_purchasing_value);

    if(isset($_POST["meta-box-rrhh"]))
    {$meta_box_rrhh_value = $_POST["meta-box-rrhh"];}   
    update_post_meta($post_id, "meta-box-rrhh", $meta_box_rrhh_value);
}
add_action("save_post", "save_custom_meta_box", 10, 3);