/**
  * Simple Event Planner Calendar Callback JS File - V 1.0.0
  *
  * @author PressTigers <support@presstigers.com>, 2016
  *
  * Actions List
  * - Event calendar_init
  * - sep_search_events
  */
(function ($) {
    'use strict';

    var calendar_init = function (jsondata, eventslimit)
    {        
        $("#event-calendar-limit").eventCalendar({            
            jsonData: JSON.parse(jsondata),
            jsonDateFormat: 'human',
            txt_noEvents: 'No results found.',
            showDescription: true,
            eventsLimit: eventslimit,
            txt_NextEvents: 'Events',
            monthNames: ["January, ", "February, ", "March, ", "April, ", "May, ", "June, ",
                "July", "August, ", "September, ", "October, ", "November, ", "December, "],
        });
    }

    $(document).ready(function ($)
    {
        // Search Events
        window.sep_search_events = function (admin_url)
        {
            var loc_address = $('#loc-addres').val();
            var event_category = $('#event-cat').val();
            var dataString = 'address=' + loc_address + '&event_category=' + event_category + '&action=sep_search_events&security=' + calendar_parameters.security + '';

            $.ajax({
                type: 'POST',
                url: admin_url,
                data: dataString,
                success: function (response) {
                    $('#event-calendar-limit').html('');
                    calendar_init('' + response + '', '9999999');
                }
            });
        }
        
        calendar_init(calendar_parameters.event_calendar, calendar_parameters.event_limit);
    });
})(jQuery);