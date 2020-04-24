package hotelmanagementsystem;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DBConnect {
    
    private static String currentUser = "";
    
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
//        new checkoutPage().setVisible(true);
        initialization();
    }
    
    public static void initialization(){
        String user = new DBConnect().getCurrentUser();
        System.out.println(user);
        if(user.equals("")){
            new welcomeScreen().setVisible(true);
            System.out.println("1");
        }
        else{
            new welcomeScreen2().setVisible(true);
            System.out.println("2");
        }        

    }

    public String getCurrentUser() {
        return currentUser;
    }

    public void setCurrentUser(String currentUser) {
        this.currentUser = currentUser;
        System.out.println("0");
    }
    
    
    
}
