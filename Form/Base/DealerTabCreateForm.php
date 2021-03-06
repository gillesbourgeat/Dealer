<?php namespace Dealer\Form\Base;

use Dealer\Dealer;
use Thelia\Form\BaseForm;
use Symfony\Component\Validator\Constraints\NotBlank;

class DealerTabCreateForm extends BaseForm
{
    const FORM_NAME = "dealer_tab_create";

    public function buildForm()
    {
        $translationKeys = $this->getTranslationKeys();
        $fieldsIdKeys = $this->getFieldsIdKeys();
        $this->addCompanyField($translationKeys, $fieldsIdKeys);
        $this->addAddress1Field($translationKeys, $fieldsIdKeys);
        $this->addAddress2Field($translationKeys, $fieldsIdKeys);
        $this->addZipcodeField($translationKeys, $fieldsIdKeys);
        $this->addCityField($translationKeys, $fieldsIdKeys);
        $this->addCountryField($translationKeys, $fieldsIdKeys);
        $this->addDescriptionField($translationKeys, $fieldsIdKeys);
        $this->addScheduleField($translationKeys, $fieldsIdKeys);
        $this->addPhoneNumberField($translationKeys, $fieldsIdKeys);
        $this->addWebSiteField($translationKeys, $fieldsIdKeys);
        $this->addLatitudeField($translationKeys, $fieldsIdKeys);
        $this->addLongitudeField($translationKeys, $fieldsIdKeys);
    }

    protected function addCompanyField(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("company", "text", array(
            "label" => $this->translator->trans($this->readKey("company", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("company", $fieldsIdKeys)],
            "required" => true,
            "constraints" => array(new NotBlank(), ),
            "attr" => array()
        ));
    }

    protected function addAddress1Field(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("address1", "text", array(
            "label" => $this->translator->trans($this->readKey("address1", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("address1", $fieldsIdKeys)],
            "required" => true,
            "constraints" => array(new NotBlank(), ),
            "attr" => array()
        ));
    }

    protected function addAddress2Field(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("address2", "text", array(
            "label" => $this->translator->trans($this->readKey("address2", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("address2", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(),
            "attr" => array()
        ));
    }

    protected function addZipcodeField(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("zipcode", "text", array(
            "label" => $this->translator->trans($this->readKey("zipcode", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("zipcode", $fieldsIdKeys)],
            "required" => true,
            "constraints" => array(new NotBlank(), ),
            "attr" => array()
        ));
    }

    protected function addCityField(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("city", "text", array(
            "label" => $this->translator->trans($this->readKey("city", $translationKeys), [], Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("city", $fieldsIdKeys)],
            "required" => true,
            "constraints" => array(new NotBlank(), ),
            "attr" => array()
        ));
    }

    protected function addCountryField(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("country", "text", array(
            "label" => $this->translator->trans($this->readKey("country", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("country", $fieldsIdKeys)],
            "required" => true,
            "constraints" => array(new NotBlank(), ),
            "attr" => array()
        ));
    }

    protected function addDescriptionField(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("description", "textarea", array(
            "label" => $this->translator->trans($this->readKey("description", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("description", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(),
            "attr" => array()
        ));
    }

    protected function addScheduleField(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("schedule", "text", array(
            "label" => $this->translator->trans($this->readKey("schedule", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("schedule", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(),
            "attr" => array()
        ));
    }

    protected function addPhoneNumberField(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("phone_number", "text", array(
            "label" => $this->translator->trans($this->readKey("phone_number", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("phone_number", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(),
            "attr" => array()
        ));
    }

    protected function addWebSiteField(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("web_site", "text", array(
            "label" => $this->translator->trans($this->readKey("web_site", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("web_site", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(),
            "attr" => array()
        ));
    }

    protected function addLatitudeField(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("latitude", "number", array(
            "label" => $this->translator->trans($this->readKey("latitude", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("latitude", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(),
            "attr" => array("step" => "0.01", )
        ));
    }

    protected function addLongitudeField(array $translationKeys, array $fieldsIdKeys)
    {
        $this->formBuilder->add("longitude", "number", array(
            "label" => $this->translator->trans($this->readKey("longitude", $translationKeys), [],
                Dealer::MESSAGE_DOMAIN),
            "label_attr" => ["for" => $this->readKey("longitude", $fieldsIdKeys)],
            "required" => false,
            "constraints" => array(),
            "attr" => array("step" => "0.01", )
        ));
    }

    public function getName()
    {
        return static::FORM_NAME;
    }

    public function readKey($key, array $keys, $default = '')
    {
        if (isset($keys[$key])) {
            return $keys[$key];
        }

        return $default;
    }

    public function getTranslationKeys()
    {
        return array();
    }

    public function getFieldsIdKeys()
    {
        return array(
            "company" => "dealer_tab_company",
            "address1" => "dealer_tab_address1",
            "address2" => "dealer_tab_address2",
            "zipcode" => "dealer_tab_zipcode",
            "city" => "dealer_tab_city",
            "country" => "dealer_tab_country",
            "description" => "dealer_tab_description",
            "schedule" => "dealer_tab_schedule",
            "phone_number" => "dealer_tab_phone_number",
            "web_site" => "dealer_tab_web_site",
            "latitude" => "dealer_tab_latitude",
            "longitude" => "dealer_tab_longitude",
        );
    }
}
