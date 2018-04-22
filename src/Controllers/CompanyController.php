<?php
// never put logic here :( 
namespace Parkiraga\Controllers;

use Parkiraga\Services\CompanyService;
use Parkiraga\EntityModels\CompanyEntityModel;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Parkiraga\Application;

class CompanyController
{
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function create(Request $request, Response $response){
        $company = $this->extractCompany($request);
        $succesfull = $this->companyService->createCompany($company);
        return is_int($succesfull) ? $response->withStatus(201)->withBody($this->setBodyId($response, $succesfull)) : $response->withStatus(500);
    }

    public function update(Request $request, Response $response, $id){
        $company = $this->extractCompany($request);
        $succesfull = $this->companyService->updateCompany($company,$id);
        return $succesfull ? $response->withStatus(201) : $response->withStatus(500);
    }

    public function delete(Request $request, Response $response, $id){
        $succesfull = $this->companyService->deleteCompany($id);
        return $succesfull ? $response->withStatus(201) : $response->withStatus(500);
    }

    public function getCompanies(Request $request, Response $response){
        $companies = $this->companyService->getCompaniesAll();
        return $response->withJson($companies, 200);
    }

    public function getCompany(Request $request, Response $response, $id){
        $company = $this->companyService->getCompanyById($id);
        return $response->withJson($company, 200);
    }

    private function extractCompany(Request $request){
        $name = $request->getParam("name");
        $address = $request->getParam("address");
        $capacity = $request->getParam("capacity");
        $places_taken = $request->getParam("places_taken");
        $cost_per_hour = $request->getParam("cost_per_hour");
        $user_id = $request->getParam("user_id");
        // TODO: Implement validation for Company
        $company = new CompanyEntityModel($name, $address, $capacity, $places_taken, $cost_per_hour, $user_id);
        return $company;
    }

    private function setBodyId(Response $response, $id){
        $body = $response->getBody();
        $body->write($id);
        return $body;
    }
}

