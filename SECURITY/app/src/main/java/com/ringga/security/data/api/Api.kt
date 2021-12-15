package com.ringga.security.data.api
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/

import com.ringga.security.data.model.auth.BaseRespon
import com.ringga.security.data.model.auth.LoginRespon
import com.ringga.security.data.model.cek_user.CekUserRespon
import com.ringga.security.data.model.gr_location.QrLocationRespon
import com.ringga.security.data.model.historiPatrol.PatrolHistoryRespon
import com.ringga.security.data.model.shift.ShiftModel
import com.ringga.security.data.model.user_late.UserLateRespon
import com.ringga.security.data.model.visitor.VisitorRespon
import retrofit2.Call
import retrofit2.http.Field
import retrofit2.http.FormUrlEncoded
import retrofit2.http.POST

interface Api {

    //login
    @FormUrlEncoded
    @POST("UserApi/login_api")
    fun login(
        @Field("email") email: String,
        @Field("password") password: String
    ): Call<LoginRespon>

    //register
    @FormUrlEncoded
    @POST("UserApi/regiter_api")
    fun register(
        @Field("name") name: String,
        @Field("id_bet") id_bet: String,
        @Field("email") email: String,
        @Field("no_phone") no_phone: String,
        @Field("password") password: String,
    ): Call<BaseRespon>

    //register
    @FormUrlEncoded
    @POST("UserApi/list_patrol")
    fun listPatrol(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("tgl") tgl: String,
    ): Call<BaseRespon>

    //cek token
    @FormUrlEncoded
    @POST("UserApi/cek_token")
    fun cekTokenApp(
        @Field("token") token: String
    ): Call<BaseRespon>

    //listVisitor
    @FormUrlEncoded
    @POST("UserApi/listvisitor")
    fun list_visitor(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("stts") stts: String,
    ): Call<VisitorRespon>

    //listVisitor
    @FormUrlEncoded
    @POST("UserApi/scanvisitor")
    fun scan_visitor(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("qr_code") qr_code: String,
        @Field("stts") stts: String,
    ): Call<BaseRespon>

    //list qr location
    @FormUrlEncoded
    @POST("UserApi/location_scan_qr")
    fun qr_location(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("lot") lot: String,
    ): Call<QrLocationRespon>

    //list qr location
    @FormUrlEncoded
    @POST("UserApi/addpatrol")
    fun addpatrol(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("qr_code") qr_code: String,
        @Field("date") date: String,
    ): Call<BaseRespon>

    //list Patrol
    @FormUrlEncoded
    @POST("UserApi/list_patrol")
    fun list_patrol(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("tgl") tgl: String,
    ):Call<PatrolHistoryRespon>

    //list Patrol
    @FormUrlEncoded
    @POST("UserApi/save_token")
    fun saveToken(
        @Field("token") token: String,
        @Field("tokenFirebase") tokenFirebase: String,
        @Field("id") id: String,
    ):Call<BaseRespon>

    //izin kariawan
    @FormUrlEncoded
    @POST("UserApi/user_izin")
    fun user_izin(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("bet") bet: String,
        @Field("dari") dari: String,
        @Field("menuju") menuju: String,
        @Field("stts") stts: String,
    ):Call<BaseRespon>

    //edit password
    @FormUrlEncoded
    @POST("UserApi/edit_pass")
    fun edit_pass(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("new_pass") new_pass: String,
        @Field("old_pass") old_pass: String,
    ):Call<BaseRespon>

    //update location
    @FormUrlEncoded
    @POST("UserApi/location_user")
    fun location_user(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("lat") lat: String,
        @Field("long") long: String,
    ):Call<BaseRespon>

    //update location
    @FormUrlEncoded
    @POST("UserApi/user_late")
    fun user_late(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("id_bet") id_bet: String,
        @Field("id_shift") id_shift: String,
        @Field("stts") stts: String,
        @Field("alasan") alasan: String,
    ):Call<BaseRespon>

    //list Shift
    @FormUrlEncoded
    @POST("UserApi/shift")
    fun shift(
        @Field("token") token: String,
        @Field("id") id: String,
    ):Call<ShiftModel>

    //list late
    @FormUrlEncoded
    @POST("UserApi/late_user")
    fun late_user(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("id_bet") id_bet: String,
        @Field("date") date: String,
    ):Call<UserLateRespon>


    //list qr location
    @FormUrlEncoded
    @POST("UserApi/cek_user")
    fun cek_user_app(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("id_bet") id_bet: String,
    ): Call<CekUserRespon>


    //list qr location
    @FormUrlEncoded
    @POST("UserApi/gagal_finger_user")
    fun gagal_finger_user(
        @Field("token") token: String,
        @Field("id") id: String,
        @Field("id_bet") id_bet: String,
        @Field("alasan") alasan: String,
        @Field("stts") stts: String,
    ): Call<BaseRespon>
}


