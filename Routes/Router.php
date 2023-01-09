<?php 
namespace Gamc\Routes;


use Pecee\SimpleRouter\SimpleRouter;

class Router extends SimpleRouter
{
    /**
     * @throws \Exception
     * @throws \Pecee\Http\Middleware\Exceptions\TokenMismatchException
     * @throws \Pecee\SimpleRouter\Exceptions\HttpException
     * @throws \Pecee\SimpleRouter\Exceptions\NotFoundHttpException
     */
    public static function start(): void
	{
		// Load our helpers
		require_once '../App/Config/helpers.php';

		// Load our custom routes
		require_once 'web.php';

		// Do initial stuff
		parent::start();
	}
}
