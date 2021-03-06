<?php 
namespace app\tests;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
class UserTest extends TestCase
{

    private $client;

    public function setUp()
    {
        $this->client = new Client([
            'base_uri' => 'http://z.slim.com',
            'http_errors' => false, #设置成 false 来禁用HTTP协议抛出的异常(如 4xx 和 5xx 响应)，默认情况下HTPP协议出错时会抛出异常。
        ]);
    }
    public function testUser()
    {
        $response = $this->client->get('/user/vilay');
        $this->assertEquals(200, $response->getStatusCode()); //断言状态码为200
        $body = $response->getBody();
        $data = json_decode($body, true);
        $this->assertArrayHasKey('code', $data); //断言返回数据中有code字段
        $this->assertArrayHasKey('msg', $data);
        $this->assertArrayHasKey('data', $data);
        $this->assertEquals(0, $data['code'],'数据错误'); //断言返回数据code字段值为0,如果不等于1则提示数据错误
        $this->assertInternalType('array', $data['data']); //断言返回数据data类型为数组
    }
}