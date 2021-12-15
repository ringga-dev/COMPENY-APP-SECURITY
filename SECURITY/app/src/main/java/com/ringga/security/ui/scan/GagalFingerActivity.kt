package com.ringga.security.ui.scan

import android.animation.ArgbEvaluator
import android.animation.ValueAnimator
import android.app.AlertDialog
import android.content.Intent
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
import com.ringga.security.data.model.cek_user.CekUserRespon
import com.ringga.security.database.PreferencesToken
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.home.HomeActivity
import kotlinx.android.synthetic.main.activity_gagal_finger.*
import kotlinx.android.synthetic.main.costum_scan.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.util.*

class GagalFingerActivity : AppCompatActivity() {

    private lateinit var captureManager: CaptureManager
    private var torchState: Boolean = false

    private var scanContinuousState: Boolean = false
    private lateinit var scanContinuousBG: Drawable
    lateinit var beepManager: BeepManager
    private var lastScan = Date()

    //data
    private var stts: String? = null
    private var dataqr: String? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_gagal_finger)
        loading.visibility = View.GONE
        rg_stts.setOnCheckedChangeListener { group, checkedId ->
            when (checkedId) {
                R.id.rb_keluar -> {
                    stts = "keluar"
                }
                R.id.rb_masuk -> {
                    stts = "masuk"
                }
            }
        }

        btn_ok.setOnClickListener {
            loading.visibility = View.VISIBLE
            val alasan = ed_alasan.text.toString().trim()
            if (alasan.isEmpty()) {
                ed_alasan.error = "Alasan belum Di isi"
                ed_alasan.requestFocus()
                loading.visibility = View.GONE
                return@setOnClickListener
            }
            val myProfile = SharedPrefManager.getInstance(this)?.user

            RetrofitClient.instance.gagal_finger_user(PreferencesToken.getToken(this)!!,
                myProfile?.id.toString(),
                dataqr!!, alasan, stts!!
            )
                .enqueue(object : Callback<BaseRespon> {
                    override fun onResponse(
                        call: Call<BaseRespon>,
                        response: Response<BaseRespon>,
                    ) {
                        if (response.body()?.stts == true) {
                            showAlertSuccess(response.body()!!.msg)
                            loading.visibility = View.GONE
                        } else {
                            showAlertError(response.body()!!.msg)
                        }
                    }

                    override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                        Toast.makeText(this@GagalFingerActivity, t.message, Toast.LENGTH_SHORT)
                            .show()
                        loading.visibility = View.GONE
                    }

                })


        }

        btn_set.setOnClickListener {
            barcodeView.visibility = View.VISIBLE
            v_scan.visibility = View.VISIBLE
            v_tampilan.visibility = View.VISIBLE
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
                        dataqr = it.text
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

    private fun send(bet: String) {
        loading.visibility = View.VISIBLE
        val myProfile = SharedPrefManager.getInstance(this)?.user

        RetrofitClient.instance.cek_user_app(
            PreferencesToken.getToken(this)!!,
            myProfile?.id.toString(),
            bet
        )
            .enqueue(object : Callback<CekUserRespon> {
                override fun onResponse(
                    call: Call<CekUserRespon>,
                    response: Response<CekUserRespon>,
                ) {
                    if (response.body()?.stts == true) {
                        v_ditail.visibility = View.VISIBLE
                        barcodeView.visibility = View.GONE
                        v_scan.visibility = View.VISIBLE

                        tv_nama.text = response.body()?.data?.name
                        tv_bet.text = response.body()?.data?.id_bet
                        tv_email.text = response.body()?.data?.email
                        tv_no_phone.text = response.body()?.data?.no_phone
                        loading.visibility = View.GONE
                    } else {
                        showAlertError(response.body()!!.msg)
                        loading.visibility = View.GONE
                    }
                }

                override fun onFailure(call: Call<CekUserRespon>, t: Throwable) {
                    showAlertError(t.message.toString())
                }
            })


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