<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="etudiant")
 */
class Etudiant
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
    protected $nom = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $prenom = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $code = null;

    /**
     * @var     \Entity\Etablissement    
     * @ManyToOne(targetEntity="Entity\Etablissement", inversedBy="etudiants")
     */
    protected $etablissement = null;

    /**
     * @var     \Entity\Faculte    
     * @ManyToOne(targetEntity="Entity\Faculte", inversedBy="etudiants")
     */
    protected $faculte = null;

    /**
     * @var     \Entity\Promotion    
     * @ManyToOne(targetEntity="Entity\Promotion", inversedBy="etudiants")
     */
    protected $promotion = null;

    /**
     * @var     \Entity\Annee    
     * @ManyToOne(targetEntity="Entity\Annee", inversedBy="etudiants")
     */
    protected $annee = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Abonnement", mappedBy="etudiant", cascade={"remove"})
     */
    protected $abonnements = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Numero", mappedBy="etudiant", cascade={"remove"})
     */
    protected $numeros = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Demande", mappedBy="etudiant", cascade={"remove"})
     */
    protected $demandes = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Note", mappedBy="etudiant", cascade={"remove"})
     */
    protected $notes = null;

    /**
     * @var     Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Entity\Annonce", mappedBy="etudiant", cascade={"remove"})
     */
    protected $annonces = null;


    public function __construct($email=null, $nom=null, $prenom=null, $code=null, $etablissement=null, $faculte=null,  $promotion=null, $annee=null)
    {
        $this->setEmail($email);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setCode($code);
        $this->setEtablissement($etablissement);
        $this->setFaculte($faculte);
        $this->setPromotion($promotion);
        $this->setAnnee($annee);

        $this->setNotes(new ArrayCollection());
        $this->setAbonnements(new ArrayCollection());
        $this->setNumeros(new ArrayCollection());
        $this->setAnnonces(new ArrayCollection());
        $this->setDemandes(new ArrayCollection());
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
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
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

    public function getFaculte()
    {
        return $this->faculte;
    }
    public function setFaculte(Faculte $faculte)
    {
        $this->faculte = $faculte;
    }

    public function getPromotion()
    {
        return $this->promotion;
    }
    public function setPromotion(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    public function getAnnee()
    {
        return $this->annee;
    }
    public function setAnnee(Annee $annee)
    {
        $this->annee = $annee;
    }

    public function getAbonnements(){
        return $this->abonnements;
    }
    public function setAbonnements(ArrayCollection $abonnements){
        $this->abonnements = $abonnements;
    }
    public function addToAbonnements(Abonnement $abonnement){
        $this->getAbonnements()
             ->add($abonnement);
    }
    public function removeFromAbonnements(Abonnement $abonnement){
        $this->getAbonnements()
             ->removeElement($abonnement);
    }
    public function isMemberOfAbonnements(Abonnement $abonnement){
        return $this->getAbonnements()
                    ->contains($abonnement);
    }

    public function getNumeros(){
        return $this->numeros;
    }
    public function setNumeros(ArrayCollection $numeros){
        $this->numeros = $numeros;
    }
    public function addToNumeros(Numero $numero){
        $this->getNumeros()
             ->add($numero);
    }
    public function removeFromNumeros(Numero $numero){
        $this->getNumeros()
             ->removeElement($numero);
    }
    public function isMemberOfNumeros(Numero $numero){
        return $this->getNumeros()
                    ->contains($numero);
    }


    public function getDemandes(){
        return $this->demandes;
    }
    public function setDemandes(ArrayCollection $demandes){
        $this->demandes = $demandes;
    }
    public function addToDemandes(Demande $demande){
        $this->getDemandes()
             ->add($demande);
    }
    public function removeFromDemandes(Demande $demande){
        $this->getDemandes()
             ->removeElement($demande);
    }
    public function isMemberOfDemandes(Demande $demande){
        return $this->getDemandes()
                    ->contains($demande);
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