package com.ringga.security.ui.auth
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.ArrayAdapter
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.Volley
import com.ringga.security.R
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.auth.BaseRespon
import com.ringga.security.database.PreferencesToken
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.home.HomeActivity
import com.ringga.security.util.snackbar
import kotlinx.android.synthetic.main.activity_login.*
import kotlinx.android.synthetic.main.activity_register.*
import kotlinx.android.synthetic.main.activity_register.ed_pass
import kotlinx.android.synthetic.main.activity_register.loading
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.util.regex.Pattern

class RegisterActivity : AppCompatActivity() {
    var kabupatenList = ArrayList<String>()
    var kebupatenAdapter: ArrayAdapter<String>? = null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)

        tv_login.setOnClickListener {
            startActivity(Intent(this, LoginActivity::class.java))
            finish()
        }

//        val requestQueue = Volley.newRequestQueue(this)
//        val url = "http://risma-project.xyz/api/GetKabupaten"
//        val jsonObjectRequest = JsonObjectRequest(
//            Request.Method.POST,
//            url, null, { response ->
//                try {
//                    val jsonArray = response.getJSONArray("data")
//                    for (i in 0 until jsonArray.length()) {
//                        val jsonObject = jsonArray.getJSONObject(i)
//                        val kabupaten = jsonObject.optString("nama")
//                        val idKabupaten = jsonObject.optInt("id_kab")
//                        kabupatenList.add(kabupaten)
//                        kebupatenAdapter = ArrayAdapter(this, android.R.layout.simple_spinner_item, kabupatenList)
//                        kebupatenAdapter!!.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
//                        spiner_kabupaten.setAdapter(kebupatenAdapter)
//                    }
//
//                } catch (e: JSONException) {
//                    e.printStackTrace()
//                }
//            }) {
//            Toast.makeText(this, "data error", Toast.LENGTH_LONG).show()
//        }
//        requestQueue?.run {
//            add(jsonObjectRequest)
//        }

        btn_registe.setOnClickListener {
            loading.visibility= View.VISIBLE
            val id_bet = ed_idbet.text.toString().trim()
            val name = ed_name.text.toString().trim()
            val phone = ed_phone.text.toString().trim()
//            val devisi = ed_devisi.text.toString().trim()
            val email = ed_email.text.toString().trim()
            val password = ed_pass.text.toString().trim()

            if (phone.isEmpty()) {
                loading.visibility= View.GONE
                ed_phone.error = "Email required"
                ed_phone.requestFocus()
                return@setOnClickListener
            }

//            if (devisi.isEmpty()) {
//                loading.visibility= View.GONE
//                ed_devisi.error = "Email required"
//                ed_devisi.requestFocus()
//                return@setOnClickListener
//            }

            if (name.isEmpty()) {
                loading.visibility= View.GONE
                ed_name.error = "Email required"
                ed_name.requestFocus()
                return@setOnClickListener
            }

            if (id_bet.isEmpty()) {
                loading.visibility= View.GONE
                ed_idbet.error = "Email required"
                ed_idbet.requestFocus()
                return@setOnClickListener
            }

            if (email.isEmpty()) {
                loading.visibility= View.GONE
                ed_email.error = "Email required"
                ed_email.requestFocus()
                return@setOnClickListener
            }
            if (!cek_email(email)) {
                loading.visibility= View.GONE
                ed_email.error = "ini bukan format email"
                ed_email.requestFocus()
                return@setOnClickListener
            }

            if (password.isEmpty()) {
                loading.visibility= View.GONE
                ed_pass.error = "Password required"
                ed_pass.requestFocus()
                return@setOnClickListener
            }

            register(id_bet, name, phone, email, password, it)

        }

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

    private fun register(
        id_bet: String,
        name: String,
        phone: String,
//        devisi: String,
        email: String,
        password: String
    ,view: View
    ) {
        RetrofitClient.instance.register(name, id_bet, email, phone, password)
            .enqueue(object : Callback<BaseRespon> {
                override fun onResponse(call: Call<BaseRespon>, response: Response<BaseRespon>) {
                    if (response.body()?.stts == true) {
                        Toast.makeText(
                            this@RegisterActivity,
                            response.body()?.msg,
                            Toast.LENGTH_SHORT
                        ).show()

                        startActivity(Intent(this@RegisterActivity, LoginActivity::class.java))
                    } else {
                        snackbar(response.body()?.msg!!,view)
                    }
                    loading.visibility= View.GONE
                }

                override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                    snackbar(t.message!!,view)
                    loading.visibility= View.GONE
                }

            })
    }

    override fun onStart() {
        super.onStart()

        if (SharedPrefManager.getInstance(this)!!.isLoggedIn) {
            RetrofitClient.instance.cekTokenApp(PreferencesToken.getToken(this)!!)
                .enqueue(object : Callback<BaseRespon>{
                    override fun onResponse(
                        call: Call<BaseRespon>,
                        response: Response<BaseRespon>
                    ) {
                        if (response.body()?.stts == true){
                            val intent = Intent(applicationContext, HomeActivity::class.java)
                            intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_CLEAR_TASK

                            startActivity(intent)
                            finish()
                        }else{
                            Toast.makeText(this@RegisterActivity, response.body()?.msg, Toast.LENGTH_SHORT).show()
                            SharedPrefManager.getInstance(this@RegisterActivity)!!.clear()
                            PreferencesToken.ClearToken(this@RegisterActivity)
                            startActivity(Intent(baseContext, LoginActivity::class.java))
                            finish()
                        }
                    }

                    override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                        Toast.makeText(this@RegisterActivity, t.message, Toast.LENGTH_SHORT).show()
                    }

                })


        }
    }
}