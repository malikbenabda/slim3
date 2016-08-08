<?php
namespace App\Resource;

use App\AbstractResource;

/**
 * Class Resource
 * @package App
 */
class AnnonceResource extends AbstractResource
{
    /**
     * @param string|null $key
     *
     * @return array
     */
    public function get($key = null)
    {
        if ($key === null) {
            $annonces = $this->entityManager->getRepository('App\Entity\Annonce')->findAll();
            $annonces = array_map(
                function ($annonce) {
                    return $annonce->getArrayCopy();
                },
                $annonces
            );

            return $annonces;
        } else {
            $annonce = $this->entityManager->getRepository('App\Entity\Annonce')->findOneBy(
                $key
            );
            if ($annonce) {
                return $annonce->getArrayCopy();
            }
        }

        return false;
    }

    /**
     * @param string|null $key
     *
     * @return array
     */
    public function getSelected($key = null)
    {
        if ( !($key === null)) {
            $annonces = $this->entityManager->getRepository('App\Entity\Annonce')->findBy($key);
            $annonces = array_map(
                function ($annonce) {
                    return $annonce->getArrayCopy();
                },
                $annonces
            );
    return $annonces;
        }
        return false;
    }

    /**
     * @param object $annonce
     *
     * @return boolean
     */
    public function update($annonce)
{
    $this->entityManager->persist($annonce);
    $this->entityManager->flush();
    return true;
}

    /**
     * @param String $key
     *
     * @return boolean
     */
    public function delete($key)
    {
        $annonce = $this->entityManager->getRepository('App\Entity\Annonce')->findOneBy($key);

        $this->entityManager->remove($annonce);
        $this->entityManager->flush();

        return true;

    }
}
