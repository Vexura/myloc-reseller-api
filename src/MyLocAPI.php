<?php


namespace MyLocAPI;

use GuzzleHttp\Client;
use MyLocAPI\Accounting\Account;
use MyLocAPI\Currency\Currency;
use MyLocAPI\Exception\ParameterException;
use MyLocAPI\Networking\Networking;
use MyLocAPI\Products\Server\Server;
use MyLocAPI\Store\Store;
use MyLocAPI\WHMCS\WHMCS;
use Psr\Http\Message\ResponseInterface;

class MyLocAPI
{
    private $httpClient;
    private $credentials;
    private $apiToken;
    private $accountingHandler;
    private $serverHandler;
    private $currencyHandler;
    private $networkingHandler;
    private $storeHandler;
    private $whmcsHandler;

    /**
     * MyLocAPI constructor.
     *
     * @param string $token API Token for all requests
     * @param null $httpClient
     */
    public function __construct(string $token, $httpClient = null) {
        $this->apiToken = $token;
        $this->setHttpClient($httpClient);
        $this->setCredentials($token);
    }


    public function setHttpClient(Client $httpClient = null)
    {
        $this->httpClient = $httpClient ?: new Client([
            'allow_redirects' => false,
            'follow_redirects' => false,
            'timeout' => 120,
            'http_errors' => false,
        ]);
    }

    public function setCredentials($credentials)
    {
        if (!$credentials instanceof Credentials) {
            $credentials = new Credentials($credentials);
        }

        $this->credentials = $credentials;
    }

    /**
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->apiToken;
    }
    

    /**
     * @return Credentials
     */
    private function getCredentials(): Credentials
    {
        return $this->credentials;
    }


    /**
     * @param string $actionPath The resource path you want to request, see more at the documentation.
     * @param array $params Array filled with request params
     * @param string $method HTTP method used in the request
     *
     * @return ResponseInterface
     *
     * @throws ParameterException If the given field in params is not an array
     */
    private function request(string $actionPath, array $params = [], string $method = 'GET'): ResponseInterface
    {
        $url = $this->getCredentials()->getUrl() . $actionPath;

        if (!is_array($params)) {
            throw new ParameterException();
        }

        $params['Authorization'] = 'Bearer ' . $this->apiToken;

        switch ($method) {
            case 'GET':
                return $this->getHttpClient()->get($url, ['verify' => false, 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->apiToken]]);
            case 'POST':
                return $this->getHttpClient()->post($url, ['verify' => false, 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->apiToken], 'form_params' => $params,]);
            case 'PUT':
                return $this->getHttpClient()->put($url, ['verify' => false, 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->apiToken], 'form_params' => $params,]);
            case 'DELETE':
                return $this->getHttpClient()->delete($url, ['verify' => false, 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->apiToken], 'form_params' => $params,]);
            case 'PATCH':
                return $this->getHttpClient()->patch($url, ['verify' => false, 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->apiToken], 'form_params' => $params,]);
            default:
                throw new ParameterException('Wrong HTTP method passed');
        }
    }

    private function processRequest(ResponseInterface $response)
    {
        $response = $response->getBody()->__toString();
        $result = json_decode($response);
        if (json_last_error() == JSON_ERROR_NONE) {
            return $result;
        } else {
            return $response;
        }
    }


    public function get($actionPath, $params = [])
    {
        $response = $this->request($actionPath, $params);

        return $this->processRequest($response);
    }

    public function post($actionPath, $params = [])
    {
        $response = $this->request($actionPath, $params, 'POST');

        return $this->processRequest($response);
    }

    public function put($actionPath, $params = [])
    {
        $response = $this->request($actionPath, $params, 'PUT');

        return $this->processRequest($response);
    }

    public function delete($actionPath, $params = [])
    {
        $response = $this->request($actionPath, $params, 'DELETE');

        return $this->processRequest($response);
    }

    public function patch($actionPath, $params = [])
    {
        $response = $this->request($actionPath, $params, 'PATCH');

        return $this->processRequest($response);
    }

    /**
     * @return Account
     */
    public function accounting(): Account
    {
        if (!$this->accountingHandler) $this->accountingHandler = new Account($this);
        return $this->accountingHandler;
    }

    /**
     * @return Server
     */
    public function server(): Server
    {
        if (!$this->serverHandler) $this->serverHandler = new Server($this);
        return $this->serverHandler;
    }

    /**
     * @return Currency
     */
    public function currency(): Currency
    {
        if (!$this->currencyHandler) $this->currencyHandler = new Currency($this);
        return $this->currencyHandler;
    }

    /**
     * @return Networking
     */
    public function networking(): Networking
    {
        if (!$this->networkingHandler) $this->networkingHandler = new Networking($this);
        return $this->networkingHandler;
    }

    /**
     * @return Store
     */
    public function store(): Store
    {
        if (!$this->storeHandler) $this->storeHandler = new Store($this);
        return $this->storeHandler;
    }

    /**
     * @return WHMCS
     */
    public function whmcs(): WHMCS
    {
        if (!$this->whmcsHandler) $this->whmcsHandler = new WHMCS($this);
        return $this->whmcsHandler;
    }

}
