<?php

class formFacade
{
    private $formController;
   

    public function __construct(IncentiveApplicationController $formController)
    {
        $this->formController = $formController;
        
    }

    //from IncentiveApplication to controller
    public function submitForm($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $applicant_address)
    {
        $this->formController->sendForm($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $applicant_address);
    }

    //from sendAllApplicant to viewApplicant in IncentiveApplicationList class
    public function viewApplicant()
    {
        return $this->formController->sendAllApplicant();
        
    }

    public function searchIC($applicantIC)
    {
        $this->formController->searchIC($applicantIC);
        return $this->formController->searchIC($applicantIC);    
    }

    public function viewDetail($applicantIC)
    {
       // $this->formController->viewDetail($applicantIC);
        return $this->formController->viewDetail($applicantIC);
    }

    public function apptDetail($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $applicant_address)
    {
        $this->formController->apptDetail($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $applicant_address);
    }

    public function viewAppt($applicantIC)
    {
       //$this->formController->viewDetail($applicantIC);
        return $this->formController->viewAppt($applicantIC);
    }
    
    public function EditInformation($applicant_name, $applicant_age, $applicant_salary, $applicant_address)
    {
        $this->formController->EditInformation($applicant_name, $applicant_age, $applicant_salary, $applicant_address);
    }
    
}

?>