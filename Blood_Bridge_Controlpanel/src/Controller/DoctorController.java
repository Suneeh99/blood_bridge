/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Controller;
import Model.Campaign;
import Model.MedicalRecord;
import Model.User;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author Suneth
 */
public class DoctorController {
    
    private final Connection conn;

    public DoctorController() {
        this.conn = JDBC.connectdb();
    }
    
        public List<Campaign> getCampaign(){
        
        List<Campaign> campaigns = new ArrayList<>();

        String sql = "SELECT * from campaign WHERE status = ?";
        
        try {
            PreparedStatement pst = conn.prepareStatement(sql);
        
            pst.setString(1, "ongoing");
            
            ResultSet rs = pst.executeQuery();
            
            
            while(rs.next()){
                Campaign campaign = new Campaign();
                campaign.setCampaign_id(rs.getString("campaign_id"));
                campaign.setCampaign_name(rs.getString("campaign_name"));
                campaign.setLocation(rs.getString("location"));
                campaign.setTime(rs.getString("time"));
                campaign.setDate(rs.getString("date"));                
                campaigns.add(campaign);
            }            
        
        } catch (Exception e) {
            e.printStackTrace();
        }        
       return campaigns; 
    }
        
        public List<User> getDonor(String Id){
            
            List<User> donors = new ArrayList<>();
            String sql = "SELECT u.user_id, u.fname, u.lname, u.contact "
                        + "FROM user u "
                        + "JOIN donor d ON u.user_id = d.user_id "
                        + "JOIN eligibility e ON d.donor_id = e.donor_id "
                        + "WHERE e.campaign_id = ? AND e.eligibility_1 = 'approved' AND e.eligibility_2 = 'pending'";

            
            try {
                PreparedStatement pst = conn.prepareStatement(sql);
                
                pst.setString(1, Id);
                
                ResultSet rs = pst.executeQuery();
                
                while(rs.next()){
                    
                    User donor = new User();
                    
                    donor.setUser_id(rs.getString("u.user_id"));
                    donor.setFname(rs.getString("u.fname"));
                    donor.setLname(rs.getString("u.lname"));
                    donor.setContact(rs.getString("u.contact"));
                    
                    donors.add(donor);
                }
            } catch (Exception e) {
                e.printStackTrace();
            }
            
            return donors;
        }
        
        
        public MedicalRecord getMedicalRecords(String user_id){
            
            MedicalRecord medical = null;

            String sql = "SELECT * from medical_record "
                    + "WHERE donor_id IN (SELECT donor_id from donor "
                    + "WHERE user_id = ? )";
            
            try {
                PreparedStatement pst = conn.prepareStatement(sql);                
                pst.setString(1, user_id);
                
                ResultSet rs = pst.executeQuery();                
                if(rs.next()){
                    medical = new MedicalRecord(rs.getString("donor_id"), rs.getString("allergies"), rs.getString("surgeries"), rs.getString("illnesses"));
                    System.out.println(medical);
                }
            } catch (Exception e) {
                e.printStackTrace();
            }
            return medical;
        }
        
        public boolean updateRecord(MedicalRecord medical){
            String sql = "UPDATE medical_record SET allergies = ?, surgeries = ?, illnesses = ? "
                    + "WHERE donor_id IN (SELECT donor_id from donor "
                    + "WHERE user_id = ?)";
        
            try {
                PreparedStatement pst = conn.prepareStatement(sql);

                pst.setString(1, medical.getAllergies());
                pst.setString(2, medical.getSurgeries());
                pst.setString(3, medical.getIllnesses());
                pst.setString(4, medical.getDonor_id());

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
        
        public boolean updateEligibility(String user_id, String campaign_id, String status){
            String sql = "UPDATE eligibility SET eligibility_2 = ? "
                    + "WHERE campaign_id = ? AND donor_id IN (SELECT donor_id from donor "
                    + "WHERE user_id = ?)";
        
            try {
                PreparedStatement pst = conn.prepareStatement(sql);

                pst.setString(1, status);
                pst.setString(2, campaign_id);
                pst.setString(3, user_id);
                
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

