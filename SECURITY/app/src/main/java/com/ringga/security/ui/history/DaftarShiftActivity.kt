package com.ringga.security.ui.history
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
import android.widget.Toast
import androidx.recyclerview.widget.StaggeredGridLayoutManager
import com.ringga.security.R
import com.ringga.security.data.adapter.ShiftAdapter
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.shift.ShiftModel
import com.ringga.security.database.PreferencesToken
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.home.HomeActivity
import kotlinx.android.synthetic.main.activity_daftar_shift.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class DaftarShiftActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_daftar_shift)

        val myProfile = SharedPrefManager.getInstance(this)?.user
        setupRecler()

        back.setOnClickListener {
            startActivity(Intent(this, HomeActivity::class.java))
            finish()
        }

        RetrofitClient.instance.shift(PreferencesToken.getToken(this)!!, myProfile?.id.toString())
            .enqueue(object : Callback<ShiftModel> {
                override fun onResponse(
                    call: Call<ShiftModel>,
                    response: Response<ShiftModel>
                ) {
                    if (response.body()?.stts == true){
                        rv_shift.adapter?.let { adapter ->
                            if (adapter is ShiftAdapter) {
                                adapter.setWallpapers(response.body()!!.data)
                            }
                        }
                        loading.visibility =View.GONE
                    }else{
                        Toast.makeText(this@DaftarShiftActivity, response.body()?.msg, Toast.LENGTH_SHORT).show()
                    }

                }

                override fun onFailure(call: Call<ShiftModel>, t: Throwable) {
                    Toast.makeText(this@DaftarShiftActivity, t.message, Toast.LENGTH_SHORT).show()
                }

            })
    }

    private fun setupRecler() {
        rv_shift.apply {
            layoutManager = StaggeredGridLayoutManager(1, StaggeredGridLayoutManager.VERTICAL)
            adapter = ShiftAdapter(mutableListOf(), this@DaftarShiftActivity)
        }
    }
}