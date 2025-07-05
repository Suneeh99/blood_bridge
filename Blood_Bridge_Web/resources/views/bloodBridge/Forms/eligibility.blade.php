@extends('layout')

@section('content')

<div class="form-body">
    <form class='hidden-l eligibilityForm-form' id="form" action="{{ route('eligibilityForm.store', $campaign_name) }}" method="POST">
        @csrf
        <h1 class='text-center mb-5'>Eligibility Application</h1>
        <div id="formData">
                <p class="form-label">Full Name : {{ $user->fname }} {{ $user->lname }}</p>
                <p class="form-label">Contact Number : {{ $user->contact }}</p>
                <p class="form-label">Address : {{ $user->donor->address }}</p>
                <!-- Calculate age from DOB -->
                @php
                    $dob = new DateTime($user->donor->dob); // Donor's DOB
                    $today = new DateTime(); // Current date
                    $age = $today->diff($dob)->y; // Calculate age in years
                @endphp
                <p class="form-label">Age : {{ $age }}</p>
            <h3 class="mt-4">Medical History</h3>
            <div class="form-check my-2">
                <input type="checkbox" class="form-check-input" name="previousDonation" />
                <label class="form-check-label" for="previousDonation">
                    Previous Blood Donations (Yes/No)
                </label>
            </div>

            <label for="chronicIllnesses" class="form-label">Chronic Illnesses</label>
            <input type="text" class="form-control" name="chronicIllnesses" placeholder="e.g., diabetes, hypertension" />

            <label for="recentSurgeries" class="form-label">Recent Surgeries or Medical Procedures</label>
            <textarea class="form-control" name="recentSurgeries" rows="2" placeholder="Mention if any"></textarea>

            <label for="currentMedications" class="form-label">Current Medications</label>
            <textarea class="form-control" name="currentMedications" rows="2" placeholder="List medications"></textarea>

            <label for="allergies" class="form-label">Allergies</label>
            <input type="text" class="form-control" name="allergies" placeholder="List any allergies" />

            <label for="bloodTransfusion" class="form-label">History of Blood Transfusion</label>
            <input type="text" class="form-control" name="bloodTransfusion" placeholder="Mention if any" />

            <h3 class="mt-4">Lifestyle Questions</h3>

            <label for="smokingAlcohol" class="form-label">Smoking and Alcohol Use</label>
            <input type="text" class="form-control" name="smokingAlcohol" placeholder="Specify details" />

            <label for="recentTravel" class="form-label">Recent Travel History</label>
            <textarea class="form-control" name="recentTravel" rows="2" placeholder="List places visited"></textarea>

            <label for="tattoosPiercings" class="form-label">Recent Tattoos or Piercings</label>
            <input type="text" class="form-control" name="tattoosPiercings" placeholder="Specify if any" />

            <div class="form-check my-2">
                <input type="checkbox" class="form-check-input" name="riskBehavior" required />
                <label class="form-check-label" for="riskBehavior">
                    Free from Risk Behaviors (e.g., drug use, unprotected sex)
                </label>
            </div>

            <h3 class="mt-4">Health Status</h3>

            <label for="currentSymptoms" class="form-label">Current Symptoms</label>
            <textarea class="form-control" name="currentSymptoms" rows="2" placeholder="e.g., fever, cough, fatigue"></textarea>

            <label for="recentIllnesses" class="form-label">Recent Illnesses</label>
            <textarea class="form-control" name="recentIllnesses" rows="2" placeholder="e.g., flu, cold, COVID-19"></textarea>

            <label for="pregnancyStatus" class="form-label">Pregnancy Status (if applicable)</label>
            <input type="text" class="form-control" name="pregnancyStatus" placeholder="Specify if applicable" />

            
            <div class="form-check my-2">
                <input type="checkbox" class="form-check-input" name="validId" />
                <label class="form-check-label" for="validId">
                    Have a valid identity card or any other document to prove identity
                </label>
            </div>

            <h3 class="mt-4">Eligibility Confirmation</h3>

            <div class="form-check my-2">
                <input type="checkbox" class="form-check-input" name="consent" reqired />
                <label class="form-check-label" for="consent">
                    Consent to Blood Donation
                </label>
            </div>

            <div class="form-check my-2">
                <input type="checkbox" class="form-check-input" name="trueInfo" required />
                <label class="form-check-label" for="trueInfo">
                    Declaration of True Information
                </label>
            </div>

            <div class="form-check my-2">
                <input type="checkbox" class="form-check-input" id="healthScreening" required />
                <label class="form-check-label" for="healthScreening">
                    Agreement to Undergo Health Screening
                </label>
            </div>
        </div>
        <div class="text-center my-4">
            <button type="submit" class="btn btn-md-lg btn-outline-danger">Submit Application</button>
        </div>
    </form>

</div>

@endsection
