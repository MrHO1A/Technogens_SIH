import java.sql.*;
public class MYSQL_CONST {
    public Connection connect(){
        Connection conn = null;
        try{
        Class.forName("com.mysql.jdbc.Driver"); 
        String url = "jdbc:mysql://69.195.158.226/gyangang_SIH";
        conn = DriverManager.getConnection(url,"gyangang_SIH","aman@lolz");
        }
        catch(Exception e){
            System.err.println("aman");
            System.err.println(e);
        }
        return conn;
    }
}
