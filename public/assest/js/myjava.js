$(document).ready(function () {



            $("#menu_visito").show();
            $("#menu_izin").show();
            $("#menu_absen").hide();
            $("#menu_izin_lot").show();


            $("#absen").show();
            $("#visitor").hide();
            $("#izin").hide();
            $("#izin_lot").hide();


            $("#stts").hide();
            $("#stts_lot").hide();
    
            $("#form-lokasi").hide();

            $("#menu_absen").click(function() {
                $("#menu_absen").hide();
                $("#menu_visito").show();
                $("#menu_izin").show();
                $("#menu_izin_lot").show();

                $("#absen").show();
                $("#visitor").hide();
                $("#izin").hide();
                $("#izin_lot").hide();
            });

            $("#menu_visito").click(function() {
                $("#menu_absen").show();
                $("#menu_visito").hide();
                $("#menu_izin").show();
                $("#menu_izin_lot").show();

                $("#absen").hide();
                $("#visitor").show();
                $("#izin").hide();
                $("#izin_lot").hide();
            });

            $("#menu_izin").click(function() {
                $("#menu_absen").show();
                $("#menu_visito").show();
                $("#menu_izin").hide();
                $("#menu_izin_lot").show();


                $("#absen").hide();
                $("#visitor").hide();
                $("#izin").show();
                $("#izin_lot").hide();
            });

            $("#menu_izin_lot").click(function() {
                $("#menu_absen").show();
                $("#menu_visito").show();
                $("#menu_izin").show();
                $("#menu_izin_lot").hide();


                $("#absen").hide();
                $("#visitor").hide();
                $("#izin").hide();
                $("#izin_lot").show();
            });
    
    
    
}); 