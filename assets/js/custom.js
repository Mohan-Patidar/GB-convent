// data table js start
$(document).ready(function() {
    $('#example').DataTable({
        // "scrollY": 500,
        "scrollX": true,
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        search: "_INPUT_",
        searchPlaceholder: "Search..."
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