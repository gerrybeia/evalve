<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity
 * @Table(name="annee")
 */
class Annee
{
    /**
     * @var     bigint
     * @Id
     * @Column(type="bigint")
     * @GeneratedValue
     */
    protected $id = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $periode = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $code = null;

    /**
     * @var     \Entity\Faculte    
     * @ManyToOne(targetEntity="Entity\Faculte", inversedBy="annees")
     */
    protected $faculte = null;

    /**
     * @var     \Entity\Etablissement    
     * @ManyToOne(targetEntity="Entity\Etablissement", inversedBy="annees")
     */
    protected $etablissement = null;

    /**
     * @var     \Entity\Promotion    
     * @ManyToOne(targetEntity="Entity\Promotion", inversedBy="annees")
     */
    protected $promotion = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Etudiant", mappedBy="annee", cascade={"remove"})
     */
    protected $etudiants = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Note", mappedBy="annee", cascade={"remove"})
     */
    protected $notes = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Annonce", mappedBy="annee", cascade={"remove"})
     */
    protected $annonces = null;


    public function __construct($periode=null, $code=null, $faculte=null, $etablissement=null, $promotion=null)
    {
        $this->setPeriode($periode);
        $this->setCode($code);
        $this->setFaculte($faculte);
        $this->setEtablissement($etablissement);
        $this->setPromotion($promotion);
        $this->setNotes(new ArrayCollection());
        $this->setAnnonces(new ArrayCollection());
        $this->setEtudiants(new ArrayCollection());

    }
    
    /**
     * @return  bigint
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param   bigint     $id
     * @return  void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return  string
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    public function setPeriode($periode)
    {
        $this->periode = $periode;
    }

    public function getCode()
    {
        return $this->code;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }
    
    public function getFaculte()
    {
        return $this->faculte;
    }
    public function setFaculte(Faculte $faculte)
    {
        $this->faculte = $faculte;
    }
    public function getEtablissement()
    {
        return $this->etablissement;
    }
    public function setEtablissement(Etablissement $etablissement)
    {
        $this->etablissement = $etablissement;
    }

    public function getPromotion()
    {
        return $this->promotion;
    }
    public function setPromotion(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    public function getEtudiants(){
        return $this->etudiants;
    }
    public function setEtudiants(ArrayCollection $etudiants){
        $this->etudiants = $etudiants;
    }
    public function addToEtudiants(Etudiant $etudiant){
        $this->getEtudiants()
             ->add($etudiant);
    }
    public function removeFromEtudiants(Etudiant $etudiant){
        $this->getEtudiants()
             ->removeElement($etudiant);
    }
    public function isMemberOfEtudiants(Etudiant $etudiant){
        return $this->getEtudiants()
                    ->contains($etudiant);
    }
    public function getNotes(){
        return $this->notes;
    }
    public function setNotes(ArrayCollection $notes){
        $this->notes = $notes;
    }
    public function addToNotes(Note $note){
        $this->getNotes()
             ->add($note);
    }
    public function removeFromNotes(Note $note){
        $this->getNotes()
             ->removeElement($note);
    }
    public function isMemberOfNotes(Note $note){
        return $this->getNotes()
                    ->contains($note);
    }
    public function getAnnonces(){
        return $this->annonces;
    }
    public function setAnnonces(ArrayCollection $annonces){
        $this->annonces = $annonces;
    }
    public function addToAnnonces(Annonce $annonce){
        $this->getAnnonces()
             ->add($annonce);
    }
    public function removeFromAnnonces(Annonce $annonce){
        $this->getAnnonces()
             ->removeElement($annonce);
    }
    public function isMemberOfAnnonces(Annonce $annonce){
        return $this->getAnnonces()
                    ->contains($annonce);
    }
}