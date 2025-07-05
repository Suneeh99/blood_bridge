/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Controller;

import Model.User;
import java.sql.*;

/**
 *
 * @author Suneth
 */
public class UserController {
   
    private final Connection conn;

    public UserController() {
        this.conn = JDBC.connectdb();
    }
    
    public String authenticateUser(User user){
        
        String username = user.getUsername();
        String password = user.getPassword();
        
        String sql = "SELECT user_type from user WHERE username = ? AND password = ?";
        
        try {
            PreparedStatement pst = conn.prepareStatement(sql);
            
            pst.setString(1, username);
            pst.setString(2, password);
            
            ResultSet rs = pst.executeQuery();
            
            if(rs.next()){
                String user_type = rs.getString("user_type");                
                return user_type;
            }
        } catch (Exception e) {
            e.printStackTrace();
            return "";
        }
        return "";
    }
}
