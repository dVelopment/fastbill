<?php
/**
 * @package fastbill
 *
 * @author Daniel Holzmann <d@velopment.at>
 * @date 23.09.13
 * @time 19:43
 */

namespace DVelopment\Tests\Functional;

use DVelopment\FastBill\Api;
use DVelopment\FastBill\Model\Customer;
use DVelopment\FastBill\Model\Project;
use DVelopment\FastBill\Model\Task;
use DVelopment\FastBill\Model\Time;
use Symfony\Component\Yaml\Parser;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $username
     * @param $apiKey
     * @dataProvider provider
     */
    public function testCreateCustomer($username, $apiKey)
    {
        return;
        $customer = new Customer();

        $customer->setCustomerNumber(42)
            ->setCustomerType('business')
            ->setOrganization('d.velopment.at')
            ->setLastName('Holzmann')
            ->setCountryCode('AT')
            ->setPaymentType(1)
        ;

        print_r($this->getApi($username, $apiKey)->createCustomer($customer));
    }
    /**
     * @dataProvider provider
     * @depends testCreateCustomer
     */
    public function testGetCustomer($username, $apiKey)
    {
        return;
        $api = $this->getApi($username, $apiKey);

        print_r($api->getCustomerByNumber(42));
    }

    /**
     * @dataProvider provider
     * @depends testCreateCustomer
     */
    public function testCreateProject($username, $apiKey)
    {
        return;
        $project = new Project();

        $project->setCustomer($this->getApi($username, $apiKey)->getCustomerByNumber(42));
        $project->setProjectName('Test-Project')
            ->setStartDate(new \DateTime('2013-01-01'))
            ->setEndDate(new \DateTime('2013-12-31'))
            ->setHourPrice(45.49)
            ->setCurrencyCode('EUR')
            ->setVatPercent(20)
        ;

        print_r($this->getApi($username, $apiKey)->createProject($project));
    }

    /**
     * @dataProvider provider
     */
    public function testDeleteProject($username, $apiKey)
    {
        return;
        $project = new Project();
        $project->setProjectId(16068);

        print_r($this->getApi($username, $apiKey)->deleteProject($project));
    }

    /**
     * @dataProvider provider
     */
    public function testCreateTime($username, $apiKey)
    {
        return;
        $start = new \DateTime();
        $start->setTime(12, 0, 0);

        $end = new \DateTime();
        $end->setTime(15, 15, 42);

        $diff = $end->diff($start);

        $time = new Time();
        $time->setProjectId(16054)
            ->setDate(new \DateTime())
            ->setStartTime($start)
            ->setEndTime($end)
            ->setComment('Donec id elit non mi porta gravida at eget metus.')
            ->setMinutes($diff->i)
            ->setTaskId(42)
        ;

        $customer = $this->getApi($username, $apiKey)->getCustomerByNumber(42);

        $time->setCustomer($customer);

        print_r($this->getApi($username, $apiKey)->createTime($time));
    }

    /**
     * @dataProvider provider
     */
    public function testGetTime($username, $apiKey)
    {
        return;
        $time = $this->getApi($username, $apiKey)->getTime(59543);

        $diff = $time->getEndTime()->getTimestamp() - $time->getStartTime()->getTimestamp();
        $minutes = ceil($diff / 60.0);

        $time->setMinutes($minutes)
            ->setComment('Donec id elit non mi porta gravida at eget metus.')
            ->setBillableMinutes($minutes);

        print_r($this->getApi($username, $apiKey)->updateTime($time));
    }

    /**
     * @dataProvider provider
     * @depends testCreateProject
     */
    public function testDeleteProjects($username, $apiKey)
    {
        return;
        $projects = $this->getApi($username, $apiKey)->getProjects();

        foreach ($projects as $project) {
            print_r($this->getApi($username, $apiKey)->deleteProject($project));
        }
    }

    /**
     * @dataProvider provider
     * @depends testDeleteProjects
     */
    public function testDeleteCustomers($username, $apiKey)
    {
        return;
        foreach ($this->getApi($username, $apiKey)->getCustomers() as $customer) {
            print_r($this->getApi($username, $apiKey)->deleteCustomer($customer));
        }
    }

    /**
     * @param $username
     * @param $apiKey
     * @dataProvider provider
     */
    public function testDeleteTimes($username, $apiKey)
    {
        return;
        $api = $this->getApi($username, $apiKey);

        foreach ($api->getTimes() as $time) {
            print_r($api->deleteTime($time));
        }
    }

    /**
     * @param $username
     * @param $apiKey
     * @dataProvider provider
     */
    public function testDeleteArticles($username, $apiKey)
    {
        $api = $this->getApi($username, $apiKey);

        foreach ($api->getArticles() as $article) {
            print_r($api->deleteArticle($article));
        }
    }

    /**
     *
     * @return array
     */
    public function provider()
    {
        $parser = new Parser();
        $config = $parser->parse(file_get_contents(__DIR__ . '/../config.yml'));

        return array(array(
            $config['fast_bill']['username'],
            $config['fast_bill']['apiKey']
        ));
    }

    /**
     * @return Api
     */
    private function getApi($username, $apiKey)
    {
        return new Api($username, $apiKey);
    }
}