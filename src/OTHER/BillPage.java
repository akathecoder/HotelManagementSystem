package OTHER;

import java.awt.Component;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.PrintJob;
import java.awt.print.PageFormat;
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
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author SPARSH
 */
public class BillPage extends javax.swing.JFrame {

    // Variable Initialization.
    private Component print_component;
    private String email;

    // Creates new form checkoutPage
    public BillPage() {
        initComponents();
    }

    // Function to set the Text in JTextArea.
    // Get the Rooms Details of current user and calculates the bill and taxes.
    // Stores them in a table for later use.
    // Creates the text to be shown on bill using String Concatination and 
    // data in the table previously created.
    // Text stored in variable named str.
    private String sendText() {
        Connection con = new DBConnect().DBCon();
        String SQL1 = "SELECT * FROM USER01.USERDB WHERE USERID = ?";
        String SQL2 = "SELECT * FROM USER01.CONFIRMBOOKINGS";
        String SQL3 = "SELECT * FROM USER01.ROOMSDETAILS WHERE ROOMNUMBER = ?";

        String currentUser = new DBConnect().getCurrentUser();

        try {
            PreparedStatement stmt = con.prepareStatement(SQL1);
            PreparedStatement stmt2 = con.prepareStatement(SQL2);
            PreparedStatement stmt3 = con.prepareStatement(SQL3);

            stmt.setString(1, currentUser);
            ResultSet rs = stmt.executeQuery();
            rs.next();

            ResultSet cb = stmt2.executeQuery();

            DefaultTableModel model = new DefaultTableModel(new String[]{"sno", "Name", "rate", "nights", "price"}, 0);

            int sno = 0;
            float totalPrice = 0;

            // Loop to check every entry in the database.
            while (cb.next()) {
                // Checks whether this room is booked  by the user or not.
                if (cb.getString("USERNAME").equals(currentUser)) {

                    String roomNo = cb.getString("ROOMNUMBER");

                    stmt3.setString(1, roomNo);
                    ResultSet rd = stmt3.executeQuery();    // Gets Data from DB.
                    rd.next();

                    sno++;

                    // Gets Room Name.
                    // Checks whether the room was Deluxe or not and adds to Room Name.
                    String Name = rd.getString("ROOMTYPE");
                    if (Integer.parseInt(roomNo) < 5000) {
                        if (rd.getBoolean("DELUXE")) {
                            Name += " (D)";
                        }
                    }

                    // Gets per night rate of the room.
                    int rate = Integer.parseInt(rd.getString("PRICING"));

                    // Calculates total nights stayed at Hotel.
                    int nights = 0;
                    Date date1 = cb.getDate("CHECKINDATE");
                    Date date2 = cb.getDate("CHECKOUTDATE");

                    var Difference_In_Time = date2.getTime() - date1.getTime();
                    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
                    nights = (int) Difference_In_Days;

                    // Calculates Tax and add to Total Price
                    float price = rate;
                    if (rate <= 1000) {
                        price = rate;
                    } else if (rate <= 7500) {
                        price = rate + ((rate * 12) / 100);
                    } else {
                        price = rate + ((rate * 18) / 100);
                    }

                    price = price * nights;

                    // Calculates total price.
                    totalPrice += price;

                    // Adds the room data to a row in Table Model.
                    model.addRow(new Object[]{sno, Name, rate, nights, price});

                    // Delete Room
                    DBConnect.deleteCB(roomNo);

                }
            }

            JTable table = new JTable(model);

            // Setting email for use in sending email.
            email = rs.getString("EMAIL");

            // Creates text to be shown in the bill.
            String str = "";

            str = str + " ***************************************************************************************\n";
            str = str + " \t\t\t\t\tBILL\n";
            str = str + " ***************************************************************************************\n";
            str = str + "\n";
            str = str + " Bill Generated : " + new Date() + "\n\n";
            str = str + " Name : " + rs.getString("FIRSTNAME") + " " + rs.getString("LASTNAME");
            str = str + "\n";
            str = str + " Email : " + rs.getString("EMAIL");
            str = str + "\n";
            str = str + " Age : " + rs.getInt("AGE");
            str = str + "\t\t";
            str = str + " Gender : " + rs.getString("GENDER");
            str = str + "\n\n";
            str = str + " ***************************************************************************************\n\n\n";
            str = str + " ---------------------------------------------------------------------------------------\n";
            str = str + "  Sno.|\t Room Name\t\t| Rate\t\t| Total Night Stayed\t| Price \t| \n";
            str = str + " ---------------------------------------------------------------------------------------\n";
            str = str + "      |\t          \t\t|     \t\t|                   \t|       \t| \n";

            sno = 0;
            int rowCount = table.getRowCount();
            System.out.println(rowCount);
            for (int i = 0; i < rowCount; i++) {
                int Sno = (int) table.getValueAt(i, 0);
                String Name = (String) table.getValueAt(i, 1);
                int rate = (int) table.getValueAt(i, 2);
                int nights = (int) table.getValueAt(i, 3);
                float price = (float) table.getValueAt(i, 4);

                while (Name.length() < 18) {
                    Name += " ";
                }

                str = str + "  " + Sno + "   |\t" + Name + "\t| Rs. " + rate + "\t| \t" + nights + " \t\t| Rs. " + price + " \t| \n";

            }

            str = str + "      |\t          \t\t|     \t\t|                   \t|       \t| \n";
            str = str + " ---------------------------------------------------------------------------------------\n";
            str = str + "  Sno.|\t Service\t\t\t\t\t\t\t| Price \t| \n";
            str = str + " ---------------------------------------------------------------------------------------\n";

            String SQLforServices = "SELECT * FROM USER01.ROOMSERVICES WHERE USERID = ?";
            PreparedStatement stmt4 = con.prepareStatement(SQLforServices);
            stmt4.setString(1, new DBConnect().getCurrentUser());
            ResultSet rs2 = stmt4.executeQuery();

            int no = 1;
            while (rs2.next()) {
                str = str + "   " + no + "  |\t " + rs2.getString("SERVICES") + "\t\t\t\t\t\t\t| " + rs2.getInt("EXTRACHARGES") + "\t| \n";
                totalPrice += rs2.getInt("EXTRACHARGES");
            }

            try {
                String SQL = "DELETE FROM USER01.ROOMSERVICES WHERE USERID = ?";
                PreparedStatement stmt5 = con.prepareStatement(SQL);
                stmt5.setString(1, new DBConnect().getCurrentUser());
                int i = stmt5.executeUpdate();
                System.out.println("All " + i + " Services deleted.");

            } catch (SQLException ex) {
                Logger.getLogger(DBConnect.class.getName()).log(Level.SEVERE, null, ex);
            }

            str = str + "\n\n";
            str = str + "\n\t\t\t\t\t\t\t\t    Total : Rs " + totalPrice + "\n";
            str = str + " ---------------------------------------------------------------------------------------\n";

            str = str + "\n\n\t\t\t\t\t\t\t" + "________________";
            str = str + "\n\t\t\t\t\t\t\t" + "    Signature";

//            MailSender.sendMail("sparshagarwal@jklu.edu.in", "Bill for your Booking", str);
            return str;
        } catch (SQLException ex) {
            System.out.println(ex.getMessage());
            System.out.println(ex.getErrorCode());
        }

        return "ERROR!!!!";
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        bill = new javax.swing.JTextArea();
        jButton1 = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        setTitle("PRINT BILL | HOTEL MANAGEMENT SYSTEM");
        setResizable(false);
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosed(java.awt.event.WindowEvent evt) {
                formWindowClosed(evt);
            }
            public void windowOpened(java.awt.event.WindowEvent evt) {
                formWindowOpened(evt);
            }
        });

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
        // Prints the bill.
        printBill(bill);
