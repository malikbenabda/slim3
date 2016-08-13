<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Collocation
 *
 * @ORM\Table(name="collocation", uniqueConstraints={@ORM\UniqueConstraint(name="idcollocation_UNIQUE", columns={"idcollocation"})}, indexes={@ORM\Index(name="fk_collocation_annonce1_idx", columns={"idAnnonce"})})
 * @ORM\Entity
 */
class Collocation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcollocation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcollocation;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=45, nullable=true)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateBegin", type="date", nullable=true)
     */
    private $datebegin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="date", nullable=true)
     */
    private $dateend;

    /**
     * @var string
     *
     * @ORM\Column(name="tasks", type="string", length=425, nullable=true)
     */
    private $tasks;

    /**
     * @var string
     *
     * @ORM\Column(name="bills", type="string", length=245, nullable=true)
     */
    private $bills;

    /**
     * @var string
     *
     * @ORM\Column(name="reminder", type="string", length=45, nullable=true)
     */
    private $reminder;

    /**
     * @var \Annonce
     *
     * @ORM\ManyToOne(targetEntity="Annonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAnnonce", referencedColumnName="idAnnonce")
     * })
     */
    private $idannonce;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Personne", mappedBy="idcollocation")
     */
    private $idpersonne;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idpersonne = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idcollocation
     *
     * @return integer
     */
    public function getIdcollocation()
    {
        return $this->idcollocation;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Collocation
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set datebegin
     *
     * @param \DateTime $datebegin
     *
     * @return Collocation
     */
    public function setDatebegin($datebegin)
    {
        $this->datebegin = $datebegin;

        return $this;
    }

    /**
     * Get datebegin
     *
     * @return \DateTime
     */
    public function getDatebegin()
    {
        return $this->datebegin;
    }

    /**
     * Set dateend
     *
     * @param \DateTime $dateend
     *
     * @return Collocation
     */
    public function setDateend($dateend)
    {
        $this->dateend = $dateend;

        return $this;
    }

    /**
     * Get dateend
     *
     * @return \DateTime
     */
    public function getDateend()
    {
        return $this->dateend;
    }

    /**
     * Set tasks
     *
     * @param string $tasks
     *
     * @return Collocation
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get tasks
     *
     * @return string
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set bills
     *
     * @param string $bills
     *
     * @return Collocation
     */
    public function setBills($bills)
    {
        $this->bills = $bills;

        return $this;
    }

    /**
     * Get bills
     *
     * @return string
     */
    public function getBills()
    {
        return $this->bills;
    }

    /**
     * Set reminder
     *
     * @param string $reminder
     *
     * @return Collocation
     */
    public function setReminder($reminder)
    {
        $this->reminder = $reminder;

        return $this;
    }

    /**
     * Get reminder
     *
     * @return string
     */
    public function getReminder()
    {
        return $this->reminder;
    }

    /**
     * Set idannonce
     *
     * @param \Annonce $idannonce
     *
     * @return Collocation
     */
    public function setIdannonce(\Annonce $idannonce = null)
    {
        $this->idannonce = $idannonce;

        return $this;
    }

    /**
     * Get idannonce
     *
     * @return \Annonce
     */
    public function getIdannonce()
    {
        return $this->idannonce;
    }

    /**
     * Add idpersonne
     *
     * @param \Personne $idpersonne
     *
     * @return Collocation
     */
    public function addIdpersonne(\Personne $idpersonne)
    {
        $this->idpersonne[] = $idpersonne;

        return $this;
    }

    /**
     * Remove idpersonne
     *
     * @param \Personne $idpersonne
     */
    public function removeIdpersonne(\Personne $idpersonne)
    {
        $this->idpersonne->removeElement($idpersonne);
    }

    /**
     * Get idpersonne
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdpersonne()
    {
        return $this->idpersonne;
    }

    /**
     * Get array copy of object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }



}
