/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package USER;

import OTHER.DBConnect;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.swing.JOptionPane;

/**
 *
 * @author RG
 */
class createUHTML{
    protected static String htmldoc;
    protected static String chatbody;
    protected static String userid;
    protected static ResultSet rs;
        public static String createUHTML(){
            htmldoc = "";
            chatbody = "";
            userid = new DBConnect().getCurrentUser();
            rs = DBConnect.read("SELECT * FROM USER01.HELPANDSUPPORT "
                + "WHERE SENDER = '"+ userid +"' OR RECEIVER = '"+ userid +
                "' ORDER BY DATE, TIME");
            try{
                while(rs.next()){
                    if(rs.getString("SENDER").equals(userid)){
                        userMessage(rs.getString("MESSAGE"));
                    }else{
                        adminMessage(rs.getString("MESSAGE"));
                    }
                }
            }catch(SQLException e){
                JOptionPane.showMessageDialog(null, e.getMessage());
            }
            htmldoc = "<!DOCTYPE html>\n" +
                    "<head>\n" +
                    "    <style>\n" +
                    "    .AdminDiv {\n" +
                    "        text-align: left;\n" +
                    "        background-color: #818181;\n" +
                    "        color:#ffffff;\n" +
                    "        margin-right: 15mm;\n" +
                    "        margin-left: 5mm;\n" +
                    "        padding-left: 5mm;\n" +
                    "        border-color: #ffffff00;\n" +
                    "        }\n" +
                    "    .UserDiv {\n" +
                    "        background-color: #B2C784;\n" +
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
    
    protected static String userMessage(String m){
        try{
            chatbody += "<div class=\"UserDiv\"><p>\n|  " + rs.getDate("DATE").toString()
                    + "  |  |  " + rs.getTime("TIME")  + "  |<br/><b>" + m + "\n<b/></p></div>\n";
        }catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return chatbody;
    }
    
    protected static String adminMessage(String m){
        try{
            chatbody += "<div class=\"AdminDiv\"><p>\n|  " + rs.getDate("DATE").toString()
                    + "  |  |  " + rs.getTime("TIME")  + "  |<br/><b>" + m + "\n</b></p></div>\n";
        }catch(SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
        return chatbody;
    }
}
