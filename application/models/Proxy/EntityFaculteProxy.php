<?php

namespace Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class EntityFaculteProxy extends \Entity\Faculte implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }
    
    
    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function setId($id)
    {
        $this->__load();
        return parent::setId($id);
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function setDescription($description)
    {
        $this->__load();
        return parent::setDescription($description);
    }

    public function getCode()
    {
        $this->__load();
        return parent::getCode();
    }

    public function setCode($code)
    {
        $this->__load();
        return parent::setCode($code);
    }

    public function getEtablissement()
    {
        $this->__load();
        return parent::getEtablissement();
    }

    public function setEtablissement(\Entity\Etablissement $etablissement)
    {
        $this->__load();
        return parent::setEtablissement($etablissement);
    }

    public function getEtudiants()
    {
        $this->__load();
        return parent::getEtudiants();
    }

    public function setEtudiants(\Doctrine\Common\Collections\ArrayCollection $etudiants)
    {
        $this->__load();
        return parent::setEtudiants($etudiants);
    }

    public function addToEtudiants(\Entity\Etudiant $etudiant)
    {
        $this->__load();
        return parent::addToEtudiants($etudiant);
    }

    public function removeFromEtudiants(\Entity\Etudiant $etudiant)
    {
        $this->__load();
        return parent::removeFromEtudiants($etudiant);
    }

    public function isMemberOfEtudiants(\Entity\Etudiant $etudiant)
    {
        $this->__load();
        return parent::isMemberOfEtudiants($etudiant);
    }

    public function getPromotions()
    {
        $this->__load();
        return parent::getPromotions();
    }

    public function setPromotions(\Doctrine\Common\Collections\ArrayCollection $promotions)
    {
        $this->__load();
        return parent::setPromotions($promotions);
    }

    public function addToPromotions(\Entity\Promotion $promotion)
    {
        $this->__load();
        return parent::addToPromotions($promotion);
    }

    public function removeFromPromotions(\Entity\Promotion $promotion)
    {
        $this->__load();
        return parent::removeFromPromotions($promotion);
    }

    public function isMemberOfPromotions(\Entity\Promotion $promotion)
    {
        $this->__load();
        return parent::isMemberOfPromotions($promotion);
    }

    public function getAnnees()
    {
        $this->__load();
        return parent::getAnnees();
    }

    public function setAnnees(\Doctrine\Common\Collections\ArrayCollection $annees)
    {
        $this->__load();
        return parent::setAnnees($annees);
    }

    public function addToAnnees(\Entity\Annee $annee)
    {
        $this->__load();
        return parent::addToAnnees($annee);
    }

    public function removeFromAnnees(\Entity\Annee $annee)
    {
        $this->__load();
        return parent::removeFromAnnees($annee);
    }

    public function isMemberOfAnnees(\Entity\Annee $annee)
    {
        $this->__load();
        return parent::isMemberOfAnnees($annee);
    }

    public function getNotes()
    {
        $this->__load();
        return parent::getNotes();
    }

    public function setNotes(\Doctrine\Common\Collections\ArrayCollection $notes)
    {
        $this->__load();
        return parent::setNotes($notes);
    }

    public function addToNotes(\Entity\Note $note)
    {
        $this->__load();
        return parent::addToNotes($note);
    }

    public function removeFromNotes(\Entity\Note $note)
    {
        $this->__load();
        return parent::removeFromNotes($note);
    }

    public function isMemberOfNotes(\Entity\Note $note)
    {
        $this->__load();
        return parent::isMemberOfNotes($note);
    }

    public function getAnnonces()
    {
        $this->__load();
        return parent::getAnnonces();
    }

    public function setAnnonces(\Doctrine\Common\Collections\ArrayCollection $annonces)
    {
        $this->__load();
        return parent::setAnnonces($annonces);
    }

    public function addToAnnonces(\Entity\Annonce $annonce)
    {
        $this->__load();
        return parent::addToAnnonces($annonce);
    }

    public function removeFromAnnonces(\Entity\Annonce $annonce)
    {
        $this->__load();
        return parent::removeFromAnnonces($annonce);
    }

    public function isMemberOfAnnonces(\Entity\Annonce $annonce)
    {
        $this->__load();
        return parent::isMemberOfAnnonces($annonce);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'description', 'code', 'etablissement', 'etudiants', 'promotions', 'annees', 'notes', 'annonces');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}