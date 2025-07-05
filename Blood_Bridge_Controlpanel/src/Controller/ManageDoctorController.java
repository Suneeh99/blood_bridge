/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Controller;

import java.sql.*;
import Model.User;
import java.util.ArrayList;
import java.util.List;


/**
 *
 * @author Suneth
 */
public class ManageDoctorController {
    private final Connection conn;

    public ManageDoctorController() {
        this.conn = JDBC.connectdb();
    }
    
    public boolean addDoctor(User doctor){
        try {
            String sql = "INSERT INTO user(username, password, user_type, fname, lname, contact) VALUES(?,?,?,?,?,?)";
            PreparedStatement pst = conn.prepareStatement(sql); 
            pst.setString(1, doctor.getUsername());
            pst.setString(2, doctor.getPassword());
            pst.setString(3, doctor.getUser_type());
            pst.setString(4, doctor.getFname());
            pst.setString(5, doctor.getLname());
            pst.setString(6, doctor.getContact());
            
            int rs = pst.executeUpdate();
            
            if(rs > 0){
                return true;
            } else{
                return false;
            }
        } catch (Exception e) {
            e.printStackTrace();
            return false;
        }
        
    
    }
    
    public List<User> getDoctors() {
        List<User> doctors = new ArrayList<>();
        String sql = "SELECT * from user WHERE user_type = 'doctor'";

        try {
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();

            while (rs.next()) {
                // Create a new User object for each doctor
                User user = new User();
                user.setUser_id(rs.getString("user_id"));
                user.setFname(rs.getString("fname"));
                user.setLname(rs.getString("lname"));
                user.setUsername(rs.getString("username"));
                user.setContact(rs.getString("contact"));

                // Add the user to the doctors list
                doctors.add(user);
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
        return doctors;
    }

    
    public User searchDoctor(String DocId){
        User doctor = null;
        
        try {
            String sql = "SELECT * from user WHERE user_id = ?";            
            PreparedStatement pst = conn.prepareStatement(sql);            
            pst.setString(1, DocId);
            
            ResultSet rs = pst.executeQuery();
            
            if(rs.next()){
                doctor = new User();
                
                String fname = rs.getString("fname");
                String lname = rs.getString("lname");
                String username = rs.getString("username");
                String contact = rs.getString("contact");
                
                doctor.setFname(fname);
                doctor.setLname(lname);
                doctor.setContact(contact);
                doctor.setUsername(username);
            }                 
                        
        } catch (Exception e) {
            e.printStackTrace();
        }        
        return doctor;        
    } 
    
    public boolean updateDoctor(User doctor){
        
        String sql = "UPDATE user SET fname = ?, lname = ?, username = ?, contact = ? WHERE user_id = ?";
        
        try {
            PreparedStatement pst = conn.prepareStatement(sql);
            
            pst.setString(1, doctor.getFname());
            pst.setString(2, doctor.getLname());
            pst.setString(3, doctor.getUsername());
            pst.setString(4, doctor.getContact());
            pst.setString(5, doctor.getUser_id());
            
            int rs = pst.executeUpdate();
            
            if(rs > 0){
                return true;
            } else {
                return false;
            }
            
        } catch (Exception e) {
            e.printStackTrace();
            return false;
        }
    }
    
    public boolean deleteDoctor(String DocId){
        
        String sql = "DELETE from user WHERE user_id = ? AND user_type = 'doctor'";
        
        try {
            
            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1, DocId);
            
            int rs = pst.executeUpdate();
            
            if(rs > 0){
                return true;            
            } else {
                return false;
            }
        } catch (Exception e) {
            e.printStackTrace();
            return false;
        }
        
    }
}
