package OTHER;

import USER.UserSupportPage;
import USER.BookingPage;
import USER.RoomServices;
import java.awt.Desktop;
import java.net.URL;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

/**
 *
 * @author SPARSH
 */
public class WelcomeScreenLoggedIn extends javax.swing.JFrame {

    // Creates new form WelcomeScreen
    public WelcomeScreenLoggedIn() {
        initComponents();
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        mainLabel = new javax.swing.JLabel();
        jSeparator1 = new javax.swing.JSeparator();
        servicesBtn = new javax.swing.JButton();
        roomPricesBtn = new javax.swing.JButton();
        signOutBtn = new javax.swing.JButton();
        bookRoomBtn = new javax.swing.JButton();
        welcomeLabel = new javax.swing.JLabel();
        aboutBtn1 = new javax.swing.JButton();
        HELPSUPPORT1 = new javax.swing.JButton();
        background = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("HOTEL MANAGEMENT SYSTEM");
        setResizable(false);
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowOpened(java.awt.event.WindowEvent evt) {
                formWindowOpened(evt);
            }
        });

        jPanel1.setForeground(background.getForeground());
        jPanel1.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        mainLabel.setBackground(new java.awt.Color(111, 63, 220));
        mainLabel.setFont(new java.awt.Font("Dubai", 1, 48)); // NOI18N
        mainLabel.setForeground(new java.awt.Color(111, 63, 220));
        mainLabel.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        mainLabel.setText("Hotel Management System");
        jPanel1.add(mainLabel, new org.netbeans.lib.awtextra.AbsoluteConstraints(110, 40, 570, 70));

        jSeparator1.setBackground(new java.awt.Color(111, 63, 220));
        jSeparator1.setForeground(new java.awt.Color(111, 63, 220));
        jPanel1.add(jSeparator1, new org.netbeans.lib.awtextra.AbsoluteConstraints(110, 100, 570, 40));

        servicesBtn.setBackground(new java.awt.Color(178, 199, 132));
        servicesBtn.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        servicesBtn.setText("Services");
        servicesBtn.setBorder(null);
        servicesBtn.setBorderPainted(false);
        servicesBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        servicesBtn.setEnabled(false);
        servicesBtn.setFocusable(false);
        servicesBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                servicesBtnActionPerformed(evt);
            }
        });
        jPanel1.add(servicesBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(320, 270, 190, 50));

        roomPricesBtn.setBackground(new java.awt.Color(178, 199, 132));
        roomPricesBtn.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        roomPricesBtn.setText("Room Prices");
        roomPricesBtn.setBorder(null);
        roomPricesBtn.setBorderPainted(false);
        roomPricesBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        roomPricesBtn.setFocusable(false);
        roomPricesBtn.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusGained(java.awt.event.FocusEvent evt) {
                roomPricesBtnFocusGained(evt);
            }
        });
        roomPricesBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                roomPricesBtnActionPerformed(evt);
            }
        });
        jPanel1.add(roomPricesBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 270, 190, 50));

        signOutBtn.setBackground(new java.awt.Color(178, 199, 132));
        signOutBtn.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        signOutBtn.setText("Sign Out");
        signOutBtn.setBorder(null);
        signOutBtn.setBorderPainted(false);
        signOutBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        signOutBtn.setFocusable(false);
        signOutBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                signOutBtnActionPerformed(evt);
            }
        });
        jPanel1.add(signOutBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(580, 350, 190, 50));

        bookRoomBtn.setBackground(new java.awt.Color(178, 199, 132));
        bookRoomBtn.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        bookRoomBtn.setText(bookOrBill());
        bookRoomBtn.setBorder(null);
        bookRoomBtn.setBorderPainted(false);
        bookRoomBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        bookRoomBtn.setFocusable(false);
        bookRoomBtn.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusGained(java.awt.event.FocusEvent evt) {
                bookRoomBtnFocusGained(evt);
            }
        });
        bookRoomBtn.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                bookRoomBtnMouseEntered(evt);
            }
        });
        bookRoomBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                bookRoomBtnActionPerformed(evt);
            }
        });
        jPanel1.add(bookRoomBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(580, 270, 190, 50));

        welcomeLabel.setFont(new java.awt.Font("Dubai", 0, 36)); // NOI18N
        welcomeLabel.setForeground(new java.awt.Color(51, 51, 0));
        welcomeLabel.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        welcomeLabel.setText("Welcome, " + getUserName(new DBConnect().getCurrentUser()));
        jPanel1.add(welcomeLabel, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 150, 780, 50));

        aboutBtn1.setBackground(new java.awt.Color(178, 199, 132));
        aboutBtn1.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        aboutBtn1.setText("About Us");
        aboutBtn1.setBorder(null);
        aboutBtn1.setBorderPainted(false);
        aboutBtn1.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        aboutBtn1.setFocusable(false);
        aboutBtn1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                aboutBtn1ActionPerformed(evt);
            }
        });
        jPanel1.add(aboutBtn1, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 350, 190, 50));

        HELPSUPPORT1.setBackground(new java.awt.Color(178, 199, 132));
        HELPSUPPORT1.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        HELPSUPPORT1.setText("Help & Support");
        HELPSUPPORT1.setBorder(null);
        HELPSUPPORT1.setBorderPainted(false);
        HELPSUPPORT1.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        HELPSUPPORT1.setFocusable(false);
        HELPSUPPORT1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                HELPSUPPORT1ActionPerformed(evt);
            }
        });
        jPanel1.add(HELPSUPPORT1, new org.netbeans.lib.awtextra.AbsoluteConstraints(320, 350, 190, 50));

        background.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Assets/Hotel - 2edited.jpg"))); // NOI18N
        jPanel1.add(background, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, -1, 450));

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        setSize(new java.awt.Dimension(814, 487));
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void roomPricesBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_roomPricesBtnActionPerformed
        // Opens Room Prices Form.
        dispose();
        new RoomsDetailsPage().setVisible(true);
    }//GEN-LAST:event_roomPricesBtnActionPerformed

    private void signOutBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_signOutBtnActionPerformed
        // Signs out ci=urrent User.
        // By setting currentUser to "", i.e., empty string and then
        // opens welcome Screen using initialization function.
        int response = JOptionPane.showConfirmDialog(this,
                "Do you want to Sign out?", "Confirm",
                JOptionPane.YES_NO_OPTION, JOptionPane.QUESTION_MESSAGE);
        if (response == JOptionPane.YES_OPTION) {
            new DBConnect().setCurrentUser("");
        }
        dispose();
        DBConnect.initialization();
    }//GEN-LAST:event_signOutBtnActionPerformed

    private void bookRoomBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_bookRoomBtnActionPerformed
        // Opens Booking Form.
        if (isStaying()) {
            int response = JOptionPane.showConfirmDialog(this,
                    "Do you want to Checkout?", "Confirm",
                    JOptionPane.YES_NO_OPTION, JOptionPane.QUESTION_MESSAGE);
            if (response == JOptionPane.YES_OPTION) {
                DBConnect.setStaying(false);
                dispose();
                new BillPage().setVisible(true);
            }

        } else {
            dispose();
            new BookingPage().setVisible(true);
        }

    }//GEN-LAST:event_bookRoomBtnActionPerformed

    // Checks if the user is currently staying in the hotel or not.
    private boolean isStaying() {
        try {
            String user = new DBConnect().getCurrentUser();
            Connection con = new DBConnect().DBCon();
            String SQL = "SELECT STAYING FROM USER01.USERDB WHERE USERID = ?";
            PreparedStatement stmt = con.prepareStatement(SQL);
            stmt.setString(1, user);
            ResultSet rs = stmt.executeQuery();
            rs.next();
            if (rs.getBoolean("STAYING")) {
                return true;
            }

            return false;
        } catch (SQLException ex) {
            Logger.getLogger(WelcomeScreenLoggedIn.class.getName()).log(Level.SEVERE, null, ex);
        }

        return false;
    }

    // Changes the text of button depending upon whether user is Staying or not.
    // Returns the text of button to be displayed.
    // Function used in Properties of the button.
    private String bookOrBill() {
        if (isStaying()) {
            return "Checkout";
        }
        return "Book Room";
    }

    private void aboutBtn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_aboutBtn1ActionPerformed
        // Opens About Us Page.
        dispose();
        new AboutPage().setVisible(true);

    }//GEN-LAST:event_aboutBtn1ActionPerformed

    private void roomPricesBtnFocusGained(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_roomPricesBtnFocusGained
        // TODO add your handling code here:
    }//GEN-LAST:event_roomPricesBtnFocusGained

    private void bookRoomBtnFocusGained(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_bookRoomBtnFocusGained
        // TODO add your handling code here:
    }//GEN-LAST:event_bookRoomBtnFocusGained

    private void bookRoomBtnMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_bookRoomBtnMouseEntered
        // TODO add your handling code here:

    }//GEN-LAST:event_bookRoomBtnMouseEntered

    private void servicesBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_servicesBtnActionPerformed
        dispose();
        new RoomServices().setVisible(true);
    }//GEN-LAST:event_servicesBtnActionPerformed

    private void HELPSUPPORT1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_HELPSUPPORT1ActionPerformed
        // TODO add your handling code here:
        dispose();
        new UserSupportPage().setVisible(true);
    }//GEN-LAST:event_HELPSUPPORT1ActionPerformed

    private void formWindowOpened(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowOpened
        // TODO add your handling code here:
        if(isStaying()){
            servicesBtn.setEnabled(true);
        }
    }//GEN-LAST:event_formWindowOpened

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("FlatLightLaf".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(WelcomeScreen.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(WelcomeScreen.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(WelcomeScreen.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(WelcomeScreen.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new WelcomeScreenLoggedIn().setVisible(true);
            }
        });
    }

    private static String getUserName(String userid) {
        String name = "";
        String SQL = "SELECT FIRSTNAME, LASTNAME FROM USER01.USERDB WHERE USERID = ?";
        Connection con = new DBConnect().DBCon();
        try {
            PreparedStatement stmt = con.prepareStatement(SQL);
            stmt.setString(1, userid);
            ResultSet rs = stmt.executeQuery();
            rs.next();
            name = rs.getString("FIRSTNAME");
            name = name + " " + rs.getString("LASTNAME");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return name;
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton HELPSUPPORT1;
    private javax.swing.JButton aboutBtn1;
    private javax.swing.JLabel background;
    private javax.swing.JButton bookRoomBtn;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JSeparator jSeparator1;
    private javax.swing.JLabel mainLabel;
    private javax.swing.JButton roomPricesBtn;
    private javax.swing.JButton servicesBtn;
    private javax.swing.JButton signOutBtn;
    private javax.swing.JLabel welcomeLabel;
    // End of variables declaration//GEN-END:variables
}
