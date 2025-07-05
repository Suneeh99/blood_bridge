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
public class ManageAgentController {
    private final Connection conn;

    public ManageAgentController() {
        this.conn = JDBC.connectdb();
    }
    
    public boolean addAgent(User agent){
        try {
            String sql = "INSERT INTO user(username, password, user_type, fname, lname, contact) VALUES(?,?,?,?,?,?)";
            PreparedStatement pst = conn.prepareStatement(sql); 
            pst.setString(1, agent.getUsername());
            pst.setString(2, agent.getPassword());
            pst.setString(3, agent.getUser_type());
            pst.setString(4, agent.getFname());
            pst.setString(5, agent.getLname());
            pst.setString(6, agent.getContact());
            
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
    
    public List<User> getAgents(){
        
        List<User> agents = new ArrayList<>();
        String sql = "SELECT * from user WHERE user_type ='agent'";
        
        try {
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            
            while(rs.next()){
                String id = rs.getString("user_id");
                String fname = rs.getString("fname");
                String lname = rs.getString("lname");
                String username  = rs.getString("username");
                String contact = rs.getString("contact");
                
                User user = new User();
                
                user.setUser_id(id);
                user.setFname(fname);
                user.setLname(lname);
                user.setUsername(username);
                user.setContact(contact);
                
                agents.add(user);
            }
            
        } catch (Exception e) {
            e.printStackTrace();
        }
        return agents;
    }
    
    public User searchAgent(String AgentId){
        User agent = null;
        
        try {
            String sql = "SELECT * from user WHERE user_id = ?";
            
            PreparedStatement pst = conn.prepareStatement(sql);
            
            pst.setString(1, AgentId);
            
            ResultSet rs = pst.executeQuery();
            
            if(rs.next()){
                agent = new User();
                
                String fname = rs.getString("fname");
                String lname = rs.getString("lname");
                String username = rs.getString("username");
                String contact = rs.getString("contact");
                
                agent.setFname(fname);
                agent.setLname(lname);
                agent.setContact(contact);
                agent.setUsername(username);
            }                 
                        
        } catch (Exception e) {
            e.printStackTrace();
        }        
        return agent;        
    } 
    
    public boolean updateAgent(User agent){
        
        String sql = "UPDATE user SET fname = ?, lname = ?, username = ?, contact = ? WHERE user_id = ? AND user_type = 'agent' ";
        
        try {
            PreparedStatement pst = conn.prepareStatement(sql);
            
            pst.setString(1, agent.getFname());
            pst.setString(2, agent.getLname());
            pst.setString(3, agent.getUsername());
            pst.setString(4, agent.getContact());
            pst.setString(5, agent.getUser_id());
            
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
    
    public boolean deleteAgent(String AgentId){
        
        String sql = "DELETE from user WHERE user_id = ? AND user_type = 'agent'";
        
        try {
            
            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1, AgentId);
            
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
