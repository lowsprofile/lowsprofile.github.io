<?php
/**
 * Plugin Name: insom
 * Description: insom
 */

add_filter('wp_get_attachment_url', 'clrs_get_attachment_url', 10, 2);
function clrs_get_attachment_url($url, $post_id) {
    $url = preg_replace("/\/sites\/[0-9]+/", "", $url);
    return $url;
}

function syncoa_activate(){
    global $wpdb;
    syncoa_drop_tb($wpdb);
    syncoa_replicate_tb($wpdb);
    syncoa_insert_replicate_tb($wpdb);
}
function syncoa_drop_tb($wpdb)
{
    $wpdb->query(
        "
      DROP TABLE IF EXISTS
      wp_2_optimizepress_assets,
      wp_2_optimizepress_launchfunnels,
      wp_2_optimizepress_launchfunnels_pages,
      wp_2_optimizepress_layout_categories,
      wp_2_optimizepress_pb_products,
      wp_2_optimizepress_post_layouts,
      wp_2_optimizepress_predefined_layouts,
      wp_2_optimizepress_presets,
      wp_2_commentmeta,
      wp_2_comments,
      wp_2_postmeta,
      wp_2_posts,
      wp_2_woocommerce_api_keys,
      wp_2_woocommerce_attribute_taxonomies,
      wp_2_woocommerce_downloadable_product_permissions,
      wp_2_woocommerce_order_itemmeta,
      wp_2_woocommerce_order_items,
      wp_2_woocommerce_payment_tokenmeta,
      wp_2_woocommerce_payment_tokens,
      wp_2_woocommerce_sessions,
      wp_2_woocommerce_shipping_zones,
      wp_2_woocommerce_shipping_zone_locations,
      wp_2_woocommerce_shipping_zone_methods,
      wp_2_woocommerce_tax_rates,
      wp_2_podsrel,
      wp_2_woocommerce_tax_rate_locations;
    "
    );
}

function syncoa_replicate_tb($wpdb)
{
    $wpdb->query("CREATE TABLE wp_2_optimizepress_assets LIKE wp_optimizepress_assets;");
    $wpdb->query("CREATE TABLE wp_2_optimizepress_launchfunnels LIKE wp_optimizepress_launchfunnels;");
    $wpdb->query("CREATE TABLE wp_2_optimizepress_launchfunnels_pages LIKE wp_optimizepress_launchfunnels_pages;");
    $wpdb->query("CREATE TABLE wp_2_optimizepress_layout_categories LIKE wp_optimizepress_layout_categories;");
    $wpdb->query("CREATE TABLE wp_2_optimizepress_pb_products LIKE wp_optimizepress_pb_products;");
    $wpdb->query("CREATE TABLE wp_2_optimizepress_post_layouts LIKE wp_optimizepress_post_layouts;");
    $wpdb->query("CREATE TABLE wp_2_optimizepress_predefined_layouts LIKE wp_optimizepress_predefined_layouts;");
    $wpdb->query("CREATE TABLE wp_2_optimizepress_presets LIKE wp_optimizepress_presets;");
    $wpdb->query("CREATE TABLE wp_2_commentmeta LIKE wp_commentmeta;");
    $wpdb->query("CREATE TABLE wp_2_comments LIKE wp_comments;");
    $wpdb->query("CREATE TABLE wp_2_postmeta LIKE wp_postmeta;");
    $wpdb->query("CREATE TABLE wp_2_posts LIKE wp_posts;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_api_keys LIKE wp_woocommerce_api_keys;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_attribute_taxonomies LIKE wp_woocommerce_attribute_taxonomies;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_downloadable_product_permissions LIKE wp_woocommerce_downloadable_product_permissions;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_order_itemmeta LIKE wp_woocommerce_order_itemmeta;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_order_items LIKE wp_woocommerce_order_items;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_payment_tokenmeta LIKE wp_woocommerce_payment_tokenmeta;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_payment_tokens LIKE wp_woocommerce_payment_tokens;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_sessions LIKE wp_woocommerce_sessions;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_shipping_zones LIKE wp_woocommerce_shipping_zones;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_shipping_zone_locations LIKE wp_woocommerce_shipping_zone_locations;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_shipping_zone_methods LIKE wp_woocommerce_shipping_zone_methods;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_tax_rates LIKE wp_woocommerce_tax_rates;");
    $wpdb->query("CREATE TABLE wp_2_podsrel LIKE wp_podsrel;");
    $wpdb->query("CREATE TABLE wp_2_woocommerce_tax_rate_locations LIKE wp_woocommerce_tax_rate_locations;");
}

