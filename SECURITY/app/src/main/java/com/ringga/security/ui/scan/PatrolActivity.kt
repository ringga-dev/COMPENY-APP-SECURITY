package com.ringga.security.ui.scan
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
/* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.animation.ArgbEvaluator
import android.animation.ValueAnimator
import android.annotation.SuppressLint
import android.content.Intent
import android.graphics.drawable.Drawable
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Toast
import androidx.recyclerview.widget.StaggeredGridLayoutManager
import com.google.zxing.ResultPoint
import com.google.zxing.client.android.BeepManager
import com.journeyapps.barcodescanner.BarcodeCallback
import com.journeyapps.barcodescanner.BarcodeResult
import com.journeyapps.barcodescanner.CaptureManager
import com.ringga.security.R
import com.ringga.security.data.adapter.HasilScanAdapter
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.auth.BaseRespon
import com.ringga.security.data.model.patrol.ScanPatrol
import com.ringga.security.database.DBHelper
import com.ringga.security.database.PreferencesToken.Companion.getToken
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.home.HomeActivity
import kotlinx.android.synthetic.main.activity_patrol.*
import kotlinx.android.synthetic.main.costum_scan.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.text.SimpleDateFormat
import java.util.*
import com.journeyapps.barcodescanner.camera.CameraSettings

import android.app.AlertDialog
import android.content.DialogInterface
import android.graphics.Color
import android.graphics.drawable.ColorDrawable
import android.widget.ImageView
import android.widget.TextView
import com.ringga.security.database.Preferences.clearMedia
import com.ringga.security.database.Preferences.getError
import com.ringga.security.database.Preferences.setError
import com.ringga.security.util.toast
import kotlinx.android.synthetic.main.activity_patrol.barcodeView
import kotlinx.android.synthetic.main.activity_patrol.btnScanContinuous
import kotlinx.android.synthetic.main.activity_patrol.txtResultContinuous
import kotlinx.android.synthetic.main.activity_shift_scan.*


class PatrolActivity : AppCompatActivity() {
    private lateinit var captureManager: CaptureManager
    private var torchState: Boolean = false

    private var scanContinuousState: Boolean = false
    private var stts: Boolean = false
    private lateinit var scanContinuousBG: Drawable
    lateinit var beepManager: BeepManager
    private var lastScan = Date()
    private var qr: String? = null

    private var keranjang: MutableList<ScanPatrol> = ArrayList()

    @SuppressLint("SetTextI18n")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_patrol)

        delet_all.setOnClickListener {
            alert()
        }

        setupRecler()
        title = "Continuous Scan"

        btn_kirim.setOnClickListener {
            btn_kirim.setBackgroundResource(R.drawable.bg_senter_on)
            btn_kirim.visibility = View.GONE
            loading.visibility = View.VISIBLE
            scan_post()
        }
        captureManager = CaptureManager(this, barcodeView)
        captureManager.initializeFromIntent(intent, savedInstanceState)

        beepManager = BeepManager(this)
        beepManager.isVibrateEnabled = true
        val settings = CameraSettings()
        settings.focusMode = CameraSettings.FocusMode.CONTINUOUS
        settings.isContinuousFocusEnabled = true

        scanContinuousBG = btnScanContinuous.background
        getData()

        val callback = object : BarcodeCallback {
            @SuppressLint("SimpleDateFormat")
            override fun barcodeResult(result: BarcodeResult?) {
                result?.let {
                    val current = Date()
                    val diff = current.time - lastScan.time
                    if (diff >= 1000) {
                        txtResultContinuous.text = it.text
                        qr = it.text
                        lastScan = current
                        beepManager.playBeepSoundAndVibrate()
                        animateBackground()

                        val db = DBHelper(this@PatrolActivity, null)

                        val cek = db.cekKeranjang(it.text)

                        if (cek?.count!! < 1) {
                            val simpleDateFormat = SimpleDateFormat("yyyy-MM-dd HH:mm:ss")
                            val date = simpleDateFormat.format(Date())
                            db.addName(it.text, date.toString())

                            Toast.makeText(this@PatrolActivity, "scan berhasil", Toast.LENGTH_SHORT)
                                .show()
                        }
                        getData()
                    }
                }
            }

            override fun possibleResultPoints(resultPoints: MutableList<ResultPoint>?) {
            }
        }

        btnScanContinuous.setOnClickListener {
            if (!scanContinuousState) {
                scanContinuousState = !scanContinuousState
                txtResultContinuous.text = "scanning..."
                barcodeView.decodeContinuous(callback)
            } else {
                scanContinuousState = !scanContinuousState
                btnScanContinuous.background = scanContinuousBG
                barcodeView.barcodeView.stopDecoding()
            }
        }

        switch_flashlight.setOnClickListener {
            if (torchState) {
                torchState = false
                barcodeView.setTorchOff()
                switch_flashlight.setBackgroundResource(R.drawable.bg_senter_off)
            } else {
                switch_flashlight.setBackgroundResource(R.drawable.bg_senter_on)
                torchState = true
                barcodeView.setTorchOn()
            }
        }


    }


    override fun onPause() {
        super.onPause()
        captureManager.onPause()
    }

    override fun onResume() {
        super.onResume()
        captureManager.onResume()
    }

    override fun onDestroy() {
        super.onDestroy()
        captureManager.onDestroy()
    }

    private fun animateBackground() {
        val colorFrom = resources.getColor(R.color.purple_700)
        val colorTo = resources.getColor(R.color.teal_200)
        val colorAnimation =
            ValueAnimator.ofObject(ArgbEvaluator(), colorFrom, colorTo)
        colorAnimation.duration = 250 // milliseconds

        colorAnimation.addUpdateListener { animator ->
            txtResultContinuous.setBackgroundColor(
                animator.animatedValue as Int
            )
        }
        colorAnimation.start()
    }

    @SuppressLint("Range")
    private fun getData() {
        keranjang.clear()
        val db = DBHelper(this, null)
        val cursor = db.getName()
        cursor!!.moveToFirst()
        if (cursor.moveToFirst()) {
            do {
                val id = cursor.getInt(cursor.getColumnIndex(DBHelper.ID_COL))
                val gr_scan = cursor.getString(cursor.getColumnIndex(DBHelper.ID_SCAN))
                val date = cursor.getString(cursor.getColumnIndex(DBHelper.DATE))
                keranjang.add(ScanPatrol(gr_scan, date))
            } while (cursor.moveToNext())
        }
        cursor.close()
        tampilList()
    }

    private fun tampilList() {
        rv_patrol.adapter?.let { adapter ->
            if (adapter is HasilScanAdapter) {
                adapter.setWallpapers(keranjang)
            }
        }
    }

    private fun setupRecler() {
        rv_patrol.apply {
            layoutManager = StaggeredGridLayoutManager(1, StaggeredGridLayoutManager.VERTICAL)
            adapter = HasilScanAdapter(mutableListOf(), this@PatrolActivity)
        }
    }


    private fun scan_post() {
        val myProfile = SharedPrefManager.getInstance(this)?.user
        val db = DBHelper(this, null)
        val cursor = db.getName()

        if (keranjang.count() == cursor?.count) {
            keranjang.forEach{ data ->
                RetrofitClient.instance.addpatrol(
                    getToken(this)!!,
                    myProfile?.id.toString(),
                    data.qr,
                    data.date
                )
                    .enqueue(object : Callback<BaseRespon> {
                        override fun onResponse(
                            call: Call<BaseRespon>,
                            response: Response<BaseRespon>,
                        ) {
                            if (response.body()?.stts == true) {
                                db.delete(data.qr)
                            }
                        }

                        override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                            Toast.makeText(this@PatrolActivity, t.message, Toast.LENGTH_SHORT)
                                .show()
                        }
                    })
            }
            getData()
            if (cursor.count == 0){
                keranjang.clear()
                loading.visibility = View.GONE
                btn_kirim.visibility = View.VISIBLE
                showToalsSucces("Data Telah Di Rekap")
                startActivity(Intent(this, HomeActivity::class.java))
                finish()
                btn_kirim.setBackgroundResource(R.drawable.bg_senter_off)
            }else{
                loading.visibility = View.GONE
                btn_kirim.visibility = View.VISIBLE
                showToalsError("Ada Beberapa gagal di rekap..!")
                btn_kirim.setBackgroundResource(R.drawable.bg_senter_off)
            }
        } else {
            getData()
            showToalsError("Scan Belum Di Lakukan")
            loading.visibility = View.GONE
            btn_kirim.visibility = View.VISIBLE
            btn_kirim.setBackgroundResource(R.drawable.bg_senter_off)
        }
    }

    private fun alert() {
        val dialog = AlertDialog.Builder(this)
            // Judul
            .setTitle("Delete ALL")
            // Pesan yang di tamopilkan
            .setMessage("apa anda yakin untuk mehapus Semua data")
            .setPositiveButton("Yes", DialogInterface.OnClickListener { dialogInterface, i ->
                val db = DBHelper(this, null)
                db.deleteAll()
                Toast.makeText(this, "Data telah di bersihkan", Toast.LENGTH_SHORT).show()
                keranjang.clear()
                getData()
            })
            .setNegativeButton("Tidak Terimakasih",
                DialogInterface.OnClickListener { dialogInterface, i ->
                    Toast.makeText(this, "di batalkan", Toast.LENGTH_LONG).show()
                })
            .show()

        dialog.getButton(AlertDialog.BUTTON_POSITIVE).setTextColor(Color.RED)
    }

    private fun showToalsSucces(text: String) {
        val toast = Toast(this)
        toast.duration = Toast.LENGTH_LONG
        val customView: View = layoutInflater.inflate(R.layout.custom_toals_ok, null)
        val tv_text = customView.findViewById<TextView>(R.id.tv_text)
        tv_text.text = text
        toast.view = customView
        toast.show()
    }

    private fun showToalsError(text: String) {
        val toast = Toast(this)
        toast.duration = Toast.LENGTH_LONG
        val customView: View = layoutInflater.inflate(R.layout.custom_toals_error, null)
        val tv_text = customView.findViewById<TextView>(R.id.tv_text)
        tv_text.text = text
        toast.view = customView
        toast.show()
    }
}