package com.ringga.security.database

import android.content.Context
import android.content.SharedPreferences


object Preferences {
    private const val PREFS = "SoundPreferences"


    fun setError(ctx: Context, durasi: Boolean) {
        val prefs: SharedPreferences = ctx.getSharedPreferences(PREFS, Context.MODE_PRIVATE)
        prefs.edit().putBoolean("error", durasi).apply()
    }

    fun getError(ctx: Context): Boolean {
        val prefs: SharedPreferences = ctx.getSharedPreferences(PREFS, Context.MODE_PRIVATE)
        return prefs.getBoolean("error", true)
    }

    fun clearMedia(ctx: Context) {
        val settings: SharedPreferences = ctx.getSharedPreferences(PREFS, Context.MODE_PRIVATE)
        settings.edit().clear().apply()
    }
}