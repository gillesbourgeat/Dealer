<?php namespace Dealer\Loop\Base;

use Propel\Runtime\ActiveQuery\Criteria;
use Thelia\Core\Template\Element\BaseLoop;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;
use Thelia\Core\Template\Element\PropelSearchLoopInterface;
use Thelia\Core\Template\Loop\Argument\Argument;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;
use Thelia\Type\BooleanOrBothType;
use Dealer\Model\DealerTabQuery;

class DealerTab extends BaseLoop implements PropelSearchLoopInterface
{
    protected $timestampable = true;

    public function parseResults(LoopResult $loopResult)
    {
        foreach ($loopResult->getResultDataCollection() as $entry) {
            $row = new LoopResultRow($entry);
            $row->set("ID", $entry->getId())->set("COMPANY", $entry->getCompany())->set("ADDRESS1",
                $entry->getAddress1())->set("ADDRESS2", $entry->getAddress2())->set("ZIPCODE",
                $entry->getZipcode())->set("CITY", $entry->getCity())->set("COUNTRY",
                $entry->getCountry())->set("DESCRIPTION", $entry->getDescription())->set("SCHEDULE",
                $entry->getSchedule())->set("PHONE_NUMBER", $entry->getPhoneNumber())->set("WEB_SITE",
                $entry->getWebSite())->set("LATITUDE", $entry->getLatitude())->set("LONGITUDE", $entry->getLongitude());
            $this->addMoreResults($row, $entry);
            $loopResult->addRow($row);
        }

        return $loopResult;
    }

    protected function getArgDefinitions()
    {
        return new ArgumentCollection(Argument::createIntListTypeArgument("id"),
            Argument::createAnyTypeArgument("company"), Argument::createAnyTypeArgument("address1"),
            Argument::createAnyTypeArgument("address2"), Argument::createAnyTypeArgument("zipcode"),
            Argument::createAnyTypeArgument("city"), Argument::createAnyTypeArgument("country"),
            Argument::createAnyTypeArgument("schedule"), Argument::createAnyTypeArgument("phone_number"),
            Argument::createAnyTypeArgument("web_site"), Argument::createAnyTypeArgument("latitude"),
            Argument::createAnyTypeArgument("longitude"), Argument::createEnumListTypeArgument("order", [
                "id",
                "id-reverse",
                "company",
                "company-reverse",
                "address1",
                "address1-reverse",
                "address2",
                "address2-reverse",
                "zipcode",
                "zipcode-reverse",
                "city",
                "city-reverse",
                "country",
                "country-reverse",
                "description",
                "description-reverse",
                "schedule",
                "schedule-reverse",
                "phone_number",
                "phone_number-reverse",
                "web_site",
                "web_site-reverse",
                "latitude",
                "latitude-reverse",
                "longitude",
                "longitude-reverse",
            ], "id"));
    }

    public function buildModelCriteria()
    {
        $query = new DealerTabQuery();
        if (null !== $id = $this->getId()) {
            $query->filterById($id);
        }
        if (null !== $company = $this->getCompany()) {
            $company = array_map("trim", explode(",", $company));
            $query->filterByCompany($company);
        }
        if (null !== $address1 = $this->getAddress1()) {
            $address1 = array_map("trim", explode(",", $address1));
            $query->filterByAddress1($address1);
        }
        if (null !== $address2 = $this->getAddress2()) {
            $address2 = array_map("trim", explode(",", $address2));
            $query->filterByAddress2($address2);
        }
        if (null !== $zipcode = $this->getZipcode()) {
            $zipcode = array_map("trim", explode(",", $zipcode));
            $query->filterByZipcode($zipcode);
        }
        if (null !== $city = $this->getCity()) {
            $city = array_map("trim", explode(",", $city));
            $query->filterByCity($city);
        }
        if (null !== $country = $this->getCountry()) {
            $country = array_map("trim", explode(",", $country));
            $query->filterByCountry($country);
        }
        if (null !== $schedule = $this->getSchedule()) {
            $schedule = array_map("trim", explode(",", $schedule));
            $query->filterBySchedule($schedule);
        }
        if (null !== $phone_number = $this->getPhoneNumber()) {
            $phone_number = array_map("trim", explode(",", $phone_number));
            $query->filterByPhoneNumber($phone_number);
        }
        if (null !== $web_site = $this->getWebSite()) {
            $web_site = array_map("trim", explode(",", $web_site));
            $query->filterByWebSite($web_site);
        }
        if (null !== $latitude = $this->getLatitude()) {
            $latitude = array_map("trim", explode(",", $latitude));
            $query->filterByLatitude($latitude);
        }
        if (null !== $longitude = $this->getLongitude()) {
            $longitude = array_map("trim", explode(",", $longitude));
            $query->filterByLongitude($longitude);
        }
        foreach ($this->getOrder() as $order) {
            switch ($order) {
                case "id":
                    $query->orderById();
                    break;
                case "id-reverse":
                    $query->orderById(Criteria::DESC);
                    break;
                case "company":
                    $query->orderByCompany();
                    break;
                case "company-reverse":
                    $query->orderByCompany(Criteria::DESC);
                    break;
                case "address1":
                    $query->orderByAddress1();
                    break;
                case "address1-reverse":
                    $query->orderByAddress1(Criteria::DESC);
                    break;
                case "address2":
                    $query->orderByAddress2();
                    break;
                case "address2-reverse":
                    $query->orderByAddress2(Criteria::DESC);
                    break;
                case "zipcode":
                    $query->orderByZipcode();
                    break;
                case "zipcode-reverse":
                    $query->orderByZipcode(Criteria::DESC);
                    break;
                case "city":
                    $query->orderByCity();
                    break;
                case "city-reverse":
                    $query->orderByCity(Criteria::DESC);
                    break;
                case "country":
                    $query->orderByCountry();
                    break;
                case "country-reverse":
                    $query->orderByCountry(Criteria::DESC);
                    break;
                case "description":
                    $query->orderByDescription();
                    break;
                case "description-reverse":
                    $query->orderByDescription(Criteria::DESC);
                    break;
                case "schedule":
                    $query->orderBySchedule();
                    break;
                case "schedule-reverse":
                    $query->orderBySchedule(Criteria::DESC);
                    break;
                case "phone_number":
                    $query->orderByPhoneNumber();
                    break;
                case "phone_number-reverse":
                    $query->orderByPhoneNumber(Criteria::DESC);
                    break;
                case "web_site":
                    $query->orderByWebSite();
                    break;
                case "web_site-reverse":
                    $query->orderByWebSite(Criteria::DESC);
                    break;
                case "latitude":
                    $query->orderByLatitude();
                    break;
                case "latitude-reverse":
                    $query->orderByLatitude(Criteria::DESC);
                    break;
                case "longitude":
                    $query->orderByLongitude();
                    break;
                case "longitude-reverse":
                    $query->orderByLongitude(Criteria::DESC);
                    break;
            }
        }

        return $query;
    }

    protected function addMoreResults(LoopResultRow $row, $entryObject)
    {
    }
}
