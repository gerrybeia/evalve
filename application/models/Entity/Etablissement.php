<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="etablissement")
 */
class Etablissement
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
    protected $email = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $mdp = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $nom = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $cigle = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $tel = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $code = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Etudiant", mappedBy="etablissement", cascade={"remove"})
     */
    protected $etudiants = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Faculte", mappedBy="etablissement", cascade={"remove"})
     */
    protected $facultes = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Promotion", mappedBy="etablissement", cascade={"remove"})
     */
    protected $promotions = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Annee", mappedBy="etablissement", cascade={"remove"})
     */
    protected $annees = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Note", mappedBy="etablissement", cascade={"remove"})
     */
    protected $notes = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Annonce", mappedBy="etablissement", cascade={"remove"})
     */
    protected $annonces = null;

    public function __construct($email=null, $nom=null, $cigle=null, $tel=null, $code=null)
    {
        $this->setEmail($email);
        $this->setMdp(uniqid());
        $this->setNom($nom);
        $this->setCigle($cigle);
        $this->setTel($tel);
        $this->setCode($code);
        $this->setEtudiants(new ArrayCollection());
        $this->setFacultes(new ArrayCollection());
        $this->setPromotions(new ArrayCollection());
        $this->setAnnees(new ArrayCollection());
        $this->setNotes(new ArrayCollection());
        $this->setAnnonces(new ArrayCollection());
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param   string  $email
     * @return  void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * @return  string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param   string  $mdp
     * @return  void
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return  string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param   string  $nom
     * @return  void
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getCigle()
    {
        return $this->cigle;
    }
    public function setCigle($cigle)
    {
        $this->cigle = $cigle;
    }

    public function getTel()
    {
        return $this->tel;
    }
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getCode()
    {
        return $this->code;
    }
    public function setCode($code)
    {
        $this->code = $code;
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

    public function getFacultes(){
        return $this->facultes;
    }
    public function setFacultes(ArrayCollection $facultes){
        $this->facultes = $facultes;
    }
    public function addToFacultes(Faculte $faculte){
        $this->getFacultes()
             ->add($faculte);
    }
    public function removeFromFacultes(Faculte $faculte){
        $this->getFacultes()
             ->removeElement($faculte);
    }
    public function isMemberOfFacultes(Faculte $faculte){
        return $this->getFacultes()
                    ->contains($faculte);
    }

    public function getPromotions(){
        return $this->promotions;
    }
    public function setPromotions(ArrayCollection $promotions){
        $this->promotions = $promotions;
    }
    public function addToPromotions(Promotion $promotion){
        $this->getPromotions()
             ->add($promotion);
    }
    public function removeFromPromotions(Promotion $promotion){
        $this->getPromotions()
             ->removeElement($promotion);
    }
    public function isMemberOfPromotions(Promotion $promotion){
        return $this->getPromotions()
                    ->contains($promotion);
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