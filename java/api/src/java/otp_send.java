/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author IBM
 */
public class otp_send extends HttpServlet {
@Override
public void doGet(HttpServletRequest request, HttpServletResponse response)throws IOException,ServletException{
    String mobile = request.getParameter("mobile");
    PrintWriter pr = response.getWriter();
    System.out.println(mobile);
    
    pr.write(mobile);
}
    

}