function syncoa_insert_replicate_tb($wpdb)
{
    $wpdb->query("INSERT INTO wp_2_optimizepress_assets SELECT * FROM wp_optimizepress_assets;");
    $wpdb->query("INSERT INTO wp_2_optimizepress_launchfunnels SELECT * FROM wp_optimizepress_launchfunnels;");
    $wpdb->query("INSERT INTO wp_2_optimizepress_launchfunnels_pages SELECT * FROM wp_optimizepress_launchfunnels_pages;");
    $wpdb->query("INSERT INTO wp_2_optimizepress_layout_categories SELECT * FROM wp_optimizepress_layout_categories;");
    $wpdb->query("INSERT INTO wp_2_optimizepress_pb_products SELECT * FROM wp_optimizepress_pb_products;");
    $wpdb->query("INSERT INTO wp_2_optimizepress_post_layouts SELECT * FROM wp_optimizepress_post_layouts;");
    $wpdb->query("INSERT INTO wp_2_optimizepress_predefined_layouts SELECT * FROM wp_optimizepress_predefined_layouts;");
    $wpdb->query("INSERT INTO wp_2_optimizepress_presets SELECT * FROM wp_optimizepress_presets;");
    $wpdb->query("INSERT INTO wp_2_commentmeta SELECT * FROM wp_commentmeta;");
    $wpdb->query("INSERT INTO wp_2_comments SELECT * FROM wp_comments;");
    $wpdb->query("INSERT INTO wp_2_postmeta SELECT * FROM wp_postmeta;");
    $wpdb->query("INSERT INTO wp_2_posts SELECT * FROM wp_posts;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_api_keys SELECT * FROM wp_woocommerce_api_keys;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_attribute_taxonomies SELECT * FROM wp_woocommerce_attribute_taxonomies;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_downloadable_product_permissions SELECT * FROM wp_woocommerce_downloadable_product_permissions;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_order_itemmeta SELECT * FROM wp_woocommerce_order_itemmeta;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_order_items SELECT * FROM wp_woocommerce_order_items;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_payment_tokenmeta SELECT * FROM wp_woocommerce_payment_tokenmeta;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_payment_tokens SELECT * FROM wp_woocommerce_payment_tokens;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_sessions SELECT * FROM wp_woocommerce_sessions;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_shipping_zones SELECT * FROM wp_woocommerce_shipping_zones;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_shipping_zone_locations SELECT * FROM wp_woocommerce_shipping_zone_locations;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_shipping_zone_methods SELECT * FROM wp_woocommerce_shipping_zone_methods;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_tax_rates SELECT * FROM wp_woocommerce_tax_rates;");
    $wpdb->query("INSERT INTO wp_2_podsrel SELECT * FROM wp_podsrel;");
    $wpdb->query("INSERT INTO wp_2_woocommerce_tax_rate_locations SELECT * FROM wp_woocommerce_tax_rate_locations;");
}
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );

add_action('woocommerce_order_status_completed', 'syncoa_activate');
add_action('woocommerce_order_status_pending', 'syncoa_activate');
add_action('woocommerce_order_status_failed', 'syncoa_activate');
add_action('woocommerce_order_status_on-hold', 'syncoa_activate');
add_action('woocommerce_order_status_processing', 'syncoa_activate');
add_action('woocommerce_order_status_refunded', 'syncoa_activate');
add_action('woocommerce_order_status_cancelled', 'syncoa_activate');

function isom_active(){
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(is_user_logged_in() && $actual_link === "http://kurser.onlineakademiet.dk/login/"){
        $myaccount_page  = home_url( '/kursus/' );
        wp_redirect($myaccount_page);
        exit;
    }
    if($actual_link === "http://kurser.onlineakademiet.dk/"){
        $login_page = home_url('/login/');
        wp_redirect($login_page);
        exit;
    }
}
add_action('init', 'isom_active');

