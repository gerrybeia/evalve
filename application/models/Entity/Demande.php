<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="demande")
 */
class Demande
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
    protected $type = null;

    /**
     * @var     string
     * @Column(type="string")
     */
    protected $desc = null;

    /**
     * @var     datetime
     * @Column(type="datetime")
     */
    protected $date = null;

    /**
     * @var     \Entity\Etudiant    
     * @ManyToOne(targetEntity="Entity\Etudiant", inversedBy="demandes")
     */
    protected $etudiant = null;


    public function __construct($type=null, $desc=null, $date=null, $etudiant=null)
    {
        $this->setType($type);
        $this->setDesc($desc);
        $this->setDate($date);
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

    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    
    public function getDesc()
    {
        return $this->desc;
    }
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
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