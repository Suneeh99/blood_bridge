package Controller;
import java.sql.*;
import javax.swing.JOptionPane;


public class JDBC {
    public static void main(String[] args) {
        connectdb();
    }
    public static Connection connectdb() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/blood_bridge", "root", "5un3th");
            System.out.println("Success");
            return conn;
        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e);
            return null;
        }
    }
}

