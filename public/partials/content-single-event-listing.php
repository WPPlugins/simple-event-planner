<?php
/**
 * The template invoking event's featured image, title & description template.
 * 
 * Override this template by copying it to yourtheme/simple_event_planner/content-single-event-listing.php
 * 
 * @version     2.0.0
 * @since       1.1.0 
 * @since       1.3.0 Revised structure & added filter
 * @author      PressTigers
 * @package     Simple_Event_Planner
 * @subpackage  Simple_Event_Planner/public/partials
 */
ob_start();
?>

<!-- Start Event Description
  ================================================== -->
<div class="event-description">    
    <?php
    /**
     * Template -> Event Description:
     * 
     * - Event Featured Image
     * - Event Title
     * - Event Description
     */
    get_simple_event_planner_template('single-event/event-description.php');
    ?>
</div>
<!-- ==================================================
 End Event Description -->

<?php
$content_event_listing = ob_get_clean();

/**
 * Modify Content Single Event Listing  Template. 
 *                                       
 * @since   1.3.0
 * 
 * @param   html    $content_event_listing  Content Single Event Listing Page HTML.                   
 */
echo apply_filters('content_single_event_listing_template', $content_event_listing);