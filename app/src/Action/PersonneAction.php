<?php
namespace App\Action;

use App\Resource\EmployerResource;

final class EmployerAction
{
    private $employerResource;

    public function __construct(EmployerResource $employerResource)
    {
        $this->employerResource = $employerResource;
    }

    public function fetch($request, $response, $args)
    {

        $employers = $this->employerResource->get();
        return $response->withJSON($employers);
    }

    public function fetchOne($request, $response, $args)
    {
        $post = $request->getParsedBody();
        $id = $post["id"];

        //$slug = array($key=>$value);
        $employer = $this->employerResource->get($id);
        if ($employer) {
            return $response->withJSON($employer);
        }
        return $response->withStatus(404, 'No employer found with that slug.');
    }

    public function update($request, $response, $args)
    {
        $post = $request->getParsedBody();
        $id = $post["id"];

    }
}
