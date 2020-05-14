package final_.student.shoppingcart;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

public class payment extends AppCompatActivity {
TextView cid,amount,item_count,itemprice;
RecyclerView rv;
Button bill;
int totalprice=0;
String query="";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_payment);



        bill=findViewById(R.id.bill);
        rv=findViewById(R.id.rv);
        final Intent I=getIntent();
        //cid.setText(dataset.getInstance().CART_ID+"");

      item_count=findViewById(R.id.item_count);
      itemprice=findViewById(R.id.item_price);
      item_count.setText(dataset.getInstance().checkout.size()+"");

      for (Product product:dataset.getInstance().checkout)
      {
          int price=Integer.parseInt(product.getPrice());
          int qty=product.getQty();
          totalprice+=price*qty;
          query+="&item[]="+product.getName()+"&qty[]="+product.getQty()+"&";
      }
      itemprice.setText(totalprice+"");
        rv.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
      ProductAdapter adapter=  new ProductAdapter(dataset.getInstance().checkout,1);
        rv.setAdapter(adapter);
      adapter.notifyDataSetChanged();



       bill.setOnClickListener(new View.OnClickListener() {


           @Override
           public void onClick(View view) {
               if(dataset.getInstance().checkout.size()==0)
               {
                   Toast.makeText(payment.this, "No item Added", Toast.LENGTH_SHORT).show();
                   return;
               }
               final StringRequest request=new StringRequest(Request
                       .Method.GET, REST.BASE + REST.PLACE_ORDER+"card_no="+dataset.getInstance().CARD_ID+query+"total_amount="+totalprice, new Response.Listener<String>() {
                   @Override
                   public void onResponse(String response) {
                       Log.d("url",REST.BASE + REST.PLACE_ORDER+"card_no="+dataset.getInstance().CARD_ID+query+"total_amount="+totalprice);
//if(response.contains("0"))
//{
//    dataset.getInstance().products.clear();
//    Checkout.adapter.notifyDataSetChanged();
//    Toast.makeText(payment.this, "Payment successfull,collect bill at counter", Toast.LENGTH_LONG).show();
//
//}else {
    Toast.makeText(payment.this, response.trim(), Toast.LENGTH_SHORT).show();
    finish();
//
//    Intent intent=new Intent(Intent.ACTION_VIEW);
//    intent.setData(Uri.parse(REST.BASE+response.trim()));
//    dataset.getInstance().products.clear();
//    startActivity(intent);




                   }
               }, new Response.ErrorListener() {
                   @Override
                   public void onErrorResponse(VolleyError error) {

                   }
               });
               RequestQueue requestQueue= Volley.newRequestQueue(getBaseContext());
               requestQueue.getCache().clear();
               requestQueue.add(request);
           }
       });

    }

}
