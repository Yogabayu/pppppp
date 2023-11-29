"use strict";

$("#table-1").dataTable({
    columnDefs: [{ sortable: false, targets: [] }],
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "pdfHtml5", "csvHtml5"],
});
$("#table-2").dataTable({
    columnDefs: [{ sortable: false, targets: [] }],
    buttons: ["copy", "csv", "excel", "pdf", "print"],
});
