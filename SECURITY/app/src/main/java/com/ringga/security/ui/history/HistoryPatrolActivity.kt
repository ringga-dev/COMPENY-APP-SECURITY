package com.ringga.security.ui.history
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.app.DatePickerDialog
import android.content.Context
import android.view.View
import android.view.inputmethod.InputMethodManager
import android.widget.Toast
import androidx.recyclerview.widget.StaggeredGridLayoutManager
import com.ringga.security.R
import com.ringga.security.data.adapter.PatrolHistoryAdapter
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.historiPatrol.PatrolHistoryRespon
import com.ringga.security.database.PreferencesToken.Companion.getToken
import com.ringga.security.database.SharedPrefManager
import kotlinx.android.synthetic.main.activity_history_patrol.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.util.*


class HistoryPatrolActivity : AppCompatActivity() {
    var picker: DatePickerDialog? = null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_history_patrol)
        setupRecler()

        iv_calender.setOnClickListener {

            val cldr: Calendar = Calendar.getInstance()
            val day: Int = cldr.get(Calendar.DAY_OF_MONTH)
            val month: Int = cldr.get(Calendar.MONTH)
            val year: Int = cldr.get(Calendar.YEAR)
            // date picker dialog
            picker = DatePickerDialog(
                this@HistoryPatrolActivity,
                { view, year, monthOfYear, dayOfMonth -> editText1.setText(dayOfMonth.toString() + "-" + (monthOfYear + 1) + "-" + year) },
                year,
                month,
                day
            )
            picker!!.show()
        }
        iv_cari.setOnClickListener {
            getData()
        }
        getData()
    }

    private fun closeKeyBoard() {
        val view = this.currentFocus
        if (view != null) {
            val imm = getSystemService(Context.INPUT_METHOD_SERVICE) as InputMethodManager
            imm.hideSoftInputFromWindow(view.windowToken, 0)
        }
    }

    private fun getData() {
        loading.visibility = View.VISIBLE
        val myProfile = SharedPrefManager.getInstance(this)?.user
        val text = editText1.text.toString().trim()
        val tgl = if (editText1 == null) {
            ""
        } else {
            text
        }
        RetrofitClient.instance.list_patrol(getToken(this)!!, myProfile?.id.toString(),tgl)
            .enqueue(object : Callback<PatrolHistoryRespon>{
                override fun onResponse(
                    call: Call<PatrolHistoryRespon>,
                    response: Response<PatrolHistoryRespon>
                ) {
                    rv_list_patrol.adapter?.let { adapter ->
                        if (adapter is PatrolHistoryAdapter) {
                            adapter.setWallpapers(response.body()!!.data)
                        }
                    }
                    loading.visibility =View.GONE
                }

                override fun onFailure(call: Call<PatrolHistoryRespon>, t: Throwable) {
                    Toast.makeText(this@HistoryPatrolActivity, t.message, Toast.LENGTH_SHORT).show()
                    loading.visibility = View.GONE
                }
            })
    }

    private fun setupRecler() {
        rv_list_patrol.apply {
            layoutManager = StaggeredGridLayoutManager(1, StaggeredGridLayoutManager.VERTICAL)
            adapter = PatrolHistoryAdapter(mutableListOf(), this@HistoryPatrolActivity)
        }
    }
}