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
import com.ringga.security.data.adapter.VisitorAdapter
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.visitor.VisitorRespon
import com.ringga.security.database.PreferencesToken.Companion.getToken
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.home.HomeActivity
import kotlinx.android.synthetic.main.activity_daftar_visitor.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class DaftarVisitorActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_daftar_visitor)
        val myProfile = SharedPrefManager.getInstance(this)?.user
        setupRecler()
        back.setOnClickListener {
            startActivity(Intent(this, HomeActivity::class.java))
            finish()
        }

        RetrofitClient.instance.list_visitor(getToken(this)!!, myProfile?.id.toString(),"selesai")
            .enqueue(object : Callback<VisitorRespon>{
                override fun onResponse(
                    call: Call<VisitorRespon>,
                    response: Response<VisitorRespon>
                ) {
                    rv_daftarvisitor.adapter?.let { adapter ->
                        if (adapter is VisitorAdapter) {
                            adapter.setWallpapers(response.body()!!.data)
                        }
                    }
                    loading.visibility = View.GONE
                }

                override fun onFailure(call: Call<VisitorRespon>, t: Throwable) {
                    Toast.makeText(this@DaftarVisitorActivity, t.message, Toast.LENGTH_SHORT).show()
                    loading.visibility = View.GONE
                }
            })
    }

    private fun setupRecler() {
        rv_daftarvisitor.apply {
            layoutManager = StaggeredGridLayoutManager(1, StaggeredGridLayoutManager.VERTICAL)
            adapter = VisitorAdapter(mutableListOf(), this@DaftarVisitorActivity)
        }
    }
}