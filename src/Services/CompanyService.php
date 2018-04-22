<?php

namespace Parkiraga\Services;
use Parkiraga\Models\Company;
use Parkiraga\EntityModels\CompanyEntityModel;
use Symfony\Component\Config\Definition\Exception\Exception;

class CompanyService
{
    public function __construct() { }

    public function createCompany(CompanyEntityModel $company){
        try{
            $company = Company::create([
                "name" => $company->name,
                "address" => $company->address,
                "capacity" => (int) $company->capacity,
                "places_taken" => (int)$company->places_taken,
                "cost_per_hour" =>(int) $company->cost_per_hour,
                "user_id" => (int)$company->user_id,
                "country" => "Srb",
            ]);
            return (int)$company->id;
            // must replace with safer method
        } catch (Exception $e){
            return false;
        }
    }

    public function updateCompany(CompanyEntityModel $entityCompany, $id){
        try{
            $company = Company::find($id);
            $company->update_attributes([
                "name" => $entityCompany->name,
                "address" => $entityCompany->address,
                "capacity" => (int) $entityCompany->capacity,
                "places_taken" => (int)$entityCompany->places_taken,
                "cost_per_hour" =>(int) $entityCompany->cost_per_hour,
                "user_id" => (int)$entityCompany->user_id,
                "country" => "Srb",
            ]);
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    public function deleteCompany($id){
        try{
            $company = Company::find($id);
            $company->delete();
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

    // protected functions

    protected function toCompanyArray($companies){
        $array = array();
        foreach($companies as $company){
            $array[] = $company->to_array();
        }
        return $array;
    }

}


