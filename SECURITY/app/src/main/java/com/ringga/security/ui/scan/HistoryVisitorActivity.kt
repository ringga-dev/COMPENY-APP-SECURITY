package com.ringga.security.ui.scan
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.animation.ArgbEvaluator
import android.animation.ValueAnimator
import android.app.AlertDialog
import android.graphics.Color
import android.graphics.drawable.ColorDrawable
import android.graphics.drawable.Drawable
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.ImageView
import android.widget.TextView
import android.widget.Toast
import com.google.zxing.ResultPoint
import com.google.zxing.client.android.BeepManager
import com.journeyapps.barcodescanner.BarcodeCallback
import com.journeyapps.barcodescanner.BarcodeResult
import com.journeyapps.barcodescanner.CaptureManager
import com.ringga.security.R
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.auth.BaseRespon
import com.ringga.security.database.PreferencesToken
import com.ringga.security.database.SharedPrefManager
import kotlinx.android.synthetic.main.activity_history_visitor.*
import kotlinx.android.synthetic.main.activity_visit.barcodeView
import kotlinx.android.synthetic.main.activity_visit.btnScanContinuous
import kotlinx.android.synthetic.main.activity_visit.txtResultContinuous
import kotlinx.android.synthetic.main.costum_scan.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

import java.util.*

class HistoryVisitorActivity : AppCompatActivity() {
    private lateinit var captureManager: CaptureManager
    private var torchState: Boolean = false

    private var scanContinuousState: Boolean = false
    private lateinit var scanContinuousBG: Drawable
    lateinit var beepManager: BeepManager
    private var lastScan = Date()

    //data
    private var stts: String? = null


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_history_visitor)


        rg_stts.setOnCheckedChangeListener { group, checkedId ->
            when (checkedId) {
                R.id.rb_keluar -> {
                    tf_dari.visibility = View.VISIBLE
                    tf_menuju.visibility = View.VISIBLE
                    stts = "keluar"
                }
                R.id.rb_masuk -> {
                    tf_menuju.visibility = View.GONE
                    tf_dari.visibility = View.GONE
                    stts = "masuk"
                }
            }
        }

        btn_set.setOnClickListener {
            barcodeView.visibility = View.VISIBLE
            v_scan.visibility = View.VISIBLE
        }

        title = "Continuous Scan"
        val extras = intent.extras
        val myProfile = SharedPrefManager.getInstance(this)?.user

        captureManager = CaptureManager(this, barcodeView)
        captureManager.initializeFromIntent(intent, savedInstanceState)

        beepManager = BeepManager(this)
        beepManager.isVibrateEnabled = true

        scanContinuousBG = btnScanContinuous.background

        var callback = object : BarcodeCallback {
            override fun barcodeResult(result: BarcodeResult?) {
                result?.let {
                    val current = Date()
                    val diff = current.time - lastScan.time
                    if (diff >= 1000) {
                        txtResultContinuous.text = it.text
                        lastScan = current
                        beepManager.playBeepSoundAndVibrate()
                        animateBackground()
                        send(it.text)

                    }
                }
            }

            override fun possibleResultPoints(resultPoints: MutableList<ResultPoint>?) {
            }
        }



        btnScanContinuous.setOnClickListener(View.OnClickListener {
            if (!scanContinuousState) {
                scanContinuousState = !scanContinuousState
                txtResultContinuous.text = "scanning..."
                barcodeView.decodeContinuous(callback)
            } else {
                scanContinuousState = !scanContinuousState
                btnScanContinuous.background = scanContinuousBG
                barcodeView.barcodeView.stopDecoding()
            }
        })

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

    private fun showAlertSuccess(text: String) {
        val inflate = layoutInflater
        val infla_view = inflate.inflate(R.layout.custom_alert_ok, null)
        val cencel = infla_view.findViewById<ImageView>(R.id.btn_close)
        val tv_text = infla_view.findViewById<TextView>(R.id.tv_text)
        val alertDialog = AlertDialog.Builder(this)
        alertDialog.setView(infla_view)
        alertDialog.setCancelable(false)

        val dialog = alertDialog.create()
        dialog.window?.setBackgroundDrawable(ColorDrawable(Color.TRANSPARENT))
        tv_text.text = text
        cencel.setOnClickListener {
            dialog.dismiss()
        }
        dialog.show()
    }

    private fun showAlertError(text: String) {
        val inflate = layoutInflater
        val infla_view = inflate.inflate(R.layout.custom_alert_error, null)
        val cencel = infla_view.findViewById<ImageView>(R.id.btn_close)
        val tv_text = infla_view.findViewById<TextView>(R.id.tv_text)
        val alertDialog = AlertDialog.Builder(this)
        alertDialog.setView(infla_view)
        alertDialog.setCancelable(false)

        val dialog = alertDialog.create()
        dialog.window?.setBackgroundDrawable(ColorDrawable(Color.TRANSPARENT))
        tv_text.text = text
        cencel.setOnClickListener {
            dialog.dismiss()
        }
        dialog.show()
    }

    private fun send(bet: String) {
        val myProfile = SharedPrefManager.getInstance(this)?.user
        if (stts == "keluar") {
            val dari = ed_dari.text.toString().trim()
            val menuju = ed_menuju.text.toString().trim()

            if (dari.isEmpty()) {
                ed_dari.error = "Ini harus di isi"
                ed_dari.requestFocus()
                return
            }
            if (menuju.isEmpty()) {
                ed_menuju.error = "Ini harus di isi"
                ed_menuju.requestFocus()
                return
            }

            RetrofitClient.instance.user_izin(PreferencesToken.getToken(this)!!, myProfile?.id.toString(), bet, dari, menuju, stts!!)
                .enqueue(object :Callback<BaseRespon>{
                    override fun onResponse(
                        call: Call<BaseRespon>,
                        response: Response<BaseRespon>
                    ) {
                        showAlertSuccess(response.body()!!.msg)
                    }

                    override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                        showAlertError(t.message.toString())
                    }
                })
        }else{
            RetrofitClient.instance.user_izin(PreferencesToken.getToken(this)!!, myProfile?.id.toString(), bet, " ", " ", stts!!)
                .enqueue(object :Callback<BaseRespon>{
                    override fun onResponse(
                        call: Call<BaseRespon>,
                        response: Response<BaseRespon>
                    ) {
                        showAlertSuccess(response.body()!!.msg)
                    }

                    override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                        showAlertError(t.message.toString())
                    }
                })
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
}