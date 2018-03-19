
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.HashMap;
import org.json.simple.JSONObject;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author AMAN
 */
public class get_doc_data {
    public JSONObject get_data(String data_of,String adhaar_card){
        HashMap<String,String> map = new HashMap<>();
        //Setting Default Values
         map.put("result","true");
         map.put("data_of", data_of.toUpperCase());
         map.put("status", "failed");
         map.put("file", "");
        //DEFAULT VALUE END
        JSONObject json = new JSONObject();
        
        // MYSQL CONNECTOR
        MYSQL_CONST con = new MYSQL_CONST();
        //END
        
        Connection conn = con.digi_connect();
        ResultSet rs;
        try {
            Statement stmt = conn.createStatement();
            String querry = "SELECT "+data_of+","+data_of+"_file FROM user_data WHERE adhaar="+adhaar_card;
            rs = stmt.executeQuery(querry);
            //Checking If Result Set IS Empty
            if(!rs.wasNull()){
                while(rs.next()){
                    //Storing Data In Hash MAP
                    map.clear();
                    map.put("result","true");
                    map.put("data_of", data_of.toUpperCase());
                    map.put("status", rs.getString(data_of));
                    map.put("file", rs.getString(data_of+"_file"));
                    json.putAll(map);
                    System.out.println(map.toString());
                    //END
                }
            }
        }
        catch(Exception e){
            System.err.println(e.toString());
            json.putAll(map);
        }
        return json;
    }
}