add_action('rpwe_after_loop', 'blury_kurser_active');
function blury_kurser_active(){
    global $wpdb;
    $domain = "http://$_SERVER[HTTP_HOST]";
    if($domain === "http://kurser.onlineakademiet.dk") {
        if (is_user_logged_in()) {
            if (is_page('kursus')) {
                $args = array(
                    'posts_per_page' => 6,
                    'offset' => 0,
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'post_type' => array('product')
                );
                // The Query
                $the_query = new WP_Query($args);

                // The Loop
                if ($the_query->have_posts()) {
                    $status_bought = [];
                    $course_permalink = [];
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $product = get_page_by_title(get_the_title(), OBJECT, 'product');
                        $current_user = wp_get_current_user();
                        $ad= $wpdb->get_results("SELECT * FROM wp_2_postmeta WHERE meta_value=$product->ID AND meta_key='_course_woocommerce_product';");
                        if (wc_customer_bought_product($current_user->user_email, $current_user->ID, $product->ID)) {
                            $status_bought[] = 'purchasedCourse';
                            $course_permalink[] = get_permalink($ad[0]->post_id);
                        } else {
                            $status_bought[] = 'notPurchasedCourse';
                            $course_permalink[] = get_permalink($product->ID);
                        }
                        $ids[] = $product->ID;
                    }
                    ?>
                    <script>
                        jQuery(function ($) {
                            ids = <?php echo json_encode($ids); ?>;
                            stts_bght = <?php echo json_encode($status_bought); ?>;
                            crs_prmlnk = <?php echo json_encode($course_permalink); ?>;
                            $('.rpwe-li').each(function (index) {
                                $(this).addClass('' + ids[index] + ' ' + stts_bght[index]);
                                $(this).find('.more-link').attr('href', ''+crs_prmlnk[index]+'');
                            })
                        })
                    </script>
                    <?php
                } else {
                    // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();
            }
        }
    }
}


/**
 * Disables repeat purchase for products / variations
 *
 * @param bool $purchasable true if product can be purchased
 * @param \WC_Product $product the WooCommerce product
 * @return bool $purchasable the updated is_purchasable check
 */
function sv_disable_repeat_purchase( $purchasable, $product ) {
    // Don't run on parents of variations,
    // function will already check variations separately
    if ( $product->is_type( 'variable' ) ) {
        return $purchasable;
    }

    // Get the ID for the current product (passed in)
    $product_id = $product->is_type( 'variation' ) ? $product->variation_id : $product->id;

    // return false if the customer has bought the product / variation
    if ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $product_id ) ) {
        $purchasable = false;
    }

    // Double-check for variations: if parent is not purchasable, then variation is not
    if ( $purchasable && $product->is_type( 'variation' ) ) {
        $purchasable = $product->parent->is_purchasable();
    }

    return $purchasable;
}
add_filter( 'woocommerce_is_purchasable', 'sv_disable_repeat_purchase', 10, 2 );
/**
 * Shows a "purchase disabled" message to the customer
 */
function sv_purchase_disabled_message() {

    // Get the current product to see if it has been purchased
    global $product;

    if ( $product->is_type( 'variable' ) ) {

        foreach ( $product->get_children() as $variation_id ) {
            // Render the purchase restricted message if it has been purchased
            if ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $variation_id ) ) {
                sv_render_variation_non_purchasable_message( $product, $variation_id );
            }
        }

    } else {
        if ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $product->id ) ) {
            echo '<div class="woocommerce"><div class="woocommerce-info wc-nonpurchasable-message">You\'ve already purchased this product! It can only be purchased once.</div></div>';
        }
    }
}
add_action( 'woocommerce_single_product_summary', 'sv_purchase_disabled_message', 31 );
/**
 * Generates a "purchase disabled" message to the customer for specific variations
 *
 * @param \WC_Product $product the WooCommerce product
 * @param int $no_repeats_id the id of the non-purchasable product
 */
