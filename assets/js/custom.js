// data table js start
$(document).ready(function() {
    var table = $('#class-table').DataTable({
        dom: 'lBfrtip',
        buttons: [
            'csv'
        ],
        "scrollX": true,
        'columnDefs': [{
            'targets': 0,
            'checkboxes': {
                'selectRow': true
            }
        }],
        'select': {
            'style': 'multi',
            'selector': 'td:first-child'
        },
        'order': [
            [1, 'asc']
        ]
    });

    // Handle form submission event 
    $('#frm-example').on('submit', function(e) {


        var form = this;

        var rows_selected = table.column(0).checkboxes.selected();
        $b = [];


        // Iterate over all selected checkboxes
        $.each(rows_selected, function(index, rowId) {

            $b.push(rowId);

        });
        var row = JSON.stringify($b);
        $('#promote').val(row);
        // $.ajax({
        //     url: location.origin +'/school_manage/promote',
        //     type: "get",
        //     data: {
        //        'data': row,
        //     },
        //     success: function (data) {
        //          console.log(data);
        //         // location.reload();
        //     }
        // });
        // FOR DEMONSTRATION ONLY
        // The code below is not needed in production

        // Output form data to a console     
        // var a = $('#example-console-rows').text(rows_selected.join(","));

        e.preventDefault();
    });
});
// data table js end
$(document).ready(function() {
    $(".menu-button").click(function() {
        $(this).toggleClass("open");
        $("body").toggleClass("open");
        jQuery('.sub-menus').slideUp();
    });
    $(" .mob-open").click(function() {
        $("body").addClass("open");
    });
    jQuery(".overlay-close").click(function() {
        jQuery(".menu-button, body").removeClass("open");
        jQuery('.sub-menus').slideUp();
    });

    // 
    var nav = $('.side-menu > li, .cus-menu > li, .user-drop-sec li');
    nav.find('ul').hide();
    nav.click(function() {
        nav.not(this).find('ul').hide();
        $(this).find('ul').slideToggle();
        $('.side-menu > li, .cus-menu > li, .user-drop-sec li').removeClass('active');
        $(this).addClass('active');
        var a = new Date().getFullYear();
        var b = a - 1;
        var c = b + "-" + a;
        console.log(c);
    });
});

$(document).ready(function() {
    $('.table').removeAttr('width').DataTable({
        //disable sorting on last column
        //   "scrollY": 500,
        "scrollX": true,
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        "lengthMenu": [
            [10, 50, 100, -1],
            [10, 50, 100, "All"]
        ],
        dom: 'lBfrtip',
        "bInfo": false,
        buttons: [
            'csv'
        ],
        "oLanguage": {
            "sEmptyTable": "No data available in table",
            "sSearch": "",
            "sPlaceholder": "Search Here",
            "sZeroRecords": "No matching records found",
        }
    })
});