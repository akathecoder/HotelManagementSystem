/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package hotelmanagementsystem;

import javax.swing.JTextArea;
import java.awt.print.PrinterException;
import java.awt.print.Printable;
import java.awt.print.PrinterJob;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author SPARSH
 */
public class checkoutPage extends javax.swing.JFrame {

    /**
     * Creates new form checkoutPage
     */
    public checkoutPage() {
        initComponents();
    }
    
    private String sendText2(){
        // Length = 56
        
        String str = "123456789123456789123456789123456789123456789123456789123456789123456789";
        return str;
    }
    
    
    private String sendText(){
        Connection con = new DBConnect().DBCon();
        String SQL = "SELECT * FROM USER01.USERDB WHERE USERID = ?";
        
        try {
            PreparedStatement stmt = con.prepareStatement(SQL);
            stmt.setString(1, new DBConnect().getCurrentUser());
            ResultSet rs = stmt.executeQuery();
            rs.next();
            
            String str = "";
            str = str + " ******************************************************\n";
            str = str + " \t\t\t\tBILL\n";
            str = str + " ******************************************************\n";
            str = str + "\n";
            str = str + "Bill Generated : " + new Date() + "\n\n";
            str = str + "Name : " + rs.getString("FIRSTNAME") + " " + rs.getString("LASTNAME");
            str = str + "\n";
            str = str + "Email : " + rs.getString("EMAIL");
            str = str + "\n";
            str = str + "Age : " + rs.getInt("AGE");
            str = str + "\t\t";
            str = str + "Gender : " + rs.getString("GENDER");
            str = str + "\n\n";
            str = str + "*******************************************************\n";
            str = str + "Sno.|\t Room Name\t\t| Rate\t| Total Night Stayed\t| Price | \n";
            str = str + "-------------------------------------------------------\n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            str = str + "    |\t          \t\t|     \t|                   \t|       | \n";
            
            str = str + "\n\n\t\t\t\t\t\t\t" + "________________";
            str = str + "\n\t\t\t\t\t\t\t" + "    Signature";
            
            
            
            
            return str;
        } 
        catch (SQLException ex) {
            System.out.println(ex.getMessage());
        }
        
        return "ERROR!!!!";
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        bill = new javax.swing.JTextArea();
        jButton1 = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("BILL");

        bill.setEditable(false);
        bill.setColumns(20);
        bill.setFont(new java.awt.Font("Monospaced", 0, 14)); // NOI18N
        bill.setRows(5);
        bill.setText(sendText());
        bill.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));
        jScrollPane1.setViewportView(bill);

        jButton1.setText("Print");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jScrollPane1)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(341, 341, 341)
                .addComponent(jButton1, javax.swing.GroupLayout.PREFERRED_SIZE, 105, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(354, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 407, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jButton1, javax.swing.GroupLayout.PREFERRED_SIZE, 21, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

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

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        try {
            // TODO add your handling code here:
            bill.print();
        } catch (PrinterException ex) {
            System.out.println(ex.getMessage());
        }
        
    }//GEN-LAST:event_jButton1ActionPerformed

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
                if ("FlatLaf Light".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(checkoutPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(checkoutPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(checkoutPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(checkoutPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new checkoutPage().setVisible(true);
            }
        });
        
       
        
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JTextArea bill;
    private javax.swing.JButton jButton1;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    // End of variables declaration//GEN-END:variables
}
