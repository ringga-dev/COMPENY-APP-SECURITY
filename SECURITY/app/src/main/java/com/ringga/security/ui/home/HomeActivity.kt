package com.ringga.security.ui.home
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/


import android.Manifest
import android.app.AlertDialog
import android.content.Context
import android.content.Intent
import android.content.SharedPreferences
import android.content.pm.PackageManager
import android.graphics.Color
import android.graphics.drawable.ColorDrawable
import android.net.Uri
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.provider.Settings
import android.util.Log
import android.view.View
import android.widget.ImageView
import android.widget.Toast
import androidx.cardview.widget.CardView
import androidx.core.app.ActivityCompat
import com.ringga.security.ui.scan.PatrolActivity
import com.ringga.security.ui.scan.VisitActivity
import com.ringga.security.R
import com.ringga.security.data.model.patrol.ScanPatrol
import com.ringga.security.database.PreferencesToken.Companion.getToken
import com.ringga.security.database.SharedPrefManager
import com.ringga.security.ui.history.*
import com.ringga.security.ui.patrol.ListPatrolActivity
import com.ringga.security.ui.profile.EditProfileActivity
import com.ringga.security.ui.profile.ProfileActivity
import com.ringga.security.ui.scan.GagalFingerActivity
import com.ringga.security.ui.scan.HistoryVisitorActivity
import com.ringga.security.ui.ui_user.UserLateActivity
import kotlinx.android.synthetic.main.activity_home.*
import java.util.ArrayList

class HomeActivity : AppCompatActivity() {


    private val TAG = "HomeActivity"
    private var permissionsRequired = arrayOf(
        Manifest.permission.ACCESS_FINE_LOCATION,
        Manifest.permission.ACCESS_COARSE_LOCATION,
        Manifest.permission.READ_PHONE_STATE,
        Manifest.permission.WRITE_EXTERNAL_STORAGE
    )



