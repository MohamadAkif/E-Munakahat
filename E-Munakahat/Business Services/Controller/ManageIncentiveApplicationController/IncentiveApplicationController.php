<?php

class IncentiveApplicationController
{
    private $model;

    public function __construct (IncentiveApplicationRecord $model)
    {
        $this->model = $model;
    }

    //to send form from IncentiveApplication to model
    public function sendForm($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $applicant_address)
    {
        $this->model->sendForm($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender, $applicant_age, $applicant_salary, $applicant_address);
    }

        //send all applicant info from database to IncentiveApplicationList class
    public function sendAllApplicant()
    {
        return $this->model->viewAllApplication();
    }

    //searh applicant ic number and send the information back to NewApplicationPage
    public function searchIC($applicantIC)
    {
        $this->model->searchIC($applicantIC);
        return $this->model->searchIC($applicantIC);
    }


    //retrieve applicant data from database to be viewed by JAIP staff in UpdateApplicationStatus 
    public function viewDetail($applicantIC)
    {
       // $this->model->viewDetail($applicantIC);
        return $this->model->viewDetail($applicantIC);
    }

    //send the applicant detail from UpdateIncentiveStatus to model
    public function apptInfo($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $applicant_address)
    {
        $this->model->apptInfo($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $applicant_address);
    }


    //send the appointment detail from model to ViewApplicationInformation
    public function viewAppt($applicantIC)
    {
       //$this->model->viewDetail($applicantIC);
        return $this->model->viewAppt($applicantIC);
    }
    
}