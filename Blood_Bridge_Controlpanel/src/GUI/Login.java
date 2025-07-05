/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JFrame.java to edit this template
 */
package GUI;

import Controller.JDBC;
import Controller.UserController;
import Model.User;
import java.awt.event.KeyEvent;
import java.sql.*;
import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.SwingWorker;
import javax.swing.Timer;


public class Login extends javax.swing.JFrame {

    private final UserController controller;
    public Login() {
        controller = new UserController();
        initComponents();
        this.setLocationRelativeTo(null);

    }
    private void setFrameIcon() {
    setIconImage(new ImageIcon(getClass().getResource("logo.png")).getImage());
}

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jFrame1 = new javax.swing.JFrame();
        pnl_login = new javax.swing.JPanel();
        txt_password = new rojerusan.RSPasswordTextPlaceHolder();
        txt_username = new app.bolivia.swing.JCTextField();
        btn_login = new rojerusan.RSMaterialButtonRectangle();
        lbl_bg = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setAutoRequestFocus(false);
        setBackground(new java.awt.Color(204, 255, 204));
        setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));
        setIconImages(null);
        setResizable(false);
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        pnl_login.setBackground(new java.awt.Color(255, 255, 255));
        pnl_login.setForeground(new java.awt.Color(255, 255, 255));
        pnl_login.setFont(new java.awt.Font("Ubuntu", 0, 12)); // NOI18N
        pnl_login.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        txt_password.setBackground(new java.awt.Color(228, 216, 211));
        txt_password.setBorder(null);
        txt_password.setForeground(new java.awt.Color(0, 0, 0));
        txt_password.setFont(new java.awt.Font("Segoe UI", 0, 15)); // NOI18N
        txt_password.setPhColor(new java.awt.Color(0, 0, 0));
        txt_password.setPlaceholder("Password");
        txt_password.setSelectionColor(new java.awt.Color(204, 51, 0));
        txt_password.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_passwordActionPerformed(evt);
            }
        });
        pnl_login.add(txt_password, new org.netbeans.lib.awtextra.AbsoluteConstraints(420, 320, -1, 40));

        txt_username.setBackground(new java.awt.Color(228, 216, 211));
        txt_username.setBorder(null);
        txt_username.setFont(new java.awt.Font("Segoe UI", 0, 15)); // NOI18N
        txt_username.setPlaceholder("Username");
        txt_username.setSelectionColor(new java.awt.Color(255, 51, 0));
        txt_username.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txt_usernameActionPerformed(evt);
            }
        });
        txt_username.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyPressed(java.awt.event.KeyEvent evt) {
                txt_usernameKeyPressed(evt);
            }
        });
        pnl_login.add(txt_username, new org.netbeans.lib.awtextra.AbsoluteConstraints(430, 240, 200, 30));

        btn_login.setBackground(new java.awt.Color(204, 0, 51));
        btn_login.setText("Login");
        btn_login.setFont(new java.awt.Font("Ubuntu", 1, 18)); // NOI18N
        btn_login.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btn_loginActionPerformed(evt);
            }
        });
        pnl_login.add(btn_login, new org.netbeans.lib.awtextra.AbsoluteConstraints(460, 380, 110, 50));

        lbl_bg.setFont(new java.awt.Font("Segoe UI", 0, 14)); // NOI18N
        lbl_bg.setIcon(new javax.swing.ImageIcon(getClass().getResource("/GUI/imgs/1.gif"))); // NOI18N
        pnl_login.add(lbl_bg, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, -20, -1, 580));

        getContentPane().add(pnl_login, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 1030, 580));

        setBounds(0, 0, 1040, 587);
    }// </editor-fold>//GEN-END:initComponents

    private void btn_loginActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btn_loginActionPerformed
        String username = txt_username.getText();
        String password = String.valueOf(txt_password.getPassword());
        String hPassword = PasswordHashing.Hash(password);
        User user = new User();
        
        
        if(username.isEmpty() || password.isEmpty()){
            JOptionPane.showMessageDialog(null, "Username and Password is required.", "Error", JOptionPane.ERROR_MESSAGE);
        } else{
            user.setUsername(username);
            user.setPassword(hPassword);
            
                Waiting obj = new Waiting();
                obj.setVisible(true);
                
                // Use SwingWorker to handle the delay and switching
            SwingWorker<Void, Void> worker = new SwingWorker<>() {
                @Override
                protected Void doInBackground() throws InterruptedException {
                    // Simulate a delay for loading
                    Thread.sleep(2000);
                    return null;
                }
                
                @Override
                protected void done() {
                    obj.dispose(); // Close the loading screen
                    
                    String userType = controller.authenticateUser(user);
                    
                    if (userType.isEmpty()) {                
                        JOptionPane.showMessageDialog(null, "Invalid Username or Password. Try Again", "Error", JOptionPane.ERROR_MESSAGE);
                        txt_username.setText("");
                        txt_password.setText("");
                        
                        
                    } else {
                        switch (userType) {
                            case "admin":
                                ADashboard adminDashboard = new ADashboard();
                                adminDashboard.setVisible(true);
                                break;
                            case "doctor":
                                DDashboard doctorDashboard = new DDashboard();
                                doctorDashboard.setVisible(true);
                                break;
                            case "agent":
                                AgDashboard agentDashboard = new AgDashboard();
                                agentDashboard.setVisible(true);
                                break;
                            default:
                                JOptionPane.showMessageDialog(null, "Invalid Username or Password. Try Again", "Error", JOptionPane.ERROR_MESSAGE);
                                break;
                        }
                        dispose(); 
                    }
                }
            };
            
            worker.execute();
        }
                    
    }//GEN-LAST:event_btn_loginActionPerformed

    private void txt_usernameActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_usernameActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_usernameActionPerformed

    private void txt_passwordActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txt_passwordActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txt_passwordActionPerformed

    private void txt_usernameKeyPressed(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_txt_usernameKeyPressed
        if(evt.getKeyCode() == KeyEvent.VK_DOWN){
            txt_password.requestFocus();
        }
        if(evt.getKeyCode() == KeyEvent.VK_ENTER){
            btn_login.doClick();
        }
    }//GEN-LAST:event_txt_usernameKeyPressed

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
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Login.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Login().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private rojerusan.RSMaterialButtonRectangle btn_login;
    private javax.swing.JFrame jFrame1;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JLabel lbl_bg;
    private javax.swing.JPanel pnl_login;
    private rojerusan.RSPasswordTextPlaceHolder txt_password;
    private app.bolivia.swing.JCTextField txt_username;
    // End of variables declaration//GEN-END:variables
}
