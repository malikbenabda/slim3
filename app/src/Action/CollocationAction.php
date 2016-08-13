<?php
namespace App\Action;

use App\Entity\Collocation;
use App\Resource\CollocationResource;
use Doctrine\ORM\EntityManager;

final class CollocationAction
{
    private $annonceResource;

    public function __construct(CollocationResource $annonceResource)
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




    public function add($request, $response, $args)
    {
        $post = $request->getParsedBody();
        $tmp= new Collocation();

        if ( isset($post["annoncestate"])){
            $tmp->setCollocationstate($post["annoncestate"]);
        }
        if ( isset($post["coords"])){
            $tmp->setCoords($post["coords"]);
        }
        if ( isset($post["titre"])){
            $tmp->setTitre($post["titre"]);
        }
        if ( isset($post["description"])){
            $tmp->setDescription($post["description"]);
        }
        if ( isset($post["type"])){
            $tmp->setType($post["type"]);
        }
        if ( isset($post["city"])){
            $tmp->setCity($post["city"]);
        }
        if ( isset($post["rooms"])){
            $tmp->setRooms($post["rooms"]);
        }
        if ( isset($post["prixtotal"])){
            $tmp->setPrixtotal($post["prixtotal"]);
        }
        if ( isset($post["extra"])){
            $tmp->setExtra($post["extra"]);
        }

        $this->annonceResource->insert($tmp);
        return $response->withJSON("success");

    }



    public function update($request, $response, $args)
    {
        $post = $request->getParsedBody();
        $tmp= new Collocation();

        if ( isset($post["idannonce"])){
        $tmp->setIdannonce($post["idannonce"]);
        $key=array("idannonce" =>$post["idannonce"]);

            if ( isset($post["annoncestate"])){
                $tmp->setCollocationstate($post["annoncestate"]);
            }


            $this->annonceResource->update($tmp , $key= null);
            return $response->withJSON(" update success");

        }else {return $response->withStatus(405, 'No idannonce was passed.');}



    }

    public function remove($request, $response, $args)
    {
        $post = $request->getParsedBody();
        $slug = array();

        if ( isset($post["idannonce"])){
            $slug = array("idannonce" =>$post["idannonce"] );
        } else  return $response->withStatus(405, 'No idannonce was passed.');

       /*     {

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
            }
*/

        $rep = $this->annonceResource->delete($slug);
        if ($rep) {
            return $response->withJSON("deleted with success");
        }else
        return $response->withStatus(404, 'No annonce like that found.');
    }
}
