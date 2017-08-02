<?php
/**
 * Template contains iCalndar for event detail page.
 *
 * Override this template by copying it to yourtheme/simple_event_planner/single-event/ical.php
 * 
 * @version     1.0.0
 * @since       1.3.0 
 * @author      PressTigers
 * @package     Simple_Event_Planner
 * @subpackage  Simple_Event_Planner/public/partials/single-event
 */

//set correct content-type-header
header('Content-type: text/calendar; charset=utf-8');
header('Content-Disposition: inline; filename=calendar.ics');

//Get Perameters to Create iCal File.
$uid = $_GET['uid'];
$link = $_GET['url'];
$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];
$startTime = $_GET['startTime'];
$endTime = $_GET['endTime'];
$subject = $_GET['subject'];
$location = $_GET['location'];

$ical = "BEGIN:VCALENDAR
VERSION:1.0
BEGIN:VEVENT : " . $link . "
UID:" . $uid . "
DTSTART:" . $startDate . $startTime . "
DTEND:" . $endDate . $endTime . "
SUMMARY:" . $subject . "
LOCATION:" . $location . "
URL;VALUE=URI:" . $link . "
END:VEVENT
END:VCALENDAR";
echo $ical;
exit;