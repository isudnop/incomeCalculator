<?php
namespace App\Repository;

use App\Models\Transaction;
use Carbon\Carbon;

class TransactionRepository
{
    /** @var Transaction */
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Create Transaction
     *
     * @param array $params
     *
     * @return Transaction
     */
    public function create(array $params) : Transaction
    {
        return $this->transaction->create($params);
    }

    /**
     * @param int $id
     * @param array $params
     *
     */
    public function edit(int $id, array $params)
    {
        $this->transaction->where('id', $id)
            ->update([
                $params
            ]);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool
    {
        return $this->transaction->findOrFail($id)->delete();
    }

    /**
     * @param int $id
     *
     * @return Transaction
     */
    public function getById(int $id) : Transaction
    {
       return $this->transaction->findOrFail($id);
    }

    /**
     * @param int $catId
     * @return mixed
     */
    public function getByCategoryId(int $catId)
    {
        return $this->transaction->where('category_id', $catId)->get();
    }

    /**
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return mixed
     */
    public function getByDateRange(Carbon $startDate, Carbon $endDate)
    {
        return $this->transaction->whereBetween('created_at', [$startDate, $endDate])->get();
    }


}
