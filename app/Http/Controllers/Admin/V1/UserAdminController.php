<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\AdminController;
use App\Http\Requests\User\GetUserList;
use App\Http\Requests\User\UpdateUser;
use App\Services\UserService;

class UserAdminController extends AdminController
{

    public function __construct(
        private UserService $userService,
    ) {
    }

    public function show($id)
    {
        $user = $this->userService->findOne($id);

        return $this->respondOk($user);
    }

    public function list(GetUserList $request)
    {
        $users = $this->userService->findAll($request);

        return $this->respondOk($users);
    }

    public function update(UpdateUser $request)
    {
        $this->userService->findOne($request->id);

        $this->userService->update($request);

        return $this->respondNoContent();
    }
}
