package com.ringga.security.database
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.app.Notification
import android.app.NotificationChannel
import android.app.NotificationManager
import android.content.Context
import android.content.SharedPreferences
import android.os.Build

import android.preference.PreferenceManager
import androidx.core.app.NotificationCompat
import androidx.core.content.ContextCompat.getSystemService
import com.ringga.security.R


class PreferencesTokenFirebase {

    companion object {
        val token = "user"

        private fun getSharedPreference(context: Context): SharedPreferences {
            return PreferenceManager.getDefaultSharedPreferences(context)
        }

        fun setToken(context: Context, username: String?) {
            val editor = getSharedPreference(context).edit()
            editor.putString(token, username)
            editor.apply()
        }

        fun getToken(context: Context): String? {
            return getSharedPreference(context).getString(token, "")
        }


        fun ClearToken(context: Context) {
            val editor = getSharedPreference(context).edit()
            editor.remove(token)
            editor.apply()
        }


        fun notification(context: Context){
            var CHANNEL_ID_ANDROID = "com.ringga.sesecurity"
            var CHANNEL_NAME = "ANDROID_CHANNEL"
            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {


                val imp = NotificationManager.IMPORTANCE_HIGH
                val mNotificationChannel =
                    NotificationChannel(CHANNEL_ID_ANDROID, CHANNEL_NAME, imp)
                val notificationBuilder: Notification.Builder =
                    Notification.Builder(context, CHANNEL_ID_ANDROID)
                        .setSmallIcon(R.drawable.ic_flash_on)
                        .setContentTitle("simpel Notification")
                        .setContentText("contoh notification pada kotlin")
                        .setPriority(NotificationCompat.PRIORITY_DEFAULT)

                val notificationManager: NotificationManager =
                    context.getSystemService(Context.NOTIFICATION_SERVICE) as NotificationManager
                notificationManager.createNotificationChannel(mNotificationChannel)
                notificationManager.notify(0, notificationBuilder.build())
            }else {
                val notificationBuild2: NotificationCompat.Builder = NotificationCompat.Builder(context)
                    .setSmallIcon(R.drawable.ic_flash_on)
                    .setContentTitle("simpel Notification")
                    .setContentText("contoh notification pada kotlin")

                val  notificationManager: NotificationManager = context.getSystemService(Context.NOTIFICATION_SERVICE) as NotificationManager
                notificationManager.notify(0,notificationBuild2.build())
            }
        }

    }
}