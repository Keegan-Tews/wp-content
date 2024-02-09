<!-- This is the default page template. It is used to display a page when nothing more specific matches a query. -->



<!-- This while loop will run as long as there are posts to display. -->
<!-- The have_posts() function checks if there are any posts to display. -->
<!-- The the_post() function sets up the current post. -->
<!-- The the_title() function displays the title of the post. -->
<!-- The the_content() function displays the content of the post. -->
<!-- The get_header() function includes the header.php file in the current file. -->
<!-- The get_footer() function includes the footer.php file in the current file. -->
<!-- $theParent = wp_get_post_parent_id(get_the_ID()); -->
<?php
    get_header();
    while (have_posts()) {
        the_post(); ?>
        
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
          <p>Replace later</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">

        <?php 
        $theParent = wp_get_post_parent_id(get_the_ID());
        if ($theParent){ ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i>Back to <?php echo get_the_title($theParent); ?></a> <span class="metabox__main"><?php the_title(); ?></span>
        </p>
      </div>
       <?php }
        ?>

      
        <?php
    $testArray = get_pages(array(
        'child_of' => get_the_ID()
    ));

        if ($theParent or $testArray) { ?>
      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
        <ul class="min-list">
          <?php 
          if ($theParent) {
            $findChildrenOf = $theParent;
          } else {
            $findChildrenOf = get_the_ID();
          }
          wp_list_pages(array(
            'title_li' => NULL,
            'child_of' => $findChildrenOf,
            'sort_column' => 'menu_order'
          ));

          ?>
        </ul>
      </div>
      <?php } ?>
    
       
      <div>
      <?php the_content(); ?>
      </div>
    </div>
    <?php
    }
    get_footer();
?>