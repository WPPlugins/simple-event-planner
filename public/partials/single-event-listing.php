<?php
/**
 * The template for displaying event details on signle event detail page.
 *
 * Override this template by copying it to yourtheme/simple_event_planner/single-event-listing.php
 *
 * @version     2.0.0
 * @since       1.1.0 
 * @since       1.3.0 Revised structure & added filter
 * @author      PressTigers
 * @package     Simple_Event_Planner
 * @subpackage  Simple_Event_Planner/public/partials
 */
get_header();

ob_start();
global $post;

/**
 * Hook -> sep_before_main_content
 * 
 * @hooked sep_event_listing_wrapper_start - 10 
 * - Output Opening div of Main Container.
 * - Output Opening div of Content Area.
 * 
 * @since  1.1.0
 */
do_action('sep_before_main_content');
?>

<!-- Start Content Wrapper
================================================== -->
<div class="sep-detail">
    <?php while (have_posts()) : the_post(); ?>
        <div class="row">

            <!-- Start Event Details
            ================================================== -->
            <div class="col-md-5 col-sm-6"> 
                <div class="single-event-details">                        
                    <?php
                    
                    /**
                     * single_event_listing_start hook
                     *
                     * @hooked sep_event_counter_script_localization- 20
                     * @hooked event_schedule - 30
                     * 
                     * @since   1.1.0
                     */
                    do_action('single_event_listing_start');

                    /**
                     * single_event_listing_end hook
                     * @hooked event_details - 20
                     * @hooked event_venue - 30
                     * 
                     * @since   1.1.0
                     */
                    do_action('single_event_listing_end');
                    ?>                        
                </div>
            </div>
            <!-- ================================================== 
            End Event Detail -->

            <div class="col-md-7 col-sm-6"> 
                <?php
                
                /**
                 * Template -> Content Single Event Listing:
                 * 
                 * - Event Featured Image 
                 * - Event Title
                 * - Event Description
                 */
                get_simple_event_planner_template_part('content', 'single-event-listing');
            endwhile;
            ?>                    
        </div>
    </div>
</div>
<!-- ==================================================
End Content Wrapper -->

<?php
/**
 * Hook -> sep_after_main_content
 * 
 * @hooked sep_event_listing_wrapper_end - 10 
 * - Output Closing div of Main Container.
 * - Output Closing div of Content Area.
 * 
 * @since  1.1.0
 */
do_action('sep_after_main_content');

$single_event_listing = ob_get_clean();

/**
 * Modify Single Event Listing  Template. 
 *                                       
 * @since   1.3.0
 * 
 * @param   html    $single_event_listing   Single Event Listing Page HTML.                   
 */
echo apply_filters('single_event_listing_template', $single_event_listing);

get_footer();