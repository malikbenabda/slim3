<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Collocation
 *
 * @ORM\Table(name="collocation", uniqueConstraints={@ORM\UniqueConstraint(name="idcollocation_UNIQUE", columns={"idcollocation"})}, indexes={@ORM\Index(name="fk_collocation_annonce1_idx", columns={"idAnnonceCollocation"})})
 * @ORM\Entity
 */
class Collocation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcollocation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idcollocation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateBegin", type="date", nullable=true)
     */
    private $datebegin;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=500, nullable=true)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="tasks", type="string", length=500, nullable=true)
     */
    private $tasks;

    /**
     * @var string
     *
     * @ORM\Column(name="bills", type="string", length=455, nullable=true)
     */
    private $bills;

    /**
     * @var string
     *
     * @ORM\Column(name="reminder", type="string", length=45, nullable=true)
     */
    private $reminder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="date", nullable=true)
     */
    private $dateend;

    /**
     * @var \Annonce
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Annonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAnnonceCollocation", referencedColumnName="idAnnonce")
     * })
     */
    private $idannoncecollocation;



    /**
     * Set idcollocation
     *
     * @param integer $idcollocation
     *
     * @return Collocation
     */
    public function setIdcollocation($idcollocation)
    {
        $this->idcollocation = $idcollocation;

        return $this;
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
     * Set notes
     *
     * @param string $notes
     *
     * @return Collocation
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
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
     * Set idannoncecollocation
     *
     * @param \Annonce $idannoncecollocation
     *
     * @return Collocation
     */
    public function setIdannoncecollocation(\Annonce $idannoncecollocation)
    {
        $this->idannoncecollocation = $idannoncecollocation;

        return $this;
    }

    /**
     * Get idannoncecollocation
     *
     * @return \Annonce
     */
    public function getIdannoncecollocation()
    {
        return $this->idannoncecollocation;
    }
}
