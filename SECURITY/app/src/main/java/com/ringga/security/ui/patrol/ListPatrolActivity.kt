package com.ringga.security.ui.patrol
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Toast
import androidx.recyclerview.widget.StaggeredGridLayoutManager
import com.ringga.security.R
import com.ringga.security.data.adapter.QrLocationAdapter
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.gr_location.QrLocationRespon
import com.ringga.security.database.PreferencesToken
import com.ringga.security.database.SharedPrefManager
import kotlinx.android.synthetic.main.activity_list_patrol.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ListPatrolActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_list_patrol)
        val myProfile = SharedPrefManager.getInstance(this)?.user
        setupRecler()


        RetrofitClient.instance.qr_location(PreferencesToken.getToken(this)!!, myProfile?.id.toString(), "")
            .enqueue(object : Callback<QrLocationRespon> {
                override fun onResponse(
                    call: Call<QrLocationRespon>,
                    response: Response<QrLocationRespon>
                ) {
                    if (response.body()?.stts == true){
                        rv_list_qrcode.adapter?.let { adapter ->
                            if (adapter is QrLocationAdapter) {
                                adapter.setWallpapers(response.body()!!.data)
                            }
                        }
                    }else{
                        Toast.makeText(this@ListPatrolActivity, response.body()?.msg, Toast.LENGTH_SHORT).show()
                    }
                    loading.visibility = View.GONE
                }

                override fun onFailure(call: Call<QrLocationRespon>, t: Throwable) {
                    Toast.makeText(this@ListPatrolActivity, t.message, Toast.LENGTH_SHORT).show()
                    loading.visibility = View.GONE
                }

            })
    }

    private fun setupRecler() {
        rv_list_qrcode.apply {
            layoutManager = StaggeredGridLayoutManager(1, StaggeredGridLayoutManager.VERTICAL)
            adapter = QrLocationAdapter(mutableListOf(), this@ListPatrolActivity)
        }
    }
}