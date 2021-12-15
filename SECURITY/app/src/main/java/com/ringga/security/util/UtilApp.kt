package com.ringga.security.util

/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.content.Context
import android.content.Intent
import android.view.View
import android.widget.Toast
import com.google.android.material.snackbar.Snackbar
import com.ringga.security.ui.scan.ShiftScanActivity
import kotlinx.coroutines.withContext

fun pindah(context:Context,id:String, text:String, alasan:String){
    val i = Intent(context, ShiftScanActivity::class.java)
    i.putExtra("id", id)
    i.putExtra("stts", text)
    i.putExtra("alasan", alasan)
    context.startActivity(i)
}

fun toast(context:Context, text: String){
    Toast.makeText(context, text, Toast.LENGTH_SHORT).show()
}

fun snackbar(text:String, view: View){
    Snackbar.make(view, text, Snackbar.LENGTH_SHORT)
        .setAction("Action", null).show()
}



