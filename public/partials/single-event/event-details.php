<?php
/**
 * This template contains category and organiser's detail. Which are getting display on event detail page.
 *
 * Override this template by copying it to yourtheme/simple_event_planner/single-event/event-details.php
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

if ('' !== sep_get_the_event_organizer() || '' !== sep_get_the_organizer_contact() || '' !== sep_get_the_organizer_email()) {
    ?>

    <!-- Start Event Organizer Details 
    ================================================== -->
    <div class="event-organizer">
        <h3><?php esc_html_e('Details:', 'simple-event-planner'); ?></h3>
        <?php
        /**
         * Template -> organiser:
         * 
         * - Event Organiser Name
         */
        get_simple_event_planner_template('single-event/event-details/organiser.php');

        /**
         * Template -> contact:
         * 
         * - Event Organizer's Contact
         */
        get_simple_event_planner_template('single-event/event-details/contact.php');

        /**
         * Template -> email:
         * 
         * - Event Organizer Email 
         */
        get_simple_event_planner_template('single-event/event-details/email.php');

        /**
         * Template -> category:
         * 
         * - Event Category
         */
        get_simple_event_planner_template('single-event/event-details/category.php');
        ?>
    </div>
    <!--End Event Organizer Details 
    ==================================================-->

    <?php
}

if ('' != sep_get_the_event_start_date() || '' != sep_get_the_event_end_date() || '' != sep_get_the_event_start_time() || '' != sep_get_the_event_start_time()) {
    ?>

    <!-- Start Event Schedule
    ==================================================-->
    <div class="single-event-time">       
        <h3> <?php esc_html_e('Schedule', 'simple-event-planner'); ?> </h3>
        <?php
        /**
         * Template -> event-date:
         * 
         * - Event  Date
         */
        get_simple_event_planner_template('single-event/event-date.php');

        /**
         * Template -> event-time:
         * 
         * - Event start and end time
         */
        get_simple_event_planner_template('single-event/event-time.php');
        ?>
    </div>
    <!-- ==================================================
    End Event Schedule -->

    <?php
}

$segments = sep_get_event_segment();
if (is_array($segments) && '' !== $segments[0]) {
    ?>

    <!-- Start Event Segments
    ================================================== -->
    <div class="single-segments">
        <?php
        /**
         * Template -> Segments:
         * 
         * - Event segment
         */
        get_simple_event_planner_template('single-event/event-details/segments.php');
        ?>
    </div>
    <!-- ==================================================
    End Event Segments -->

    <?php
}

/**
 * Template -> venue:
 * 
 * - Left Side map/venue
 */
get_simple_event_planner_template('single-event/event-details/venue.php');
$event_detail = ob_get_clean();

/**
 * Modify Event Detail Template. 
 *                                       
 * @since   1.3.0
 * 
 * @param   html    $event_detail   Event Detail Section HTML.                   
 */
echo apply_filters('sep_event_detail_template', $event_detail);