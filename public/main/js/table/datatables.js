$(document).ready(function () {
    $('#dataTables').DataTable({
        scrollY: '550px',
        scrollX:  true,
        scrollCollapse: true,
        paging:  false,
        fixedColumns:   {
            leftColumns: 9
        }
    });

    $('#dataTablesRem').DataTable();
});
