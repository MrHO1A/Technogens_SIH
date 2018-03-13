import java.io.IOException;
import java.io.PrintWriter;
import java.util.HashMap;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.simple.JSONObject;

/**
 *
 * @author AMAN
 * API To VErify OTP
 * using supplied hash
 */
public class verify_otp extends HttpServlet {
    //Will recive two param uid and otp   
    public void doGet(HttpServletRequest req, HttpServletResponse res)throws IOException,ServletException{
        String hash = req.getParameter("uid");
        String otp = req.getParameter("otp");
        System.out.println("OTP R-> "+otp);
        System.out.println("UID-> "+hash);
        PrintWriter pr = res.getWriter();
        JSONObject js = new JSONObject();
        // Calling verification class
        random_otp otp_c = new random_otp();
        boolean verified = otp_c.verify_otp(hash, otp);
        if(verified){
            js.put("verified", "true");
        }
        else{
            js.put("verified", "false");
        }
        res.setContentType("application/json");
        pr.write(js.toJSONString());
    }
}
