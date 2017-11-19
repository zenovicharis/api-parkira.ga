<?php
// never put logic here :( 
namespace Parkiraga\Controllers;

use Parkiraga\Services\CompanyService;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Parkiraga\Application;

class CompanyController
{
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }
    public function update(Request $request, Response $response, $id){
        $name = $request->getParam("name");
        $succesfull = $this->companyService->updateCompany($id,$name);
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
}

