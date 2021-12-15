

  

  
$(function () {
    $("#example1").DataTable({
        "ordering": false,
        "searching": true,
        "lengthMenu": [[25, 50, 100, 200, -1], [25, 50, 100, 200, "All"]],
        "info": true,
        "scrollY": 1000,
        "scrollX": true,
    });

    $('#example2').DataTable({
        "paging": true,
        // "lengthChange": false,
        // "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    $('#example3').DataTable({
        "paging": true,
        // "lengthChange": false,
        // "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

           
    $('#tableView').DataTable({
        "ordering": false,
        "searching": true,
        "info": true,
        "scrollX": true,
    });

   
    $("#tableViewReport").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  
})
        