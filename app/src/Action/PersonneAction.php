<?php
namespace App\Action;

use App\Entity\Annonce;
use App\Resource\AnnonceResource;
use Doctrine\ORM\EntityManager;

final class PersonneAction
{
    private $personneResource;

    public function __construct(AnnonceResource $personneResource)
    {
        $this->annonceResource = $personneResource;
    }

    public function fetch($request, $response, $args)
    {

        $personnes = $this->personneeResource->get();
        return $response->withJSON($personnes);

    }

    public function fetchSelected($request, $response, $args)
    {

        $post = $request->getParsedBody();
        $slug = array();


        if ( isset($post["city"])){
            $slug += array("city" =>$post["city"] );
        }
        if ( isset($post["age"])){
            $slug += array("age" =>$post["age"] );
        }
        if ( isset($post["gender"])){
            $slug += array("gender" =>$post["gender"] );
        }

        if ( isset($post["type"])){
            $slug += array("type" =>$post["type"] );
        }

        if ( isset($post["alcoholT"])){
            $slug += array("alcoholT" =>$post["alcoholT"] );
        }
        if ( isset($post["smokingT"])){
            $slug += array("smokingT" =>$post["smokingT"] );
        }
        if ( isset($post["noiseT"])){
            $slug += array("noiseT" =>$post["noiseT"] );
        }
        if ( isset($post["sleeplightness"])){
            $slug += array("sleeplightness" =>$post["sleeplightness"] );
        }
        if ( isset($post["cleaness"])){
            $slug += array("cleaness" =>$post["cleaness"] );
        }
        if ( isset($post["skills"])){
            $slug += array("skills" =>$post["skills"] );
        }
        if ( isset($post["drinks"])){
            $slug += array("drinks" =>$post["drinks"] );
        }
        if ( isset($post["smokes"])){
            $slug += array("smokes" =>$post["smokes"] );
        }
        if ( isset($post["noisy"])){
            $slug += array("noisy" =>$post["noisy"] );
        }
        if ( isset($post["idannonce"])){
            $slug += array("idannonce" =>$post["idannonce"] );
        }



        $personne = $this->personneResource->getSelected($slug);
        if ($personne) {
            return $response->withJSON($personne);
        }
        return $response->withStatus(404, 'No personnes with that criteria was found.');

    }

    public function fetchOne($request, $response, $args)
    {

        $post = $request->getParsedBody();
        $slug = array();

        if ( isset($post["idpersonne"])){
            $slug += array("idpersonne" =>$post["idpersonne"] );
        }


        if ( isset($post["occupation"])){
            $slug += array("occupation" =>$post["occupation"] );
        }

        if ( isset($post["maritalState"])){
            $slug += array("maritalState" =>$post["maritalState"] );
        }
        if ( isset($post["city"])){
            $slug += array("city" =>$post["city"] );
        }
        if ( isset($post["age"])){
            $slug += array("age" =>$post["age"] );
        }
        if ( isset($post["gender"])){
            $slug += array("gender" =>$post["gender"] );
        }
        if ( isset($post["idmessaging"])){
            $slug += array("idmessaging" =>$post["idmessaging"] );
        }
        if ( isset($post["type"])){
            $slug += array("type" =>$post["type"] );
        }
        if ( isset($post["profileImage"])){
            $slug += array("profileImage" =>$post["profileImage"] );
        }
        if ( isset($post["alcoholT"])){
            $slug += array("alcoholT" =>$post["alcoholT"] );
        }
        if ( isset($post["smokingT"])){
            $slug += array("smokingT" =>$post["smokingT"] );
        }
        if ( isset($post["noiseT"])){
            $slug += array("noiseT" =>$post["noiseT"] );
        }
        if ( isset($post["sleeplightness"])){
            $slug += array("sleeplightness" =>$post["sleeplightness"] );
        }
        if ( isset($post["cleaness"])){
            $slug += array("cleaness" =>$post["cleaness"] );
        }
        if ( isset($post["skills"])){
            $slug += array("skills" =>$post["skills"] );
        }
        if ( isset($post["drinks"])){
            $slug += array("drinks" =>$post["drinks"] );
        }
        if ( isset($post["smokes"])){
            $slug += array("smokes" =>$post["smokes"] );
        }
        if ( isset($post["noisy"])){
            $slug += array("noisy" =>$post["noisy"] );
        }
        if ( isset($post["idannonce"])){
            $slug += array("idannonce" =>$post["idannonce"] );
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
        $tmp= new Annonce();

        if ( isset($post["annoncestate"])){
            $tmp->setAnnoncestate($post["annoncestate"]);
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
        $tmp= new Annonce();

        if ( isset($post["idannonce"])){
        $tmp->setIdannonce($post["idannonce"]);
        $key=array("idannonce" =>$post["idannonce"]);

            if ( isset($post["annoncestate"])){
                $tmp->setAnnoncestate($post["annoncestate"]);
            }
            if ( isset($post["coords"])){
                $tmp->setCoords($post["coords"]);
            }
            if ( isset($post["titre"])){
                $tmp->setTitre($post["titre"]);
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
