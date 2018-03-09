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
  
}