    private val PERMISSION_CALLBACK_CONSTANT = 100
    private val REQUEST_PERMISSION_SETTING = 101
    private var permissionStatus: SharedPreferences? = null
    private var sentToSettings = false

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_home)


        cek_devisi_menu()

        val myProfile = SharedPrefManager.getInstance(this)?.user
        val key = getToken(this)

        //menu patrol
        btn_patrol.setOnClickListener {
            startActivity(Intent(this, PatrolActivity::class.java))
        }


        btn_failed_for_finger.setOnClickListener {
            startActivity(Intent(this,GagalFingerActivity::class.java))
        }

        user_late.setOnClickListener {
            startActivity(Intent(this,UserLateActivity::class.java))
        }

        btn_barcode.setOnClickListener {
            startActivity(Intent(this,DitailVisitorActivity::class.java))
        }

        btn_user_late.setOnClickListener {
            startActivity(Intent(this, DaftarShiftActivity::class.java))
        }

        tv_list_qrcode.setOnClickListener {
            startActivity(Intent(this, ListPatrolActivity::class.java))
        }

        btn_izin.setOnClickListener {
            startActivity(Intent(this, HistoryVisitorActivity::class.java))
        }

        btn_history_patrol.setOnClickListener {
            startActivity(Intent(this, HistoryPatrolActivity::class.java))
        }

        btn_scan_visitor.setOnClickListener {
            showCustomAlertVisitor()
        }
        btn_pindah.setOnClickListener {
            startActivity(Intent(this, EditProfileActivity::class.java))
        }


        btn_profile.setOnClickListener {
            startActivity(Intent(this, ProfileActivity::class.java))
        }
        btn_history_patrol.setOnClickListener {
            startActivity(Intent(this, HistoryPatrolActivity::class.java))
        }

        btn_visit.setOnClickListener {
            showCustomAlert()
        }

        Log.e(TAG, "Refreshed token: ${getToken(this)}")
        permissionStatus = getSharedPreferences("permissionStatus", Context.MODE_PRIVATE)
        requestPermission()
    }

    private fun showCustomAlert() {

        val inflate = layoutInflater
        val infla_view = inflate.inflate(R.layout.alert_visit, null)
        val jadwal_visitor = infla_view.findViewById<CardView>(R.id.btn_jadwal_visitor)
        val daftar_visitor = infla_view.findViewById<CardView>(R.id.btn_daftar_visitor)
        val visitor_now = infla_view.findViewById<CardView>(R.id.btn_visitor_now)
        val cencel = infla_view.findViewById<ImageView>(R.id.btn_cencel)
        jadwal_visitor.setOnClickListener {
            startActivity(Intent(this, DaftarVisitorPlanActivity::class.java))
        }

        daftar_visitor.setOnClickListener {
            startActivity(Intent(this, DaftarVisitorActivity::class.java))
        }

        visitor_now.setOnClickListener {
            startActivity(Intent(this, DaftarVisitorBerjalanActivity::class.java))
        }

        val alertDialog = AlertDialog.Builder(this)
        alertDialog.setView(infla_view)
        alertDialog.setCancelable(false)


        val dialog = alertDialog.create()
        dialog.window?.setBackgroundDrawable(ColorDrawable(Color.TRANSPARENT))
         cencel.setOnClickListener {
            dialog.dismiss()
        }
        dialog.show()

    }

    private fun showCustomAlertVisitor() {

        val inflate = layoutInflater
        val infla_view = inflate.inflate(R.layout.custom_alert_visitor, null)
        val datang = infla_view.findViewById<CardView>(R.id.btn_datang)
        val pulang = infla_view.findViewById<CardView>(R.id.btn_pulang)
        val cencel = infla_view.findViewById<ImageView>(R.id.btn_cencel)
        datang.setOnClickListener {
            val i = Intent(this, VisitActivity::class.java)
            i.putExtra("stts", "datang")
            startActivity(i)

        }

        pulang.setOnClickListener {
            val i = Intent(this, VisitActivity::class.java)
            i.putExtra("stts", "pulang")
            startActivity(i)

        }

        val alertDialog = AlertDialog.Builder(this)
        alertDialog.setView(infla_view)
        alertDialog.setCancelable(false)

        val dialog = alertDialog.create()
        dialog.window?.setBackgroundDrawable(ColorDrawable(Color.TRANSPARENT))
        cencel.setOnClickListener {
            dialog.dismiss()
        }
        dialog.show()

    }

    private fun requestPermission() {
        if (ActivityCompat.checkSelfPermission(
                this,
                permissionsRequired[0]
            ) != PackageManager.PERMISSION_GRANTED
            || ActivityCompat.checkSelfPermission(
                this,
                permissionsRequired[1]
            ) != PackageManager.PERMISSION_GRANTED
            || ActivityCompat.checkSelfPermission(
                this,
                permissionsRequired[2]
            ) != PackageManager.PERMISSION_GRANTED
            || ActivityCompat.checkSelfPermission(
                this,
                permissionsRequired[3]
            ) != PackageManager.PERMISSION_GRANTED

        ) {
            if (ActivityCompat.shouldShowRequestPermissionRationale(this, permissionsRequired[0])
                || ActivityCompat.shouldShowRequestPermissionRationale(this, permissionsRequired[1])
                || ActivityCompat.shouldShowRequestPermissionRationale(this, permissionsRequired[2])
                || ActivityCompat.shouldShowRequestPermissionRationale(this, permissionsRequired[3])
            ) {
                //Show Information about why you need the permission
                getAlertDialog()
            } else if (permissionStatus!!.getBoolean(permissionsRequired[0], false)) {
                //Previously Permission Request was cancelled with 'Dont Ask Again',
                // Redirect to Settings after showing Information about why you need the permission
                val builder = AlertDialog.Builder(this)
                builder.setTitle("Need Multiple Permissions")
                builder.setMessage("This app needs permissions.")
                builder.setPositiveButton("Grant") { dialog, which ->
                    dialog.cancel()
                    sentToSettings = true
                    val intent = Intent(Settings.ACTION_APPLICATION_DETAILS_SETTINGS)
                    val uri = Uri.fromParts("package", packageName, null)
                    intent.data = uri
                    startActivityForResult(intent, REQUEST_PERMISSION_SETTING)
                    Toast.makeText(
                        applicationContext,
                        "Go to Permissions to Grant ",
                        Toast.LENGTH_LONG
                    ).show()
                }
                builder.setNegativeButton("Cancel") { dialog, which -> dialog.cancel() }
                builder.show()
            } else {
                //just request the permission
                ActivityCompat.requestPermissions(
                    this,
                    permissionsRequired,
                    PERMISSION_CALLBACK_CONSTANT
                )
            }


            val editor = permissionStatus!!.edit()
            editor.putBoolean(permissionsRequired[0], true)
            editor.apply()
        }
    }

    override fun onRequestPermissionsResult(
        requestCode: Int,
        permissions: Array<String>,
        grantResults: IntArray
    ) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults)
        if (requestCode == PERMISSION_CALLBACK_CONSTANT) {
            //check if all permissions are granted
            var allgranted = false
            for (i in grantResults.indices) {
                if (grantResults[i] == PackageManager.PERMISSION_GRANTED) {
                    allgranted = true
                } else {
                    allgranted = false
                    break
                }
            }

            if (allgranted) {
//                Toast.makeText(applicationContext, "Allowed All Permissions", Toast.LENGTH_LONG)
//                    .show()

                showAlertSuccess()

            } else if (ActivityCompat.shouldShowRequestPermissionRationale(this, permissionsRequired[0])
                || ActivityCompat.shouldShowRequestPermissionRationale(this, permissionsRequired[1])
                || ActivityCompat.shouldShowRequestPermissionRationale(this, permissionsRequired[2])
                || ActivityCompat.shouldShowRequestPermissionRationale(this, permissionsRequired[3])
                || ActivityCompat.shouldShowRequestPermissionRationale(this, permissionsRequired[4])
            ) {
                getAlertDialog()
            } else {
                Toast.makeText(applicationContext, "Unable to get Permission", Toast.LENGTH_LONG)
                    .show()


            }
        }
    }

    private fun showAlertSuccess() {
        val inflate = layoutInflater
        val infla_view = inflate.inflate(R.layout.custom_alert_ok, null)
        val cencel = infla_view.findViewById<ImageView>(R.id.btn_close)
        val alertDialog = AlertDialog.Builder(this)
        alertDialog.setView(infla_view)
        alertDialog.setCancelable(false)

        val dialog = alertDialog.create()
        dialog.window?.setBackgroundDrawable(ColorDrawable(Color.TRANSPARENT))
        cencel.setOnClickListener {
            dialog.dismiss()
        }
        dialog.show()
    }

    private fun getAlertDialog() {
        val builder = AlertDialog.Builder(this)
        builder.setTitle("Need Multiple Permissions")
        builder.setMessage("This app needs permissions.")
        builder.setPositiveButton("Grant") { dialog, which ->
            dialog.cancel()
            ActivityCompat.requestPermissions(
                this,
                permissionsRequired,
                PERMISSION_CALLBACK_CONSTANT
            )
        }
        builder.setNegativeButton("Cancel") { dialog, which -> dialog.cancel() }
        builder.show()
    }

    override fun onPostResume() {
        super.onPostResume()
        if (sentToSettings) {
            if (ActivityCompat.checkSelfPermission(
                    this,
                    permissionsRequired[0]
                ) == PackageManager.PERMISSION_GRANTED
            ) {
                //Got Permission
//                Toast.makeText(applicationContext, "Allowed All Permissions", Toast.LENGTH_LONG)
//                    .show()
            }
        }
    }





    private fun cek_devisi_menu(){
        val myProfile = SharedPrefManager.getInstance(this)?.user
        if(myProfile?.devisi != "security"){
            layar1.visibility =View.GONE
            layar2.visibility =View.GONE
            layar3.visibility =View.GONE
        }
    }

}