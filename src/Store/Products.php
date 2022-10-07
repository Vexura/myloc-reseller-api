<?php

namespace MyLocAPI\Store;

use MyLocAPI\MyLocAPI;

class Products
{
    private $MyLocAPI;

    public function __construct(MyLocAPI $MyLocAPI)
    {
        $this->MyLocAPI = $MyLocAPI;
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProducts(string $store){
        return $this->MyLocAPI->get('stores/'.$store.'/products');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProduct(string $store, string $product){
        return $this->MyLocAPI->get('stores/'.$store.'/products' . $product);
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProductPeriods(string $store, string $product){
        return $this->MyLocAPI->get('stores/'.$store.'/products' . $product . '/periods');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProductRequirements(string $store, string $product){
        return $this->MyLocAPI->get('stores/'.$store.'/products' . $product . '/requirements');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProductSoftware(string $store, string $product){
        return $this->MyLocAPI->get('stores/'.$store.'/products' . $product . '/software');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProductSpecs(string $store, string $product){
        return $this->MyLocAPI->get('stores/'.$store.'/products' . $product . '/specs');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProductHdds(string $store, string $product){
        return $this->MyLocAPI->get('stores/'.$store.'/products' . $product . '/hdds');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProductRaidLevels(string $store, string $product, string $hdd_container_product, int $slot, int $productHDD){
        return $this->MyLocAPI->post('stores/'.$store.'/products' . $product . '/raid-levels/' . $hdd_container_product, [
            "slot" => $slot,
            "product" => $productHDD
        ] );
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProductLicenses(string $store, string $product, bool $inklusive){
        return $this->MyLocAPI->get('stores/'.$store.'/products' . $product . '/licenses?inclusive=' . $inklusive);
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProductSubProducts(string $store, string $product){
        return $this->MyLocAPI->get('stores/'.$store.'/products' . $product . '/subproducts');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getProductVariations(string $store, string $product){
        return $this->MyLocAPI->get('stores/'.$store.'/products' . $product . '/variations');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getOffers(string $store){
        return $this->MyLocAPI->get('stores/'.$store.'/offers');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getOffer(string $store, string $offer){
        return $this->MyLocAPI->get('stores/'.$store.'/offers/'.$offer);
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getOfferSubProducts(string $store, string $offer){
        return $this->MyLocAPI->get('stores/'.$store.'/offers/'.$offer.'/subproducts');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getOfferRequirements(string $store, string $offer){
        return $this->MyLocAPI->get('stores/'.$store.'/offers/'.$offer.'/requirements');
    }

    /**
     * @param string $store myloc | webtropia | servdiscount or own Shop ID
     * @return array|string
     */
    public function getOfferHDDs(string $store, string $offer){
        return $this->MyLocAPI->get('stores/'.$store.'/offers/'.$offer.'/hdds');
    }

}