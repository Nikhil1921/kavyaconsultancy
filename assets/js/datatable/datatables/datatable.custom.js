var url = $("#base_url").val();
var dataTableUrl = $("input[name='dataTableUrl']").val();

var table = $('.datatable').DataTable({
    "pagingType": "full_numbers",
    /*"lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    dom: 'Bfrtip',
    buttons: [
        'pageLength',
        {
            extend: 'print',
            footer: true,
            exportOptions: {
                columns: ':visible'
            },
        },
        {
            extend: 'csv',
            footer: true,
            exportOptions: {
                columns: ':visible'
            },
        },
        'colvis'
    ],
    columnDefs: [ {
        targets: -1,
        visible: false
    } ],*/
    "processing": true,
    "serverSide": true,
    'language': {
        'loadingRecords': '&nbsp;',
        'processing': 'Processing',
        'paginate': {
            'first': 'First',
            'next': '<i class="fa fa-arrow-circle-right"></i>',
            'previous': '<i class="fa fa-arrow-circle-left"></i>',
            'last': 'Last'
        }
    },
    "order": [],
    "ajax": {
        url: dataTableUrl,
        type: "GET",
        data: function(data) {
            data.ins_type = $("input[name='ins_type']").val();
            data.doc_type = $("input[name='doc_type']").val();
            data.start_date = $("input[name='start']").val();
            data.end_date = $("input[name='end']").val();
        },
        complete: function(response) {},
    },
    "columnDefs": [{
        "targets": "target",
        "orderable": false,
    }, ]
});

$('.ins_type').click(function() {
    $("input[name='ins_type']").val($(this).data('value'));
    table.ajax.reload();
});

$('.doc_type').click(function() {
    $("input[name='doc_type']").val($(this).data('value'));
    table.ajax.reload();
});

$("select[name=vehicle]").change(function() {
    $("input[name='ins_type']").val($(this).val());
    table.ajax.reload();
});

$('input[name="daterange"]').daterangepicker();

$('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
    $("input[name='start']").val(picker.startDate.format("YYYY-MM-DD"));
    $("input[name='end']").val(picker.endDate.format('YYYY-MM-DD'));
    table.ajax.reload();
});