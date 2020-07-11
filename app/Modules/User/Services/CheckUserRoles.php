<?phpnamespace App\Modules\User\Services;use App\Modules\User\Repositories\UserInterface;class CheckUserRoles{    protected $user;    public function __construct(UserInterface $user)    {        $this->user = $user;    }    public function assignedRoles($currentRoute = '')    {        $user = auth()->guard('admins')->user();        if ($user->user_type == 'super_admin') {            return true;        }        $userRoutes = [];        foreach ($user->roles as $role) {            foreach ($role->permission as $permission) {                $userRoutes[] = $permission->route_name;            }        }        $defaultRoutes = ['login', 'logout', 'dashboard'];        $userAllowRoutes = array_merge($userRoutes, $defaultRoutes);        if (in_array($currentRoute, $userAllowRoutes)) {            return true;        }        return false;    }}