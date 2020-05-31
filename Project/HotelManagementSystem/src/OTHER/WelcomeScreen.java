package OTHER;

import USER.UserLoginPage;
import USER.UserSignUpPage;
import ADMIN.AdminLoginPage;
import java.awt.Desktop;
import java.io.File;
import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URISyntaxException;
import java.net.URL;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author SPARSH
 */
public class WelcomeScreen extends javax.swing.JFrame {

    // Creates new form WelcomeScreen
    public WelcomeScreen() {
        initComponents();
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        mainLabel = new javax.swing.JLabel();
        jSeparator1 = new javax.swing.JSeparator();
        signUpBtn = new javax.swing.JButton();
        roomPricesBtn = new javax.swing.JButton();
        adminLoginBtn = new javax.swing.JButton();
        loginBtn = new javax.swing.JButton();
        aboutBtn1 = new javax.swing.JButton();
        background = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("HOTEL MANAGEMENT SYSTEM");
        setResizable(false);

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

        signUpBtn.setBackground(new java.awt.Color(178, 199, 132));
        signUpBtn.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        signUpBtn.setText("Sign Up");
        signUpBtn.setBorder(null);
        signUpBtn.setBorderPainted(false);
        signUpBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        signUpBtn.setFocusable(false);
        signUpBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                signUpBtnActionPerformed(evt);
            }
        });
        jPanel1.add(signUpBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(580, 320, 190, 50));

        roomPricesBtn.setBackground(new java.awt.Color(178, 199, 132));
        roomPricesBtn.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        roomPricesBtn.setText("Room Prices");
        roomPricesBtn.setBorder(null);
        roomPricesBtn.setBorderPainted(false);
        roomPricesBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        roomPricesBtn.setFocusable(false);
        roomPricesBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                roomPricesBtnActionPerformed(evt);
            }
        });
        jPanel1.add(roomPricesBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 270, 190, 50));

        adminLoginBtn.setBackground(new java.awt.Color(178, 199, 132));
        adminLoginBtn.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        adminLoginBtn.setText("Admin Login");
        adminLoginBtn.setBorder(null);
        adminLoginBtn.setBorderPainted(false);
        adminLoginBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        adminLoginBtn.setFocusable(false);
        adminLoginBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                adminLoginBtnActionPerformed(evt);
            }
        });
        jPanel1.add(adminLoginBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(580, 380, 190, 50));

        loginBtn.setBackground(new java.awt.Color(178, 199, 132));
        loginBtn.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        loginBtn.setText("Login");
        loginBtn.setBorder(null);
        loginBtn.setBorderPainted(false);
        loginBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        loginBtn.setFocusable(false);
        loginBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                loginBtnActionPerformed(evt);
            }
        });
        jPanel1.add(loginBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(580, 260, 190, 50));

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

    private void signUpBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_signUpBtnActionPerformed
        // Open Sign up Form.
        dispose();
        new UserSignUpPage().setVisible(true);
    }//GEN-LAST:event_signUpBtnActionPerformed

    private void roomPricesBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_roomPricesBtnActionPerformed
        // Opens Room Prices Form.
        dispose();
        new RoomsDetailsPage().setVisible(true);
    }//GEN-LAST:event_roomPricesBtnActionPerformed

    private void adminLoginBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_adminLoginBtnActionPerformed
        // Opens Admin Login Form.
        dispose();
        new AdminLoginPage().setVisible(true);
    }//GEN-LAST:event_adminLoginBtnActionPerformed

    private void loginBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_loginBtnActionPerformed
        // Opens Login Form.
        dispose();
        new UserLoginPage().setVisible(true);
    }//GEN-LAST:event_loginBtnActionPerformed

    private void aboutBtn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_aboutBtn1ActionPerformed
        // Opens About Us Page.
        dispose();
        new AboutPage().setVisible(true);
        
    }//GEN-LAST:event_aboutBtn1ActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */

//        FlatLightLaf.install();
//        try {
//            javax.swing.UIManager.setLookAndFeel(new FlatLightLaf());
//        } catch (Exception ex) {
//            System.err.println("Failed to initialize LaF");
//        }
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

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new WelcomeScreen().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton aboutBtn1;
    private javax.swing.JButton adminLoginBtn;
    private javax.swing.JLabel background;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JSeparator jSeparator1;
    private javax.swing.JButton loginBtn;
    private javax.swing.JLabel mainLabel;
    private javax.swing.JButton roomPricesBtn;
    private javax.swing.JButton signUpBtn;
    // End of variables declaration//GEN-END:variables
}
