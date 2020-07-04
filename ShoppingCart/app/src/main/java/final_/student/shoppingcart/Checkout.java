package final_.student.shoppingcart;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

public class Checkout extends AppCompatActivity {
 RecyclerView rv;
   public static adapter adapter;
int t=0;
TextView total_price,Total_item;
Button cart;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setTitle("Product List");

        setContentView(R.layout.activity_checkout);

        rv=findViewById(R.id.rv);
        cart=findViewById(R.id.cart);
        RecyclerView.LayoutManager layoutManager=new LinearLayoutManager(this);
       adapter=new adapter();

        rv.setLayoutManager(layoutManager);
        rv.setAdapter(adapter);

        total_price=findViewById(R.id.tprice);
       Total_item=findViewById(R.id.titem);
       if(dataset.getInstance().products.size()==0)
           cart.setEnabled(false);
       else
           cart.setEnabled(true);
       cart.setOnClickListener(new View.OnClickListener() {
           @Override
           public void onClick(View view) {
             Intent i=  new Intent(view.getContext(),payment.class);
             i.putExtra("amount",total_price.getText().toString());
               startActivity(i);
           }
       });
        upDateCart();
        dataset.getInstance().handler=new Handler(new Handler.Callback() {
            @Override
            public boolean handleMessage(Message message) {
                upDateCart();
                return false;
            }
        });
    }
  private  void upDateCart(){
      t=0;
      for(Product p :dataset.getInstance().products){
          t+=Integer.parseInt(p.getPrice());
      }
      total_price.setText(t+"");
      Total_item.setText(dataset.getInstance().products.size()+"");
  }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu,menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()){
//            case R.id.add:startActivity(new Intent(getApplicationContext(),ScanActivity.class));
//            finish();
        }
        return super.onOptionsItemSelected(item);
    }
}
