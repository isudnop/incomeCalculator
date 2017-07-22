<?php
namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository extends CommonRepository
{
    public function model()
    {
        return '\App\Models\Transaction';
    }

    /**
     * @param int $catId
     * @return Collection
     */
    public function getByCategoryId(int $catId) : Collection
    {
        return $this->model->where('category_id', $catId)->get();
    }

    /**
     * @param Carbon $startDate
     * @param Carbon $endDate
     *
     * @return Collection
     */
    public function getByDateRange(Carbon $startDate, Carbon $endDate) : Collection
    {
        return $this->model->whereBetween('created_at', [$startDate, $endDate])->get();
    }
}
