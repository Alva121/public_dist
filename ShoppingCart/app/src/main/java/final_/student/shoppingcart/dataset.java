package final_.student.shoppingcart;

import android.os.Handler;

import java.util.ArrayList;

/**
 * Created by scchethu on 27/03/2019.
 */

public class dataset {
    private static final dataset ourInstance = new dataset();

    public static dataset getInstance() {
        return ourInstance;
    }
    public ArrayList<Product>products=new ArrayList<>();
    ArrayList<Product>checkout=new  ArrayList<>();
    public Handler handler;
    public String CARD_ID="";
    public int INVOICE=0;
    private dataset() {
    }
}
