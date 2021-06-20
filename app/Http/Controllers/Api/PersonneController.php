<?php

namespace App\Http\Controllers\Api;

use App\Business\PersonneService\Commands\IPersonneCommandsService;
use App\Business\PersonneService\IPersonneService;
use App\Business\PersonneService\Queries\IPersonneQueriesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    /**
     * @var IPersonneCommandsService
     */
    protected $PersonneCommandsService;

    /**
     * @var IPersonneQueriesService
     */
    protected $PersonneQueriesService;

    /**
     * IPersonneService constructor.
     *
     * @param IPersonneService $IPersonneService
     */
    public function __construct(IPersonneCommandsService $PersonneCommandsService, IPersonneQueriesService $PersonneQueriesService)
    {
        $this->PersonneCommandsService = $PersonneCommandsService;
        $this->PersonneQueriesService = $PersonneQueriesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'personnes' => $this->PersonneQueriesService->all(['*'], ['etudiants'])
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
            $model = $this->PersonneCommandsService->create($request->all());
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
            'personne' => $this->PersonneQueriesService->findById($id)
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
            $model = $this->PersonneCommandsService->update($id, $request->all());
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
        if($this->PersonneCommandsService->deleteById($id)) {
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
