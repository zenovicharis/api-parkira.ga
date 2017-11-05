<?php

namespace Parkiraga\Services;
use Parkiraga\Models\Company;
use Symfony\Component\Config\Definition\Exception\Exception;

class CompanyService
{
    public function __construct() { }
    public function updateCompany($id,$name){
        try{
            $company = Company::find($id);
            $company->update_attributes(array('name' => $name));
            return true;
        } catch (Exception $e){
            return false;
        }
    }
    public function getCompaniesAll(){
        try{
            $companies = Company::all();
            $companiesInArray = $this->toCompanyArray($companies);
            return $companiesInArray;
        }catch(Exception $e) {
            return false;
        }
    }

    public function getCompanyById($id){
        try{
            $company = Company::find($id,['include' => ['users']]);
            return $company->serialize();
        }catch(Exception $e){
            return $e;
        }
    }

    // protected function /

    protected function toCompanyArray($companies){
        $array = array();
        foreach($companies as $company){
            $array[] = $company->to_array();
        }
        return $array;
    }

}


