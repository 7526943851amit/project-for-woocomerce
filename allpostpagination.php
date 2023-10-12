<?php
/* Template Name: Pagination */
get_header();
?>
<h1 style="text-align:center;">All post</h1>
<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="your-loop-container">
            <?php
            $args = array(
                'post_type' => 'ai_tools',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                'orderby' => 'title',
                'order' => 'ASC',
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
                the_title();
                the_content();
            endwhile;
            ?>
        </div>

        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $loop->max_num_pages,
            ));
           
            ?>
        </div>

    </main><!-- #main -->-
</div><!-- #primary -->


<h1 style="text-align:center;">fetured tools categories post</h1>
<div class="featured-tools">
    <?php
    $featured_args = array(
        'post_type' => 'ai_tools', // Change this to your post type
        'post_status' => 'publish',
        'posts_per_page' => 2, // Display 2 featured tools per page
        'ai-category' => 'Featured Tools', // Replace 'featured' with the category slug
        'orderby' => 'title',
        'order' => 'ASC',
    );

    $featured_loop = new WP_Query($featured_args);

    while ($featured_loop->have_posts()) : $featured_loop->the_post();
        the_title();
        the_content();
    endwhile;
    ?>
</div>
<div class="featured-tools-pagination">
    <?php
    echo paginate_links(array(
        'total' => $featured_loop->max_num_pages,
    ));
 
    ?>
</div>



<h1 style="text-align:center;">Recently Added Tools All posts</h1>
<div class="featured-tools">
    <?php
    $featured_args = array(
        'post_type' => 'ai_tools', // Change this to your post type
        'post_status' => 'publish',
        'posts_per_page' => 2, // Display 2 featured tools per page
        'ai-category' => 'Recently Added Tools', // Replace 'featured' with the category slug
        'orderby' => 'title',
        'order' => 'ASC',
    );

    $recently_loop = new WP_Query($featured_args);

    while ($recently_loop->have_posts()) : $recently_loop->the_post();
        the_title();
        the_content();
    endwhile;
    ?>
</div>
<div class="recently-tools-pagination">
    <?php
    echo paginate_links(array(
        'total' => $recently_loop->max_num_pages,
    ));
    ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    var ajaxpagination = {
        ajaxurl: '<?php echo admin_url('admin-ajax.php'); ?>'
    };
</script>
<script>
jQuery(document).ready(function($) {
    $('.pagination .page-numbers').on('click', function(e) {
        e.preventDefault();
        var page = $(this).text();
        console.log(page);
        var data = {
            'action': 'custom_pagination',
            'page': page,
        };

        jQuery.post(ajaxpagination.ajaxurl, data, function(response) {
            $('.your-loop-container').html(response);
        });
    });
});
</script>

<script>
jQuery(document).ready(function($) {
    $('.featured-tools-pagination .page-numbers').on('click', function(e) {
        e.preventDefault();
        var page = $(this).text();
        var data = {
            'action': 'featured_tools_pagination',
            'page': page,
        };

        jQuery.post(ajaxpagination.ajaxurl, data, function(response) {
            $('.featured-tools').html(response);
        });
    });
});
</script>
<?php
get_footer();

?>