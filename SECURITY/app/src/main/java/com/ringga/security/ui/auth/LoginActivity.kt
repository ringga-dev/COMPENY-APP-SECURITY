package com.ringga.security.ui.auth
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/

import android.content.ContentValues
import android.content.Context
import android.content.Intent
import android.net.ConnectivityManager
import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.util.Log
import android.view.Gravity
import android.view.LayoutInflater
import android.view.View
import android.widget.Toast
import androidx.annotation.RequiresApi
import com.google.android.gms.tasks.OnCompleteListener
import com.google.firebase.messaging.FirebaseMessaging
import com.ringga.security.R
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.auth.BaseRespon
import com.ringga.security.data.model.auth.LoginRespon
import com.ringga.security.database.PreferencesToken.Companion.setToken
import com.ringga.security.database.PreferencesTokenFirebase
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.home.HomeActivity
import com.ringga.security.ui.skema.VidioViewActivity
import com.ringga.security.util.snackbar
import kotlinx.android.synthetic.main.activity_login.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.util.regex.Pattern

class LoginActivity : AppCompatActivity() {


    @RequiresApi(Build.VERSION_CODES.M)
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)



        btn_cek_conetion.setOnClickListener {view ->
            val ConnectionManager = getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager
            val networkInfo = ConnectionManager.activeNetworkInfo
            if (networkInfo != null && networkInfo.isConnected) {
                Toast.makeText(this@LoginActivity, "Network Available", Toast.LENGTH_LONG).show()
                Handler().postDelayed({
                    val cm = applicationContext.getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager
                    // Network Capabilities of Active Network
                    val nc = cm.getNetworkCapabilities(cm.activeNetwork)
                    // DownSpeed in MBPS
                    val downSpeed = (nc?.linkDownstreamBandwidthKbps)!!/1000
                    // UpSpeed  in MBPS
                    val upSpeed = (nc.linkUpstreamBandwidthKbps)/1000
                    // Toast to Display DownSpeed and UpSpeed
                    snackbar("Up Speed: $upSpeed Mbps \nDown Speed: $downSpeed Mbps", view)
                }, 2000)
            } else {
                snackbar("Network Not Available", view)
            }
        }

        tv_register.setOnClickListener {
            startActivity(Intent(this, RegisterActivity::class.java))
            finish()
        }
        btn_help.setOnClickListener {
            val intent = Intent(applicationContext, VidioViewActivity::class.java)
            intent.flags =
                Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_CLEAR_TASK

            startActivity(intent)
        }

        loginBtn.setOnClickListener {
            loading.visibility = View.VISIBLE
            val email = ed_mail.text.toString().trim()
            val password = ed_pass.text.toString().trim()

            if (email.isEmpty()) {
                ed_mail.error = "Email required"
                ed_mail.requestFocus()
                loading.visibility = View.GONE
                return@setOnClickListener
            }
            if (!cek_email(email)) {
                ed_mail.error = "ini bukan format email"
                ed_mail.requestFocus()
                loading.visibility = View.GONE
                return@setOnClickListener
            }

            if (password.isEmpty()) {
                ed_pass.error = "Password required"
                ed_pass.requestFocus()
                loading.visibility = View.GONE
                return@setOnClickListener
            }
            login(email, password, it)
        }
    }

    private fun login(email: String, password: String, view: View) {

        RetrofitClient.instance.login(email, password)
            .enqueue(object : Callback<LoginRespon> {
                override fun onResponse(call: Call<LoginRespon>, response: Response<LoginRespon>) {
                    if (response.body()?.stts == true) {
                        response.body()?.data?.let { it1 ->
                            SharedPrefManager.getInstance(applicationContext)!!
                                .saveUser(response.body()?.data!!)

                            setToken(this@LoginActivity, response.body()?.key?.token)

                            saveToken(response.body()?.data?.id_bet, response.body()?.key?.token!!)
                            val intent = Intent(applicationContext, HomeActivity::class.java)
                            intent.flags =
                                Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_CLEAR_TASK

                            startActivity(intent)
                            finish()
                        }
                    } else {
                        snackbar(  response.body()?.msg.toString(), view)
                    }
                    loading.visibility = View.GONE
                }

                override fun onFailure(call: Call<LoginRespon>, t: Throwable) {
//                    Toast.makeText(this@LoginActivity, t.message, Toast.LENGTH_SHORT).show()

                    snackbar(t.message!!, view)
                    loading.visibility = View.GONE
                }
            })

    }

    private fun cek_email(myEmail: String): Boolean {
        val emailRegex = Pattern.compile(
            "[a-zA-Z0-9\\+\\.\\_\\%\\-\\+]{1,256}" +
                    "\\@" +
                    "[a-zA-Z0-9][a-zA-Z0-9\\-]{0,64}" +
                    "(" +
                    "\\." +
                    "[a-zA-Z0-9][a-zA-Z0-9\\-]{0,25}" +
                    ")+"
        )
        return emailRegex.matcher(myEmail).matches()
    }


    private fun alert() {
        val layoutInflater: LayoutInflater = layoutInflater
        val view = layoutInflater.inflate(R.layout.custom_alert, findViewById(R.id.alert_custom))
        val custom_toast = Toast.makeText(this, "Toast:Gravity.Top", Toast.LENGTH_SHORT)
        custom_toast.setGravity(Gravity.CENTER, 0, 0)
        custom_toast.view = view
        custom_toast.show()
    }

//    override fun onStart() {
//        super.onStart()
//
//        if (SharedPrefManager.getInstance(this)!!.isLoggedIn) {
//            RetrofitClient.instance.cekTokenApp(getToken(this)!!)
//                .enqueue(object : Callback<BaseRespon>{
//                    override fun onResponse(
//                        call: Call<BaseRespon>,
//                        response: Response<BaseRespon>
//                    ) {
//                      if (response.body()?.stts == true){
//                          val intent = Intent(applicationContext, HomeActivity::class.java)
//                          intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_CLEAR_TASK
//
//                          startActivity(intent)
//                          finish()
//                      }else{
//                          Toast.makeText(this@LoginActivity, response.body()?.msg, Toast.LENGTH_SHORT).show()
//                          SharedPrefManager.getInstance(this@LoginActivity)!!.clear()
//                          ClearToken(this@LoginActivity)
//                          startActivity(Intent(baseContext, LoginActivity::class.java))
//                          finish()
//                      }
//                    }
//
//                    override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
//                        Toast.makeText(this@LoginActivity, t.message, Toast.LENGTH_SHORT).show()
//                    }
//
//                })
//
//
//        }
//    }

    private fun tokenCek(): String? {
        var tokencek: String? = null
        FirebaseMessaging.getInstance().token.addOnCompleteListener(OnCompleteListener { task ->
            if (!task.isSuccessful) {
                Log.w(ContentValues.TAG, "Fetching FCM registration token failed", task.exception)
                return@OnCompleteListener
            }

            // Get new FCM registration token
            tokencek = task.result
        })

        return tokencek
    }

    private fun saveToken(id: String?, token_user: String) {
        val token = PreferencesTokenFirebase.getToken(this).toString()

        RetrofitClient.instance.saveToken(token_user, token, id.toString()).enqueue(
            object : Callback<BaseRespon> {
                override fun onResponse(call: Call<BaseRespon>, response: Response<BaseRespon>) {
//                    Toast.makeText(
//                        applicationContext,
//                        response.code().toString(),
//                        Toast.LENGTH_LONG
//                    ).show()
                }

                override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                    Toast.makeText(applicationContext, t.message, Toast.LENGTH_LONG).show()
                }

            }
        )

    }
}