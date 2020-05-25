/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ADMIN;

import OTHER.DBConnect;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
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
public class AdminFeedbackForm extends javax.swing.JFrame {
    
    /**
     * Creates new form AdminFeedbackForm
     */
    public AdminFeedbackForm() {
        initComponents();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        GREETINGS = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        feedbackView = new javax.swing.JTextArea();
        jLabel1 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        setTitle("ADMIN FEEDBACK | HOTEL MANAGEMENT SYSTEM");
        setResizable(false);
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosed(java.awt.event.WindowEvent evt) {
                formWindowClosed(evt);
            }
            public void windowOpened(java.awt.event.WindowEvent evt) {
                formWindowOpened(evt);
            }
        });
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        GREETINGS.setFont(new java.awt.Font("Dubai", 3, 24)); // NOI18N
        GREETINGS.setText("Hi, " + getUserName(new DBConnect().getCurrentUser()));
        getContentPane().add(GREETINGS, new org.netbeans.lib.awtextra.AbsoluteConstraints(40, 30, 190, 30));

        feedbackView.setEditable(false);
        feedbackView.setColumns(20);
        feedbackView.setRows(5);
        feedbackView.setText("ERROR...");
        feedbackView.addCaretListener(new javax.swing.event.CaretListener() {
            public void caretUpdate(javax.swing.event.CaretEvent evt) {
                feedbackViewCaretUpdate(evt);
            }
        });
        jScrollPane1.setViewportView(feedbackView);

        getContentPane().add(jScrollPane1, new org.netbeans.lib.awtextra.AbsoluteConstraints(30, 80, 750, 310));

        jLabel1.setBackground(new java.awt.Color(177, 199, 131));
        jLabel1.setFont(new java.awt.Font("Tahoma", 3, 12)); // NOI18N
        jLabel1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Assets/Hotel - 2edited.jpg"))); // NOI18N
        jLabel1.setOpaque(true);
        getContentPane().add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 800, 450));

        setSize(new java.awt.Dimension(814, 487));
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void feedbackViewCaretUpdate(javax.swing.event.CaretEvent evt) {//GEN-FIRST:event_feedbackViewCaretUpdate
        // TODO add your handling code here:
    }//GEN-LAST:event_feedbackViewCaretUpdate

    private void formWindowOpened(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowOpened
        try {
            // TODO add your handling code here:
            FileReader File = new FileReader("src/ADMIN/Feedback.txt");
            String feedback = "";
            int ch;
            while ((ch=File.read())!=-1){
                System.out.print((char)ch);
                feedback += (char)ch;
            }
            feedbackView.setText(feedback);
            File.close();
        } catch (FileNotFoundException ex) {
            Logger.getLogger(AdminFeedbackForm.class.getName()).log(Level.SEVERE, null, ex);
            feedbackView.setText("FeedBack FIle Not Found...");
        } catch (IOException ex) {
            Logger.getLogger(AdminFeedbackForm.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }//GEN-LAST:event_formWindowOpened

    private void formWindowClosed(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosed
        // TODO add your handling code here:
        new AdminPage().setVisible(true);
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
            java.util.logging.Logger.getLogger(AdminFeedbackForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(AdminFeedbackForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(AdminFeedbackForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(AdminFeedbackForm.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new AdminFeedbackForm().setVisible(true);
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
    private javax.swing.JLabel GREETINGS;
    private javax.swing.JTextArea feedbackView;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JScrollPane jScrollPane1;
    // End of variables declaration//GEN-END:variables
}
