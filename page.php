<?php

get_header();
while(have_posts()){
    the_post(); 
    ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg');?>"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title()?></h1>
      <div class="page-banner__intro">
        <p>DONT FORGET TO REPLACE ME LATER.</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">

    <?php

    $ParentID = wp_get_post_parent_id(get_the_id());
        if($ParentID)
        {
            ?>
                <div class="metabox metabox--position-up metabox--with-home-link">
                <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($ParentID);?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($ParentID)?></a> <span class="metabox__main"><?php the_title() ?></span></p>
                </div>
            <?php
        }
    ?>

<?php 
    $testArray = get_pages(array(
        'child_of'=> get_the_ID()
    ));
    if($ParentID or $testArray) { ?>
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($ParentID);?>"> <?php echo get_the_title($ParentID)?> </a></h2>
      <ul class="min-list">
        <?php

        if($ParentID){
            $findChildOf = $ParentID;
        }else{
            $findChildOf = get_the_ID();
        }

     
        $configurations = array(
            'title_li'=>NULL,
            'child_of'=> $findChildOf,
            'sort_column' => 'menu_order'
        );
            // associative array
            wp_list_pages($configurations);
        ?>
      </ul>
    </div>
    <?php } ?>

    <div class="generic-content">
        <?php the_content()?>
    </div>

  </div>
    

  
    <?php
}
get_footer();

?>