import java.util.Random;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author IBM
 */
public class otp_gen_class {
    public String OTP(){
        String id;
        Random random = new Random();
        id = String.format("%04d", random.nextInt(10000));
        return id;
    }
    public boolean SEND_OTP(String number, String otp){
        HttpResponse<String> response = Unirest.get("http://api.msg91.com/api/sendhttp.php?sender=MSGIND&route=4&mobiles=&authkey=&encrypt=&country=0&message=Hello!%20This%20is%20a%20test%20message&flash=&unicode=&schtime=&afterminutes=&response=&campaign=")
  .asString();
    }
}
