package com.ringga.security.ui.profile
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.app.AlertDialog
import android.content.DialogInterface
import android.content.Intent
import android.graphics.Color
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import com.ringga.security.R
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.auth.LoginActivity
import kotlinx.android.synthetic.main.activity_profile.*

class ProfileActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_profile)

        val myProfile = SharedPrefManager.getInstance(this)?.user

        tv_name.text = myProfile?.name
        tv_id_bet.text = myProfile?.id_bet
        tv_devisi.text = myProfile?.devisi
        tv_email.text = myProfile?.email
        tv_phone.text = myProfile?.no_phone

        btn_edit.setOnClickListener {
            startActivity(Intent(this, EditPasswordActivity::class.java))
        }

        btn_log_aut.setOnClickListener {
            alert()
        }
    }

    private  fun  alert(){
        val dialog = AlertDialog.Builder(this)
            // Judul
            .setTitle("Log out")
            // Pesan yang di tamopilkan
            .setMessage("apa anda yakin untuk keluar")
            .setPositiveButton("Ya, saya ingin keluar", DialogInterface.OnClickListener { dialogInterface, i ->
                SharedPrefManager.getInstance(this)!!.clear()
                startActivity(Intent(baseContext, LoginActivity::class.java))
                finish()
            })
            .setNegativeButton("Tidak Terimakasih", DialogInterface.OnClickListener { dialogInterface, i ->
                Toast.makeText(this, "di batalkan", Toast.LENGTH_LONG).show()
            })
            .show()

        dialog.getButton(AlertDialog.BUTTON_POSITIVE).setTextColor(Color.RED)
    }
}