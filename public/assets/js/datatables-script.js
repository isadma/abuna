"use strict";
var KTDatatablesExtensionButtons = function() {

	var initTable1 = function() {
		// begin first table
		var table = $('#kt_table_1').DataTable({
			responsive: true,
			// Pagination settings
			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            "language": {
                "search": "Gözle",
                "lengthMenu": "Her sahypada _MENU_",
                "zeroRecords": "Hiç hili magalumat ýok",
                "info": "_PAGE_-nji/njy sahypa. Jemi:_PAGES_",
                "infoEmpty": "Hiç hili maglimat tapylmady",
                "infoFiltered": "(_MAX_ maglumatdan filtirlendi)"
            },
			buttons: [
                {
                    'extend' : 'print',
                    customize: function(win)
                    {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet)
                        {
                            style.styleSheet.cssText = css;
                        }
                        else
                        {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                    },
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    },
                },
                {
                    'extend' : 'copyHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    'extend' : 'excelHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    'extend' : 'csvHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    'extend' : 'pdfHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    },
                    orientation: 'landscape'
                }
			],
		});

	};

	var initTable2 = function() {
		// begin first table
		var table = $('#kt_table_2').DataTable({
			responsive: true,
            "language": {
                "search": "Gözle",
                "lengthMenu": "Her sahypada _MENU_",
                "zeroRecords": "Hiç hili magalumat ýok",
                "info": "_PAGE_-nji/njy sahypa. Jemi:_PAGES_",
                "infoEmpty": "Hiç hili maglimat tapylmady",
                "infoFiltered": "(_MAX_ maglumatdan filtirlendi)"
            },
			buttons: [
                {
                    'extend' : 'print',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    'extend' : 'copyHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    'extend' : 'excelHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    'extend' : 'csvHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    'extend' : 'pdfHtml5',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
			],
			processing: true,
			serverSide: true,
		});

		$('#export_print').on('click', function(e) {
			e.preventDefault();
			table.button(0).trigger();
		});

		$('#export_copy').on('click', function(e) {
			e.preventDefault();
			table.button(1).trigger();
		});

		$('#export_excel').on('click', function(e) {
			e.preventDefault();
			table.button(2).trigger();
		});

		$('#export_csv').on('click', function(e) {
			e.preventDefault();
			table.button(3).trigger();
		});

		$('#export_pdf').on('click', function(e) {
			e.preventDefault();
			table.button(4).trigger();
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
			initTable2();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesExtensionButtons.init();
});
