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
import android.content.ContentValues.TAG
import android.content.Intent
import android.graphics.Color
import android.graphics.drawable.ColorDrawable
import android.graphics.drawable.Drawable
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
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
import com.ringga.security.database.PreferencesToken.Companion.getToken
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.home.HomeActivity
import kotlinx.android.synthetic.main.activity_shift_scan.*
import kotlinx.android.synthetic.main.activity_visit.*
import kotlinx.android.synthetic.main.activity_visit.barcodeView
import kotlinx.android.synthetic.main.activity_visit.btnScanContinuous
import kotlinx.android.synthetic.main.activity_visit.txtResultContinuous
import kotlinx.android.synthetic.main.costum_scan.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.util.*

class VisitActivity : AppCompatActivity() {
    private lateinit var captureManager: CaptureManager
    private var torchState: Boolean = false

    private var scanContinuousState: Boolean = false
    private lateinit var scanContinuousBG: Drawable
    lateinit var beepManager: BeepManager
    private var lastScan = Date()


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_visit)

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
                        val stts = extras?.getString("stts")
                        if (stts == "datang") {
                            RetrofitClient.instance.scan_visitor(
                                getToken(this@VisitActivity)!!,
                                myProfile?.id.toString(),
                                it.text,
                                "masuk"
                            )
                                .enqueue(object : Callback<BaseRespon> {
                                    override fun onResponse(
                                        call: Call<BaseRespon>,
                                        response: Response<BaseRespon>
                                    ) {

                                        if (response.body()?.stts == true) {
                                            showAlertSuccess(response.body()!!.msg)
                                        } else {
                                            showAlertError(response.body()!!.msg)
                                        }
                                    }

                                    override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                                        showAlertError(t.message!!)
                                    }
                                })
                        } else if (stts == "pulang") {
                            RetrofitClient.instance.scan_visitor(
                                getToken(this@VisitActivity)!!,
                                myProfile?.id.toString(),
                                it.text,
                                "keluar"
                            )
                                .enqueue(object : Callback<BaseRespon> {
                                    override fun onResponse(
                                        call: Call<BaseRespon>,
                                        response: Response<BaseRespon>
                                    ) {
                                        if (response.body()?.stts == true) {
                                            showAlertSuccess(response.body()!!.msg)
                                            finish()
                                        } else {
                                            showAlertError(response.body()!!.msg)
                                        }
                                    }

                                    override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                                        showAlertError(t.message.toString())
                                    }
                                })
                        }
                        animateBackground()
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