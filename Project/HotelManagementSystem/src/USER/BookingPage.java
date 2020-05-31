package USER;

import OTHER.DBConnect;
import java.awt.Color;
import java.awt.Font;
import java.sql.ResultSet;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.List;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.DefaultTableModel;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author RG
 */
public class BookingPage extends javax.swing.JFrame {

    static List room_num = new ArrayList();                                             // ** This is a static list which stores roomnumbers of 
                                                                                        //    all the rooms that current user has selected to book.
    static Date checkindate;                                                            // ** These static date variable will carry checkin & checkout
    static Date checkoutdate;                                                           //    dates and will ensure that they remain same throught one session.

    /**
     * Creates new form BookingPage2
     */
    public BookingPage() {
        initComponents();
        
        Date d = new Date();                                                            //*************************************************//
        Calendar cal = new GregorianCalendar();                                         //
                                                                                        //
        cal.set(d.getYear() + 1900, d.getMonth() + 2, d.getDate());                     //  **Setting maximum selectable date
        jDateChooser1.setMaxSelectableDate(cal.getTime());                              //    two months after current date
        jDateChooser2.setMaxSelectableDate(cal.getTime());                              //
                                                                                        //
        cal.add(Calendar.DATE, 1);                                                      //
        cal.add(Calendar.MONTH, -2);                                                    //
        jDateChooser2.setMinSelectableDate(cal.getTime());                              //
        jDateChooser2.setDate(jDateChooser2.getMinSelectableDate());                    //*************************************************//
        
        NOOFGUESTS.setText("1");                                                        //Setting byDefault No. of Guests = 1 in textField

        DefaultTableCellRenderer cellRenderer = new DefaultTableCellRenderer();         //*************************************************//
        TABLE.getTableHeader().setOpaque(false);                                        //
        TABLE.getTableHeader().setBackground(new Color(177, 199, 131));                 //
        TABLE.getTableHeader().setFont(new Font("Dubai", Font.PLAIN, 13));              //
        TABLE.getTableHeader().setBorder(null);                                         //
        TABLE.setBackground(new Color(0, 0, 0, 0));                                     //
        cellRenderer.setBackground(new Color(129, 129, 129));                           //  **This code between astrics(*) is 
        cellRenderer.setForeground(new Color(255, 255, 255));                           //    to change appearance of table and
        jScrollPane1.setBackground(new Color(129, 129, 129));                           //    other frame compenents.
        jScrollPane1.setOpaque(true);                                                   //
        TABLE.setOpaque(false);                                                         //
        cellRenderer.setOpaque(false);                                                  //
        TABLE.getColumnModel().getColumn(0).setPreferredWidth(60);                      //
        TABLE.getColumnModel().getColumn(1).setPreferredWidth(40);                      //
        TABLE.getColumnModel().getColumn(2).setPreferredWidth(470);                     //
        TABLE.getColumnModel().getColumn(3).setPreferredWidth(50);                      //
        cellRenderer.setHorizontalAlignment(JLabel.CENTER);                             //
        TABLE.getColumnModel().getColumn(0).setCellRenderer(cellRenderer);              //
        TABLE.getColumnModel().getColumn(1).setCellRenderer(cellRenderer);              //
        TABLE.getColumnModel().getColumn(2).setCellRenderer(cellRenderer);              //
        TABLE.getColumnModel().getColumn(3).setCellRenderer(cellRenderer);              //
        setResizable(false);                                                            //  
        jScrollPane1.setViewportView(TABLE);                                            //
        jScrollPane1.getViewport().setOpaque(false);                                    //
        jScrollPane1.setBorder(null);                                                   //************************************************//

        jTextArea1.setOpaque(false);                                                    //
        jTextArea1.setEditable(false);                                                  //  **Setting TextArea Properties
        jTextArea1.setSize(350, 50);                                                    //

    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel2 = new javax.swing.JLabel();
        jTextArea1 = new javax.swing.JTextArea();
        GREETINGS = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        TABLE = new javax.swing.JTable();
        jTextField1 = new javax.swing.JTextField();
        jTextField2 = new javax.swing.JTextField();
        jTextField3 = new javax.swing.JTextField();
        DELETEPREVIOUS = new javax.swing.JButton();
        jTextField6 = new javax.swing.JTextField();
        jTextField7 = new javax.swing.JTextField();
        jTextField8 = new javax.swing.JTextField();
        NUMBEROFBEDS = new javax.swing.JLabel();
        NOOFGUESTS = new javax.swing.JTextField();
        ROOMTYPE = new javax.swing.JComboBox<>();
        DELUXE = new javax.swing.JCheckBox();
        ADDNEXT = new javax.swing.JButton();
        jTextField9 = new javax.swing.JTextField();
        PRICING = new javax.swing.JLabel();
        CANCEL = new javax.swing.JButton();
        CONFIRM = new javax.swing.JButton();
        jDateChooser1 = new com.toedter.calendar.JDateChooser();
        jDateChooser2 = new com.toedter.calendar.JDateChooser();
        jLabel1 = new javax.swing.JLabel();

        jLabel2.setText("jLabel2");

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("BOOK ROOMS | HOTEL MANAGEMENT SYSTEM");
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

        jTextArea1.setColumns(20);
        jTextArea1.setFont(new java.awt.Font("Monospaced", 1, 14)); // NOI18N
        jTextArea1.setLineWrap(true);
        jTextArea1.setRows(5);
        jTextArea1.setText("Entries with * are mandatory.");
        jTextArea1.setToolTipText("");
        jTextArea1.setWrapStyleWord(true);
        jTextArea1.setOpaque(false);
        getContentPane().add(jTextArea1, new org.netbeans.lib.awtextra.AbsoluteConstraints(460, 10, -1, 30));

        GREETINGS.setFont(new java.awt.Font("Dubai", 3, 24)); // NOI18N
        GREETINGS.setText("Hi , ");
        getContentPane().add(GREETINGS, new org.netbeans.lib.awtextra.AbsoluteConstraints(90, 30, 190, 30));

        jScrollPane1.setBorder(null);
        jScrollPane1.setFocusable(false);
        jScrollPane1.setViewportView(null);

        TABLE.setFont(new java.awt.Font("Dubai", 1, 14)); // NOI18N
        TABLE.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Room Type", "Deluxe", "Description", "Pricing"
            }
        ) {
            Class[] types = new Class [] {
                java.lang.String.class, java.lang.Boolean.class, java.lang.String.class, java.lang.String.class
            };
            boolean[] canEdit = new boolean [] {
                false, false, false, false
            };

            public Class getColumnClass(int columnIndex) {
                return types [columnIndex];
            }

            public boolean isCellEditable(int rowIndex, int columnIndex) {
                return canEdit [columnIndex];
            }
        });
        TABLE.setToolTipText("");
        TABLE.setCursor(new java.awt.Cursor(java.awt.Cursor.CROSSHAIR_CURSOR));
        TABLE.setFocusable(false);
        TABLE.setGridColor(new java.awt.Color(255, 255, 255));
        TABLE.setIntercellSpacing(new java.awt.Dimension(0, 5));
        TABLE.setRowHeight(25);
        TABLE.setSelectionBackground(new java.awt.Color(133, 133, 133));
        TABLE.setShowGrid(false);
        TABLE.getTableHeader().setReorderingAllowed(false);
        jScrollPane1.setViewportView(TABLE);

        getContentPane().add(jScrollPane1, new org.netbeans.lib.awtextra.AbsoluteConstraints(30, 230, 740, 150));

        jTextField1.setEditable(false);
        jTextField1.setBackground(new java.awt.Color(178, 199, 132));
        jTextField1.setFont(new java.awt.Font("Dubai", 1, 13)); // NOI18N
        jTextField1.setForeground(new java.awt.Color(255, 255, 255));
        jTextField1.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        jTextField1.setText("Check Out Date*");
        jTextField1.setBorder(null);
        jTextField1.setPreferredSize(new java.awt.Dimension(90, 23));
        getContentPane().add(jTextField1, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 120, 140, 20));

        jTextField2.setEditable(false);
        jTextField2.setBackground(new java.awt.Color(178, 199, 132));
        jTextField2.setFont(new java.awt.Font("Dubai", 1, 13)); // NOI18N
        jTextField2.setForeground(new java.awt.Color(255, 255, 255));
        jTextField2.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        jTextField2.setText("Number of Guests");
        jTextField2.setBorder(null);
        getContentPane().add(jTextField2, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 150, 140, 20));

        jTextField3.setEditable(false);
        jTextField3.setBackground(new java.awt.Color(178, 199, 132));
        jTextField3.setFont(new java.awt.Font("Dubai", 1, 13)); // NOI18N
        jTextField3.setForeground(new java.awt.Color(255, 255, 255));
        jTextField3.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        jTextField3.setText("Check In Date*");
        jTextField3.setBorder(null);
        getContentPane().add(jTextField3, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 90, 140, 20));

        DELETEPREVIOUS.setBackground(new java.awt.Color(178, 199, 132));
        DELETEPREVIOUS.setFont(new java.awt.Font("Dubai", 0, 14)); // NOI18N
        DELETEPREVIOUS.setText("DELETE PREVIOUS");
        DELETEPREVIOUS.setBorder(null);
        DELETEPREVIOUS.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        DELETEPREVIOUS.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                DELETEPREVIOUSMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                DELETEPREVIOUSMouseExited(evt);
            }
            public void mousePressed(java.awt.event.MouseEvent evt) {
                DELETEPREVIOUSMousePressed(evt);
            }
            public void mouseReleased(java.awt.event.MouseEvent evt) {
                DELETEPREVIOUSMouseReleased(evt);
            }
        });
        DELETEPREVIOUS.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                DELETEPREVIOUSActionPerformed(evt);
            }
        });
        getContentPane().add(DELETEPREVIOUS, new org.netbeans.lib.awtextra.AbsoluteConstraints(580, 180, 140, 20));

        jTextField6.setEditable(false);
        jTextField6.setBackground(new java.awt.Color(173, 154, 150));
        jTextField6.setFont(new java.awt.Font("Dubai", 1, 13)); // NOI18N
        jTextField6.setForeground(new java.awt.Color(255, 255, 255));
        jTextField6.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        jTextField6.setText("Room Type*");
        jTextField6.setBorder(null);
        getContentPane().add(jTextField6, new org.netbeans.lib.awtextra.AbsoluteConstraints(460, 50, 110, 20));

        jTextField7.setEditable(false);
        jTextField7.setBackground(new java.awt.Color(173, 154, 150));
        jTextField7.setFont(new java.awt.Font("Dubai", 1, 13)); // NOI18N
        jTextField7.setForeground(new java.awt.Color(255, 255, 255));
        jTextField7.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        jTextField7.setText("Number of Beds");
        jTextField7.setBorder(null);
        getContentPane().add(jTextField7, new org.netbeans.lib.awtextra.AbsoluteConstraints(460, 80, 110, 20));

        jTextField8.setEditable(false);
        jTextField8.setBackground(new java.awt.Color(173, 154, 150));
        jTextField8.setFont(new java.awt.Font("Dubai", 1, 13)); // NOI18N
        jTextField8.setForeground(new java.awt.Color(255, 255, 255));
        jTextField8.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        jTextField8.setText("Deluxe");
        jTextField8.setBorder(null);
        getContentPane().add(jTextField8, new org.netbeans.lib.awtextra.AbsoluteConstraints(580, 110, 70, 20));

        NUMBEROFBEDS.setFont(new java.awt.Font("Dubai", 2, 12)); // NOI18N
        NUMBEROFBEDS.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        NUMBEROFBEDS.setText("1");
        getContentPane().add(NUMBEROFBEDS, new org.netbeans.lib.awtextra.AbsoluteConstraints(630, 80, 50, -1));

        NOOFGUESTS.setFont(new java.awt.Font("Dubai", 0, 13)); // NOI18N
        NOOFGUESTS.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        NOOFGUESTS.setBorder(javax.swing.BorderFactory.createEmptyBorder(1, 1, 1, 1));
        NOOFGUESTS.addCaretListener(new javax.swing.event.CaretListener() {
            public void caretUpdate(javax.swing.event.CaretEvent evt) {
                NOOFGUESTSCaretUpdate(evt);
            }
        });
        getContentPane().add(NOOFGUESTS, new org.netbeans.lib.awtextra.AbsoluteConstraints(230, 150, 120, 20));

        ROOMTYPE.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ROOMTYPEActionPerformed(evt);
            }
        });
        getContentPane().add(ROOMTYPE, new org.netbeans.lib.awtextra.AbsoluteConstraints(590, 50, 130, -1));

        DELUXE.setBackground(new java.awt.Color(255, 255, 255));
        DELUXE.setBorder(null);
        DELUXE.setOpaque(false);
        DELUXE.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                DELUXEActionPerformed(evt);
            }
        });
        getContentPane().add(DELUXE, new org.netbeans.lib.awtextra.AbsoluteConstraints(550, 110, 20, 20));

        ADDNEXT.setBackground(new java.awt.Color(178, 199, 132));
        ADDNEXT.setFont(new java.awt.Font("Dubai", 0, 14)); // NOI18N
        ADDNEXT.setText("ADD NEXT");
        ADDNEXT.setBorder(null);
        ADDNEXT.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        ADDNEXT.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                ADDNEXTMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                ADDNEXTMouseExited(evt);
            }
            public void mousePressed(java.awt.event.MouseEvent evt) {
                ADDNEXTMousePressed(evt);
            }
            public void mouseReleased(java.awt.event.MouseEvent evt) {
                ADDNEXTMouseReleased(evt);
            }
        });
        ADDNEXT.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ADDNEXTActionPerformed(evt);
            }
        });
        getContentPane().add(ADDNEXT, new org.netbeans.lib.awtextra.AbsoluteConstraints(460, 180, 110, 20));

        jTextField9.setEditable(false);
        jTextField9.setBackground(new java.awt.Color(173, 154, 150));
        jTextField9.setFont(new java.awt.Font("Dubai", 1, 13)); // NOI18N
        jTextField9.setForeground(new java.awt.Color(255, 255, 255));
        jTextField9.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        jTextField9.setText("Pricing");
        jTextField9.setBorder(null);
        getContentPane().add(jTextField9, new org.netbeans.lib.awtextra.AbsoluteConstraints(460, 140, 110, 20));

        PRICING.setFont(new java.awt.Font("Dubai", 2, 12)); // NOI18N
        PRICING.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        PRICING.setText("Rs.  ");
        PRICING.setToolTipText("");
        getContentPane().add(PRICING, new org.netbeans.lib.awtextra.AbsoluteConstraints(630, 140, 50, -1));

        CANCEL.setBackground(new java.awt.Color(178, 199, 132));
        CANCEL.setFont(new java.awt.Font("Dubai", 0, 14)); // NOI18N
        CANCEL.setText("CANCEL");
        CANCEL.setBorder(null);
        CANCEL.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        CANCEL.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                CANCELMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                CANCELMouseExited(evt);
            }
            public void mousePressed(java.awt.event.MouseEvent evt) {
                CANCELMousePressed(evt);
            }
            public void mouseReleased(java.awt.event.MouseEvent evt) {
                CANCELMouseReleased(evt);
            }
        });
        CANCEL.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                CANCELActionPerformed(evt);
            }
        });
        getContentPane().add(CANCEL, new org.netbeans.lib.awtextra.AbsoluteConstraints(300, 410, 110, 20));

        CONFIRM.setBackground(new java.awt.Color(178, 199, 132));
        CONFIRM.setFont(new java.awt.Font("Dubai", 0, 14)); // NOI18N
        CONFIRM.setText("CONFIRM");
        CONFIRM.setBorder(null);
        CONFIRM.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        CONFIRM.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                CONFIRMMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                CONFIRMMouseExited(evt);
            }
            public void mousePressed(java.awt.event.MouseEvent evt) {
                CONFIRMMousePressed(evt);
            }
            public void mouseReleased(java.awt.event.MouseEvent evt) {
                CONFIRMMouseReleased(evt);
            }
        });
        CONFIRM.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                CONFIRMActionPerformed(evt);
            }
        });
        getContentPane().add(CONFIRM, new org.netbeans.lib.awtextra.AbsoluteConstraints(420, 410, 110, 20));

        jDateChooser1.setDate(new Date());
        jDateChooser1.setDateFormatString("yyyy-MM-dd");
        jDateChooser1.setMinSelectableDate(new Date());
        getContentPane().add(jDateChooser1, new org.netbeans.lib.awtextra.AbsoluteConstraints(230, 90, 120, -1));

        jDateChooser2.setDate(new Date());
        jDateChooser2.setDateFormatString("yyyy-MM-dd");
        jDateChooser2.setMinSelectableDate(new Date());
        getContentPane().add(jDateChooser2, new org.netbeans.lib.awtextra.AbsoluteConstraints(230, 120, 120, -1));

        jLabel1.setBackground(new java.awt.Color(177, 199, 131));
        jLabel1.setFont(new java.awt.Font("Tahoma", 3, 12)); // NOI18N
        jLabel1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Assets/Hotel - 2edited.jpg"))); // NOI18N
        jLabel1.setOpaque(true);
        getContentPane().add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 800, 450));

        setSize(new java.awt.Dimension(814, 486));
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void DELETEPREVIOUSMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_DELETEPREVIOUSMouseEntered
        DELETEPREVIOUS.setBackground(new Color(133, 133, 133));                         //  **Changing colour properties of button to
        DELETEPREVIOUS.setForeground(new Color(255, 255, 255));                         //    make it appear different on different 
                                                                                        //    mouse actions
    }//GEN-LAST:event_DELETEPREVIOUSMouseEntered

    private void DELETEPREVIOUSMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_DELETEPREVIOUSMouseExited
        DELETEPREVIOUS.setBackground(new Color(178, 199, 132));                        //  **Changing colour properties of button to
        DELETEPREVIOUS.setForeground(new Color(0, 0, 0));                              //    make it appear different on different 
                                                                                       //    mouse actions
    }//GEN-LAST:event_DELETEPREVIOUSMouseExited

    private void DELETEPREVIOUSMousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_DELETEPREVIOUSMousePressed
        DELETEPREVIOUS.setBackground(new Color(153, 0, 255));                          //  **Changing colour properties of button to
                                                                                       //    make it appear different on different 
                                                                                       //    mouse actions
    }//GEN-LAST:event_DELETEPREVIOUSMousePressed

    private void DELETEPREVIOUSMouseReleased(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_DELETEPREVIOUSMouseReleased
        DELETEPREVIOUS.setBackground(new Color(133, 133, 133));                        //  **Changing colour properties of button to
                                                                                       //    make it appear different on different 
                                                                                       //    mouse actions
    }//GEN-LAST:event_DELETEPREVIOUSMouseReleased

    private void ADDNEXTMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_ADDNEXTMouseEntered
        ADDNEXT.setBackground(new Color(133, 133, 133));                               //  **Changing colour properties of button to
        ADDNEXT.setForeground(new Color(255, 255, 255));                               //    make it appear different on different 
                                                                                       //    mouse actions
    }//GEN-LAST:event_ADDNEXTMouseEntered

    private void ADDNEXTMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_ADDNEXTMouseExited
        ADDNEXT.setBackground(new Color(178, 199, 132));                               //  **Changing colour properties of button to
        ADDNEXT.setForeground(new Color(0, 0, 0));                                     //    make it appear different on different 
                                                                                       //    mouse actions
    }//GEN-LAST:event_ADDNEXTMouseExited

    private void ADDNEXTMousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_ADDNEXTMousePressed
        ADDNEXT.setBackground(new Color(153, 0, 255));                                 //  **Changing colour properties of button to
                                                                                       //    make it appear different on different 
                                                                                       //    mouse actions
    }//GEN-LAST:event_ADDNEXTMousePressed

    private void ADDNEXTMouseReleased(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_ADDNEXTMouseReleased
        ADDNEXT.setBackground(new Color(133, 133, 133));                               //  **Changing colour properties of button to
                                                                                       //    make it appear different on different 
                                                                                       //    mouse actions
    }//GEN-LAST:event_ADDNEXTMouseReleased

    private void ADDNEXTActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ADDNEXTActionPerformed
        try {
            DefaultTableModel modeltry = (DefaultTableModel) TABLE.getModel();              //*******************************
            int rows = modeltry.getRowCount();                                              // This code is to check if the guest has suddenly
            // changed checkin & checkout dates in between the
            // program, if yes then this whole frame will start again.
            if (rows <= 1) {
                checkindate = jDateChooser1.getDate();                                     // ** This will get the selected date from jDateChoosers
                checkoutdate = jDateChooser2.getDate();                                    //    and set there values to static chekin & checkout dates.

            }
            Date cid = jDateChooser1.getDate();                                     // ** This will get the selected date from jDateChooser.
            Date cod = jDateChooser2.getDate();

            if (cid.toString().equals(checkindate.toString())
                    && // checking if dates have been changed or not, If no, then proceed.
                    cod.toString().equals(checkoutdate.toString())) {                //*********************************

                //******************************************
                if (cod.after(cid)) {                                                           // ** Checkout date should be after or equal to checkin date.
                    String room_type = ROOMTYPE.getSelectedItem().toString();
                    String no_of_beds = NUMBEROFBEDS.getText();

                    String deluxe;
                    if (DELUXE.isSelected()) {
                        deluxe = "true";                               // ** Setting Value of Deluxe (check box) 
                    } else {
                        deluxe = "false";                                                  //    "true" if selected and "false" if not.
                    }

                    DefaultTableModel model = (DefaultTableModel) TABLE.getModel();

                    String query = "SELECT * FROM USER01.ROOMSDETAILS WHERE ROOMTYPE ='" + room_type // ** Query for fetching rooms from roomsdetails
                            + "' AND NUMBEROFBEDS = " + no_of_beds + " AND DELUXE = '" + deluxe + "'";              //    table as per the preferences of the guest.

                    String message = "";

                    try {
                        ResultSet rs_roomdetails = DBConnect.read(query);                                        // ** Matching rooms as per guest's preferences and
                        //    getting a table of those rooms in a ResultSet.

                        while (true) {                                                                           // ** This loop will run till there are rooms available in 
                                                                                                                 //    the resultset of rooms matching users preferences.
                            if (rs_roomdetails.next()) {
                                String rn = rs_roomdetails.getString("ROOMNUMBER");                                  // ** Getting roomnumber of first room in resultset.
                                ResultSet rs_confirmbooking = DBConnect.read("SELECT * FROM USER01."                // ** Suppose that room is previously booked by some
                                        + "CONFIRMBOOKINGS WHERE ROOMNUMBER = '" + rn + "'");                            //    guest, so getting resultset of those details
                                                                                                                        //    from confirmbookings table.
                                if (!room_num.contains(rn)) {
                                    if (rs_confirmbooking.next()) {                                                 // ** Now suppose that this room has not been previously
                                        //    added to the table by this current user.

                                        Date cid_old = rs_confirmbooking.getDate("CHECKINDATE");                    // ** But this room was previously booked by some user,
                                        Date cod_old = rs_confirmbooking.getDate("CHECKOUTDATE");                   //    so getting his/her chekin & chekout details.

                                        if (cid.after(cod_old) || cod.before(cid_old)) {                             //** Now checking if that room is available for the
                                            //   time period guest want to stay by comparing it with
                                            //   details of previously staying guest.

                                            String RoomType = rs_roomdetails.getString("ROOMTYPE");                 // ** If room is available for that time period
                                            boolean delx = rs_roomdetails.getBoolean("DELUXE");                     //    then getting details of that room.
                                            String dscrptn = rs_roomdetails.getString("DESCRIPTION");
                                            String pricing = rs_roomdetails.getString("PRICING");
                                            model.addRow(new Object[]{RoomType, delx, dscrptn, pricing});           // ** Entering values into the table.
                                            room_num.add(rn);                                                       // ** Adding room_number to the list.
                                            break;                                                                  // ** This will break the loop and function of ADD
                                            //    button completed.
                                        } else {
                                            continue;                                                               // ** if the dates clashed then just continue, run the
                                        }                                                                           //    loop again and check for another room.

                                    } else {                                                                          // ** Here prefered room is neither previouly booked
                                        String RoomType = rs_roomdetails.getString("ROOMTYPE");                     //    by another guest nor by the current guest.
                                        boolean delx = rs_roomdetails.getBoolean("DELUXE");
                                        String dscrptn = rs_roomdetails.getString("DESCRIPTION");
                                        String pricing = rs_roomdetails.getString("PRICING");                       // ** Therefore fetching details of this room and
                                        model.addRow(new Object[]{RoomType, delx, dscrptn, pricing});               //    assigning it to current user.

                                        room_num.add(rn);                                                           // ** Adding room_number to the list.
                                        break;                                                                      // ** This will break the loop and function of ADD
                                        //    button completed.
                                    }
                                } else {                                                                              // ** Here guest has already added this room to the
                                    continue;                                                                       //    table, so continue again.
                                }
                            } else {
                                JOptionPane.showMessageDialog(rootPane, "OOPs...!!!,\n Room you are " // ** If all the rooms are booked for the time period
                                        + "looking for is RESERVED/UNAVAILABLE\nfor this particular " //    guest is trying to book the rooms, then this
                                        + "period. Change Dates and\n TRY AGAIN.");                              //    message will be displayed.
                                break;
                            }
                        }
                    } //*************************************************
                    catch (Exception e) {
                        JOptionPane.showMessageDialog(this, e.getMessage());                                // ** Displaying any error message from Derby Database
                    }
                } else {
                    JOptionPane.showMessageDialog(rootPane, "CheckOut Date cannot be the "
                            + "same date or in past...!!");                                                 // ** Showing error message for checkout date in past
                    jDateChooser2.setMinSelectableDate(jDateChooser1.getDate());                            // ** Setting minimum selectable date equal to checkin date

                }
            } else {
                JOptionPane.showMessageDialog(rootPane, "Check-In and " // ** Showing error message for sudden change in dates.
                        + "Check-Out Dates changed.\n Sorry, You have to Start Again.");
                dispose();                                                                                  // ** Therefore disposing this form
                new BookingPage().setVisible(true);                                                      // ** Opening same form again from start.
            }
        } catch (NullPointerException e) {
            JOptionPane.showMessageDialog(rootPane, "Please Select Check-In and " // ** Showing error message for 
                    + "Check-Out Dates first.");                                                    //    empty checkin & checkout dates.
        }
    }//GEN-LAST:event_ADDNEXTActionPerformed

    private void DELETEPREVIOUSActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_DELETEPREVIOUSActionPerformed
        DefaultTableModel model = (DefaultTableModel) TABLE.getModel();                        // ** This code is to get number of rows
        int rows = model.getRowCount();                                                        //    presently in the table.

        if (rows == 0)
            JOptionPane.showMessageDialog(rootPane, "Zero rooms is Added.");        // ** If number of rows is zero then display this message.
        else {
            model.removeRow(rows - 1);                                                         // ** Else last added row of the table.
            room_num.remove(room_num.size() - 1);
        }
    }//GEN-LAST:event_DELETEPREVIOUSActionPerformed

    private void DELUXEActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_DELUXEActionPerformed
        String deluxe;                                                                  //***************************************************
        if (DELUXE.isSelected()) {
            deluxe = "true";                                                            //Setting value of Deleuxe based on checkbox state
        } else {
            deluxe = "false";
        }

        String room_type = (String) ROOMTYPE.getSelectedItem();
        try {
            ResultSet rs = DBConnect.read("SELECT DISTINCT NUMBEROFBEDS, PRICING "
                    + "FROM USER01.ROOMSDETAILS WHERE ROOMTYPE = '" + room_type + "' "
                    + "AND DELUXE = '" + deluxe + "'");
            int c = 0;
            while (rs.next()) {
                c++;
                NUMBEROFBEDS.setText("");
                String item = rs.getString("NUMBEROFBEDS");
                NUMBEROFBEDS.setText(item);

                String pricing = rs.getString("PRICING");                                         // This code will change the values of price if deluxe checkbox
                PRICING.setText(pricing);                                                         // is deselected or reselected.

            }
            if (c == 0) {                                                                             // Also if non-deluxe type of any room is not available then it will
                DELUXE.setSelected(true);                                                          // check and show the message.
                JOptionPane.showMessageDialog(rootPane, "Non-Deluxe Type of this room is NOT AVAILABLE...!!");
            }

        } catch (Exception e) {
            JOptionPane.showMessageDialog(this, e.getMessage());

        }                                                                                   //************************************************************
    }//GEN-LAST:event_DELUXEActionPerformed

    private void formWindowOpened(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowOpened
                                                                                       //**************************************************
        try {
            ResultSet rs = DBConnect.read("SELECT FIRSTNAME FROM "
                    + "USER01.USERDB WHERE USERID ='" + 
                    new DBConnect().getCurrentUser() + "'");
            rs.next();
            GREETINGS.setText("Hi  " + rs.getString("FIRSTNAME") + ",");
            
            ResultSet rs1 = DBConnect.read("SELECT DISTINCT NUMBEROFBEDS, ROOMTYPE "
                    + "FROM USER01.ROOMSDETAILS ORDER BY NUMBEROFBEDS");
            while (rs1.next()) {
                String item = rs1.getString("ROOMTYPE");                                    //  ** This code will get all types of rooms available in database
                ROOMTYPE.addItem(item);                                                     //     and set that to the combobox.
            }

        } catch (Exception e) {
            JOptionPane.showMessageDialog(this, e.getMessage());
        }                                                                                //**************************************************
    }//GEN-LAST:event_formWindowOpened

    private void ROOMTYPEActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ROOMTYPEActionPerformed
        DELUXE.setSelected(true);                                                        //****************************************************
        NUMBEROFBEDS.setText("");
        String deluxe;
        if (DELUXE.isSelected()) {
            deluxe = "true";
        } else {
            deluxe = "false";
        }

        String room_type = (String) ROOMTYPE.getSelectedItem();
        try {                                                                                // This code will fill all the details of selected room type
            ResultSet rs = DBConnect.read("SELECT DISTINCT NUMBEROFBEDS, PRICING "           //    like number of beds, price , etc
                    + "FROM USER01.ROOMSDETAILS WHERE ROOMTYPE = '" + room_type + "' "
                    + "AND DELUXE = '" + deluxe + "'");
            while (rs.next()) {
                String item = rs.getString("NUMBEROFBEDS");
                NUMBEROFBEDS.setText(item);

                String pricing = rs.getString("PRICING");
                PRICING.setText(pricing);

            }

        } catch (Exception e) {
            JOptionPane.showMessageDialog(this, e.getMessage());

        }                                                                                               //******************************************************
    }//GEN-LAST:event_ROOMTYPEActionPerformed

    private void CANCELMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_CANCELMouseEntered
        CANCEL.setBackground(new Color(133, 133, 133));
        CANCEL.setForeground(new Color(255, 255, 255));
    }//GEN-LAST:event_CANCELMouseEntered

    private void CANCELMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_CANCELMouseExited
        CANCEL.setBackground(new Color(178, 199, 132));
        CANCEL.setForeground(new Color(0, 0, 0));
    }//GEN-LAST:event_CANCELMouseExited

    private void CANCELMousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_CANCELMousePressed
        CANCEL.setBackground(new Color(153, 0, 255));
    }//GEN-LAST:event_CANCELMousePressed

    private void CANCELMouseReleased(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_CANCELMouseReleased
        CANCEL.setBackground(new Color(133, 133, 133));
    }//GEN-LAST:event_CANCELMouseReleased

    private void CANCELActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_CANCELActionPerformed
        dispose();
        DBConnect.initialization();
    }//GEN-LAST:event_CANCELActionPerformed

    private void CONFIRMMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_CONFIRMMouseEntered
        CONFIRM.setBackground(new Color(133, 133, 133));
        CONFIRM.setForeground(new Color(255, 255, 255));
    }//GEN-LAST:event_CONFIRMMouseEntered

    private void CONFIRMMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_CONFIRMMouseExited
        CONFIRM.setBackground(new Color(178, 199, 132));
        CONFIRM.setForeground(new Color(0, 0, 0));
    }//GEN-LAST:event_CONFIRMMouseExited

    private void CONFIRMMousePressed(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_CONFIRMMousePressed
        CONFIRM.setBackground(new Color(153, 0, 255));
    }//GEN-LAST:event_CONFIRMMousePressed

    private void CONFIRMMouseReleased(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_CONFIRMMouseReleased
        CONFIRM.setBackground(new Color(133, 133, 133));
    }//GEN-LAST:event_CONFIRMMouseReleased

    private void CONFIRMActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_CONFIRMActionPerformed
        DefaultTableModel model = (DefaultTableModel) TABLE.getModel();             // ** This code is to get number of rows
        int r= model.getRowCount();                                                 //    presently in the table.

        if (r == 0){
            JOptionPane.showMessageDialog(rootPane, "Zero rooms is Added.");        // ** If number of rows is zero then display this message.
            
        }else{
            int noofguests = Integer.parseInt(NOOFGUESTS.getText());
            if(noofguests>0){                                                       // Checkink if number of guests is greater than 0.
                int total = 0;                                                      // Total Number of Beds in Rooms selected by current guest

                for (int i = 0; i < room_num.size(); i++) {
                    String roomno = room_num.get(i).toString();
                    try {
                        ResultSet rs = DBConnect.read("SELECT NUMBEROFBEDS from "
                            + "USER01.ROOMSDETAILS where ROOMNUMBER = '" + roomno + "'");
                        if (rs.next()) {
                            int noofbeds = rs.getInt("NUMBEROFBEDS");
                            total = total + noofbeds;
                        }
                    } catch (Exception e) {
                        JOptionPane.showMessageDialog(rootPane, e.getMessage());
                    }
                }

                if (noofguests <= total) {
                    int result = JOptionPane.showConfirmDialog(rootPane, "Are you sure"
                        + " you want to confirm??", "Confirmation Required", 
                        JOptionPane.YES_NO_OPTION, JOptionPane.QUESTION_MESSAGE);
                    if(result == JOptionPane.YES_OPTION){
                        if (jDateChooser2.getDate().after(jDateChooser1.getDate())) {
                        SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
                        String checkindate = sdf.format(jDateChooser1.getDate());
                        String checkoutdate = sdf.format(jDateChooser2.getDate());

                        int rows = TABLE.getRowCount();
                        for (int i = 0; i < rows; i++) {
                            String room_number = (String) room_num.get(i);

                            String query2 = "INSERT INTO USER01.CONFIRMBOOKINGS (USERNAME, "
                                + "ROOMNUMBER, CHECKINDATE, CHECKOUTDATE) VALUES ('"
                                + new DBConnect().getCurrentUser() + "', '" + room_number
                                + "', '" + checkindate + "', '" + checkoutdate + "')";
                            try {
                            DBConnect.insert(query2);
                            DBConnect.setStaying(true);

                            } catch (Exception err) {
                            JOptionPane.showMessageDialog(this, err.getMessage());

                            }

                        }

                        dispose();
                        new ConfirmedBookingPage().setVisible(true); //finding next page which is booking page

                    } else {
                        JOptionPane.showMessageDialog(rootPane, "CheckOut Date cannot be in past...!!");
                        jDateChooser2.setMinSelectableDate(jDateChooser1.getDate());

                    }
                    room_num.clear();
                    }
                
                } else {
                    JOptionPane.showMessageDialog(this, "Number of Guests is more than Number of Beds...!!\nPlease add more Rooms.");
                }
            }else{
                JOptionPane.showMessageDialog(this, "Number of Guests cannot be 0 or empty..!!");
            }
        }
    }//GEN-LAST:event_CONFIRMActionPerformed

    private void formWindowClosed(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosed
    }//GEN-LAST:event_formWindowClosed

    private void NOOFGUESTSCaretUpdate(javax.swing.event.CaretEvent evt) {//GEN-FIRST:event_NOOFGUESTSCaretUpdate
    }//GEN-LAST:event_NOOFGUESTSCaretUpdate

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
                if ("Windows".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(BookingPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(BookingPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(BookingPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(BookingPage.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new BookingPage().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton ADDNEXT;
    private javax.swing.JButton CANCEL;
    private javax.swing.JButton CONFIRM;
    private javax.swing.JButton DELETEPREVIOUS;
    private javax.swing.JCheckBox DELUXE;
    private javax.swing.JLabel GREETINGS;
    private javax.swing.JTextField NOOFGUESTS;
    private javax.swing.JLabel NUMBEROFBEDS;
    private javax.swing.JLabel PRICING;
    private javax.swing.JComboBox<String> ROOMTYPE;
    private javax.swing.JTable TABLE;
    private com.toedter.calendar.JDateChooser jDateChooser1;
    private com.toedter.calendar.JDateChooser jDateChooser2;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextArea jTextArea1;
    private javax.swing.JTextField jTextField1;
    private javax.swing.JTextField jTextField2;
    private javax.swing.JTextField jTextField3;
    private javax.swing.JTextField jTextField6;
    private javax.swing.JTextField jTextField7;
    private javax.swing.JTextField jTextField8;
    private javax.swing.JTextField jTextField9;
    // End of variables declaration//GEN-END:variables
}
