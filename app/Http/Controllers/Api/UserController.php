<?php

namespace App\Http\Controllers\Api;

use App\Business\UserService\Commands\IUserCommandsService;
use App\Business\UserService\IUserService;
use App\Business\UserService\Queries\IUserQueriesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var IUserCommandsService
     */
    protected $UserCommandsService;

    /**
     * @var IUserQueriesService
     */
    protected $UserQueriesService;

    /**
     * IUserService constructor.
     *
     * @param IUserService $IUserService
     */
    public function __construct(IUserCommandsService $UserCommandsService, IUserQueriesService $UserQueriesService)
    {
        $this->UserCommandsService = $UserCommandsService;
        $this->UserQueriesService = $UserQueriesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'Users' => $this->UserQueriesService->all(['*'], ['etudiant'])
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $model = $this->UserCommandsService->create($request->all());
            return response()->json([
            'Message' => 'Added successfully !',
            'model' => $model
            ], 200);
        } catch (\Exception $th) {
            return response()->json([
                'Exception' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'User' => $this->UserQueriesService->findById($id)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $model = $this->UserCommandsService->update($id, $request->all());
            return response()->json([
            'Message' => 'Updated successfully !',
            'model' => $model
            ], 200);
        } catch (\Exception $th) {
            return response()->json([
                'Exception' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->UserCommandsService->deleteById($id)) {
            return response()->json([
                'Message' => 'Deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'Error' => 'Delete Action: Somthing went wrong !'
            ], 500);
        }
    }
}
