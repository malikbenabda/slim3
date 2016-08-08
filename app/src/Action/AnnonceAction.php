<?php

namespace App\Action;

use App\Resource\AnnonceResource;

final class AnnonceAction
{
    private $annonceResource;

    public function __construct(AnnonceResource $annonceResource)
    {
        $this->annonceResource = $annonceResource;
    }

    public function fetch($request, $response, $args)
    {

        $annonces = $this->annonceResource->get();
        return $response->withJSON($annonces);

    }

    public function fetchSelected($request, $response, $args)
    {

        $post = $request->getParsedBody();
        $slug = array();

        if ( isset($post["idannonce"])){
            $slug += array("idannonce" =>$post["idannonce"] );
        }

        if ( isset($post["annoncestate"])){
            $slug += array("annoncestate" =>$post["annoncestate"] );
        }

        if ( isset($post["coords"])){
            $slug += array("coords" =>$post["coords"] );
        }

        if ( isset($post["titre"])){
            $slug += array("titre" =>$post["titre"] );
        }
        if ( isset($post["type"])){
            $slug += array("type" =>$post["type"] );
        }
        if ( isset($post["city"])){
            $slug += array("city" =>$post["city"] );
        }
        if ( isset($post["rooms"])){
            $slug += array("rooms" =>$post["rooms"] );
        }
        if ( isset($post["prixtotal"])){
            $slug += array("prixtotal" =>$post["prixtotal"] );
        }



        $annonces = $this->annonceResource->getSelected($slug);
        if ($annonces) {
            return $response->withJSON($annonces);
        }
        return $response->withStatus(404, 'No annonces with that criteria was found.');

    }

    public function fetchOne($request, $response, $args)
    {

        $post = $request->getParsedBody();
        $slug = array();

        if ( isset($post["idannonce"])){
            $slug += array("idannonce" =>$post["idannonce"] );
        }

        if ( isset($post["annoncestate"])){
            $slug += array("annoncestate" =>$post["annoncestate"] );
        }

        if ( isset($post["coords"])){
            $slug += array("coords" =>$post["coords"] );
        }

        if ( isset($post["titre"])){
            $slug += array("titre" =>$post["titre"] );
        }
        if ( isset($post["type"])){
            $slug += array("type" =>$post["type"] );
        }
        if ( isset($post["city"])){
            $slug += array("city" =>$post["city"] );
        }
        if ( isset($post["rooms"])){
            $slug += array("rooms" =>$post["rooms"] );
        }
        if ( isset($post["prixtotal"])){
            $slug += array("prixtotal" =>$post["prixtotal"] );
        }



        $annonce = $this->annonceResource->get($slug);
        if ($annonce) {
            return $response->withJSON($annonce);
        }
        return $response->withStatus(404, 'No annonces found.');
    }




    public function update($request, $response, $args)
    {
        $post = $request->getParsedBody();
        $id = $post["id"];

    }
}
