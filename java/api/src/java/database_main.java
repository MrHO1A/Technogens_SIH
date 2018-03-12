import java.sql.*;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

public class database_main {
    public HashMap<String,String> data_u_adhar(String adhaar){
        HashMap<String,String> map = new HashMap<>();
        MYSQL_CONST sql = new MYSQL_CONST();
        Connection conn = sql.connect();
        ResultSet rs;
        String mobile = null;
        String querry = "SELECT * FROM adhaar_info WHERE adhaar_number ="+adhaar;
        try {
            Statement stmt = conn.createStatement();
            rs = stmt.executeQuery(querry);
            while(rs.next()){
                map.put("name", rs.getString("name"));
                map.put("father_name", rs.getString("father_name"));
                map.put("address", rs.getString("address"));
                map.put("city", rs.getString("city"));
                map.put("state", rs.getString("state"));
                map.put("adhaar", rs.getString("adhaar_number"));
                mobile = rs.getString("mobile");
            }
        } catch (SQLException ex) {
            Logger.getLogger(database_main.class.getName()).log(Level.SEVERE, null, ex);
        }
        StringBuilder sb = new StringBuilder(mobile);
        sb.setCharAt(2, 'X');
        sb.setCharAt(3, 'X');
        sb.setCharAt(4, 'X');
        sb.setCharAt(6, 'X');
        sb.setCharAt(7, 'X');
        map.put("mobile", sb.toString());
<<<<<<< HEAD
        map.put("mobile_send", mobile);
=======
>>>>>>> 8e397d9efa1601dfdff478f432a2474838015dec
        return map;
    }
}
