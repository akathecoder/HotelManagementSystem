package hotelmanagementsystem;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DBConnect {
    
    public Connection DBCon(){
            
        try {
            String url = "jdbc:derby://localhost:1527/HMSdb";
            String user = "user01";
            String password = "pass01";
            Connection con = DriverManager.getConnection(url, user, password);
            System.out.println("Connected");
            return con;
        } 
        catch (SQLException err) {
            System.out.println(err.getMessage());
        }
        return null;
    }

    public static void main(String[] args) {
        
        new DBConnect().DBCon();
        new userLoginForm().setVisible(true);
        
    }
    
}
