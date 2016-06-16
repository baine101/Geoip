<?php

namespace Juicy\Geoip\Observer;


use Magento\Framework\Event\ObserverInterface;
use Magento\TestFramework\Event\Magento;
use Juicy\Geoip\Controller\Index\index as index;

class GeoObserver implements ObserverInterface
{
    protected $_objectManager;
    protected $_response;


    public function __construct(\Juicy\Geoip\Helper\Data $geoipData, \Magento\Framework\Registry $registry, \Magento\Framework\App\Response\Http $response)
    {

        $this->_response = $response;
        $this->_geoipData = $geoipData;
        $this->_registry = $registry;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $hostname = $_SERVER['REMOTE_ADDR'];
        $countryCode = $this->getCountryCode($hostname);

        //echo $countryCode;

    }


    protected function getCountryCode($ip){
        //get country code from clients ip address
        $countryName = geoip_country_code_by_name ($ip);

        return $countryName;
    }

}

