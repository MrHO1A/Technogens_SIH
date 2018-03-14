/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.simple.JSONObject;

/**
 *
 * @author AMAN
 * verify otp finally extracting mobile number to process further
 */
public class otp_validate extends HttpServlet {

    public void doGet(HttpServletRequest request,HttpServletResponse response)throws IOException, ServletException{
        String uid = request.getParameter("uid");
        String otp = request.getParameter("otp");
        random_otp otp_c = new random_otp();
        JSONObject jso = new JSONObject();
        jso.put("error", "false");
        if (otp_c.number.get(uid).equals(otp)) {
            System.out.println(otp_c.adhaar_number.toString());
            String mobile_number = otp_c.adhaar_number.get(uid);
            otp_c.number.remove(uid);
            otp_c.adhaar_number.remove(uid);
            System.out.println("OTP Validated of Mobile Number -> "+mobile_number);
            jso.put("error","false");
            jso.put("message","OTP Verified For Number -> "+mobile_number);
        }
        else{
            System.err.println("Flase Auth Detected");
        }
        PrintWriter wr = response.getWriter();
        wr.write(jso.toJSONString());
   }

}
