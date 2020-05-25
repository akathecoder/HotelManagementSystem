package ADMIN;

import OTHER.DBConnect;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.swing.JOptionPane;

/**
 *
 * @author SPARSH
 */
public class AdminPage extends javax.swing.JFrame {

    // Creates new form WelcomeScreen
    public AdminPage() {
        initComponents();
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        mainLabel = new javax.swing.JLabel();
        jSeparator1 = new javax.swing.JSeparator();
        BYDATE = new javax.swing.JButton();
        SIGNOUT = new javax.swing.JButton();
        BYROOMTYPE = new javax.swing.JButton();
        BYGUESTID = new javax.swing.JButton();
        FEEDBACK = new javax.swing.JButton();
        HELPSUPPORT = new javax.swing.JButton();
        welcomeLabel = new javax.swing.JLabel();
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

        BYDATE.setBackground(new java.awt.Color(178, 199, 132));
        BYDATE.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        BYDATE.setText("Date");
        BYDATE.setBorder(null);
        BYDATE.setBorderPainted(false);
        BYDATE.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        BYDATE.setFocusable(false);
        BYDATE.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BYDATEActionPerformed(evt);
            }
        });
        jPanel1.add(BYDATE, new org.netbeans.lib.awtextra.AbsoluteConstraints(340, 310, 190, 50));

        SIGNOUT.setBackground(new java.awt.Color(178, 199, 132));
        SIGNOUT.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        SIGNOUT.setText("Sign Out");
        SIGNOUT.setBorder(null);
        SIGNOUT.setBorderPainted(false);
        SIGNOUT.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        SIGNOUT.setFocusable(false);
        SIGNOUT.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                SIGNOUTActionPerformed(evt);
            }
        });
        jPanel1.add(SIGNOUT, new org.netbeans.lib.awtextra.AbsoluteConstraints(580, 310, 190, 50));

        BYROOMTYPE.setBackground(new java.awt.Color(178, 199, 132));
        BYROOMTYPE.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        BYROOMTYPE.setText("Room Type");
        BYROOMTYPE.setBorder(null);
        BYROOMTYPE.setBorderPainted(false);
        BYROOMTYPE.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        BYROOMTYPE.setFocusable(false);
        BYROOMTYPE.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BYROOMTYPEActionPerformed(evt);
            }
        });
        jPanel1.add(BYROOMTYPE, new org.netbeans.lib.awtextra.AbsoluteConstraints(340, 370, 190, 50));

        BYGUESTID.setBackground(new java.awt.Color(178, 199, 132));
        BYGUESTID.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        BYGUESTID.setText("Guest Id");
        BYGUESTID.setBorder(null);
        BYGUESTID.setBorderPainted(false);
        BYGUESTID.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        BYGUESTID.setFocusable(false);
        BYGUESTID.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BYGUESTIDActionPerformed(evt);
            }
        });
        jPanel1.add(BYGUESTID, new org.netbeans.lib.awtextra.AbsoluteConstraints(340, 250, 190, 50));

        FEEDBACK.setBackground(new java.awt.Color(178, 199, 132));
        FEEDBACK.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        FEEDBACK.setText("Feedback");
        FEEDBACK.setBorder(null);
        FEEDBACK.setBorderPainted(false);
        FEEDBACK.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        FEEDBACK.setFocusable(false);
        FEEDBACK.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                FEEDBACKActionPerformed(evt);
            }
        });
        jPanel1.add(FEEDBACK, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 350, 190, 50));

        HELPSUPPORT.setBackground(new java.awt.Color(178, 199, 132));
        HELPSUPPORT.setFont(new java.awt.Font("Dubai", 1, 24)); // NOI18N
        HELPSUPPORT.setText("Help & Support");
        HELPSUPPORT.setBorder(null);
        HELPSUPPORT.setBorderPainted(false);
        HELPSUPPORT.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        HELPSUPPORT.setFocusable(false);
        HELPSUPPORT.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                HELPSUPPORTActionPerformed(evt);
            }
        });
        jPanel1.add(HELPSUPPORT, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 270, 190, 50));

        welcomeLabel.setFont(new java.awt.Font("Dubai", 0, 36)); // NOI18N
        welcomeLabel.setForeground(new java.awt.Color(51, 51, 0));
        welcomeLabel.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        welcomeLabel.setText("Welcome, " + getUserName(new DBConnect().getCurrentUser()));
        jPanel1.add(welcomeLabel, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 150, 780, 50));

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

    private void BYDATEActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BYDATEActionPerformed
        dispose();
        new AdminSearchByDate().setVisible(true);
    }//GEN-LAST:event_BYDATEActionPerformed

    private void SIGNOUTActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_SIGNOUTActionPerformed
        int response = JOptionPane.showConfirmDialog(this,
                "Do you want to Sign out?", "Confirm",
                JOptionPane.YES_NO_OPTION, JOptionPane.QUESTION_MESSAGE);
        if (response == JOptionPane.YES_OPTION) {
            new DBConnect().setCurrentUser("");
        }
        dispose();
        DBConnect.initialization();
        
    }//GEN-LAST:event_SIGNOUTActionPerformed

    private void BYROOMTYPEActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BYROOMTYPEActionPerformed
        dispose();
        new AdminSearchByRoom().setVisible(true);
    }//GEN-LAST:event_BYROOMTYPEActionPerformed

    private void BYGUESTIDActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BYGUESTIDActionPerformed
        dispose();
        new AdminSearchByUserID().setVisible(true);
    }//GEN-LAST:event_BYGUESTIDActionPerformed

    private void FEEDBACKActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_FEEDBACKActionPerformed
        dispose();
        new AdminFeedbackForm().setVisible(true);
        
    }//GEN-LAST:event_FEEDBACKActionPerformed

    private void HELPSUPPORTActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_HELPSUPPORTActionPerformed
        dispose();
        new AdminSupportPage().setVisible(true);
    }//GEN-LAST:event_HELPSUPPORTActionPerformed

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
            java.util.logging.Logger.getLogger(AdminPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(AdminPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(AdminPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(AdminPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }

        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new AdminPage().setVisible(true);
            }
        });
    }
    private static String getUserName(String userid) {
        String name = "";
        String SQL = "SELECT FIRSTNAME, LASTNAME FROM USER01.ADMINDB WHERE USERID = '"+ new DBConnect().getCurrentUser() +"'";
        try {
            ResultSet rs = DBConnect.read(SQL);
            rs.next();
            name = rs.getString("FIRSTNAME") + " " + rs.getString("LASTNAME");
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        return name;
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton BYDATE;
    private javax.swing.JButton BYGUESTID;
    private javax.swing.JButton BYROOMTYPE;
    private javax.swing.JButton FEEDBACK;
    private javax.swing.JButton HELPSUPPORT;
    private javax.swing.JButton SIGNOUT;
    private javax.swing.JLabel background;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JSeparator jSeparator1;
    private javax.swing.JLabel mainLabel;
    private javax.swing.JLabel welcomeLabel;
    // End of variables declaration//GEN-END:variables
}
