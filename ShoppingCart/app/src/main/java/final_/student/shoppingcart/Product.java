package final_.student.shoppingcart;
/**
 * Created by scchethu on 27/03/2019.
 */

public class Product {
    public String getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public String getPrice() {
        return price;
    }

    String id;
    String name;

    public Product(String id, String name, String price, int avail, String disc) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.avail = avail;
        this.disc = disc;
    }

    public int getQty() {
        return qty;
    }

    public void setQty(int qty) {
        this.qty = qty;
    }

    private int qty=0;
    String price;
    public void addQty(){
        qty++;
    }
    public void removeQty(){
       qty--;
    }
    private int avail;private String disc;

    public Product(String id, String name, int qty, String price, int avail, String disc, String imgurl) {
        this.id = id;
        this.name = name;
        this.qty = qty;
        this.price = price;
        this.avail = avail;
        this.disc = disc;
        this.imgurl = imgurl;
    }

    public void setId(String id) {
        this.id = id;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setPrice(String price) {
        this.price = price;
    }

    public int getAvail() {
        return avail;
    }

    public void setAvail(int avail) {
        this.avail = avail;
    }

    public String getDisc() {
        return disc;
    }

    public void setDisc(String disc) {
        this.disc = disc;
    }

    public String getImgurl() {
        return imgurl;
    }

    public void setImgurl(String imgurl) {
        this.imgurl = imgurl;
    }

    public String getUnit() {
        return unit;
    }

    public void setUnit(String unit) {
        this.unit = unit;
    }

    private String imgurl;

    public Product(String id, String name, int qty, String price, int avail, String disc, String imgurl, String unit) {
        this.id = id;
        this.name = name;
        this.qty = qty;
        this.price = price;
        this.avail = avail;
        this.disc = disc;
        this.imgurl = imgurl;
        this.unit = unit;
    }

    private String unit;
}
