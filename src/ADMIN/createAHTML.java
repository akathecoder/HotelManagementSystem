/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ADMIN;

import OTHER.DBConnect;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.swing.JOptionPane;

/**
 *
 * @author RG
 */
class createAHTML{
    private static String htmldoc = "";
    private static String chatbody;
    private static String title;
    private static String receiver;
    private static ResultSet rs;
        public static String createAHTML(){
            htmldoc = "";
            chatbody = "";
            rs = DBConnect.read("SELECT * FROM USER01.HELPANDSUPPORT WHERE "
                    + "SENDER = '" + receiver + "' and RECEIVER = '" + title + "' or "
                    + "SENDER = '" + title + "' and RECEIVER = '" + receiver + "' ORDER BY DATE, TIME");
            try{
                while(rs.next()){
                    if(rs.getString("SENDER").equals(title)){
                        adminMessage(rs.getString("MESSAGE"));
                    }else{
                        userMessage(rs.getString("MESSAGE"));
                    }
                }
            }catch(SQLException e){
                JOptionPane.showMessageDialog(null, e.getMessage());
            }
            htmldoc = "<!DOCTYPE html>\n" +
                    "<head>\n" +
                    "    <style>\n" +
                    "    .UserDiv {\n" +
                    "        text-align: left;\n" +
                    "        background-color: #B2C784;\n" +
                    "        color:#ffffff;\n" +
                    "        margin-right: 15mm;\n" +
                    "        margin-left: 5mm;\n" +
                    "        padding-left: 5mm;\n" +
                    "        border-color: #ffffff00;\n" +
                    "        }\n" +
                    "    .AdminDiv {\n" +
                    "        background-color: #818181;\n" +
                    "        color: #ffffff;\n" +
                    "        text-align: left;\n" +
                    "        margin-left: 15mm;\n" +
                    "        margin-right: 5mm;\n" +
                    "        padding-left: 5mm;\n" +
                    "        border-color: #ffffff00;\n" +
                    "}\n" +
                    "</style>\n" +
                    "</head>\n" +
                    "<body>" +
                    
                    chatbody +
                    
                    "</body>\n" +
                    "</html>";
            
            return htmldoc;
        }
    
    private static String userMessage(String m){
        try{
            chatbody += "<div class=\"UserDiv\"><p>\n|  " + rs.getDate("DATE").toString()
                    + "  |  |  " + rs.getTime("TIME")  + "  |<br/><b>" + m + "\n</b></p></div>\n";
        }catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return chatbody;
    }
    
    private static String adminMessage(String m){
        try{
            chatbody += "<div class=\"AdminDiv\"><p>\n|  " + rs.getDate("DATE").toString()
                    + "  |  |  " + rs.getTime("TIME")  + "  |<br/><b>" + m + "\n<b/></p></div>\n";
        }catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return chatbody;
    }
    protected static void setTitle(String t){
        title = t;
    }
    protected static void setReceiver(String s){
        receiver = s;
    }
}
