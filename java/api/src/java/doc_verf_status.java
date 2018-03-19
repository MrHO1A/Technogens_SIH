import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.simple.JSONArray;

/**
 *
 * @author AMAN
 * will get Document Verification Status
 */
public class doc_verf_status extends HttpServlet {
    public void doGet(HttpServletRequest request, HttpServletResponse response)throws IOException,ServletException{
        //Getting Paramaters UID And File Name
        String uid = request.getParameter("uid");
        String[] data_name = request.getParameter("data").split("\\s*,\\s*");
        String[] files = request.getParameter("files").split("\\s*,\\s*");
        //END
        
        //Getting Adhar Card Number Form Hash Map
        random_otp hash_c = new random_otp();
        String adhaar_number = hash_c.adhaar_card.get(uid);
        //End
        
        //Init STATUS GETTER Class
        status_getter getS = new status_getter();
        //End
        
        //Start Getting Data
        JSONArray ja = new JSONArray();
        for (int i = 0; i<data_name.length;i++ ){
            ja.add(getS.getData(adhaar_number, files[i], data_name[i]));
        }
        System.out.println("Good Array");
        System.out.println(ja.toString());
        //End
        
        //Starting Print Writer
        PrintWriter wr = response.getWriter();
        response.setContentType("application/json");
        wr.write(ja.toJSONString());
        //End
        
    }
}
