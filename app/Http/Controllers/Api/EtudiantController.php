<?php

namespace App\Http\Controllers\Api;

use App\Business\EtudiantService\Commands\IEtudiantCommandsService;
use App\Business\EtudiantService\IEtudiantService;
use App\Business\EtudiantService\Queries\IEtudiantQueriesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * @var IEtudiantCommandsService
     */
    protected $EtudiantCommandsService;

    /**
     * @var IEtudiantQueriesService
     */
    protected $EtudiantQueriesService;

    /**
     * IEtudiantService constructor.
     *
     * @param IEtudiantService $IEtudiantService
     */
    public function __construct(IEtudiantCommandsService $EtudiantCommandsService, IEtudiantQueriesService $EtudiantQueriesService)
    {
        $this->EtudiantCommandsService = $EtudiantCommandsService;
        $this->EtudiantQueriesService = $EtudiantQueriesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'Etudiants' => $this->EtudiantQueriesService->all(['*'], ['personne', 'users'])
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
            $model = $this->EtudiantCommandsService->create($request->all());
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
            'Etudiant' => $this->EtudiantQueriesService->findById($id)
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
            $model = $this->EtudiantCommandsService->update($id, $request->all());
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
        if($this->EtudiantCommandsService->deleteById($id)) {
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
