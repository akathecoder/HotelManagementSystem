/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package USER;

import OTHER.DBConnect;
import java.awt.Color;
import java.text.SimpleDateFormat;
import java.awt.Font;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.List;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import java.util.Date;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author DADDY
 */
public class EntertainmentService extends javax.swing.JFrame {

    int Total = 0;
    //* Creates new form EntertainmentService
    //*/

    public EntertainmentService() {
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

        jPanel1 = new javax.swing.JPanel();
        jLabel2 = new javax.swing.JLabel();
        jComboBox1 = new javax.swing.JComboBox<>();
        jComboBox2 = new javax.swing.JComboBox<>();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jButton1 = new javax.swing.JButton();
        jLabel5 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();
        jScrollPane2 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        addBtn = new javax.swing.JButton();
        deleteBtn = new javax.swing.JButton();
        confirmBtn = new javax.swing.JButton();
        jLabel8 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        jLabel1 = new javax.swing.JLabel();

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 100, Short.MAX_VALUE)
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 100, Short.MAX_VALUE)
        );

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        setTitle("ENTERTAINMENT | HOTEL MANAGEMENT SYSTEM");
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosed(java.awt.event.WindowEvent evt) {
                formWindowClosed(evt);
            }
        });
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jLabel2.setBackground(new java.awt.Color(178, 199, 132));
        jLabel2.setFont(new java.awt.Font("Agency FB", 1, 36)); // NOI18N
        jLabel2.setForeground(new java.awt.Color(255, 255, 255));
        jLabel2.setText("   MOVIES AND GAMES");
        jLabel2.setOpaque(true);
        getContentPane().add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(250, 20, 280, 40));

        jComboBox1.setFont(new java.awt.Font("Agency FB", 1, 14)); // NOI18N
        jComboBox1.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "Movies", "Games" }));
        jComboBox1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jComboBox1ActionPerformed(evt);
            }
        });
        getContentPane().add(jComboBox1, new org.netbeans.lib.awtextra.AbsoluteConstraints(90, 140, 90, 20));

        jComboBox2.setFont(new java.awt.Font("Agency FB", 1, 12)); // NOI18N
        jComboBox2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jComboBox2ActionPerformed(evt);
            }
        });
        getContentPane().add(jComboBox2, new org.netbeans.lib.awtextra.AbsoluteConstraints(230, 140, 100, -1));

        jLabel3.setBackground(new java.awt.Color(178, 199, 132));
        jLabel3.setFont(new java.awt.Font("Agency FB", 1, 12)); // NOI18N
        jLabel3.setText("    ENTERTAINMENT");
        jLabel3.setOpaque(true);
        getContentPane().add(jLabel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(90, 115, 90, 20));

        jLabel4.setBackground(new java.awt.Color(178, 199, 132));
        jLabel4.setFont(new java.awt.Font("Agency FB", 1, 12)); // NOI18N
        jLabel4.setText("            CONTENT");
        jLabel4.setOpaque(true);
        getContentPane().add(jLabel4, new org.netbeans.lib.awtextra.AbsoluteConstraints(230, 115, 100, 20));

        jButton1.setText("BACK");
        jButton1.setBackground(new java.awt.Color(178, 199, 132));
        jButton1.setBorder(null);
        jButton1.setFont(new java.awt.Font("Agency FB", 1, 14)); // NOI18N
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });
        getContentPane().add(jButton1, new org.netbeans.lib.awtextra.AbsoluteConstraints(670, 400, 80, -1));

        jLabel5.setFont(new java.awt.Font("Agency FB", 1, 12)); // NOI18N
        jLabel5.setText("*Per day charges will be applied from the day of applying");
        getContentPane().add(jLabel5, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 370, 270, 20));

        jLabel6.setFont(new java.awt.Font("Agency FB", 1, 12)); // NOI18N
        jLabel6.setText("to check-out date for all the choosen contents.");
        getContentPane().add(jLabel6, new org.netbeans.lib.awtextra.AbsoluteConstraints(110, 390, 220, 20));

        jScrollPane2.setHorizontalScrollBarPolicy(javax.swing.ScrollPaneConstants.HORIZONTAL_SCROLLBAR_NEVER);
        jScrollPane2.setVerticalScrollBarPolicy(javax.swing.ScrollPaneConstants.VERTICAL_SCROLLBAR_NEVER);

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "CONTENT", "DATE", "TIME", "PRICE"
            }
        ) {
            Class[] types = new Class [] {
                java.lang.String.class, java.lang.Integer.class, java.lang.Integer.class, java.lang.Integer.class
            };

            public Class getColumnClass(int columnIndex) {
                return types [columnIndex];
            }
        });
        jTable1.setOpaque(false);
        jScrollPane2.setViewportView(jTable1);

        getContentPane().add(jScrollPane2, new org.netbeans.lib.awtextra.AbsoluteConstraints(360, 120, 420, 150));

        addBtn.setText("ADD");
        addBtn.setBackground(new java.awt.Color(178, 199, 132));
        addBtn.setBorder(null);
        addBtn.setFont(new java.awt.Font("Agency FB", 1, 12)); // NOI18N
        addBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                addBtnActionPerformed(evt);
            }
        });
        getContentPane().add(addBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(380, 320, 90, 20));

        deleteBtn.setText("DELETE");
        deleteBtn.setBackground(new java.awt.Color(178, 199, 132));
        deleteBtn.setBorder(null);
        deleteBtn.setFont(new java.awt.Font("Agency FB", 1, 12)); // NOI18N
        deleteBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                deleteBtnActionPerformed(evt);
            }
        });
        getContentPane().add(deleteBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(530, 320, 90, 20));

        confirmBtn.setText("CONFIRM");
        confirmBtn.setBackground(new java.awt.Color(178, 199, 132));
        confirmBtn.setBorder(null);
        confirmBtn.setFont(new java.awt.Font("Agency FB", 1, 12)); // NOI18N
        confirmBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                confirmBtnActionPerformed(evt);
            }
        });
        getContentPane().add(confirmBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(670, 320, 90, 20));

        jLabel8.setFont(new java.awt.Font("Agency FB", 1, 14)); // NOI18N
        getContentPane().add(jLabel8, new org.netbeans.lib.awtextra.AbsoluteConstraints(150, 320, 60, 20));
        jLabel8.setText(Total+"");

        jLabel7.setText("        TOTAL");
        jLabel7.setBackground(new java.awt.Color(178, 199, 132));
        jLabel7.setFont(new java.awt.Font("Agency FB", 1, 12)); // NOI18N
        jLabel7.setOpaque(true);
        getContentPane().add(jLabel7, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 320, 70, 20));

        jLabel1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Assets/Hotel - 2edited.jpg"))); // NOI18N
        getContentPane().add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 800, 450));

        setSize(new java.awt.Dimension(810, 488));
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void jComboBox2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jComboBox2ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jComboBox2ActionPerformed

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        dispose();
    }//GEN-LAST:event_jButton1ActionPerformed

    private void jComboBox1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jComboBox1ActionPerformed
        jComboBox2.removeAllItems();
        String lak = jComboBox1.getSelectedItem().toString();
        ResultSet rs = DBConnect.read("SELECT * FROM USER01.MANDG WHERE ENTERTAINMENT = '" + lak + "'");
        try {
            while (rs.next()) {
                String content = rs.getString("ITEM");
                jComboBox2.addItem(content);
            }

        } catch (Exception e) {
            e.getMessage();
        }

    }//GEN-LAST:event_jComboBox1ActionPerformed

    private void addBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_addBtnActionPerformed
        String content = jComboBox2.getSelectedItem().toString();
        long mills = System.currentTimeMillis();
        Date time = new Date();
        SimpleDateFormat sdf = new SimpleDateFormat("HH:mm:ss");

        java.sql.Date date = new java.sql.Date(mills);
        DefaultTableModel model = (DefaultTableModel) jTable1.getModel();
        ResultSet rs = DBConnect.read("SELECT*FROM USER01.MANDG WHERE ITEM='" + content + "'");

        try {
            if (rs.next()) {
                boolean flag = true;
                for (int i = 0; i < model.getRowCount(); i++) {
                    if (model.getValueAt(i, 0).equals(content)) {
                        flag = false;
                    }
                }
                if (flag) {
                    model.addRow(new Object[]{rs.getString("ITEM"), date, sdf.format(time), rs.getInt("PRICE")});
                    Total += rs.getInt("PRICE");
                    jLabel8.setText(Total + "");
                } else {
                    JOptionPane.showMessageDialog(null, "You have already selected " + content + " .");
                }
            }
        } catch (Exception e) {
            e.getMessage();
        }
    }//GEN-LAST:event_addBtnActionPerformed

    private void deleteBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_deleteBtnActionPerformed
        DefaultTableModel model = (DefaultTableModel) jTable1.getModel();
        int no_of_rows = model.getRowCount();
        if (no_of_rows == 0) {
            JOptionPane.showMessageDialog(rootPane, "No Items Added");
        } else {
            Total -= (int) model.getValueAt(no_of_rows - 1, 3);
            jLabel8.setText(Total + "");
            model.removeRow(no_of_rows - 1);
        }

    }//GEN-LAST:event_deleteBtnActionPerformed

    private void confirmBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_confirmBtnActionPerformed

        try {
            long mills = System.currentTimeMillis();
            Date time = new Date(); //this is for only time=time
            SimpleDateFormat sdf = new SimpleDateFormat("HH:mm:ss");
            java.sql.Date date = new java.sql.Date(mills);
            Connection pit = new DBConnect().DBCon();
            String user = new DBConnect().getCurrentUser();
            String low = "INSERT INTO USER01.ROOMSERVICES(USERID,SERVICES,DATE,TIME,EXTRACHARGES) VALUES(?,?,?,?,?)";
            PreparedStatement ptmt = pit.prepareStatement(low);
            ptmt.setDate(3, date);
            ptmt.setString(4, sdf.format(time));
            ptmt.setString(1, user);
            ptmt.setString(2, "ENTERTAINMENT");

            DefaultTableModel model = (DefaultTableModel) jTable1.getModel();
            int totalPrice = 0;
            for (int i = 0; i < model.getRowCount(); i++) {
                totalPrice += (int) model.getValueAt(i, 3);
            }

            String SQL2 = "SELECT * FROM USER01.CONFIRMBOOKINGS WHERE USERNAME = ?";
            PreparedStatement stmt2 = pit.prepareStatement(SQL2);
            stmt2.setString(1, user);
            ResultSet cb = stmt2.executeQuery();
            cb.next();
            Date date2 = cb.getDate("CHECKOUTDATE");
            Date date1 = new Date();
            var Difference_In_Time = date2.getTime() - date1.getTime();
            var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
            int daysLeft = (int) Difference_In_Days;
            
            totalPrice = totalPrice * daysLeft;

            ptmt.setInt(5, totalPrice);
            int i = ptmt.executeUpdate();
            ptmt.close();
            pit.close();
            JOptionPane.showMessageDialog(null, "YOUR PACK IS SUCCESSFULLY ACTIVATED ON \n " + date + " AT " + time + "");
            dispose();

        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, ex.getMessage());
        }

    }//GEN-LAST:event_confirmBtnActionPerformed

    private void formWindowClosed(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosed
        // TODO add your handling code here:
        new RoomServices().setVisible(true);
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
            java.util.logging.Logger.getLogger(EntertainmentService.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(EntertainmentService.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(EntertainmentService.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(EntertainmentService.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new EntertainmentService().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton addBtn;
    private javax.swing.JButton confirmBtn;
    private javax.swing.JButton deleteBtn;
    private javax.swing.JButton jButton1;
    private javax.swing.JComboBox<String> jComboBox1;
    private javax.swing.JComboBox<String> jComboBox2;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JTable jTable1;
    // End of variables declaration//GEN-END:variables
}
