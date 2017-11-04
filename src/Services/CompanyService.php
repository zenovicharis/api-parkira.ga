<?php

namespace Parkiraga\Services;
use Parkiraga\Models\Company;
use Symfony\Component\Config\Definition\Exception\Exception;

class CompanyService
{
    public function __construct() { }
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
            $company = Company::find($id);
            return $company->to_array();
        }catch(Exception $e){
            return $e;
        }
    }

    protected function toCompanyArray($companies){
        $array = array();
        foreach($companies as $company){
            $array[] = $company->to_array();
        }
        return $array;
    }

}