//        MailSender.sendMail(email, "Bill for your Booking", bill);
        // Send Mail.

    }//GEN-LAST:event_jButton1ActionPerformed

    private void formWindowClosed(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosed
        // Opens Welcome Screen if Window Closed.
        new USER.UserFeedbackForm().setVisible(true);
    }//GEN-LAST:event_formWindowClosed

    private void formWindowOpened(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowOpened
        // TODO add your handling code here:
        MailSender.sendMail(email, "Bill for your Booking", bill);
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

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new BillPage().setVisible(true);
            }
        });

    }

    // Function used to print bill.
    private void printBill(JTextArea textArea) {
        // Create PrinterJob Here
        PrinterJob printerJob = PrinterJob.getPrinterJob();
        // Set Printer Job Name
        printerJob.setJobName("Print Bill");
        // Set Printable
        printerJob.setPrintable(new Printable() {
            @Override
            public int print(Graphics graphics, PageFormat pageFormat, int pageIndex) throws PrinterException {
                // Check If No Printable Content
                if (pageIndex > 0) {
                    return Printable.NO_SUCH_PAGE;
                }

                // Make 2D Graphics to map content
                Graphics2D graphics2D = (Graphics2D) graphics;
                // Set Graphics Translations
                // A Little Correction here Multiplication was not working so I replaced with addition
                graphics2D.translate(pageFormat.getImageableX() + 10, pageFormat.getImageableY() + 10);
                // This is a page scale. Default should be 0.3 I am using 0.5
                graphics2D.scale(0.5, 0.5);

                // Now paint panel as graphics2D
                textArea.paint(graphics2D);

                // return if page exists
                return Printable.PAGE_EXISTS;
            }
        });
        // Store printerDialog as boolean
        boolean returningResult = printerJob.printDialog();
        // check if dilog is showing
        if (returningResult) {
            // Use try catch exeption for failure
            try {
                // Now call print method inside printerJob to print
                printerJob.print();
            } catch (PrinterException printerException) {
                JOptionPane.showMessageDialog(this, "Print Error: " + printerException.getMessage());
            }
        }
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JTextArea bill;
    private javax.swing.JButton jButton1;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    // End of variables declaration//GEN-END:variables
}
