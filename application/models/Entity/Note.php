<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="note")
 */
class Note
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
    protected $lanote = null;

    /**
     * @var     datetime
     * @Column(type="datetime")
     */
    protected $dateC = null;

    /**
     * @var     \Entity\Etablissement    
     * @ManyToOne(targetEntity="Entity\Etablissement", inversedBy="notes")
     */
    protected $etablissement = null;

    /**
     * @var     \Entity\Faculte    
     * @ManyToOne(targetEntity="Entity\Faculte", inversedBy="notes")
     */
    protected $faculte = null;

    /**
     * @var     \Entity\Promotion    
     * @ManyToOne(targetEntity="Entity\Promotion", inversedBy="notes")
     */
    protected $promotion = null;

    /**
     * @var     \Entity\Annee    
     * @ManyToOne(targetEntity="Entity\Annee", inversedBy="notes")
     */
    protected $annee = null;

    /**
     * @var     \Entity\Etudiant    
     * @ManyToOne(targetEntity="Entity\Etudiant", inversedBy="notes")
     */
    protected $etudiant = null;


    public function __construct($periode=null, $lanote=null, $date=null, $etudiant=null, $etablissement=null, $faculte=null,  $promotion=null, $annee=null)
    {
        $this->setPeriode($periode);
        $this->setLanote($lanote);
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

    /**
     * @return  string
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * @param   string  $periode
     * @return  void
     */
    public function setPeriode($periode)
    {
        $this->periode = $periode;
    }
    
    public function getDateC()
    {
        return $this->dateC;
    }
    public function setDateC($date)
    {
        $this->dateC = $date;
    }
    
    /**
     * @return  string
     */
    public function getLanote()
    {
        return $this->lanote;
    }

    /**
     * @param   string  $lanote
     * @return  void
     */
    public function setLanote($lanote)
    {
        $this->lanote = $lanote;
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