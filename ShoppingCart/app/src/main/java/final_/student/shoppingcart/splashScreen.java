package final_.student.shoppingcart;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import static final_.student.shoppingcart.REST.IP;

public class splashScreen extends AppCompatActivity {

EditText cardid,ip,name;
Button btn,reg;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        btn=findViewById(R.id.login);
        cardid=findViewById(R.id.cardno);
        name=findViewById(R.id.name);
        reg=findViewById(R.id.reg);
        ip=findViewById(R.id.ip);
        reg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(getApplicationContext(),RegistrationActivity.class));
            }
        });
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                IP=ip.getText().toString();
                REST.BASE="http://"+IP+"/public_dist/api.php";
                REST.UPLOAD="http://"+IP+"/public_dist/";
                RequestQueue queue;
                queue = Volley.newRequestQueue(view.getContext());
                String url =REST.BASE+REST.LOGIN+"&card_no="+cardid.getText().toString()+"&name="+name.getText().toString();

// Request a string response from the provided URL.
                StringRequest stringRequest = new StringRequest(Request.Method.GET, url,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {

                          if(response.contains("0"))
                          {
                              dataset.getInstance().CARD_ID=cardid.getText().toString();

                              startActivity(new Intent(getBaseContext(),home.class));
                            finish();

                                  //  viewcart();

                          }
                          else
                          {
                              Toast.makeText(splashScreen.this, "Not valid info", Toast.LENGTH_SHORT).show();
                          }
                            }
                        }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(splashScreen.this, "Server error", Toast.LENGTH_SHORT).show();

                    }
                });

// Add the request to the RequestQueue.
                queue.add(stringRequest);


            }
        });


    }



}
