package com.ringga.security.ui.ui_user
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.app.DatePickerDialog
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Toast
import androidx.recyclerview.widget.StaggeredGridLayoutManager
import com.ringga.security.R
import com.ringga.security.data.adapter.UserLateAdapter
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.user_late.UserLateRespon
import com.ringga.security.database.PreferencesToken
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.home.HomeActivity
import kotlinx.android.synthetic.main.activity_user_late.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.util.*

class UserLateActivity : AppCompatActivity() {
    var picker: DatePickerDialog? = null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_user_late)

        setupRecler()

        back.setOnClickListener {
            startActivity(Intent(this, HomeActivity::class.java))
            finish()
        }

        iv_calender.setOnClickListener {

            val cldr: Calendar = Calendar.getInstance()
            val day: Int = cldr.get(Calendar.DAY_OF_MONTH)
            val month: Int = cldr.get(Calendar.MONTH)
            val year: Int = cldr.get(Calendar.YEAR)
            // date picker dialog
            picker = DatePickerDialog(
                this@UserLateActivity,
                { view, year, monthOfYear, dayOfMonth -> editText1.setText(year.toString() + "-" + (monthOfYear + 1) + "-" + dayOfMonth.toString() )},
                year,
                month,
                day
            )
            picker!!.show()
        }
        iv_cari.setOnClickListener {
            loading.visibility = View.VISIBLE
            getData()
        }
        getData()

    }

    private fun getData() {

        val text = editText1.text.toString().trim()
        val tgl = if (editText1 == null) {
            ""
        } else {
            text
        }

        val myProfile = SharedPrefManager.getInstance(this)?.user
        RetrofitClient.instance.late_user(
            PreferencesToken.getToken(this)!!,
            myProfile?.id.toString(),
            myProfile?.id_bet!!,
            tgl
        )
            .enqueue(object : Callback<UserLateRespon> {
                override fun onResponse(
                    call: Call<UserLateRespon>,
                    response: Response<UserLateRespon>
                ) {
                    if (response.body()?.stts == true) {
                        rv_user_late.adapter?.let { adapter ->
                            if (adapter is UserLateAdapter) {
                                adapter.setWallpapers(response.body()!!.data)
                            }
                        }

                    } else {
                        Toast.makeText(
                            this@UserLateActivity,
                            response.body()?.msg.toString(),
                            Toast.LENGTH_SHORT
                        ).show()
                    }
                    loading.visibility = View.GONE

                }

                override fun onFailure(call: Call<UserLateRespon>, t: Throwable) {
                    Toast.makeText(this@UserLateActivity, t.message, Toast.LENGTH_SHORT).show()
                    loading.visibility = View.GONE
                }
            })
    }

    private fun setupRecler() {
        rv_user_late.apply {
            layoutManager = StaggeredGridLayoutManager(1, StaggeredGridLayoutManager.VERTICAL)
            adapter = UserLateAdapter(mutableListOf(), this@UserLateActivity)
        }
    }
}