<?php 
// This is the template for the event archive page. It will display all the events that are upcoming.


get_header(); 
pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'See what is going on in our world.'
));
?>

    <div class="container container--narrow page-section">

      <?php
      $today = date('Ymd');
      $eventPageEvents = new WP_Query(array(
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          )
        )
      ));

      while($eventPageEvents->have_posts()) {
            $eventPageEvents->the_post(); 
            get_template_part('template-parts/content-event');
            
       }
      echo paginate_links();
      ?>

    <hr class="section-break">

      <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events'); ?>">Check out our past events archive.</a></p>

      </div>


<?php get_footer(); ?>