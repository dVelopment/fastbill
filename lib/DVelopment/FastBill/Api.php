<?php

namespace DVelopment\FastBill;

use DVelopment\Curl\Client as Client;
use DVelopment\Curl\Http\GetRequest;
use DVelopment\Curl\Serializer\SerializerWrapper;
use DVelopment\FastBill\Exception\FastBillException;
use DVelopment\FastBill\Model\Article;
use DVelopment\FastBill\Model\ArticleFbApi;
use DVelopment\FastBill\Model\Customer;
use DVelopment\FastBill\Model\CustomerFbApi;
use DVelopment\FastBill\Model\FbApi;
use DVelopment\FastBill\Model\Project;
use DVelopment\FastBill\Model\ProjectFbApi;
use DVelopment\FastBill\Model\Request\ArticleRequest;
use DVelopment\FastBill\Model\Request\CustomerRequest;
use DVelopment\FastBill\Model\Request\DeleteRequest;
use DVelopment\FastBill\Model\Request\ProjectRequest;
use DVelopment\FastBill\Model\Request\Request;
use DVelopment\FastBill\Model\Request\SubscriptionSecureLinkRequest;
use DVelopment\FastBill\Model\Request\TimeRequest;
use DVelopment\FastBill\Model\Task;
use DVelopment\FastBill\Model\TaskFbApi;
use DVelopment\FastBill\Model\Time;
use DVelopment\FastBill\Model\TimeFbApi;
use DVelopment\FastBill\Model\Subscription;
use DVelopment\FastBill\Model\SubscriptionSecureLinkFbApi;
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
    const API_BASE_URL = 'https://automatic.fastbill.com/api/1.0/api.php';

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
     * @throws Exception\FastBillException
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

        /** @var FbApi $fbApi */
        $fbApi = $this->client->execute($request, null, $responseType)->getContent();

        if (count($fbApi->getResponse()->errors)) {
            throw new FastBillException($fbApi->getResponse()->errors);
        }

        return $fbApi;
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
        $customers = $response->getResponse()->getCustomers();

        return reset($customers);
    }

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return \DVelopment\FastBill\Model\Customer[]
     */
    public function getCustomers($limit = 100, $offset = 0)
    {
        /** @var CustomerFbApi $response */
        $response = $this->call(new Request('customer.get', array(), $limit, $offset), 'DVelopment\FastBill\Model\CustomerFbApi');

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
        $customers = $response->getResponse()->getCustomers();

        return reset($customers);
    }

    /**
     * @param string $customerExtUid
     *
     * @return \DVelopment\FastBill\Model\Customer
     */
    public function getCustomerByExtUid($customerExtUid)
    {
        /** @var CustomerFbApi $response */
        $response = $this->call(new Request('customer.get', array('customer_ext_uid' => $customerExtUid)), 'DVelopment\FastBill\Model\CustomerFbApi');
        $customers = $response->getResponse()->getCustomers();

        return reset($customers);
    }

    /**
     * @param Customer $customer
     *
     * @return int
     */
    public function createCustomer(Customer $customer)
    {
        return $this->call(new CustomerRequest('customer.create', array(), $customer))->getResponse()->customerId;
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
     * @param Subscription $subscription
     *
     * @return array
     */
    public function updateSubscription(Subscription $subscription)
    {
        return $this->call(new CustomerRequest('subscription.update', array(), $subscription))->getResponse();
    }

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return \DVelopment\FastBill\Model\Project[]
     */
    public function getProjects($limit = 100, $offset = 0)
    {
        /** @var ProjectFbApi $response */
        $response = $this->call(new Request('project.get', array(), $limit, $offset), 'DVelopment\FastBill\Model\ProjectFbApi');

        return $response->getResponse()->getProjects();
    }

    /**
     * @param Project $project
     *
     * @return int
     */
    public function createProject(Project $project)
    {
        return $this->call(new ProjectRequest('project.create', array(), $project))->getResponse()->projectId;
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
     * @return int
     */
    public function createTime(Time $time)
    {
        return $this->call(new TimeRequest('time.create', array(), $time))->getResponse()->timeId;
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

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return \DVelopment\FastBill\Model\Time[]
     */
    public function getTimes($limit = 100, $offset = 0)
    {
        /** @var TimeFbApi $response */
        $response = $this->call(new Request('time.get', array(), $limit, $offset), 'DVelopment\FastBill\Model\TimeFbApi');

        return $response->getResponse()->getTimes();
    }

    /**
     * @param Time $time
     *
     * @return FbApi
     */
    public function deleteTime(Time $time)
    {
        return $this->call(new DeleteRequest('time.delete', array('time_id' => $time->getTimeId())));
    }

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return Task[]
     */
    public function getTasks($limit = 100, $offset = 0)
    {
        /** @var TaskFbApi $response */
        $response = $this->call(new Request('task.get', array(), $limit, $offset), 'DVelopment\FastBill\Model\TaskFbApi');

        return $response->getResponse()->getTasks();
    }

    /**
     * @param $id
     *
     * @return Article
     */
    public function getArticle($id)
    {
        /** @var ArticleFbApi $response */
        $response = $this->call(new Request('article.get', array('article_id' => $id)), 'DVelopment\FastBill\Model\ArticleFbApi');

        return reset($response->getResponse()->getArticles());
    }

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return Article[]
     */
    public function getArticles($limit = 100, $offset = 0)
    {
        /** @var ArticleFbApi $response */
        $response = $this->call(new Request('article.get', array(), $limit, $offset), 'DVelopment\FastBill\Model\ArticleFbApi');

        return $response->getResponse()->getArticles();
    }

    /**
     * @param Article $article
     *
     * @return int
     */
    public function createArticle(Article $article)
    {
        return $this->call(new ArticleRequest('article.create', array(), $article))->getResponse()->articleNumber;
    }

    /**
     * @param Article $article
     *
     * @return Model\Response\Response
     */
    public function updateArticle(Article $article)
    {
        return $this->call(new ArticleRequest('article.update', array(), $article))->getResponse();
    }

    /**
     * @param Article $article
     *
     * @return FbApi
     */
    public function deleteArticle(Article $article)
    {
        return $this->call(new DeleteRequest('article.delete', array('article_id' => $article->getArticleNumber())))->getResponse();
    }

    /* ---------------------------- NEW ---------------------------- */

    /**
     * @param int $subscriptionId
     *
     * @return \DVelopment\FastBill\Model\Subscription
     */
    public function getSubscription($subscriptionId)
    {
        /** @var SubscriptionFbApi $response */
        $response = $this->call(new Request('subscription.get', array('subscription_id' => $subscriptionId)), 'DVelopment\FastBill\Model\SubscriptionFbApi');
        $subscriptions = $response->getResponse()->getSubscriptions();

        return reset($subscriptions);
    }

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return \DVelopment\FastBill\Model\Subscription[]
     */
    public function getSubscriptions($limit = 100, $offset = 0)
    {
        /** @var SubscriptionFbApi $response */
        $response = $this->call(new Request('subscription.get', array(), $limit, $offset), 'DVelopment\FastBill\Model\SubscriptionFbApi');

        return $response->getResponse()->getSubscriptions();
    }

    /**
     * @param int $subscriptionId
     *
     * @return \DVelopment\FastBill\Model\Subscription
     */
    public function getSubscriptionByNumber($number)
    {
        /** @var SubscriptionFbApi $response */
        $response = $this->call(new Request('subscription.get', array('subscription_number' => $number)), 'DVelopment\FastBill\Model\SubscriptionFbApi');
        $subscriptions = $response->getResponse()->getSubscriptions();

        return reset($subscriptions);
    }

    /**
     * @param string $subscriptionExtUid
     *
     * @return \DVelopment\FastBill\Model\Subscription
     */
    public function getSubscriptionByExtUid($subscriptionExtUid)
    {
        /** @var SubscriptionFbApi $response */
        $response = $this->call(new Request('subscription.get', array('subscription_ext_uid' => $subscriptionExtUid)), 'DVelopment\FastBill\Model\SubscriptionFbApi');
        $subscriptions = $response->getResponse()->getSubscriptions();

        return reset($subscriptions);
    }

    /**
     * @param string $customerId
     *
     * @return \DVelopment\FastBill\Model\Subscription
     */
    public function getSubscriptionByCustomerId($customerId)
    {
        /** @var SubscriptionFbApi $response */
        $response = $this->call(new Request('subscription.get', array('customer_id' => $customerId)), 'DVelopment\FastBill\Model\SubscriptionFbApi');
        $subscriptions = $response->getResponse()->getSubscriptions();

        return reset($subscriptions);
    }

    /**
     * @param string $customerExtUid
     *
     * @return \DVelopment\FastBill\Model\Subscription
     */
    public function getSubscriptionByCustomerExtUid($customerExtUid)
    {
        /** @var SubscriptionFbApi $response */
        $response = $this->call(new Request('subscription.get', array('customer_ext_uid' => $customerExtUid)), 'DVelopment\FastBill\Model\SubscriptionFbApi');
        $subscriptions = $response->getResponse()->getSubscriptions();

        return reset($subscriptions);
    }

    /**
     * @param Subscription $subscription
     *
     * @return SubscriptionSecureLinkFbApi
     */
    public function getSubscriptionSecureLinks($subscription)
    {
        return $this->call(new SubscriptionSecureLinkRequest('subscription.createsecurelink', array('subscription_id' => $subscription->getSubscriptionId())), 'DVelopment\FastBill\Model\SubscriptionSecureLinkFbApi')->getResponse();
    }
}
