package com.ringga.security.data.adapter
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/

import android.app.AlertDialog
import android.content.Context
import android.content.DialogInterface
import android.content.Intent
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.widget.ThemeUtils
import androidx.core.view.marginLeft
import androidx.recyclerview.widget.RecyclerView
import com.ringga.security.R
import com.ringga.security.data.model.shift.Data
import com.ringga.security.ui.scan.ShiftScanActivity
import com.ringga.security.util.pindah
import kotlinx.android.synthetic.main.card_list_shift.view.*

class ShiftAdapter(
    private var wallpaper: MutableList<Data>,
    private var context: Context
) : RecyclerView.Adapter<ShiftAdapter.ViewHolder>() {

    fun setWallpapers(r: List<Data>) {
        wallpaper.clear()
        wallpaper.addAll(r)
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ViewHolder {
        return ViewHolder(
            LayoutInflater.from(parent.context)
                .inflate(R.layout.card_list_shift, parent, false)
        )
    }

    override fun onBindViewHolder(holder: ViewHolder, position: Int) =
        holder.bind(wallpaper[position], context)

    override fun getItemCount() = wallpaper.size


    class ViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
        fun bind(wallpaper: Data, context: Context) {

            itemView.tv_shift.text = "${wallpaper.shift}"
            itemView.tv_masuk.text = "Masuk :  Pukul ${wallpaper.masuk} WIB"
            itemView.tv_keluar.text = "Keluar :  Pukul ${wallpaper.keluar} WIB"
            itemView.tv_m_rest.text = "Mulai Istirahat :  Pukul ${wallpaper.m_rest} WIB"
            itemView.tv_s_rest.text = "Selesai Istirahat:  Pukul ${wallpaper.s_rest} WIB"


            itemView.cart_item.setOnClickListener {
                val edittext = EditText(context)
                edittext.hint = "Masukkan Alasan User?"

                AlertDialog.Builder(context)
                    .setTitle("User Terlambat")
                    .setIcon(R.drawable.logo_etowa)
                    .setMessage("Tentukan keterlambatan user?")
                    .setView(edittext)
                    .setPositiveButton(
                        "Masuk",
                        DialogInterface.OnClickListener { dialogInterface, i ->
                            val alasan = edittext.text.toString()

                            pindah(context, wallpaper.id, "1", alasan)
                        })
                    .setNegativeButton(
                        "Istirahat",
                        DialogInterface.OnClickListener { dialogInterface, i ->
                            val alasan = edittext.text.toString()

                            pindah(context, wallpaper.id, "2",alasan)
                        })
                    .setNeutralButton("Close") { _, _ ->
                        Toast.makeText(context, "Di batalkan", Toast.LENGTH_SHORT).show()
                    }
                    .show()
            }
        }
    }


}