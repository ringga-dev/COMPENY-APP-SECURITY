package com.ringga.security.data.adapter
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.content.Context
import android.content.Intent
import android.graphics.Color
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import androidx.recyclerview.widget.RecyclerView
import com.ringga.security.R
import com.ringga.security.data.model.user_late.Data
import kotlinx.android.synthetic.main.card_user_late.view.*

class UserLateAdapter(
    private var wallpaper: MutableList<Data>,
    private var context: Context
) : RecyclerView.Adapter<UserLateAdapter.ViewHolder>() {

    fun setWallpapers(r: List<Data>) {
        wallpaper.clear()
        wallpaper.addAll(r)
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ViewHolder {
        return ViewHolder(
            LayoutInflater.from(parent.context)
                .inflate(R.layout.card_user_late, parent, false)
        )
    }

    override fun onBindViewHolder(holder: ViewHolder, position: Int) =
        holder.bind(wallpaper[position], context)

    override fun getItemCount() = wallpaper.size


    class ViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
        fun bind(wallpaper: Data, context: Context) {

            itemView.tv_date.text = "KEDATANGAN : ${wallpaper.date}"
            itemView.tv_shift.text = "${wallpaper.shift}"
            itemView.tv_masuk.text = "Masuk ${wallpaper.masuk} WIB"
            itemView.tv_telat.text = "TERLAMBAT : ${wallpaper.terlambat}"
            if (wallpaper.stts == "2"){
                itemView.card.setBackgroundColor(Color.YELLOW)
            }



        }
    }
}