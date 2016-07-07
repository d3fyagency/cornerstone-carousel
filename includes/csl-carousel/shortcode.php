<?php
/**
 * Shortcode: Cornerstone Carousel
 */
?>

<?php

/*
 * => VARS & INFO
 * ---------------------------------------------------------------------------*/


$randnum = rand(0,5000); // doing this for now to namespace multiple elements on the same page. TODO: use a session var, transient or something else.

// Class, ID, Styles
$carousel_id = "csl-carousel-".$randnum;
$class       = "csl-carousel " . $class;

// Toggle
$auto_play   = ( ($auto_play   == 1) ? "true" : "false" );
$auto_valign = ( ($auto_valign == 1) ? true : false );
$loop        = ( ($loop == 1) ? "true" : "false" );
$pause_hover = ( ($pause_hover == 1) ? "true" : "false" );

// Pagination
switch ( $pagination_type ) {
  case 'dots':
    $dots = 'true';
    $nums = 'false';
    $nav  = 'false';
    break;

  case 'dots_nav':
    $dots = 'true';
    $nums = 'false';
    $nav  = 'true';
    break;

  case 'numbers':
    $dots = 'true';
    $nums = 'true';
    $nav  = 'false';
    break;

  case 'numbers_nav':
    $dots = 'true';
    $nums = 'true';
    $nav  = 'true';
    break;

  case 'prev_next':
    $dots = 'false';
    $nums = 'false';
    $nav  = 'true';
    break;

  default: // NONE
    $nav  = 'false';
    $dots = 'false';
    $nums = 'false';
    break;
}




/*
 * => ELEMENT HTML
 * ---------------------------------------------------------------------------*/
?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
  <div id="<?= $carousel_id ?>" class="owl-carousel owl-theme">
    <?php echo do_shortcode( $content ); ?>
  </div>
</div>

<?php
/*
 * => SCRIPTS
 * ---------------------------------------------------------------------------*/

// add_action( 'wp_enqueue_scripts', 'csl_carousel_scripts');
?>
<script type="text/javascript">
(function ($) {
    $("<?= '#' . $carousel_id ?> > .item").each(function(i) {
        $(this).attr('data-dot', i+1);
    });

    $(window).load(function () {
        $("<?= '#' . $carousel_id ?>").owlCarousel({
            autoplay: <?= $auto_play ?>,
            loop: <?= $loop ?>,
            items: <?= $max_visible_items ?>,
            autoplayHoverPause: <?= $pause_hover ?>,
            slideBy: <?= is_numeric($slide_by) ? $slide_by : "'{$slide_by}'" ?>,
            nav: <?= $nav ?>,
            <?php if ( $auto_valign ) : ?>
            onInitialized: setOwlStageHeight,
            onResized: setOwlStageHeight,
            onTranslated: setOwlStageHeight,
            <?php endif; ?>
            dotContainer: 'span',
            <?php
            // TODO: In order to display the page numbers set `dotData` to true and follow
            //  this tip: https://github.com/OwlCarousel2/OwlCarousel2/issues/158#issuecomment-56747066
            ?>
            <?php if ( $nums === 'true' ) : ?>
            dotsEach: false,
            dotsData: true,
            <?php endif; ?>
            dots: <?= $dots ?>
        });

        <?php if ( $auto_valign ) : ?>
        function setOwlStageHeight(event) {

            var maxHeight = 0;

            $('<?= '#' . $carousel_id ?> .owl-item.active').each(function () { // LOOP THROUGH ACTIVE ITEMS
                var thisHeight = parseInt($(this).height());
                maxHeight = (maxHeight >= thisHeight ? maxHeight : thisHeight);
            });

            $('<?= '#' . $carousel_id ?> .owl-carousel').css('height', maxHeight);
            $('<?= '#' . $carousel_id ?> .owl-stage').addClass('flex').css('height', maxHeight); // CORRECT DRAG-AREA SO BUTTONS ARE CLICKABLE
        }
        <?php endif; ?>
    });
})(jQuery);
</script> 


