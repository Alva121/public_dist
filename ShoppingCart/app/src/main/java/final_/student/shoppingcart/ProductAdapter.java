package final_.student.shoppingcart;

import android.os.Message;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;

import java.util.ArrayList;

public class ProductAdapter extends RecyclerView.Adapter<ProductAdapter.holder> {
    public ProductAdapter(ArrayList<Product> products) {
        this.products = products;
    }

    ArrayList<Product>products;

    public ProductAdapter(ArrayList<Product> products, int which) {
        this.products = products;
        this.which = which;
    }

    int which;
    @NonNull
    @Override
    public ProductAdapter.holder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        if (which==0)
     return new holder( LayoutInflater.from(parent.getContext()).inflate(R.layout.product,parent,false));
        else
            return new holder( LayoutInflater.from(parent.getContext()).inflate(R.layout.item_holder,parent,false));
    }

    @Override
    public void onBindViewHolder(@NonNull final ProductAdapter.holder holder, final int position) {

      final Product product=  dataset.getInstance().products.get(position);
        holder.name.setText(products.get(position).name);
        holder.price.setText(products.get(position).price);
      if(which==0)
      {
          Glide.with(holder.itemView).load(REST.UPLOAD+dataset.getInstance().products.get(position).getImgurl()).into(holder.imageView);

          holder.disc.setText(product.getDisc());
          holder.unit.setText(product.getUnit());
          holder.avail.setText(product.getAvail()+"");
          holder.plus.setOnClickListener(new View.OnClickListener() {
              @Override
              public void onClick(View view) {

                  if(product.getAvail()<dataset.getInstance().products.get(position).getQty()+1)
                  {
                      Toast.makeText(holder.itemView.getContext(), "Item Not available", Toast.LENGTH_SHORT).show();
                      return;
                  }
                  //  qty.setText(products.get(getPosition()).qty+1+"");

                  //  Toast.makeText(view.getContext(),   products.get(position).getQty()+"", Toast.LENGTH_SHORT).show();
                  products.get(position)
                          .addQty();
                  holder.qty.setText(products.get(position).getQty()+"");
                  Message message= new Message();

                  message.arg1=Integer.parseInt(products.get(position).getPrice());
                  dataset.getInstance(). handler.sendMessage(message);
              }
          });
          holder.minus.setOnClickListener(new View.OnClickListener() {
              @Override
              public void onClick(View view) {
                  if(products.get(position).getQty()>0) {
                      products.get(position)
                              .removeQty();
                      holder.qty.setText(products.get(position).getQty()+"");
                      Message message = new Message();

                      message.arg1 = -Integer.parseInt(products.get(position).getPrice());
                      dataset.getInstance(). handler.sendMessage(message);
                  }
                  if( products.get(position).getQty()==0) {
                      holder.add.setVisibility(View.VISIBLE);
                      holder.linearLayout.setVisibility(View.INVISIBLE);
                  }
              }
          });
      }else {
          holder.qty.setText(products.get(position).getQty()+"");
        int price=  Integer.parseInt(products.get(position).getPrice())*products.get(position).getQty();
          holder.price.setText(price+"");
          holder.id.setText(product.getId());

      }
    }

    @Override
    public int getItemCount() {
        return products.size();
    }

    class holder extends  RecyclerView.ViewHolder {
    LinearLayout linearLayout;
    Button add,plus,minus;
    ImageButton remove;
    TextView qty,name,price,avail,disc,unit,id;
    ImageView imageView;

        public holder(@NonNull final View itemView) {
            super(itemView);

            qty=itemView.findViewById(R.id.qty);
            price=itemView.findViewById(
                    R.id.price
            );
            name=itemView.findViewById(R.id.name);
            if(which==0) {
                linearLayout=itemView.findViewById(R.id.qty_layout);
                add=itemView.findViewById(R.id.add);
                plus=itemView.findViewById(R.id.plus);
                minus=itemView.findViewById(R.id.minus);
                imageView=itemView.findViewById(R.id.img);
                avail=itemView.findViewById(R.id.available);
                disc=itemView.findViewById(R.id.disc);
                linearLayout.setVisibility(View.INVISIBLE);
                unit=itemView.findViewById(R.id.unit);
                add.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        if(dataset.getInstance().products.get(getPosition()).getAvail()<dataset.getInstance().products.get(getAdapterPosition()).getQty()+1)
                        {
                            Toast.makeText(itemView.getContext(), "Item Not available", Toast.LENGTH_SHORT).show();
                            return;
                        }
                        add.setVisibility(View.INVISIBLE);
                        linearLayout.setVisibility(View.VISIBLE);
                        products.get(getAdapterPosition()).addQty();
                        Message message = new Message();

                        message.arg1 = Integer.parseInt(products.get(getAdapterPosition()).getPrice());
                        dataset.getInstance().handler.sendMessage(message);
                        qty.setText(products.get(getAdapterPosition()).getQty() + "");
                    }
                });
            }
        else {
            id=itemView.findViewById(R.id.id);
            remove=itemView.findViewById(R.id.remove);
            remove.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    products.remove(getAdapterPosition());
                  dataset.getInstance().checkout.remove(getAdapterPosition());
                    notifyDataSetChanged();
                }
            });
            }


        }
    }
}
