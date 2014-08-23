<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="abonnement")
 */
class Abonnement
{
    /**
     * @var     bigint
     * @Id
     * @Column(type="bigint")
     * @GeneratedValue
     */
    protected $id = null;

    /**
     * @var     datetime
     * @Column(type="datetime")
     */
    protected $date = null;

    /**
     * @var     datetime
     * @Column(type="datetime")
     */
    protected $last = null;

    /**
     * @var     int
     * @Column(type="integer")
     */
    protected $valide = null;


    /**
     * @var     \Entity\Etudiant    
     * @ManyToOne(targetEntity="Entity\Etudiant", inversedBy="abonnements")
     */
    protected $etudiant = null;


    public function __construct($date=null, $last=null, $etudiant=null, $valide=null)
    {
        $this->setDate($date);
        $this->setLast($last);
        $this->setValide($valide);

        $this->setEtudiant($etudiant);
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
     * @return  int
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * @param   int     $valide
     * @return  void
     */
    public function setValide($valide)
    {
        $this->valide = $valide;
    }


    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    public function getLast()
    {
        return $this->last;
    }
    public function setLast($last)
    {
        $this->last = $last;
    }
    public function getEtudiant()
    {
        return $this->etudiant;
    }
    public function setEtudiant(Etudiant $etudiant)
    {
        $this->etudiant = $etudiant;
    }

}