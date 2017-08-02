/**
  * Simple Event Planner Public JS File - V 1.1.0
  *
  * @author PressTigers <support@presstigers.com>, 2016
  *
  * Actions List
  * - Event Counter 
  * - Expand Right Col. on Hidden Event Detail
  * - Autocomplete Search Location Address
  */
(function ($) {
    'use strict';

    if ($('#countdown-underconstruction').length) {

        // Event Counter Localize Data
        var year = event.year;
        var month = event.month;
        var day = event.day;
        var hours = event.hours;
        var minutes = event.minutes;
    }

    $(window).load(function () {

        //Search Location Address Autocomplete
        var location_address = $('#loc-addres');

        if (location_address.length) {
            location_address.geocomplete();
        }

        // On Hover Read Address
        $('.submit-location').live('hover', function () {
            var item_val = location_address.val();
            location_address.val(item_val);
        });

        // Event Counter 
        var countdown_underconstruction = $('#countdown-underconstruction');
        if (countdown_underconstruction.length) {
            var austDay = new Date();
            austDay = new Date(year, month - 1, day, hours, minutes);
            countdown_underconstruction.countdown({
                until: austDay,
                format: 'wdhms',
                layout: '<div class="main-digit-wrapp"><span class="digit-wrapp"><span class="cs-digit">{w10}</span><span class="cs-digit">{w1}</span></span><span class="countdown-period">' + sep_counter.week + '</span></div>' +
                        '<div class="main-digit-wrapp"><span class="digit-wrapp"><span class="cs-digit">{d10}</span><span class="cs-digit">{d1}</span></span><span class="countdown-period">' + sep_counter.day + '</span></div>' +
                        '<div class="main-digit-wrapp"><span class="digit-wrapp"><span class="cs-digit">{h10}</span><span class="cs-digit">{h1}</span></span><span class="countdown-period">' + sep_counter.hours + '</span></div>' +
                        '<div class="main-digit-wrapp"><span class="digit-wrapp"><span class="cs-digit">{m10}</span><span class="cs-digit">{m1}</span></span><span class="countdown-period">' + sep_counter.minutes + '</span></div>' +
                        '<div class="main-digit-wrapp"><span class="digit-wrapp"><span class="cs-digit">{s10}</span><span class="cs-digit">{s1}</span></span><span class="countdown-period">' + sep_counter.seconds + '</span></div>'
            });
        }
    });

    // Expand Right Col. on Hidden Event Detail
    if (!($('.single-event-details')).children().length) {
        $('.single-event-details').parent().next().removeClass('col-md-7 col-sm-6');
        $('.single-event-details').parent().next().addClass('col-md-12 col-sm-12');
        $('.single-event-details').parent().remove();
        $('.single-event-details').remove();
    }
    
})(jQuery);