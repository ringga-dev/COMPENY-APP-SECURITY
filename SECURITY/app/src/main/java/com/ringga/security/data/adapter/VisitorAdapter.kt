package com.ringga.security.data.adapter
/*=================== T H A N K   Y O U ===================*/
/*============= TELAH MENGUNAKAN CODE SAYA ================*/
            /* https://github.com/ringga-dev */
/*=========================================================*/
/*     R I N G G A   S E P T I A  P R I B A D I            */
/*=========================================================*/
import android.content.Context
import android.content.Intent
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.ringga.security.R
import com.ringga.security.data.model.visitor.Data
import com.ringga.security.ui.history.DitailVisitorActivity
import kotlinx.android.synthetic.main.card_list_visitor.view.*

class VisitorAdapter(
    private var wallpaper: MutableList<Data>,
    private var context: Context
) : RecyclerView.Adapter<VisitorAdapter.ViewHolder>() {

    fun setWallpapers(r: List<Data>) {
        wallpaper.clear()
        wallpaper.addAll(r)
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ViewHolder {
        return ViewHolder(
            LayoutInflater.from(parent.context).inflate(R.layout.card_list_visitor, parent, false)
        )
    }

    override fun onBindViewHolder(holder: ViewHolder, position: Int) =
        holder.bind(wallpaper[position], context)

    override fun getItemCount() = wallpaper.size


    class ViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
        fun bind(wallpaper: Data, context: Context) {

            itemView.tv_date.text = "jadwal :${wallpaper.jadwal}"
            itemView.tv_name.text = "nama :" + wallpaper.nama
            itemView.tv_keperluan.text = "keperluan :" + wallpaper.keperluan
            itemView.tv_description.text = wallpaper.description

            itemView.cart_item.setOnClickListener {
                val i = Intent(context, DitailVisitorActivity::class.java)

                i.putExtra("description", wallpaper.description)
                i.putExtra("id", wallpaper.id)
                i.putExtra("id_user", wallpaper.stts.toString())
                i.putExtra("jadwal", wallpaper.jadwal)
                i.putExtra("keluar", wallpaper.keluar.toString())
                i.putExtra("keperluan", wallpaper.keperluan)
                i.putExtra("nama", wallpaper.nama)
                i.putExtra("masuk", wallpaper.masuk.toString())
                context.startActivity(i)
            }
        }
    }
}