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


});

$(document).ready(function() {
    $('.table').DataTable({
      //disable sorting on last column
    //   "scrollY": 500,
        "scrollX": true,
      "columnDefs": [
        { "orderable": false, "targets": 5 }
      ],
    "lengthMenu": [ [5,10, 50, 100, -1], [5,10, 50, 100, "All"] ],
      dom: 'lBfrtip',
      buttons: [
          'csv'
      ],
      "oLanguage": {
        "sEmptyTable":     "My Custom Message On Empty Table"
    }
    //   'language': {
    //     //customize pagination prev and next buttons: use arrows instead of words
    //     'paginate': {
    //       'previous': '<span class="fa fa-chevron-left"></span>',
    //       'next': '<span class="fa fa-chevron-right"></span>'
    //     },
         
    //   // customize number of elements to be displayed
    //     // "lengthMenu": 'Display <select id="target">'+
    //     // '<option value="-1">All</option>'+
    //     // '<option value="5" selected>5</option>'+
    //     // '<option value="20">20</option>'+
    //     // '<option value="30">30</option>'+
    //     // '<option value="40">40</option>'+
    //     // '<option value="50">50</option>'+
    //     // '</select> results'
    //   }
    })  
} );

// $(document).ready(function() {
// $("#target").val($("#target option:first").val());
// });