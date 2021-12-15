package com.ringga.security.ui.profile
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import com.ringga.security.R
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.auth.BaseRespon
import com.ringga.security.database.PreferencesToken
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.auth.LoginActivity
import kotlinx.android.synthetic.main.activity_edit_password.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class EditPasswordActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_edit_password)

        btn_kirim.setOnClickListener {
            val myProfile = SharedPrefManager.getInstance(this)?.user


            val newPass = ed_newPass.text.toString().trim()
            val veriPass = ed_veriPass.text.toString().trim()
            val oldPass = et_oldPass.text.toString().trim()

            if (newPass.isEmpty()) {
                ed_newPass.error = "Ini harus di isi"
                ed_newPass.requestFocus()
                return@setOnClickListener
            }
            if (veriPass.isEmpty()) {
                ed_veriPass.error = "Ini harus di isi"
                ed_veriPass.requestFocus()
                return@setOnClickListener
            }
            if (oldPass.isEmpty()) {
                et_oldPass.error = "Ini harus di isi"
                et_oldPass.requestFocus()
                return@setOnClickListener
            }
            if(newPass != veriPass){
                Toast.makeText(this, "OPS....! \n new password dan password kedua berbeda...!", Toast.LENGTH_SHORT).show()
                ed_veriPass.error = "Berbeda dengan password 1"
                ed_veriPass.requestFocus()
                return@setOnClickListener
            }
            if(newPass == oldPass){
                Toast.makeText(this, "password lama dan baru harus berbeda", Toast.LENGTH_SHORT).show()
                ed_newPass.requestFocus()
                return@setOnClickListener
            }



            RetrofitClient.instance.edit_pass(
                PreferencesToken.getToken(this)!!,
                myProfile?.id.toString(),
                newPass, oldPass
            )
                .enqueue(object : Callback<BaseRespon> {
                    override fun onResponse(
                        call: Call<BaseRespon>,
                        response: Response<BaseRespon>
                    ) {
                        if (response.body()?.stts == true){
                            Toast.makeText(
                                this@EditPasswordActivity,
                                response.body()?.msg,
                                Toast.LENGTH_SHORT
                            ).show()
                            SharedPrefManager.getInstance(this@EditPasswordActivity)!!.clear()
                            startActivity(Intent(baseContext, LoginActivity::class.java))
                            finish()
                        }else{
                            Toast.makeText(
                                this@EditPasswordActivity,
                                response.body()?.msg,
                                Toast.LENGTH_SHORT
                            ).show()
                        }

                    }

                    override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                        Toast.makeText(this@EditPasswordActivity, t.message, Toast.LENGTH_SHORT)
                            .show()
                    }
                })
        }
    }
}