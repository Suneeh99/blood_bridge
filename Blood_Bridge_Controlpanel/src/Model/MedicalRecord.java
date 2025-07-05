/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Model;

/**
 *
 * @author Suneth
 */
public class MedicalRecord {
    
    private String donor_id;
    private String allergies;
    private String surgeries;
    private String illnesses;

    public MedicalRecord(String donor_id, String allergies, String surgeries, String illnesses) {
        this.donor_id = donor_id;
        this.allergies = allergies;
        this.surgeries = surgeries;
        this.illnesses = illnesses;
    }

    public String getDonor_id() {
        return donor_id;
    }

    public String getAllergies() {
        return allergies;
    }

    public String getSurgeries() {
        return surgeries;
    }
    
    public String getIllnesses() {
        return illnesses;
    }

    public void setDonor_id(String donor_id) {
        this.donor_id = donor_id;
    }

    public void setAllergies(String allergies) {
        this.allergies = allergies;
    }

    public void setSurgeries(String surgeries) {
        this.surgeries = surgeries;
    }

    public void setIllnesses(String illnesses) {
        this.illnesses = illnesses;
    }
    
    
}
