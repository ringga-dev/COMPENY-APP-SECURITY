package com.ringga.security.database
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.content.ContentValues
import android.content.Context
import android.database.Cursor
import android.database.sqlite.SQLiteDatabase
import android.database.sqlite.SQLiteOpenHelper

class DBHelper(context: Context, factory: SQLiteDatabase.CursorFactory?) :
    SQLiteOpenHelper(context, DATABASE_NAME, factory, DATABASE_VERSION) {


    override fun onCreate(db: SQLiteDatabase) {
        val query = ("CREATE TABLE " + TABLE_NAME + " ("
                + ID_COL + " INTEGER PRIMARY KEY, " +
                ID_SCAN + " TEXT," +
                DATE + " TEXT" + ")")
        db.execSQL(query)
    }

    override fun onUpgrade(db: SQLiteDatabase, p1: Int, p2: Int) {
        db.execSQL("DROP TABLE IF EXISTS $TABLE_NAME")
        onCreate(db)
    }

    fun addName(id_scan: String, date:String) {
        val values = ContentValues()
        values.put(ID_SCAN, id_scan)
        values.put(DATE, date)
        val db = this.writableDatabase
        db.insert(TABLE_NAME, null, values)
        db.close()
    }

    fun getName(): Cursor? {
        val db = this.readableDatabase
        return db.rawQuery("SELECT * FROM $TABLE_NAME", null)
    }

    fun cekKeranjang(id_scan: String):Cursor?{
        val db = this.readableDatabase
        return db.rawQuery("SELECT * FROM $TABLE_NAME WHERE $ID_SCAN ='$id_scan'", null)
    }

    fun delete(id_scan: String) {
        val db = this.readableDatabase
        return db.execSQL("DELETE FROM $TABLE_NAME WHERE $ID_SCAN = '$id_scan'")
    }
    fun deleteAll() {
        val db = this.readableDatabase
        return db.execSQL("DELETE FROM $TABLE_NAME ")
    }

//    fun update(id : Int,qty:Int): Int {
//        val db = this.readableDatabase
//        val values = ContentValues()
//
//        values.put(QTY, qty)
//        return  db.update(TABLE_NAME, values, "$ID_COL=$id", arrayOf())
//    }


    fun deleteById(id:Int){
        val db = this.readableDatabase
        return db.execSQL("DELETE FROM $TABLE_NAME WHERE $ID_COL = id")
    }


    companion object {
        private val DATABASE_NAME = "GEEKS_FOR_GEEKS"
        private val DATABASE_VERSION = 1
        val TABLE_NAME = "gfg_scan"
        val ID_COL = "id"
        val ID_SCAN = "id_scan"
        val DATE = "date"

    }
}