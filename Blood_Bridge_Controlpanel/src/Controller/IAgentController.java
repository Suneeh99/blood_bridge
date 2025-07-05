/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package Controller;

import Model.Campaign;
import Model.EligibilityForm;
import Model.MedicalRecord;
import Model.User;
import java.util.List;

public interface IAgentController {

    List<Campaign> getCampaign();
    
    List<User> getDonor(String Id);
    
    EligibilityForm getEligibilityForm(String user_id, String campaign_id);
    
    boolean updateRecord(MedicalRecord medical);
    
    boolean updateEligibility(String user_id, String campaign_id, String status);
    
    boolean updateCampaignStatus(String campaign_id, String status);
    
    int getEnrolledDonor(int Campaign_id);
    
    int getSuccessDonor(int campaignId);
}
