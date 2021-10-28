<?php declare(strict_types=1);
//nimmt router und macht request vergleiche, sowie führt routes klassen aus
namespace Backend;


use Http\HttpRequest;
use Http\HttpResponse;
use LogicException;

class RouteHandler
{

    /** @var Router */
    private $router;

    /** @var Route[] */
    private $routes;

    /** @var Route */
    private $matchedRoute;

    /**
     * @param Router $router
     * @param array $routes
     */
    //router object
    public function __construct(Router $router, array $routes)
    {
        $this->router = $router;
        $router->append($routes);

    }

    /**
     * @return void
     */

    ///findet route object welches zur request path passt
    public function findRoute(): void
    {
        foreach ($this->router->getRoutes() as $route) {
            if ($route->getPath() === HttpRequest::getPath()) {
                if ($route->getType() !== HttpRequest::getMethod()) {
                    throw new LogicException('Route type mismatch.');
                }
                $this->matchedRoute = $route;
                //exit();
            }
        }
        //throw new LogicException('could not find route');
    }

    //führt class inhalt aus

    /**
     * @return void
     */
    public function runClassOfRoute(): HttpResponse
    {
        $class = strtok($this->matchedRoute->getClass(), ':');
        $methodOfClass = substr($this->matchedRoute->getClass(),
            strpos($this->matchedRoute->getClass(), ':')+1);

        if (!$class) {
            throw new LogicException('could not read class');
        }

        if (!$methodOfClass) {
            throw new LogicException('could not read method');
        }

        $object = new $class;

        return $object->$methodOfClass(new HttpResponse());

    }

    /**
     * @return Route
     */
    public function getMatchedRoute(): Route
    {
        return $this->matchedRoute;
    }
}