import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.simple.JSONObject;

/**
 *
 * @author crack
 */
public class update_doc_status extends HttpServlet {
    public void doGet(HttpServletRequest request, HttpServletResponse response)throws IOException, ServletException{
        String file_name = request.getParameter("file");
        String uid = request.getParameter("uid");
        System.out.println(file_name+","+uid);
        //Getting Adhaar Card
        random_otp otp_c = new random_otp();
        String adhaar_number = otp_c.adhaar_card.get(uid);
        //End
        
        //Getting PR
        PrintWriter we = response.getWriter();
        response.setContentType("appliction/json");
        //END
        
        
        //JSON Object
        JSONObject jo = new JSONObject();
        //END
        
        //Getting MYSQL file name
        MYSQL_CONST mysql_c = new MYSQL_CONST();
        Connection conn = mysql_c.digi_connect();
        //END
        
        //Checking If File Name Is Empty
        if(file_name.equals("")){
            jo.put("result", "failed");
            we.write(jo.toString());
            return;
        }
        //End 
        
        
        //Doing Updates In Table One and Two
        ResultSet rs;
        try {
            Statement stmt = conn.createStatement();
            String querry = "update user_files set file_csv = if(file_csv is null, 'a,b,c', concat(file_csv,"+"',"+file_name+"')) WHERE adhaar_number="+adhaar_number;
            int result = stmt.executeUpdate(querry);
            //Checking If Result Set IS Empty
            querry = "INSERT INTO file_data(adhaar_number,file_name,status,link) VALUES("+adhaar_number+",'"+file_name+"','true','')";
            System.out.println(querry);
            result = stmt.executeUpdate(querry);
            jo.put("result", "success");
            } 
        catch(Exception e){
            System.err.println(e.toString());
            jo.put("result", "failed");
            }
        //END
        
        //Getting PR
        we.write(jo.toString());
        //End
        
    }
}
