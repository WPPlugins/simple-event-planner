<?php
/**
 * Template displayng descirption of event detail page.
 *
 * Override this template by copying it to yourtheme/simple_event_planner/single-event/event-description.php
 * 
 * @version     2.0.0
 * @since       1.1.0 
 * @since       1.3.0 Revised structure & added filter
 * @author      PressTigers
 * @package     Simple_Event_Planner
 * @subpackage  Simple_Event_Planner/public/partials/single-event
 */
ob_start();

global $post;
?>

<!-- Start Event Title, Featured Image & Description 
================================================== -->
<div class="sep-event-description">

    <!-- Event Title -->
    <div class="event-title">
        <h2><?php echo apply_filters('sep_single_event_detail_page_title', esc_attr(get_the_title())); ?></h2>
    </div>

    <?php
    /**
     * Template -> Featured Image:
     * 
     * - Event Features Image
     */
    get_simple_event_planner_template('single-event/featured-image.php');

    /**
     * Template -> Event Calendar:
     * 
     * - Event Calendar 
     */
    get_simple_event_planner_template('single-event/event-calendar.php');
    ?>

    <!-- Event Description -->
    <div class="single-event-description">
        <?php the_content(); ?> 
    </div>
    <?php
    /**
     * Template -> event-calendar:
     * 
     * - Event Calendar
     */
    get_simple_event_planner_template('single-event/event-venue.php');
    ?>
</div>
<!-- ==================================================
End Event Title, Featured Image & Description-->

<?php
$event_description = ob_get_clean();
/**
 * Modify Event Description  - Event Description Template. 
 *                                       
 * @since   1.3.0
 * 
 * @param   html    $event_description   Event Description HTML.                   
 */
echo apply_filters('sep_event_description_template', $event_description);