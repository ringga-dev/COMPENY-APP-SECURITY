
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
package com.ringga.security

import android.Manifest
import android.annotation.SuppressLint
import android.app.Service
import android.content.Intent
import android.os.IBinder
import android.os.Binder

import android.os.Looper

import android.content.pm.PackageManager
import android.location.Location
import android.location.LocationListener
import android.util.Log
import android.widget.Toast

import androidx.core.content.ContextCompat

import com.google.android.gms.location.LocationResult

import com.google.android.gms.location.LocationCallback

import com.google.android.gms.location.FusedLocationProviderClient
import com.google.android.gms.location.LocationRequest
import com.ringga.security.data.api.RetrofitClient
import com.ringga.security.data.model.auth.BaseRespon
import com.ringga.security.database.PreferencesToken
import com.ringga.security.database.SharedPrefManager
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response


class MyService : Service(), LocationListener {
    private val binder: IBinder = LocalBinder()
    var latitude = 0.0
    var longitude = 0.0

    /**
     * Stores parameters for requests to the FusedLocationProviderClient.
     */
    private var mLocationRequest: LocationRequest? = null
    private var mLocationCallback: LocationCallback? = null
    private var fusedLocationProviderClient: FusedLocationProviderClient? = null
    @SuppressLint("VisibleForTests")
    override fun onCreate() {
        super.onCreate()
        fusedLocationProviderClient = FusedLocationProviderClient(this)
        mLocationCallback = object : LocationCallback() {
            override fun onLocationResult(locationResult: LocationResult) {
                if (locationResult == null) {
                    return
                }
                for (location in locationResult.locations) {
                    updateLocation(location)
                }
            }
        }
    }



    override fun onStartCommand(intent: Intent, flags: Int, startId: Int): Int {
        createLocationRequest()
        startLocationUpdates()
        fusedLocationProviderClient = FusedLocationProviderClient(this)
        mLocationCallback = object : LocationCallback() {
            override fun onLocationResult(locationResult: LocationResult) {
                if (locationResult == null) {
                    return
                }
                for (location in locationResult.locations) {
                    updateLocation(location)
                }
            }
        }
        return START_STICKY
    }


    protected fun createLocationRequest() {
        mLocationRequest = LocationRequest()

        mLocationRequest!!.setInterval(UPDATE_INTERVAL_IN_MILLISECONDS)

        mLocationRequest!!.setFastestInterval(FASTEST_UPDATE_INTERVAL_IN_MILLISECONDS)
        mLocationRequest!!.setPriority(LocationRequest.PRIORITY_HIGH_ACCURACY)
    }


    private fun startLocationUpdates() {
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION)
            == PackageManager.PERMISSION_GRANTED
        ) {
            fusedLocationProviderClient!!.requestLocationUpdates(
                mLocationRequest,
                mLocationCallback,
                Looper.myLooper()
            )
        }

    }

    override fun onBind(intent: Intent): IBinder? {
        return binder
    }

    override fun onLocationChanged(location: Location) {
        updateLocation(location)
    }

    protected fun stopLocationUpdates() {
        fusedLocationProviderClient!!.removeLocationUpdates(mLocationCallback)
    }

    private fun updateLocation(location: Location) {
        Log.i(TAG, location.getProvider())
        Log.i(TAG, "Latitude :" + location.getLatitude())
        Log.i(TAG, "Longitude :" + location.getLongitude())
        latitude = location.getLatitude()
        longitude = location.getLongitude()

        Toast.makeText(applicationContext, "$latitude, $longitude", Toast.LENGTH_SHORT).show()
        val myProfile = SharedPrefManager.getInstance(applicationContext)?.user
        RetrofitClient.instance.location_user(PreferencesToken.getToken(this)!!, myProfile?.id.toString() , latitude.toString(), longitude.toString())
            .enqueue(object : Callback<BaseRespon> {
                override fun onResponse(
                    call: Call<BaseRespon>,
                    response: Response<BaseRespon>
                ) {
                }

                override fun onFailure(call: Call<BaseRespon>, t: Throwable) {
                }

            })
    }

    //Local binder to bind the service and communicate with this LocationUpdateService class.
    inner class LocalBinder : Binder() {
        val service: MyService
            get() = this@MyService
    }

    companion object {
        val TAG = MyService::class.java.simpleName

        const val UPDATE_INTERVAL_IN_MILLISECONDS: Long = 1000

        const val FASTEST_UPDATE_INTERVAL_IN_MILLISECONDS = UPDATE_INTERVAL_IN_MILLISECONDS / 2
    }
}
