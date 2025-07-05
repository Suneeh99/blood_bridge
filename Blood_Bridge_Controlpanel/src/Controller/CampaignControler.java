/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Controller;

import Model.Campaign;
import Model.User;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import java.util.HashMap;
/**
 *
 * @author Suneth
 */
public class CampaignControler {

    private final Connection conn;

    public CampaignControler() {
        this.conn = JDBC.connectdb();
    }
    
    public List<Campaign> getCampaign(String status) {

    List<Campaign> campaigns = new ArrayList<>();
    String sql = "SELECT * from campaign WHERE status = ?";

    try {
        PreparedStatement pst = conn.prepareStatement(sql);
        pst.setString(1, status);
        ResultSet rs = pst.executeQuery();
        
        while (rs.next()) {
            // Create a new Campaign object inside the loop
            Campaign campaign = new Campaign();
            
            campaign.setCampaign_id(rs.getString("campaign_id"));
            campaign.setCampaign_name(rs.getString("campaign_name"));
            campaign.setLocation(rs.getString("location"));
            campaign.setTime(rs.getString("time"));
            campaign.setDate(rs.getString("date"));
            
            campaigns.add(campaign); // Add it to the list
        }
    } catch (Exception e) {
        e.printStackTrace();
    }

    return campaigns;
}

    
    public Map<String, Integer> getMonthlyCampaignCount(){
        
        Map<String, Integer> monthlyCampaignCount = new HashMap<>();
        
        String sql  = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month,"
                + "COUNT(*) AS count "
                + "FROM campaign "
                + "WHERE status <> 'pending' "
                + "GROUP BY month";
        
        try {
            PreparedStatement pst = conn.prepareStatement(sql);
            
            ResultSet rs = pst.executeQuery();
            
            while(rs.next()){
                String month = rs.getString("month");
                int count = rs.getInt("count");
                
                monthlyCampaignCount.put(month, count);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return monthlyCampaignCount;
    }
    
    public Map<String, Integer> getCampaignStatus() {
        Map<String, Integer> counts = new HashMap<>();

        String sql = "SELECT "
                   + "COUNT(CASE WHEN status = 'pending' THEN 1 END) AS pending_count, "
                   + "COUNT(CASE WHEN status = 'rejected' THEN 1 END) AS rejected_count, "
                   + "COUNT(CASE WHEN status = 'ongoing' THEN 1 END) AS ongoing_count,"
                   + "COUNT(CASE WHEN status = 'accepted' THEN 1 END) AS accepted_count,"
                   + "COUNT(CASE WHEN status = 'completed' THEN 1 END) AS completed_count "
                   + "FROM campaign";

        try (PreparedStatement pst = conn.prepareStatement(sql);
             ResultSet rs = pst.executeQuery()) {

            if (rs.next()) {
                int pendingCount = rs.getInt("pending_count");
                int rejectedCount = rs.getInt("rejected_count");
                int ongoingCount = rs.getInt("ongoing_count");
                int acceptedCount = rs.getInt("accepted_count");
                int completedCount = rs.getInt("completed_count");

                
                counts.put("Pending", pendingCount);
                counts.put("Rejected", rejectedCount);
                counts.put("Accepted", acceptedCount);
                counts.put("Ongoing", ongoingCount);
                counts.put("Completed", completedCount);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return counts;
    }  

    public Campaign displayCampaign(int campaign_id) {
        Campaign campaign = null;

        String sql = "SELECT * FROM campaign WHERE campaign_id = ?";

            try {
                PreparedStatement pst = conn.prepareStatement(sql);                
                pst.setInt(1, campaign_id);
                
                ResultSet rs = pst.executeQuery();                
                if(rs.next()){
                    campaign = new Campaign();
                    campaign.setCampaign_name(rs.getString("campaign_name"));
                    campaign.setDate(rs.getString("date"));
                    campaign.setTime(rs.getString("time"));
                    campaign.setLocation(rs.getString("location"));
                    campaign.setDescription(rs.getString("Description"));
                }
            } catch (Exception e) {
                e.printStackTrace();
            }
            return campaign;
    }
}
