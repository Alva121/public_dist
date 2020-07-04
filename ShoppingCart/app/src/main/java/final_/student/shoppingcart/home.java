package final_.student.shoppingcart;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class home extends AppCompatActivity {
Button add_cart,checkout,exit;
RecyclerView rv;
ProductAdapter productAdapter;
    int t=0;
    TextView total_price,Total_item;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
//        transparentToolbar();
        setContentView(R.layout.home);

        rv=findViewById(R.id.rv);

        total_price=findViewById(R.id.tprice);
        Total_item=findViewById(R.id.titem);
        checkout=findViewById(R.id.cart);
        getProducts();
        checkout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dataset.getInstance(). checkout.clear();
        for(Product cartitem : dataset.getInstance().products)
        {


            if(cartitem.getQty()>0)
            {
              dataset.getInstance(). checkout.add(cartitem);
            }

        }

                startActivity(new Intent(getApplicationContext(),payment.class));
            }
        });



        RecyclerView.LayoutManager layoutManager=new GridLayoutManager(getApplicationContext(),1);
        productAdapter=new ProductAdapter(dataset.getInstance().products,0);

        rv.setLayoutManager(layoutManager);
        rv.setAdapter(productAdapter);
//

        upDateCart(0);
        dataset.getInstance().handler=new Handler(new Handler.Callback() {
            @Override
            public boolean handleMessage(Message message) {

                upDateCart(message.arg1);
                return false;
            }
        });

    }

    @Override
    protected void onResume() {
        super.onResume();
        getProducts();
    }

    @Override
    protected void onStart() {
        super.onStart();
        getProducts();
    }

    private  void upDateCart(int price){
        t+=price;

        total_price.setText(t+"");
      //  Total_item.setText(tc+"");
    }
//    private void transparentToolbar() {
//        if (Build.VERSION.SDK_INT >= 19 && Build.VERSION.SDK_INT < 21) {
//            setWindowFlag(this, WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS, true);
//        }
//        if (Build.VERSION.SDK_INT >= 19) {
//            getWindow().getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_LAYOUT_STABLE | View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN);
//        }
//        if (Build.VERSION.SDK_INT >= 21) {
//            setWindowFlag(this, WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS, false);
//            getWindow().setStatusBarColor(Color.TRANSPARENT);
//        }
//    }
//
//    private void setWindowFlag(Activity activity, final int bits, boolean on) {
//        Window win = activity.getWindow();
//        WindowManager.LayoutParams winParams = win.getAttributes();
//        if (on) {
//            winParams.flags |= bits;
//        } else {
//            winParams.flags &= ~bits;
//        }
//        win.setAttributes(winParams);
//    }


    void getProducts()
    {

        RequestQueue queue = Volley.newRequestQueue(this);
        String url =REST.BASE+REST.GETPRODUCT;

// Request a string response from the provided URL.
        StringRequest stringRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {

                    @Override
                    public void onResponse(String response) {
                        dataset.getInstance().products.clear();
                        try {
                            JSONArray jsonArray=new JSONArray(response);
                            for(int i=0;i<jsonArray.length();i++){
                                JSONObject object=jsonArray.getJSONObject(i);
                                Product product=new Product(object.getString("id"),object.getString("name"),0,object.getString("price"), object.getInt("avail"), object.getString("info"),object.getString("media_id"),object.getString("unit"));
                                dataset.getInstance().products.add(product);

                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
productAdapter.notifyDataSetChanged();
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(home.this, "Error in connection"+error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });

// Add the request to the RequestQueue.
        queue.add(stringRequest);
    }
}
