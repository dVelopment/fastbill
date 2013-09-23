<?php

namespace DVelopment\FastBill;

use DVelopment\Curl\Client;
use DVelopment\Curl\Http\GetRequest;
use DVelopment\FastBill\Model\Customer;
use DVelopment\FastBill\Model\CustomerFbApi;
use DVelopment\FastBill\Model\Project;
use DVelopment\FastBill\Model\ProjectFbApi;
use DVelopment\FastBill\Model\Request\CustomerRequest;
use DVelopment\FastBill\Model\Request\DeleteRequest;
use DVelopment\FastBill\Model\Request\ProjectRequest;
use DVelopment\FastBill\Model\Request\Request;
use DVelopment\FastBill\Model\Request\TimeRequest;
use DVelopment\FastBill\Model\Time;
use DVelopment\FastBill\Model\TimeFbApi;
use DVelopment\FastBill\Serializer\SerializerWrapper;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 18:31
 */

class Api
{
    const API_BASE_URL = 'https://my.fastbill.com/api/1.0/api.php';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @param string $username
     * @param string $apiKey
     */
    public function __construct($username, $apiKey)
    {
        $this->username = $username;
        $this->apiKey = $apiKey;

        $this->serializer = SerializerBuilder::create()
            ->setCacheDir(__DIR__ . '/../../../cache')
            ->setDebug(true)
            ->build();

        $this->client = new Client(new SerializerWrapper($this->serializer));
    }

    /**
     * @param Request $requestModel
     * @param string $responseType
     *
     * @return \DVelopment\FastBill\Model\FbApi
     */
    public function call(Request $requestModel, $responseType = 'DVelopment\FastBill\Model\FbApi')
    {
        $request = new GetRequest(self::API_BASE_URL);

        $request->setUseAuthentication(true)
            ->setUsername($this->username)
            ->setPassword($this->apiKey)
            ->setFormat('json')
            ->setContentType('application/json')
        ;

        $request->setBody($this->serializer->serialize($requestModel, 'json'));

        return $this->client->execute($request, null, $responseType)->getContent();
    }

    /**
     * @param int $customerId
     *
     * @return \DVelopment\FastBill\Model\Customer
     */
    public function getCustomer($customerId)
    {
        /** @var CustomerFbApi $response */
        $response = $this->call(new Request('customer.get', array('customer_id' => $customerId)), 'DVelopment\FastBill\Model\CustomerFbApi');

        return reset($response->getResponse()->getCustomers());
    }

    /**
     *
     * @return array
     */
    public function getCustomers()
    {
        /** @var CustomerFbApi $response */
        $response = $this->call(new Request('customer.get'), 'DVelopment\FastBill\Model\CustomerFbApi');

        return $response->getResponse()->getCustomers();
    }

    /**
     * @param int $customerId
     *
     * @return \DVelopment\FastBill\Model\Customer
     */
    public function getCustomerByNumber($number)
    {
        /** @var CustomerFbApi $response */
        $response = $this->call(new Request('customer.get', array('customer_number' => $number)), 'DVelopment\FastBill\Model\CustomerFbApi');

        return reset($response->getResponse()->getCustomers());
    }

    /**
     * @param Customer $customer
     *
     * @return array
     */
    public function createCustomer(Customer $customer)
    {
        return $this->call(new CustomerRequest('customer.create', array(), $customer))->getResponse();
    }

    /**
     * @param Customer $customer
     *
     * @return array
     */
    public function updateCustomer(Customer $customer)
    {
        return $this->call(new CustomerRequest('customer.update', array(), $customer))->getResponse();
    }

    /**
     * @param Customer $customer
     *
     * @return array
     */
    public function deleteCustomer(Customer $customer)
    {
        return $this->call(new DeleteRequest('customer.delete', array('customer_id' => $customer->getCustomerId())))->getResponse();
    }

    /**
     *
     * @return array
     */
    public function getProjects()
    {
        /** @var ProjectFbApi $response */
        $response = $this->call(new Request('project.get'), 'DVelopment\FastBill\Model\ProjectFbApi');

        return $response->getResponse()->getProjects();
    }

    /**
     * @param Project $project
     *
     * @return array
     */
    public function createProject(Project $project)
    {
        return $this->call(new ProjectRequest('project.create', array(), $project))->getResponse();
    }

    /**
     * @param Project $project
     *
     * @return array
     */
    public function updateProject(Project $project)
    {
        return $this->call(new ProjectRequest('project.update', array(), $project))->getResponse();
    }

    /**
     * @param Project $project
     *
     * @return array
     */
    public function deleteProject(Project $project)
    {
        return $this->call(new DeleteRequest('project.delete', array('project_id' => $project->getProjectId())))->getResponse();
    }

    /**
     * @param Time $time
     *
     * @return array
     */
    public function createTime(Time $time)
    {
        return $this->call(new TimeRequest('time.create', array(), $time))->getResponse();
    }

    /**
     * @param Time $time
     *
     * @return array
     */
    public function updateTime(Time $time)
    {
        return $this->call(new TimeRequest('time.update', array(), $time))->getResponse();
    }

    /**
     * @param $id
     *
     * @return Time
     */
    public function getTime($id)
    {
        /** @var TimeFbApi $response */
        $response = $this->call(new Request('time.get', array('time_id' => $id)), 'DVelopment\FastBill\Model\TimeFbApi');

        return reset($response->getResponse()->getTimes());
    }
}