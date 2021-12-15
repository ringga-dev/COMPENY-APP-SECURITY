$(document).ready(function() {
        $("#username").on("change keyup paste", function () {
            $("#username").removeClass("is-invalid")
            $('#username').addClass('form-control-success')
        })
        $("#password").on("change keyup paste", function() {
            $("#password").removeClass("is-invalid")
            $('#password').addClass('form-control-success')
        })

        $("#login").click(function() {
            var name = $("#username").val();
            var pass = $("#password").val();

            if (!name & !pass) {
                $("#username").addClass("is-invalid");
                $("#password").addClass("is-invalid");
            } else if (!nama) {
                $("#username").addClass("is-invalid");
            } else if (!pass) {
                $("#password").addClass("is-invalid");
            }
        })
})


$('.hapus-menu').on('click', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "Akan menghapus data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = url;
            } 
        })

})

    $('.hapus-submenu').on('click', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "Akan menghapus data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = url;
            } 
        })

    })

    $('.hapus').on('click', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "Akan menghapus data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = url;
            } 
        })

    })

    $('.ok-update').on('click', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "ini akan mengizinkan update pada data tersebut!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = url;
            } 
        })

    })

    $('.remove-mata').on('click', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "Akan menghapus semua data yang telah di tampilkan di layar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = url;
            } 
        })

    })

      $('.ok-download').on('click', function(e) {
          e.preventDefault();
          
        const url = $(this).attr('src');

        Swal.fire({
            title: 'Are you sure?',
            text: "ini akan mengizinkan untuk mendownload image!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Download it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let fileName = url.replace(/^.*?([^\\\/]*)$/, '$1');
                console.log(fileName);
                saveAs(url, fileName);
                // document.location.href = url;
            } 
        })
      })
    
       $('.ok-download-sampel').on('click', function(e) {
          e.preventDefault();
          
        const url = $(this).attr('src');

        Swal.fire({
            title: 'Are you sure?',
            text: "ini akan mengizinkan untuk mendownload file sampel!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Download it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // let fileName = url.replace(/^.*?([^\\\/]*)$/, '$1');
                console.log(fileName);
                saveAs(url, "sampel.xlsx");
                // document.location.href = url;
            } 
        })
    })


    // window.setTimeout(function() {
    //     $('.alert').fadeTo(1500, 0).sliceUp(15000, function() {
    //         $(this).remove()
    //     }, 15000)
    // })

     // 1 detik = 1000
window.setTimeout("waktu()", 1000);

function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()", 1000);
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        document.getElementById("jam").innerHTML = tanggal.getDate() + "-" + tanggal.getMonth() + "-" + tanggal.getFullYear()+" "+tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
}
    

$('#logout').on('click', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "anda yakin ingin keluar dari aplikasi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, come out now!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = url;
            } 
        })

    })
