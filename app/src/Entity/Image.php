<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image", uniqueConstraints={@ORM\UniqueConstraint(name="idImage_UNIQUE", columns={"idImage"})}, indexes={@ORM\Index(name="fk_image_annonce1_idx", columns={"idAnnonce"})})
 * @ORM\Entity
 */
class Image
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idImage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idimage;

    /**
     * @var string
     *
     * @ORM\Column(name="srchq", type="string", length=1000, nullable=true)
     */
    private $srchq;

    /**
     * @var string
     *
     * @ORM\Column(name="srclq", type="string", length=1000, nullable=true)
     */
    private $srclq;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=45, nullable=true)
     */
    private $tag;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

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
     * Get idimage
     *
     * @return integer
     */
    public function getIdimage()
    {
        return $this->idimage;
    }

    /**
     * Set srchq
     *
     * @param string $srchq
     *
     * @return Image
     */
    public function setSrchq($srchq)
    {
        $this->srchq = $srchq;

        return $this;
    }

    /**
     * Get srchq
     *
     * @return string
     */
    public function getSrchq()
    {
        return $this->srchq;
    }

    /**
     * Set srclq
     *
     * @param string $srclq
     *
     * @return Image
     */
    public function setSrclq($srclq)
    {
        $this->srclq = $srclq;

        return $this;
    }

    /**
     * Get srclq
     *
     * @return string
     */
    public function getSrclq()
    {
        return $this->srclq;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return Image
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Image
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Image
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Image
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set idannonce
     *
     * @param \Annonce $idannonce
     *
     * @return Image
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
}
