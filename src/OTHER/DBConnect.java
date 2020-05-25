package OTHER;

import ADMIN.AdminPage;
import com.formdev.flatlaf.FlatLaf;
import com.formdev.flatlaf.FlatLightLaf;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import javax.swing.LookAndFeel;
import javax.swing.UIManager;
import javax.swing.UIManager.LookAndFeelInfo;

public class DBConnect {

    // This Variable stores the username of the current user logged in.
    private static String currentUser = "";

    // Function returning Connection object.
    public Connection DBCon() {

        try {
            String url = "jdbc:derby://localhost:1527/HMSdb";
            String user = "user01";
            String password = "pass01";
            Connection con = DriverManager.getConnection(url, user, password);
            System.out.println("Connected");
            return con;
        } catch (SQLException err) {
            System.out.println(err.getMessage());
        }
        return null;
    }

    // Main Class.
    public static void main(String[] args) {

        new DBConnect().DBCon();
        FlatLightLaf.install();
        initialization();

    }

    // Function checks whether the user is logged in or not and shows
    // the respecptive Welcome Scrreen.
    public static void initialization() {
        String user = new DBConnect().getCurrentUser();
        System.out.println(user);
        if (user.equals("")) {
            new WelcomeScreen().setVisible(true);   // If User is not logged in.
            System.out.println("1");
        } else {
            ResultSet rsu = read("SELECT * FROM USER01.USERDB WHERE USERID = '" + currentUser + "'");
            ResultSet rsa = read("SELECT * FROM USER01.ADMINDB WHERE USERID = '" + currentUser + "'");
            try{
                if(rsu.next()){
                    new WelcomeScreenLoggedIn().setVisible(true);  // If User is logged in.
                    System.out.println("2");
                }else if(rsa.next()){
                    new AdminPage().setVisible(true);  // If Admin is logged in.
                    System.out.println("2");
                }
            }catch(SQLException e){
                JOptionPane.showMessageDialog(null, e.getMessage());
            }
            
        }

    }

    // Function to insert data into a Database table.
    public static void insert(String s) {
        Connection conn = new DBConnect().DBCon();
        try {
            Statement stmt = conn.createStatement();
            stmt.executeUpdate(s);
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, ex.getMessage());
        }
    }

    // Function to get a table from Database.
    public static ResultSet read(String s) {
        ResultSet rs = null;
        Connection conn = new DBConnect().DBCon();
        try {
            Statement stmt = conn.createStatement();
            rs = stmt.executeQuery(s);
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, ex.getMessage());
        }
        return rs;
    }

    // Returns the Current user.
    public String getCurrentUser() {
        return currentUser;
    }

    // Sets the Current User.
    public void setCurrentUser(String currentUser) {
        this.currentUser = currentUser;
        System.out.println("0");
    }

    // Function to create Hash of a password.
    public static String getHash(String passwordToHash) {
        String SecurePassword = null;

        try {

            MessageDigest md = MessageDigest.getInstance("SHA-512");

            byte[] bytes = md.digest(passwordToHash.getBytes());
            StringBuilder sb = new StringBuilder();
            for (int i = 0; i < bytes.length; i++) {
                sb.append(Integer.toString((bytes[i] & 0xff) + 0x100, 16).substring(1));
            }
            SecurePassword = sb.toString();

        } catch (NoSuchAlgorithmException ex) {
            System.out.println(ex.getMessage());
        }

        return SecurePassword;
    }

    // Function to compare two hashes.
    public static boolean compareHash(String hash1, String hash2) {
        if (hash1.equals(hash2)) {
            return true;
        }
        return false;
    }

    // Function to set if the user is currently staying or not.
    public static void setStaying(boolean cond) {
        try {
            String SQL = "UPDATE USER01.USERDB SET STAYING = ? WHERE USERID = ?";
            Connection con = new DBConnect().DBCon();
            PreparedStatement stmt = con.prepareStatement(SQL);
            stmt.setBoolean(1, cond);
            stmt.setString(2, new DBConnect().getCurrentUser());
            int i = stmt.executeUpdate();
        } catch (SQLException ex) {
            Logger.getLogger(DBConnect.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    // Function to delete a particular row in ConfirmBookings Table.
    // Deletes row based on Room Number.
    public static void deleteCB(String room) {

        try {
            String SQL = "DELETE FROM USER01.CONFIRMBOOKINGS WHERE ROOMNUMBER = ?";
            Connection con = new DBConnect().DBCon();
            PreparedStatement stmt = con.prepareStatement(SQL);
            stmt.setString(1, room);
            int i = stmt.executeUpdate();
            System.out.println("Room Number " + room + " Deleted.");

        } catch (SQLException ex) {
            Logger.getLogger(DBConnect.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

}
