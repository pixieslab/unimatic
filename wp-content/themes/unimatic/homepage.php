<?php
/*
Template Name: HOMEPAGE
*/
?>

<?php	get_header(); ?>
<?php	the_post(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/homepage.css" />


<div id="page">
    <?php



    global $woocommerce;
    if( have_rows('gruppo_di_prodotti') ){
        while ( have_rows('gruppo_di_prodotti') ) : the_row();
            echo '<div class="group">';
                $title = get_sub_field('titolo_gruppo');
                if($title){
                    echo '<div class="title-group">';
                        echo '<span class="title">'.$title.'</span>';
                    echo '</div>';
                }
                if( have_rows('prodotti') ){
                    echo '<div class="cont-prodotti h100">';
                    // $count=0;
                    while ( have_rows('prodotti') ) : the_row();
                        $id_prodotto=get_sub_field('prodotto');
                        $product = wc_get_product( $id_prodotto );
                        $title=$product->name;
                        $sku=$product->sku;
                        // $stock_quantity=$product->stock_quantity;
                        if(get_field('stock_static',$id_prodotto)){
                            $stock_quantity=get_field('stock_static',$id_prodotto);
                        }

                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id_prodotto ), 'full' );
                        $colore = get_field('colore',$id_prodotto);
                        echo '<div class="prodotto" style="background-color:'.$colore.'">';
                            echo '<div class="table h100"><div class="cell">';
                            echo '<a href="'.get_permalink($id_prodotto).'">';
                                echo '<img src="'.$image[0].'" />';
                                echo '<h2>'.$title.'</h2>';
                                echo '<span class="sku">'.$sku.'</span>';
                                if($stock_quantity) echo '<span class="stock">'.$stock_quantity.' PIECES</span>';
                            echo '</a>';
                            echo '</div></div>';
                        echo '</div>';
                        // echo $stock_quantity;
                        // $id_prodotto=$prodotto->ID;
                        // echo $id_prodotto.'   -   ';
                        // if($count==0){
                        //     print_r($product);
                        //
                        //     // print_r($image);
                        // }
                        // $count++;
                    endwhile;
                    echo '</div>';
                }
            echo '</div>';
        endwhile;
    }
    ?>
</div>


<script type="text/javascript" charset="utf-8">
    jQuery(document).ready(function($) {
        //
        function onScroll(){
            var w_st=$(window).scrollTop();
            var header_pos=$("#site-content").offset().top-w_st;
            if(header_pos<=0){
                if($("header#main-header").hasClass("landing")){
                    $("header#main-header").removeClass("landing");
                }
            }else{
                // if(!$("header#main-header").hasClass("landing")){
                    $("header#main-header").addClass("landing");
                // }
            }
        }
        $(window).scroll(function(){
            onScroll();
        })
        onScroll();
        $("#scroll_down").click(function(){
            $('html,body').animate({
                scrollTop: $("#site-content").offset().top+1},
            2000,'easeInOutExpo');
        })
        //
    })
</script>
<?php	get_footer(); ?>
