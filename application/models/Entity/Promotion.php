<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity
 * @Table(name="promotion")
 */
class Promotion
{
    /**
     * @var     bigint
     * @Id
     * @Column(type="bigint")
     * @GeneratedValue
     */
    protected $id = null;

    /**
     * @var     int
     * @Column(type="integer")
     */
    protected $level = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $attr = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $code = null;

    /**
     * @var     \Entity\Faculte    
     * @ManyToOne(targetEntity="Entity\Faculte", inversedBy="promotions")
     */
    protected $faculte = null;

    /**
     * @var     \Entity\Etablissement    
     * @ManyToOne(targetEntity="Entity\Etablissement", inversedBy="promotions")
     */
    protected $etablissement = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Annee", mappedBy="promotion", cascade={"remove"})
     */
    protected $annees = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Etudiant", mappedBy="promotion", cascade={"remove"})
     */
    protected $etudiants = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Note", mappedBy="promotion", cascade={"remove"})
     */
    protected $notes = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Annonce", mappedBy="promotion", cascade={"remove"})
     */
    protected $annonces = null;


    public function __construct($level=null, $attr=null, $code=null, $faculte=null, $etablissement=null)
    {
        $this->setLevel($level);
        $this->setAttr($attr);
        $this->setCode($code);
        $this->setFaculte($faculte);
        $this->setEtablissement($etablissement);
        $this->setAnnees(new ArrayCollection());
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
    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return  string
     */
    public function getAttr()
    {
        return $this->attr;
    }

    public function setAttr($attr)
    {
        $this->attr = $attr;
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

    public function getAnnees(){
        return $this->annees;
    }
    public function setAnnees(ArrayCollection $annees){
        $this->annees = $annees;
    }
    public function addToAnnees(Annee $annee){
        $this->getAnnees()
             ->add($annee);
    }
    public function removeFromAnnees(Annee $annee){
        $this->getAnnees()
             ->removeElement($annee);
    }
    public function isMemberOfAnnees(Annee $annee){
        return $this->getAnnees()
                    ->contains($annee);
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