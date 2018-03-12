
import java.util.Random;
import java.util.HashMap;
import com.mashape.unirest.http.*;
import com.mashape.unirest.http.exceptions.UnirestException;
import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;
import java.util.logging.Level;
import java.util.logging.Logger;
public class random_otp {
    static HashMap<String, String> number = new HashMap<>();
    
    //Function To Send OTP using MSG91 api
    public void send_to_number(String mobile,String otp) throws UnirestException{
        String message = "Your OTP is "+otp+" enter this to verify documents";
        HttpResponse<String> response = null;
        try {
            response = Unirest.get("http://api.msg91.com/api/sendhttp.php?sender=VERDIG&route=4&mobiles=7987361397&authkey=201456AW2xZxBwSrS5a9fedb4&country=91&message="+URLEncoder.encode(message, "UTF-8")).asString();
        } catch (UnsupportedEncodingException ex) {
            Logger.getLogger(random_otp.class.getName()).log(Level.SEVERE, null, ex);
        }
        System.out.println(response.getBody().toString());
    }
    
    
    //Generate OPT and Send To USer Mobile Number
    public String generate_otp(String adhaar,String number,String hash){
        Random rand = new Random();
        System.out.println(adhaar);
        System.out.println(hash);
        String random = String.format("%04d", rand.nextInt(10000));
        this.number.put(hash,random);
        System.out.println(this.number.toString());
        
        //Will Send OTP To Mobile Number
//        try {
//            this.send_to_number(number, random);
//        } catch (UnirestException ex) {
//            Logger.getLogger(random_otp.class.getName()).log(Level.SEVERE, null, ex);
//        }
       
        return random;
    }
    
    //Verifies OTP with number
    public boolean verify_otp(String hash, String otp){
        System.out.println("HASH");        
        String list_otp = this.number.get(hash);
        if(list_otp.equals(otp)){
            this.number.remove(hash);
            System.out.println(this.number.toString());
            return true;
            
        }
        return false;
    }
}
