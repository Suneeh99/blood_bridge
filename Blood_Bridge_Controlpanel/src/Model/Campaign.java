/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Model;

/**
 *
 * @author Suneth
 */
public class Campaign {
    private String campaign_id;
    private String time;
    private String date;
    private String location;
    private String Description;
    private String campaign_name;
    private String status;
    private String OrganizerName;

    public Campaign(String campaign_id, String date,String time, String location, String Description, String status) {
        this.campaign_id = campaign_id;
        this.date = date;
        this.time = time;
        this.location = location;
        this.Description = Description;
        this.status = status;
    }

    public Campaign() {
    }

    public String getCampaign_id() {
        return campaign_id;
    }

    public String getTime() {
        return time;
    }

    public String getLocation() {
        return location;
    }

    public String getDescription() {
        return Description;
    }

    public String getCampaign_name() {
        return campaign_name;
    }

    public String getStatus() {
        return status;
    }

    public String getOrganizerName() {
        return OrganizerName;
    }

    public void setCampaign_id(String campaign_id) {
        this.campaign_id = campaign_id;
    }

    public void setTime(String time) {
        this.time = time;
    }

    public void setLocation(String location) {
        this.location = location;
    }

    public void setDescription(String Description) {
        this.Description = Description;
    }

    public void setCampaign_name(String campaign_name) {
        this.campaign_name = campaign_name;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public void setOrganizerName(String OrganizerName) {
        this.OrganizerName = OrganizerName;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }
    
    
    
}
