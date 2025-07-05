/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Controller;
import Model.Campaign;
import Model.EligibilityForm;
import Model.MedicalRecord;
import Model.User;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author Suneth
 */
public class AgentController implements IAgentController{
    
    private final Connection conn;

    public AgentController() {
        this.conn = JDBC.connectdb();
    }
    
    
    @Override
        public List<Campaign> getCampaign(){
        
            List<Campaign> campaigns = new ArrayList<>();

            String sql = "SELECT * from campaign WHERE status = ?";

            try {
                PreparedStatement pst = conn.prepareStatement(sql);

                pst.setString(1, "ongoing");

                ResultSet rs = pst.executeQuery();


                
                while(rs.next()){
                    Campaign campaign = new Campaign(); // create campaign object
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
        
        
        @Override
        public List<User> getDonor(String Id){
            
            List<User> donors = new ArrayList<>(); // create donors list for store donor object
            String sql = "SELECT u.user_id, u.fname, u.lname, u.contact "
                            + "FROM user u "
                            + "JOIN donor d ON u.user_id = d.user_id "
                            + "JOIN blood_donation_donor bd ON d.donor_id = bd.donor_id "
                            + "JOIN eligibility e ON d.donor_id = e.donor_id AND bd.campaign_id = e.campaign_id "
                            + "WHERE bd.campaign_id = ? AND bd.status = 'pending' AND e.eligibility_1 = 'pending' AND e.eligibility_2 = 'pending'";

            
            try {
                PreparedStatement pst = conn.prepareStatement(sql);
                
                pst.setString(1, Id);
                
                ResultSet rs = pst.executeQuery();
                
                while(rs.next()){
                    
                    User donor = new User();
                    //set values to donor class
                    donor.setUser_id(rs.getString("u.user_id"));
                    donor.setFname(rs.getString("u.fname"));
                    donor.setLname(rs.getString("u.lname"));
                    donor.setContact(rs.getString("u.contact"));
                    // add donor to the list
                    donors.add(donor);
                }
            } catch (Exception e) {
                e.printStackTrace();
            }
            
            return donors; // return donor list
        }
        
        
        @Override
        public EligibilityForm getEligibilityForm(String user_id, String campaign_id){
            
            EligibilityForm form = null; // intialise 
            
            String sql = "SELECT * from eligibilityform "
                    + "WHERE campaign_id = ? "
                    + "AND donor_id IN (SELECT donor_id from donor "
                    + "WHERE user_id = ? )";
            
            try {
                PreparedStatement pst = conn.prepareStatement(sql);                
                pst.setString(1, campaign_id);
                pst.setString(2, user_id);
                
                ResultSet rs = pst.executeQuery();                
                if(rs.next()){
                    form = new EligibilityForm();
                    form.setPrevious_donation(rs.getString("previous_donation"));
                    form.setChronic_illnesses(rs.getString("chronic_illnesses"));
                    form.setRecent_surgeries(rs.getString("recent_surgeries"));
                    form.setCurrent_medications(rs.getString("current_medications"));
                    form.setAllergies(rs.getString("allergies"));
                    form.setBlood_transfusion(rs.getString("blood_transfusion"));
                    form.setSmoking_alcohol(rs.getString("smoking_alcohol"));
                    form.setRecent_travel(rs.getString("recent_travel"));
                    form.setTattoos_piercings(rs.getString("tattoos_piercings"));
                    form.setRisk_behavior(rs.getString("risk_behavior"));
                    form.setCurrent_symptoms(rs.getString("current_symptoms"));
                    form.setRecent_illnesses(rs.getString("recent_illnesses"));
                    form.setPregnancy_status(rs.getString("pregnancy_status"));
                    form.setValid_id(rs.getString("valid_id"));
                }
            } catch (Exception e) {
                e.printStackTrace();
            }
            return form;
        }
        @Override
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
        @Override
        public boolean updateEligibility(String user_id, String campaign_id, String status){
            String sql = "UPDATE eligibility SET eligibility_1 = ? "
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
        @Override
        public boolean updateCampaignStatus(String campaign_id, String status){
            String sql = "UPDATE campaign SET status = ? "
                    + "WHERE campaign_id = ?";
            try {
                PreparedStatement pst = conn.prepareStatement(sql);

                pst.setString(1, status);
                pst.setString(2, campaign_id);
                
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
        @Override
        public int getEnrolledDonor(int Campaign_id){
            String sql = "SELECT COUNT(*) AS count FROM eligibility WHERE campaign_id = ? ";
            int enrolledCount = 0;
            try {
                PreparedStatement pst = conn.prepareStatement(sql);
                
                pst.setInt(1, Campaign_id);
                ResultSet rs = pst.executeQuery();
                if (rs.next()) {
                    enrolledCount = rs.getInt("count");
                }
                
            } catch (Exception e) {
                e.printStackTrace();
            }
            return enrolledCount;
        }
        @Override
        public int getSuccessDonor(int campaignId) {
            String sql = "SELECT COUNT(*) AS count FROM eligibility WHERE campaign_id = ? AND (eligibility_1 = 'approved' OR eligibility_2 = 'approved')";
            int suucessCount = 0;
            try {
                PreparedStatement pst = conn.prepareStatement(sql);
                pst.setInt(1, campaignId);
                ResultSet rs = pst.executeQuery();
                if (rs.next()) {
                    suucessCount = rs.getInt("count");
                }
            } catch (Exception e) {
                e.printStackTrace();
            }
            return suucessCount;
        }

        
}

