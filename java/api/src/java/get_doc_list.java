import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author AMAN
 * Will Get List Of Document From Digital Locker
 * For function get_document_list
 */
public class get_doc_list extends HttpServlet {

    public void doGet(HttpServletRequest request,HttpServletResponse response)throws IOException, ServletException{
        String data = null;
        //Getting MYSQL Connection
        MYSQL_CONST mysql_con = new MYSQL_CONST();
        Connection conn = mysql_con.digi_connect();
        //END
        
        //Getting Request ID Form GET Paramater
        String uid = request.getParameter("uid");
        //End
        
        //Getting Adhaar Info From Hash Map
        random_otp map_c = new random_otp();
        String adhaar_number = map_c.adhaar_card.get(uid);
        //End
        
        ResultSet rs;
        try {
            Statement stmt = conn.createStatement();
            String querry = "SELECT file_csv FROM user_files WHERE adhaar_number="+adhaar_number;
            rs = stmt.executeQuery(querry);
            //Checking If Result Set IS Empty
            if(!rs.wasNull()){
                while(rs.next()){
                    //Storing Data In String
                    data = rs.getString("file_csv");
                    System.out.println(data);
                    //END
                }
            }
        }
        catch(Exception e){
            System.err.println(e.toString());
        }
        PrintWriter wr =  response.getWriter();
        response.setContentType("text/plain");
        wr.write(data); 
    }
}
