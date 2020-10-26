$(document).ready(function () {

    $(function () {
        var dateFrom;
        var dateTo;
        var dateFormat = "dd/mm/yy",
                from = $("#datepicker_od")
                .datepicker({
                   // minDate: "0",
                    changeMonth: true,
                    dateFormat: dateFormat
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                    dateFrom = this.value;
                    reloadForm();
                }),
                to = $("#datepicker_do").datepicker({
          //  minDate: "0",
            changeMonth: true,
            dateFormat: dateFormat
        })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
                    dateTo = this.value;
                    reloadForm();
                });
        function getDate(element) {


            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }

        function reloadForm() {

            if (dateFrom != null && dateTo != null) {

                $.post("ajax/vypujceni-reload-edit.php", {dateFrom: dateFrom, dateTo: dateTo}).done(function (data) {
                    $("#tbody").html(data);
                });
            }
        }

    });

$('select').select2();

$.datepicker.regional['cs'] = { 
                closeText: 'Cerrar', 
                prevText: 'Předchozí', 
                nextText: 'Další', 
                currentText: 'Hoy', 
                monthNames: ['Leden','Únor','Březen','Duben','Květen','Červen', 'Červenec','Srpen','Září','Říjen','Listopad','Prosinec'],
                monthNamesShort: ['Le','Ún','Bř','Du','Kv','Čn', 'Čc','Sr','Zá','Ří','Li','Pr'], 
                dayNames: ['Neděle','Pondělí','Úterý','Středa','Čtvrtek','Pátek','Sobota'], 
                dayNamesShort: ['Ne','Po','Út','St','Čt','Pá','So',], 
                dayNamesMin: ['Ne','Po','Út','St','Čt','Pá','So'], 
                weekHeader: 'Sm', 
                dateFormat: 'dd/mm/yy', 
                firstDay: 1, 
                isRTL: false, 
                showMonthAfterYear: false, 
                yearSuffix: ''}; 
 
 
$.datepicker.setDefaults($.datepicker.regional['cs']); 
$("#datepicker_od").datepicker();
$("#datepicker_do").datepicker();
$("#datepicker_od_edit").datepicker();
$("#datepicker_do_edit").datepicker();
                    

});