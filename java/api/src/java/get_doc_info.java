/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.HashMap;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.simple.JSONObject;
import org.json.simple.JSONArray;

/**
 *
 * @author AMan
 * Servelet  to get doc info
 * for old method
 * 
 */
public class get_doc_info extends HttpServlet {
    public void doGet(HttpServletRequest request,HttpServletResponse response)throws IOException,ServletException{
        String uid = request.getParameter("uid");
        String[] data = request.getParameter("data").split("\\s*,\\s*");
        random_otp otp_c = new random_otp();
        String adhaar_card = otp_c.adhaar_card.get(uid);
        String phone_number = otp_c.adhaar_number.get(uid);
       
        
        //Create JSON Object(s)
        JSONArray jso = new JSONArray();
        //END
        
        System.out.println("\nAdhaar Number -> "+adhaar_card+"\nPhone Number -> "+phone_number);

        //GETTING DOC DATA FROM SERVER
        get_doc_data data_get = new get_doc_data();
        for(String data_of : data){
        jso.add(data_get.get_data(data_of, adhaar_card));
        }
        //END 
        
        
        
        //INIT PRINT WRITER
        PrintWriter wr = response.getWriter();
        //END
        System.out.println(jso.toJSONString());
        response.setContentType("application/json");
        wr.write(jso.toJSONString());
    }
}
