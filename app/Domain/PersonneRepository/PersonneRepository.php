<?php

namespace App\Domain\PersonneRepository;

use App\Domain\BaseRepository\BaseRepository;
use App\Domain\PersonneRepository\IPersonneRepository;
use App\Infrastructure\Models\Personne;

class PersonneRepository extends BaseRepository implements IPersonneRepository
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
    public function __construct(Personne $model)
    {
        $this->model = $model;
    }
}
