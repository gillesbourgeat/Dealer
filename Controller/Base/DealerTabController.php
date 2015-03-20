<?php
/**
* This class has been generated by TheliaStudio
* For more information, see https://github.com/thelia-modules/TheliaStudio
*/

namespace Dealer\Controller\Base;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Controller\Admin\AbstractCrudController;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Tools\URL;
use Dealer\Event\DealerTabEvent;
use Dealer\Event\DealerTabEvents;
use Dealer\Model\DealerTabQuery;

/**
 * Class DealerTabController
 * @package Dealer\Controller\Base
 * @author TheliaStudio
 */
class DealerTabController extends AbstractCrudController
{
    public function __construct()
    {
        parent::__construct(
            "dealer_tab",
            "id",
            "order",
            AdminResources::MODULE,
            DealerTabEvents::CREATE,
            DealerTabEvents::UPDATE,
            DealerTabEvents::DELETE,
            null,
            null,
            "Dealer"
        );
    }

    /**
     * Return the creation form for this object
     */
    protected function getCreationForm()
    {
        return $this->createForm("dealer_tab.create");
    }

    /**
     * Return the update form for this object
     */
    protected function getUpdateForm($data = array())
    {
        if (!is_array($data)) {
            $data = array();
        }

        return $this->createForm("dealer_tab.update", "form", $data);
    }

    /**
     * Hydrate the update form for this object, before passing it to the update template
     *
     * @param mixed $object
     */
    protected function hydrateObjectForm($object)
    {
        $data = array(
            "id" => $object->getId(),
            "company" => $object->getCompany(),
            "address1" => $object->getAddress1(),
            "address2" => $object->getAddress2(),
            "zipcode" => $object->getZipcode(),
            "city" => $object->getCity(),
            "description" => $object->getDescription(),
            "schedule" => $object->getSchedule(),
            "phone_number" => $object->getPhoneNumber(),
            "web_site" => $object->getWebSite(),
            "latitude" => $object->getLatitude(),
            "longitude" => $object->getLongitude(),
        );

        return $this->getUpdateForm($data);
    }

    /**
     * Creates the creation event with the provided form data
     *
     * @param mixed $formData
     * @return \Thelia\Core\Event\ActionEvent
     */
    protected function getCreationEvent($formData)
    {
        $event = new DealerTabEvent();

        $event->setCompany($formData["company"]);
        $event->setAddress1($formData["address1"]);
        $event->setAddress2($formData["address2"]);
        $event->setZipcode($formData["zipcode"]);
        $event->setCity($formData["city"]);
        $event->setDescription($formData["description"]);
        $event->setSchedule($formData["schedule"]);
        $event->setPhoneNumber($formData["phone_number"]);
        $event->setWebSite($formData["web_site"]);
        $event->setLatitude($formData["latitude"]);
        $event->setLongitude($formData["longitude"]);

        return $event;
    }

    /**
     * Creates the update event with the provided form data
     *
     * @param mixed $formData
     * @return \Thelia\Core\Event\ActionEvent
     */
    protected function getUpdateEvent($formData)
    {
        $event = new DealerTabEvent();

        $event->setId($formData["id"]);
        $event->setCompany($formData["company"]);
        $event->setAddress1($formData["address1"]);
        $event->setAddress2($formData["address2"]);
        $event->setZipcode($formData["zipcode"]);
        $event->setCity($formData["city"]);
        $event->setDescription($formData["description"]);
        $event->setSchedule($formData["schedule"]);
        $event->setPhoneNumber($formData["phone_number"]);
        $event->setWebSite($formData["web_site"]);
        $event->setLatitude($formData["latitude"]);
        $event->setLongitude($formData["longitude"]);

        return $event;
    }

    /**
     * Creates the delete event with the provided form data
     */
    protected function getDeleteEvent()
    {
        $event = new DealerTabEvent();

        $event->setId($this->getRequest()->request->get("dealer_tab_id"));

        return $event;
    }

    /**
     * Return true if the event contains the object, e.g. the action has updated the object in the event.
     *
     * @param mixed $event
     */
    protected function eventContainsObject($event)
    {
        return null !== $this->getObjectFromEvent($event);
    }

    /**
     * Get the created object from an event.
     *
     * @param mixed $event
     */
    protected function getObjectFromEvent($event)
    {
        return $event->getDealerTab();
    }

    /**
     * Load an existing object from the database
     */
    protected function getExistingObject()
    {
        return DealerTabQuery::create()
            ->findPk($this->getRequest()->query->get("dealer_tab_id"))
        ;
    }

    /**
     * Returns the object label form the object event (name, title, etc.)
     *
     * @param mixed $object
     */
    protected function getObjectLabel($object)
    {
        return '';
    }

    /**
     * Returns the object ID from the object
     *
     * @param mixed $object
     */
    protected function getObjectId($object)
    {
        return $object->getId();
    }

    /**
     * Render the main list template
     *
     * @param mixed $currentOrder , if any, null otherwise.
     */
    protected function renderListTemplate($currentOrder)
    {
        $this->getParser()
            ->assign("order", $currentOrder)
        ;

        return $this->render("dealer-tabs");
    }

    /**
     * Render the edition template
     */
    protected function renderEditionTemplate()
    {
        $this->getParserContext()
            ->set(
                "dealer_tab_id",
                $this->getRequest()->query->get("dealer_tab_id")
            )
        ;

        return $this->render("dealer-tab-edit");
    }

    /**
     * Must return a RedirectResponse instance
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function redirectToEditionTemplate()
    {
        $id = $this->getRequest()->query->get("dealer_tab_id");

        return new RedirectResponse(
            URL::getInstance()->absoluteUrl(
                "/admin/module/Dealer/dealer_tab/edit",
                [
                    "dealer_tab_id" => $id,
                ]
            )
        );
    }

    /**
     * Must return a RedirectResponse instance
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function redirectToListTemplate()
    {
        return new RedirectResponse(
            URL::getInstance()->absoluteUrl("/admin/module/Dealer/dealer_tab")
        );
    }
}