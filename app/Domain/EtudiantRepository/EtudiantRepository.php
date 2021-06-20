<?php

namespace App\Domain\EtudiantRepository;

use App\Domain\BaseRepository\BaseRepository;
use App\Infrastructure\Models\Etudiant;

class EtudiantRepository extends BaseRepository implements IEtudiantRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Etudiant $model)
    {
        $this->model = $model;
    }
}
