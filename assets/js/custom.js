// data table js start
$(document).ready(function() {
    var table = $('#class-table').DataTable({
        "scrollX": true,
        'columnDefs': [{
            'targets': 0,
            'checkboxes': {
                'selectRow': true
            }
        }],
        'select': {
            style: 'multi',
            selector: 'td:first-child'
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
        e.preventDefault();
    });
});
// data table js end
$(document).ready(function() {
    $(".menu-button").click(function() {
        $(this).toggleClass("open");
        $("body").toggleClass("open");
    });
    jQuery(".overlay-close").click(function() {
        jQuery(".menu-button").removeClass("open");
        jQuery("body").removeClass("open");
    });

    // 
    var nav = $('.side-menu > li, .cus-menu > li');
    nav.find('ul').hide();
    nav.click(function() {
        nav.not(this).find('ul').hide();
        $(this).find('ul').slideToggle();
        $('.side-menu > li, .cus-menu > li').removeClass('active');
        $(this).addClass('active');
        var a =new Date().getFullYear();
        var b = a-1;
        var c = b+"-"+a;
        console.log(c);
    });
});

$(document).ready(function() {
    $('.table').DataTable({
        //disable sorting on last column
        //   "scrollY": 500,
        "scrollX": true,
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        "lengthMenu": [
            [5, 10, 50, 100, -1],
            [5, 10, 50, 100, "All"]
        ],
        dom: 'lBfrtip',
        buttons: [
            'csv'
        ],
        "oLanguage": {
            "sEmptyTable": "No data available in table"
        }
    })
});

// $(document).ready(function() {
// $("#target").val($("#target option:first").val());
// });