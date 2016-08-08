<?php

namespace App\Resource;

use App\AbstractResource;

/**
 * Class Resource
 * @package App
 */
class PersonneResource extends AbstractResource
{
    /**
     * @param string|null $key
     *
     * @return array
     */
    public function get($key = null)
    {
        if ($key === null) {
            $personnes = $this->entityManager->getRepository('App\Entity\Personne')->findAll();
            $personnes = array_map(
                function ($personne) {
                    return $personne->getArrayCopy();
                },
                $personnes
            );

            return $personnes;
        } else {
            $personne = $this->entityManager->getRepository('App\Entity\Personne')->findOneBy(
                $key
            );
            if ($personne) {
                return $personne->getArrayCopy();
            }
        }

        return false;
    }

    /**
     * @param object $personne
     *
     * @return boolean
     */
    public function update($personne)
{
    $this->entityManager->persist($personne);
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
        $personne = $this->entityManager->getRepository('App\Entity\Personne')->findOneBy($key);

        $this->entityManager->remove($personne);
        $this->entityManager->flush();

        return true;

    }
}