function sv_render_variation_non_purchasable_message( $product, $no_repeats_id ) {

    // Double-check we're looking at a variable product
    if ( $product->is_type( 'variable' ) && $product->has_child() ) {

        $variation_purchasable = true;

        foreach ( $product->get_available_variations() as $variation ) {

            // only show this message for non-purchasable variations matching our ID
            if ( $no_repeats_id === $variation['variation_id'] ) {
                $variation_purchasable = false;
                echo '<div class="woocommerce"><div class="woocommerce-info wc-nonpurchasable-message js-variation-' . sanitize_html_class( $variation['variation_id'] ) . '">You\'ve already purchased this product! It can only be purchased once.</div></div>';
            }
        }
    }

    if ( ! $variation_purchasable ) {
        wc_enqueue_js("
			jQuery('.variations_form')
				.on( 'woocommerce_variation_select_change', function( event ) {
					jQuery('.wc-nonpurchasable-message').hide();
				})
				.on( 'found_variation', function( event, variation ) {
					jQuery('.wc-nonpurchasable-message').hide();
					if ( ! variation.is_purchasable ) {
						jQuery( '.wc-nonpurchasable-message.js-variation-' + variation.variation_id ).show();
					}
				})
			.find( '.variations select' ).change();
		");
    }
}


//Force Full Width Content layout on Login
if("http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI] === "http://kurser.onlineakademiet.dk/login/"){
    //* Force full width content layout
    add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
    add_action('wp_footer', 'remove_header_right_on_login');
}


//Remove Header Right on Login
function remove_header_right_on_login(){
    ?>
    <script>
        jQuery(function ($) {
            $('.site-header').find('.header-widget-area').html('');
        })
    </script>
    <?php
}

/**
 * Add all users to all other sites
 *
 * @param  INT $blog_id - Blog ID
 *
 * @return void
 */
add_action( 'wpmu_new_blog', 'mus_add_all_users_to_new_site' );
function mus_add_all_users_to_new_site($blog_id)
{
    global $wpdb;

    // Query all blogs from multi-site install
    $blogids = $wpdb->get_col("SELECT blog_id FROM ".$wpdb->base_prefix."blogs");

    foreach($blogids as $blogid)
    {
        $users = get_users( array('blog_id' => $blogid) );

        if(!empty($users))
        {
            foreach($users as $user)
            {
                if(!empty($user->roles))
                {
                    foreach($user->roles as $role)
                    {
                        add_user_to_blog($blog_id, $user->ID, $role );
                    }
                } else {
                    add_user_to_blog($blog_id, $user->ID, get_blog_option( $blog_id, 'default_role', 'subscriber' ) );
                }
            }
        }
    }
}


/**
 * Add a new user to all other sites
 *
 * @param  INT $user_id - New User ID
 *
 * @return void
 */
add_action( 'wpmu_new_user', 'mus_add_new_user_to_all_sites' );
function mus_add_new_user_to_all_sites( $user_id )
{
    global $wpdb;

    // Query all blogs from multi-site install
    $blogids = $wpdb->get_col("SELECT blog_id FROM ".$wpdb->base_prefix."blogs");
    $user = new WP_User( $user_id );

    if(!empty($blogids))
    {
        foreach($blogids as $blogid)
        {
            if(!empty($user->roles))
            {
                foreach($user->roles as $role)
                {
                    add_user_to_blog($blogid, $user_id, $role );
                }
            }
            else
            {
                add_user_to_blog($blogid, $user_id, get_blog_option( $blogid, 'default_role', 'subscriber' ) );
            }
        }
    }

}

/**
 * Assign user Role to all site when change in one site
 *
 * @param  INT $user_id
 * @param  STRING $role - New role
 * @param  ARRAY $old_roles - Old roles
 *
 * @return void
 */
add_action( 'set_user_role', 'mus_add_new_user_role_to_all_sites', 10, 2 );
function mus_add_new_user_role_to_all_sites( $user_id, $role )
{
    global $wpdb;

    if( !is_multisite() )
        return;

    // Query all blogs from multi-site install
    $blogids = $wpdb->get_col("SELECT blog_id FROM ".$wpdb->base_prefix."blogs");

    if(!empty($blogids))
    {
        foreach($blogids as $blogid)
        {
            add_user_to_blog($blogid, $user_id, $role );

        }
    }
}
