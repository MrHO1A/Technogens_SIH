
import java.sql.*;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;

public class database_main {

    public HashMap<String, String> data_u_adhar(String adhaar) {
        HashMap<String, String> map = new HashMap<>();
        MYSQL_CONST sql = new MYSQL_CONST();
        Connection conn = sql.connect();
        ResultSet rs;
        String mobile = null;
        String querry = "SELECT * FROM adhaar_info WHERE adhaar_number =" + adhaar;
        try {
            map.put("result", "false");
            Statement stmt = conn.createStatement();
            rs = stmt.executeQuery(querry);
            System.out.println("Sql Result 1");
            // Checking If Querry Has Values
            if (!rs.wasNull()) {
                while (rs.next()) {
                    System.out.println("Sql Result");
                    // Then putting value to hash map
                    map.put("result", "true");
                    map.put("name", rs.getString("name"));
                    map.put("dob", rs.getString("dob"));
                    map.put("gender", rs.getString("gender"));
                    map.put("father_name", rs.getString("father_name"));
                    map.put("mother_name", rs.getString("mother_name"));
                    map.put("address", rs.getString("address"));
                    map.put("city", rs.getString("city"));
                    map.put("state", rs.getString("state"));
                    map.put("adhaar", rs.getString("adhaar_number"));
                    map.put("pin", rs.getString("pin"));
                    mobile = rs.getString("mobile");
                    map.put("mobile_send", mobile);
                    if (mobile.length() > 0) {
                        StringBuilder sb = new StringBuilder(mobile);
                        sb.setCharAt(2, 'X');
                        sb.setCharAt(3, 'X');
                        sb.setCharAt(4, 'X');
                        sb.setCharAt(6, 'X');
                        sb.setCharAt(7, 'X');
                        map.put("mobile", sb.toString());
                    }
                }
            } else {
                System.out.println("DATA NOT FOUND");
            }
        } catch (SQLException ex) {
            Logger.getLogger(database_main.class.getName()).log(Level.SEVERE, null, ex);
        }

        return map;
    }
}
