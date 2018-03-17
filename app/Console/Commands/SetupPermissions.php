<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Routing\Router;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Permission;
use App\Role;

class SetupPermissions extends Command
{

    protected $signature = 'setup:permissions';
    protected $description = 'Command description';
    protected $route;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->route = app()->make(Router::class);
    }


    public function handle()
    {
        $routes = $this->getSystemRoutes();

        $permissions = new Collection($this->createPermissions($routes));

        $to_attach = $this->findUnattachedPermissions($permissions);

        $user = $this->findSuperuser();
        $this->attachPermissions($user, $to_attach);
        $this->info("Total of " . count($to_attach) . " permission[s] added to system.");
    }

    private function getSystemRoutes()
    {
        return $this->route->getRoutes();
    }

    public function createPermissions($routes)
    {
        $permission = [];
        foreach ($routes as $route) {
            if (! empty($route->uri)) {
                $permission[] = [
                    "uri"    => $route->uri,
                    "method" => implode(',', $route->methods),
                    "action" => json_encode($route->action),
                ];
            }
        }

        return $permission;
    }


    private function findUnattachedPermissions($permissions)
    {
        $to_attach = [];
        foreach ($permissions as $permission) {
            // if permission is not there, so let's create one and associate it with our main user
            if (Permission::where('uri', $permission['uri'])->count() == 0) {
                $model = new Permission();
                $model->uri = $permission['uri'];
                $model->method = $permission['method'];
                $model->action = $permission['action'];
                $model->save();
                $to_attach[$model->id] = $model->id;
            }
        }
        return $to_attach;
    }


    private function findSuperuser()
    {
        $user = new User();
        return $user->where("email", "admin@asrenet.net")->with(['role'])->first();
    }


    private function attachPermissions($user, $to_attach)
    {
        $user->role()->first()->permissions()->attach($to_attach);
    }


}
