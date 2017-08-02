<?php
/**
 * Template displaying calendar links on event detail page.
 *
 * Override this template by copying it to yourtheme/simple_event_planner/single-event/event_calendar.php
 * 
 * @version     1.0.0
 * @since       1.3.0 
 * @author      PressTigers
 * @package     Simple_Event_Planner
 * @subpackage  Simple_Event_Planner/public/partials/single-event
 */
ob_start();
global $post;

$start_date = date('Ymd', strtotime(sep_get_the_event_start_date()));
$end_date = date('Ymd', strtotime(sep_get_the_event_end_date()));
date_default_timezone_set('UTC');
$start_time = date('\THis\Z', strtotime(str_replace('-', '/', sep_get_the_event_start_time())));
$end_time = date('\THis\Z', strtotime(str_replace('-', '/', sep_get_the_event_end_time())));
?>

<!-- Event Counter -->
<div class="google-calendar-ical">
    <?php
    if ('' !== sep_get_the_event_start_date() && '' !== sep_get_the_event_end_date()) {
        echo '<div class="pull-right">';
    } else {
        echo '<div class="pull-left">';
    }
    ?>
    <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=<?php echo esc_attr(get_the_title()); ?>&dates=<?php echo esc_attr($start_date). esc_attr($start_time); ?>/<?php echo esc_attr($end_date) . esc_attr($end_time); ?>&details=For+details,+link+here:+<?php echo  esc_url(the_permalink()); ?>&location=<?php echo sep_get_the_event_venue(); ?>&sf=true&output=xml" target="_blank" rel="nofollow"> <?php esc_html_e('Add to Google Calendar', 'simple-event-planner') ?> </a>
    <a href="<?php echo plugins_url( '/ical.php', __FILE__ ) ?>?startDate=<?php echo esc_attr($start_date); ?>&amp;endDate=<?php echo esc_attr($end_date); ?>&amp;startTime=<?php echo esc_attr($start_time); ?>&amp;endTime=<?php echo esc_attr($end_time); ?>&amp;uid=<?php echo $post->ID; ?>&amp;location=<?php echo sep_get_the_event_venue(); ?>&amp;subject=<?php echo esc_attr(get_the_title()); ?>&amp;url= <?php esc_url(the_permalink()); ?>"> <?php esc_html_e('Add to iCal', 'simple-event-planner') ?> </a>
</div>
</div>
<?php
$event_calendar = ob_get_clean();

/**
 * Modify Event Calendar Template. 
 *                                       
 * @since   1.3.0
 * 
 * @param   html    $event_calendar  Event Calendar  HTML.                   
 */
echo apply_filters('sep_event_calendar_template', $event_calendar);