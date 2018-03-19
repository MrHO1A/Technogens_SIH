
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.HashMap;
import org.json.simple.JSONObject;

/**
 *
 * @author AMAN
 * Will Get Document Status Form Sql Server and check if it is verified or not
 */
public class status_getter {
    public JSONObject getData(String adhaar_number, String file, String data_of){
        JSONObject jso = new JSONObject();
        
        //Getting Mysql Connector
        MYSQL_CONST mysql_c = new MYSQL_CONST();
        Connection conn = mysql_c.digi_connect();
        //End
        
        //Set Default Map
        HashMap<String, String> map = new HashMap<>();
        map.put("result", "true");
        map.put("data_of", data_of.toUpperCase());
        map.put("file_name", "null");
        map.put("link", "null");
        map.put("status", "false");
        //End
        jso.putAll(map);
        
        //Process My Sql Querry
        ResultSet rs;
        try {
            Statement stmt = conn.createStatement();
            String querry = "SELECT file_name,status,link FROM file_data WHERE adhaar_number="+adhaar_number+" and file_name='"+file+"'";
            rs = stmt.executeQuery(querry);
            //Checking If Result Set IS Empty
            if(!rs.wasNull()){
                while(rs.next()){
                    //Storing Data In Map
                    map.put("result", "true");
                    map.put("file_name", rs.getString("file_name"));
                    map.put("link", rs.getString("link"));
                    map.put("status", rs.getString("status"));
                    jso.putAll(map);
                    //END
                }
            }
        }
        catch(Exception e){
            System.err.println(e.toString());
            
        }
        
        return jso;
    }
}
