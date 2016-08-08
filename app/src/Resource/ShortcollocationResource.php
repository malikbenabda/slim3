<?php

namespace App\Resource;

use App\AbstractResource;

/**
 * Class Resource
 * @package App
 */
class ShortcollocationResource extends AbstractResource
{
    /**
     * @param string|null $key
     *
     * @return array
     */
    public function get($key = null)
    {
        if ($key === null) {
            $shortColocs = $this->entityManager->getRepository('App\Entity\Shortcollocation')->findAll();
            $shortColocs = array_map(
                function ($shortColoc) {
                    return $shortColoc->getArrayCopy();
                },
                $shortColocs
            );

            return $shortColocs;
        } else {
            $shortColoc = $this->entityManager->getRepository('App\Entity\Shortcollocation')->findOneBy(
                $key
            );
            if ($shortColoc) {
                return $shortColoc->getArrayCopy();
            }
        }

        return false;
    }

    /**
     * @param object $shortColoc
     *
     * @return boolean
     */
    public function update($shortColoc)
{
    $this->entityManager->persist($shortColoc);
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
        $shortColoc = $this->entityManager->getRepository('App\Entity\Shortcollocation')->findOneBy($key);

        $this->entityManager->remove($shortColoc);
        $this->entityManager->flush();

        return true;

    }
}
