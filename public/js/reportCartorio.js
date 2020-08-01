const ReportCartorio = function () {
    let initPlugin = function () {
        calendarDate('startDate');
        calendarDate('endDate');
    };

    return {
        init: function () {
            initPlugin();
        }
    };
}();

$(document).ready(function () {
    ReportCartorio.init();
});
