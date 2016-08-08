<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shortcollocation
 *
 * @ORM\Table(name="shortcollocation", uniqueConstraints={@ORM\UniqueConstraint(name="idshortCollocation_UNIQUE", columns={"idshortCollocation"})}, indexes={@ORM\Index(name="fk_shortCollocation_annonce1_idx", columns={"annonce_idAnnonce"}), @ORM\Index(name="fk_shortCollocation_personne1_idx", columns={"personne_idpersonne"})})
 * @ORM\Entity
 */
class Shortcollocation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idshortCollocation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idshortcollocation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="string", length=45, nullable=true)
     */
    private $duration;

    /**
     * @var \Annonce
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Annonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="annonce_idAnnonce", referencedColumnName="idAnnonce")
     * })
     */
    private $annonceannonce;

    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personne_idpersonne", referencedColumnName="idpersonne")
     * })
     */
    private $personnepersonne;



    /**
     * Set idshortcollocation
     *
     * @param integer $idshortcollocation
     *
     * @return Shortcollocation
     */
    public function setIdshortcollocation($idshortcollocation)
    {
        $this->idshortcollocation = $idshortcollocation;

        return $this;
    }

    /**
     * Get idshortcollocation
     *
     * @return integer
     */
    public function getIdshortcollocation()
    {
        return $this->idshortcollocation;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Shortcollocation
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
     * Set prix
     *
     * @param integer $prix
     *
     * @return Shortcollocation
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set duration
     *
     * @param string $duration
     *
     * @return Shortcollocation
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set annonceannonce
     *
     * @param \Annonce $annonceannonce
     *
     * @return Shortcollocation
     */
    public function setAnnonceannonce(\Annonce $annonceannonce)
    {
        $this->annonceannonce = $annonceannonce;

        return $this;
    }

    /**
     * Get annonceannonce
     *
     * @return \Annonce
     */
    public function getAnnonceannonce()
    {
        return $this->annonceannonce;
    }

    /**
     * Set personnepersonne
     *
     * @param \Personne $personnepersonne
     *
     * @return Shortcollocation
     */
    public function setPersonnepersonne(\Personne $personnepersonne)
    {
        $this->personnepersonne = $personnepersonne;

        return $this;
    }

    /**
     * Get personnepersonne
     *
     * @return \Personne
     */
    public function getPersonnepersonne()
    {
        return $this->personnepersonne;
    }
}
