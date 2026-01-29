/****************************************
 *         Table Responsive             *
 ****************************************/
$(document).ready(function () {
    // Init semua datatable otomatis
    $("table.dataTable").each(function () {
        let table = $(this).DataTable({
            destroy: true,
        });

        // custom search GLOBAL
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            // hanya jalan untuk table ini
            if (settings.nTable !== table.table().node()) {
                return true;
            }
           let selectedStatus = $("#status").val();
            if (!selectedStatus) return true;

            // cek semua kolom, cari yang ISINYA status
            for (let i = 0; i < data.length; i++) {
                let text = $("<div>").html(data[i]).text().trim();

                if (text === selectedStatus) {
                    return true;
                }
            }

            return false;
        });

        // trigger redraw saat dropdown berubah
        $("#status").on("change", function () {
            table.draw();
        });

        // custom search input
        $("#customSearch").on("keyup", function () {
            table.search(this.value).draw();
        });
    });
});

$(function () {
    $("#config-table").DataTable({
        responsive: true,
    });
});

/****************************************
 *       Basic Table                   *
 ****************************************/

/****************************************
 *       Default Order Table           *
 ****************************************/
$("#default_order").DataTable({
    order: [[3, "desc"]],
});

/****************************************
 *       Multi-column Order Table      *
 ****************************************/
$("#multi_col_order").DataTable({
    columnDefs: [
        {
            targets: [0],
            orderData: [0, 1],
        },
        {
            targets: [1],
            orderData: [1, 0],
        },
        {
            targets: [4],
            orderData: [4, 0],
        },
    ],
});

/****************************************
 *       Complex header Table          *
 ****************************************/
$("#complex_header").DataTable();

/****************************************
 *       DOM positioning Table         *
 ****************************************/
$("#DOM_pos").DataTable({
    dom: '<"top"i>rt<"bottom"flp><"clear">',
});

/****************************************
 *     alternative pagination Table    *
 ****************************************/
$("#alt_pagination").DataTable({
    pagingType: "full_numbers",
});

/****************************************
 *     vertical scroll Table    *
 ****************************************/
$("#scroll_ver").DataTable({
    scrollY: "300px",
    scrollCollapse: true,
    paging: false,
});

/****************************************
 * vertical scroll,dynamic height Table *
 ****************************************/
$("#scroll_ver_dynamic_hei").DataTable({
    scrollY: "50vh",
    scrollCollapse: true,
    paging: false,
});

/****************************************
 *     horizontal scroll Table    *
 ****************************************/
$("#scroll_hor").DataTable({
    scrollX: true,
});

/****************************************
 * vertical & horizontal scroll Table  *
 ****************************************/
$("#scroll_ver_hor").DataTable({
    scrollY: 300,
    scrollX: true,
});

/****************************************
 * Language - Comma decimal place Table  *
 ****************************************/
$("#lang_comma_deci").DataTable({
    language: {
        decimal: ",",
        thousands: ".",
    },
});

/****************************************
 *         Language options Table      *
 ****************************************/
$("#lang_opt").DataTable({
    language: {
        lengthMenu: "Display _MENU_ records per page",
        zeroRecords: "Nothing found - sorry",
        info: "Showing page _PAGE_ of _PAGES_",
        infoEmpty: "No records available",
        infoFiltered: "(filtered from _MAX_ total records)",
    },
});
