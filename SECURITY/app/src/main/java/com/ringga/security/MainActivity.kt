package com.ringga.security

/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
/* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/

import android.content.Intent
import android.graphics.Color
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.view.View
import android.widget.TextView
import android.widget.Toast
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.auth.BaseRespon
import com.ringga.security.database.PreferencesToken
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.auth.LoginActivity
import com.ringga.security.ui.home.HomeActivity
import kotlinx.android.synthetic.main.activity_main.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import com.google.android.material.snackbar.Snackbar



class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
    }

    override fun onStart() {
        super.onStart()
        Handler().postDelayed({
            if (SharedPrefManager.getInstance(this)!!.isLoggedIn) {

                RetrofitClient.instance.cekTokenApp(PreferencesToken.getToken(this)!!)
                    .enqueue(object : Callback<BaseRespon> {
                        override fun onResponse(
                            call: Call<BaseRespon>,
                            response: Response<BaseRespon>
                        ) {
                            if (response.body()?.stts == true) {
                                val intent = Intent(applicationContext, HomeActivity::class.java)
                                intent.flags =
                                    Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_CLEAR_TASK

                                startActivity(intent)
                                finish()
                            } else {
                                Toast.makeText(
                                    this@MainActivity,
                                    response.body()?.msg,
                                    Toast.LENGTH_SHORT
                                ).show()
                                SharedPrefManager.getInstance(this@MainActivity)!!.clear()
                                PreferencesToken.ClearToken(this@MainActivity)
                                startActivity(Intent(baseContext, LoginActivity::class.java))
                                finish()
                            }
                        }

                        override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                            showSnackBar(t.message!!)
                        }
                    })
            } else {
                startActivity(Intent(baseContext, LoginActivity::class.java))
            }
        }, 4500)
    }

    fun showSnackBar(text:String) {
        val snackbar = Snackbar.make(findViewById(R.id.main), "", Snackbar.LENGTH_INDEFINITE)
        val customView: View = layoutInflater.inflate(R.layout.custom_snackbar, null)
        snackbar.view.setBackgroundColor(Color.TRANSPARENT)
        val snackbarView = snackbar.view as Snackbar.SnackbarLayout
        snackbarView.setPadding(0, 0, 0, 0)
        customView.findViewById<TextView>(R.id.err).text = text
        customView.findViewById<View>(R.id.tv_undo).setOnClickListener {
            startActivity(Intent(this@MainActivity, MainActivity::class.java))
            snackbar.dismiss()
        }
        snackbarView.addView(customView, 0)
        snackbar.show()
    }

}