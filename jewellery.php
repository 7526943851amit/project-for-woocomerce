<?php
/* Template Name:jewelllery */
get_header();
?>
     <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-inner">
   <?php
   // Get WooCommerce products
   $args = array(
      'post_type' => 'product', // WooCommerce product post type
      'posts_per_page' => -1, // Number of products to display
      'order'=>     'ASC',
      'product_cat'=>  'jewellery',
      
    //   'tax_query' => array(
    //      array(
    //         'taxonomy' => 'product_cat', //category name 
    //         'field' => 'slug', 
    //         'terms' => 'jewellery',
    //      ),
    //   ),
   );

   $products = new WP_Query($args);

   $item_counter = 0; // Counter to track items

   // Loop through products
   while ($products->have_posts()) : $products->the_post();
      global $product;

      // Check if the item counter is divisible by 3 (to group 3 items in one carousel item)
      if ($item_counter % 3 == 0) {
         echo '<div class="carousel-item ' . ($item_counter == 0 ? 'active' : '') . '"><div class="container"><div class="fashion_section_2"><div class="row">';
      }

      ?>
      <div class="col-lg-4 col-sm-4">
         <div class="box_main">
            <h4 class="shirt_text"><?php the_title(); ?></h4>
            <p class="price_text">Price  <span style="color: #262626;"><?php echo wc_price($product->get_price()); ?></span></p>
            <div class="tshirt_img"><?php echo woocommerce_get_product_thumbnail(); ?></div>
            <div class="btn_main">
            <div class="buy_bt"><a href="<?php echo esc_url(wc_get_cart_url()); ?>?add-to-cart=<?php echo esc_attr($product->get_id()); ?>">Buy Now</a></div>
               <div class="seemore_bt"><a href="<?php the_permalink(); ?>">See More</a></div>
            </div>
         </div>
      </div>
      <?php

      $item_counter++;

      // Close the carousel item container after every 3 items
      if ($item_counter % 3 == 0) {
         echo '</div></div></div></div>';
      }

   endwhile;

   // Close any remaining carousel item container
   if ($item_counter % 3 != 0) {
      echo '</div></div></div></div>';
   }

   wp_reset_postdata();
   ?>

               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>

<?php

get_footer();
?>