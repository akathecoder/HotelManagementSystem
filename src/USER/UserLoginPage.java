package USER;

import OTHER.DBConnect;
import OTHER.WelcomeScreen;
import java.awt.event.KeyEvent;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.PreparedStatement;
import java.util.logging.Level;
import java.util.logging.Logger;
import java.sql.ResultSet;
import javax.swing.JOptionPane;

/**
 *
 * @author SPARSH
 */
public class UserLoginPage extends javax.swing.JFrame {

    // Variable Declaration.
    Connection con;
    PreparedStatement stmt;

    // Creates new form UserLoginPage
    public UserLoginPage() {
        initComponents();
        con = new DBConnect().DBCon();

    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel2 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jSeparator1 = new javax.swing.JSeparator();
        usernameField = new javax.swing.JTextField();
        jSeparator2 = new javax.swing.JSeparator();
        jSeparator3 = new javax.swing.JSeparator();
        passwordField = new javax.swing.JPasswordField();
        signUpBtn = new javax.swing.JButton();
        jLabel3 = new javax.swing.JLabel();
        okBtn = new javax.swing.JButton();
        jLabel2 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("LOGIN | HOTEL MANAGEMENT SYSTEM");
        setMinimumSize(new java.awt.Dimension(800, 450));
        setResizable(false);
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosed(java.awt.event.WindowEvent evt) {
                formWindowClosed(evt);
            }
        });
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jPanel2.setBackground(new java.awt.Color(178, 199, 132));
        jPanel2.setMaximumSize(new java.awt.Dimension(300, 450));
        jPanel2.setMinimumSize(new java.awt.Dimension(300, 450));
        jPanel2.setPreferredSize(new java.awt.Dimension(300, 450));
        jPanel2.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jLabel1.setFont(new java.awt.Font("Dubai", 0, 14)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(255, 255, 255));
        jLabel1.setText("Welcome to our Hotel. Please Sign In . . .");
        jLabel1.setVerticalAlignment(javax.swing.SwingConstants.BOTTOM);
        jPanel2.add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(30, 100, 250, -1));

        jSeparator1.setForeground(new java.awt.Color(255, 255, 255));
        jPanel2.add(jSeparator1, new org.netbeans.lib.awtextra.AbsoluteConstraints(30, 70, 225, 10));

        usernameField.setFont(new java.awt.Font("Dubai Light", 0, 18)); // NOI18N
        usernameField.setForeground(new java.awt.Color(255, 255, 255));
        usernameField.setText("Username");
        usernameField.setBorder(null);
        usernameField.setOpaque(false);
        usernameField.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusGained(java.awt.event.FocusEvent evt) {
                usernameFieldFocusGained(evt);
            }
            public void focusLost(java.awt.event.FocusEvent evt) {
                usernameFieldFocusLost(evt);
            }
        });
        usernameField.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                usernameFieldMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                usernameFieldMouseExited(evt);
            }
        });
        usernameField.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                usernameFieldActionPerformed(evt);
            }
        });
        jPanel2.add(usernameField, new org.netbeans.lib.awtextra.AbsoluteConstraints(50, 180, 230, 30));
        jPanel2.add(jSeparator2, new org.netbeans.lib.awtextra.AbsoluteConstraints(50, 210, 230, 30));
        jPanel2.add(jSeparator3, new org.netbeans.lib.awtextra.AbsoluteConstraints(50, 270, 230, 30));

        passwordField.setFont(new java.awt.Font("Tahoma", 0, 14)); // NOI18N
        passwordField.setForeground(new java.awt.Color(255, 255, 255));
        passwordField.setText("...............");
        passwordField.setBorder(null);
        passwordField.setOpaque(false);
        passwordField.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusGained(java.awt.event.FocusEvent evt) {
                passwordFieldFocusGained(evt);
            }
        });
        passwordField.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                passwordFieldMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                passwordFieldMouseExited(evt);
            }
        });
        passwordField.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                passwordFieldKeyPressed(evt);
            }
        });
        jPanel2.add(passwordField, new org.netbeans.lib.awtextra.AbsoluteConstraints(50, 240, 230, 30));

        signUpBtn.setBackground(jPanel2.getBackground());
        signUpBtn.setFont(new java.awt.Font("Dubai", 0, 12)); // NOI18N
        signUpBtn.setForeground(new java.awt.Color(255, 255, 255));
        signUpBtn.setText("New to our Hotel. Please Sign Up . . .");
        signUpBtn.setBorder(null);
        signUpBtn.setBorderPainted(false);
        signUpBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        signUpBtn.setFocusable(false);
        signUpBtn.setHorizontalAlignment(javax.swing.SwingConstants.RIGHT);
        signUpBtn.setOpaque(false);
        signUpBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                signUpBtnActionPerformed(evt);
            }
        });
        jPanel2.add(signUpBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 360, 230, 40));

        jLabel3.setFont(new java.awt.Font("Dubai", 0, 36)); // NOI18N
        jLabel3.setForeground(new java.awt.Color(255, 255, 255));
        jLabel3.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel3.setText("LOGIN");
        jLabel3.setVerticalAlignment(javax.swing.SwingConstants.BOTTOM);
        jPanel2.add(jLabel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 20, 188, -1));

        okBtn.setBackground(jPanel2.getBackground());
        okBtn.setFont(new java.awt.Font("Dubai", 0, 36)); // NOI18N
        okBtn.setForeground(new java.awt.Color(255, 255, 255));
        okBtn.setText("OK");
        okBtn.setBorder(null);
        okBtn.setBorderPainted(false);
        okBtn.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        okBtn.setFocusable(false);
        okBtn.setOpaque(false);
        okBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                okBtnActionPerformed(evt);
            }
        });
        jPanel2.add(okBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(180, 310, 100, 40));

        getContentPane().add(jPanel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(500, 0, -1, -1));

        jLabel2.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Assets/Hotel - 1.jpg"))); // NOI18N
        getContentPane().add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 496, 450));

        setSize(new java.awt.Dimension(814, 487));
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void usernameFieldFocusGained(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_usernameFieldFocusGained
        // TODO add your handling code here:
//        usernameField.setText("");

    }//GEN-LAST:event_usernameFieldFocusGained

    private void usernameFieldFocusLost(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_usernameFieldFocusLost
        // TODO add your handling code here:
//        usernameField.setText("Username");
    }//GEN-LAST:event_usernameFieldFocusLost

    private void usernameFieldMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_usernameFieldMouseEntered
        // TODO add your handling code here:
        if (usernameField.getText().equals("Username")) {
            usernameField.setText("");
        }
    }//GEN-LAST:event_usernameFieldMouseEntered

    private void usernameFieldMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_usernameFieldMouseExited
        // TODO add your handling code here:
        if (usernameField.getText().equals("")) {
            usernameField.setText("Username");
        }
    }//GEN-LAST:event_usernameFieldMouseExited

    private void passwordFieldMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_passwordFieldMouseExited
        // TODO add your handling code here:
        if (passwordField.getText().equals("")) {
            passwordField.setText("...............");
        }
    }//GEN-LAST:event_passwordFieldMouseExited

    private void passwordFieldMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_passwordFieldMouseEntered
        // TODO add your handling code here:
        if (passwordField.getText().equals("...............")) {
            passwordField.setText("");
        }
    }//GEN-LAST:event_passwordFieldMouseEntered

    private void passwordFieldKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_passwordFieldKeyPressed
        // TODO add your handling code here:
        if (evt.getKeyCode() == KeyEvent.VK_ENTER) {
//            new UserLoginPage().okBtnActionPerformed(evt);
        }
    }//GEN-LAST:event_passwordFieldKeyPressed


    private void okBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_okBtnActionPerformed
        // Checks whether the login details are correct ot not
        // If correct than sets the currentUser as the username used and then 
        // redirects to WelcomeScreen2 using initialization function

        String username = usernameField.getText();
        String password = passwordField.getText();
        String hashPassword = DBConnect.getHash(password);

        String SQl = "SELECT PASSWORD FROM USER01.USERDB WHERE USERID = ?";
        try {
            stmt = con.prepareStatement(SQl);
            stmt.setString(1, username);
            ResultSet rs = stmt.executeQuery();
            rs.next();
            if (rs.getString("PASSWORD").equals(hashPassword)) {
                JOptionPane.showMessageDialog(this, "Password Accepted");
                dispose();
                new DBConnect().setCurrentUser(username);
                DBConnect.initialization();
            } else {
                JOptionPane.showMessageDialog(this, "Incorrect Password");
                usernameField.setText("Username");
                passwordField.setText("...............");

            }

        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
            if (ex.getMessage().equals("Invalid operation at current cursor position.")) {
                JOptionPane.showMessageDialog(this, "Incorrect Username");
                usernameField.setText("Username");
                passwordField.setText("...............");
            }
        }
    }//GEN-LAST:event_okBtnActionPerformed

    private void passwordFieldFocusGained(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_passwordFieldFocusGained
        // TODO add your handling code here:
        if (passwordField.getText().equals("...............")) {
            passwordField.setText("");
        }
    }//GEN-LAST:event_passwordFieldFocusGained

    private void signUpBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_signUpBtnActionPerformed
        // TODO add your handling code here:
        dispose();
        new UserSignUpPage().setVisible(true);
        // Go to User Sign Up Form.
        // Made By Vineet.
    }//GEN-LAST:event_signUpBtnActionPerformed

    private void usernameFieldActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_usernameFieldActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_usernameFieldActionPerformed

    private void formWindowClosed(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosed
        // TODO add your handling code here:
//        new DBConnect().setCurrentUser("");
//        DBConnect.initialization();
    }//GEN-LAST:event_formWindowClosed

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

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new UserLoginPage().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JSeparator jSeparator1;
    private javax.swing.JSeparator jSeparator2;
    private javax.swing.JSeparator jSeparator3;
    private javax.swing.JButton okBtn;
    private javax.swing.JPasswordField passwordField;
    private javax.swing.JButton signUpBtn;
    private javax.swing.JTextField usernameField;
    // End of variables declaration//GEN-END:variables
}
