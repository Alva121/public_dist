package final_.student.shoppingcart;

import android.os.Message;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;

import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

/**
 * Created by scchethu on 24/02/2019.
 */

public class adapter extends RecyclerView.Adapter<adapter.myview> {
    @Override
    public adapter.myview onCreateViewHolder(ViewGroup parent, int viewType) {


        return new myview(LayoutInflater.from(parent.getContext()).inflate(R.layout.item_holder,parent,false));
    }

    @Override
    public void onBindViewHolder(adapter.myview holder, int position) {

        holder.price.setText(dataset.getInstance().products.get(position).getPrice());
        holder.name.setText(dataset.getInstance().products.get(position).getName());
        holder.id.setText(dataset.getInstance().products.get(position).getId());

    }

    @Override
    public int getItemCount() {
        return dataset.getInstance().products.size();
    }

    class myview extends RecyclerView.ViewHolder {
        TextView id,name,price;
        ImageButton remove;
        public myview(View inflate) {
            super(inflate);
            id=inflate.findViewById(R.id.id);
            name=inflate.findViewById(R.id.name);
            price=inflate.findViewById(R.id.price);
            remove=inflate.findViewById(R.id.remove);
//            remove.setOnClickListener(new View.OnClickListener() {
//                @Override
//                public void onClick(View view) {
//                   removeCart(dataset.getInstance().products
//                   .get(getAdapterPosition()).getId());
//                }
//            });

        }


        void removeCart(String pid, int cartid){
            final StringRequest request=new StringRequest(Request
                    .Method.GET, REST.BASE + "remove.php?cart_id="+cartid+"&p_id="+pid, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    if(response.contains("0")){

                        dataset.getInstance().products.remove(getAdapterPosition());
                        notifyDataSetChanged();
                        Message message=Message.obtain();
                        message.arg1=0;
                        dataset.getInstance().handler.sendMessage(message);

                    }else{
                        Toast.makeText(itemView.getContext(), "Error while remove item", Toast.LENGTH_SHORT).show();
                    }


                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {

                }
            });
            RequestQueue requestQueue= Volley.newRequestQueue(itemView.getContext());
            requestQueue.add(request);




        }
    }


//    public class Emptycart extends RecyclerView.ViewHolder {
//        public Emptycart(View itemView) {
//            super(itemView);
//        }
    //}
}
