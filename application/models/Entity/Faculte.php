<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="faculte")
 */
class Faculte
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
    protected $description = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $code = null;

    /**
     * @var     \Entity\Etablissement    
     * @ManyToOne(targetEntity="Entity\Etablissement", inversedBy="facultes")
     */
    protected $etablissement = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Etudiant", mappedBy="faculte", cascade={"remove"})
     */
    protected $etudiants = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Promotion", mappedBy="faculte", cascade={"remove"})
     */
    protected $promotions = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Annee", mappedBy="faculte", cascade={"remove"})
     */
    protected $annees = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Note", mappedBy="faculte", cascade={"remove"})
     */
    protected $notes = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Annonce", mappedBy="faculte", cascade={"remove"})
     */
    protected $annonces = null;


    public function __construct($description=null, $code=null, $etablissement=null)
    {
        $this->setDescription($description);
        $this->setCode($code);
        $this->setEtablissement($etablissement);

        $this->setEtudiants(new ArrayCollection());
        $this->setPromotions(new ArrayCollection());
        $this->setNotes(new ArrayCollection());
        $this->setAnnonces(new ArrayCollection());
        $this->setAnnees(new ArrayCollection());
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
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCode()
    {
        return $this->code;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }
    
    public function getEtablissement()
    {
        return $this->etablissement;
    }
    public function setEtablissement(Etablissement $etablissement)
    {
        $this->etablissement = $etablissement;
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