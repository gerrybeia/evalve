<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="annonce")
 */
class Annonce
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
    protected $type = null;

    /**
     * @var     datetime
     * @Column(type="datetime")
     */
    protected $dateC = null;

    /**
     * @var     \Entity\Etablissement    
     * @ManyToOne(targetEntity="Entity\Etablissement", inversedBy="annonces")
     */
    protected $etablissement = null;

    /**
     * @var     \Entity\Faculte    
     * @ManyToOne(targetEntity="Entity\Faculte", inversedBy="annonces")
     */
    protected $faculte = null;

    /**
     * @var     \Entity\Promotion    
     * @ManyToOne(targetEntity="Entity\Promotion", inversedBy="annonces")
     */
    protected $promotion = null;

    /**
     * @var     \Entity\Annee    
     * @ManyToOne(targetEntity="Entity\Annee", inversedBy="annonces")
     */
    protected $annee = null;

    /**
     * @var     \Entity\Etudiant    
     * @ManyToOne(targetEntity="Entity\Etudiant", inversedBy="annonces")
     */
    protected $etudiant = null;


    public function __construct($description=null, $type=null, $date=null, $etablissement=null, $faculte=null,  $promotion=null, $annee=null, $etudiant=null)
    {
        $this->setDescription($description);
        $this->setType($type);
        $this->setDateC($date);

        $this->setEtudiant($etudiant);
        $this->setEtablissement($etablissement);
        $this->setFaculte($faculte);
        $this->setPromotion($promotion);
        $this->setAnnee($annee);
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

    public function getDateC()
    {
        return $this->dateC;
    }
    public function setDateC($dateC)
    {
        $this->dateC = $dateC;
    }

    /**
     * @return  string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param   string  $description
     * @return  void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * @return  string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param   string  $type
     * @return  void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getEtudiant()
    {
        return $this->etudiant;
    }
    public function setEtudiant(Etudiant $etudiant)
    {
        $this->etudiant = $etudiant;
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
}