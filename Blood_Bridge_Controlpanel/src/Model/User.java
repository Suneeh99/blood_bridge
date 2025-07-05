/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Model;

/**
 *
 * @author Suneth
 */
public class User {
    
    private String user_id;
    private String username;
    private String password;
    private String user_type;
    private String fname;
    private String lname;
    private String contact;

    public User(String username, String password, String user_type, String fname, String lname, String contact) {
        this.username = username;
        this.password = password;
        this.user_type = user_type;
        this.fname = fname;
        this.lname = lname;
        this.contact = contact;
    }

    public User() {
    }
    

    public String getUser_id() {
        return user_id;
    }

    public String getUsername() {
        return username;
    }

    public String getPassword() {
        return password;
    }

    public String getUser_type() {
        return user_type;
    }

    public String getFname() {
        return fname;
    }

    public String getLname() {
        return lname;
    }

    public String getContact() {
        return contact;
    }

    public void setUser_id(String user_id) {
        this.user_id = user_id;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public void setUser_type(String user_type) {
        this.user_type = user_type;
    }

    public void setFname(String fname) {
        this.fname = fname;
    }

    public void setLname(String lname) {
        this.lname = lname;
    }

    public void setContact(String contact) {
        this.contact = contact;
    }
 
    
}
