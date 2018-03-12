import java.util.HashMap;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.simple.JSONObject;

/**
 *
 * @author AMAN
 */
public class request_otp extends HttpServlet {
//Servelet To Request Otp
    public void doGet(HttpServletRequest req, HttpServletResponse res)throws IOException,ServletException{
        String adhaar = req.getParameter("adhaar");
        System.out.println("Adhaar -> "+adhaar);
        String hash = req.getParameter("uid");
        System.out.println(hash);
        database_main d_main = new database_main();
        HashMap<String,String> opt = d_main.data_u_adhar(adhaar);
        PrintWriter pr = res.getWriter();
        random_otp Random_OTP = new random_otp();
        if(opt.get("adhaar")!=null){
        try{
        System.out.println(Random_OTP.generate_otp(opt.get("adhaar"),opt.get("mobile_send"),hash));
        opt.remove("mobile_send");
        }
        catch(Exception e){
            System.out.println(e);
        }
        }
        JSONObject jso = new JSONObject(opt);
        res.setContentType("application/json");
        pr.write(jso.toString());
    }
}
