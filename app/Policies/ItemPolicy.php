<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Item;

use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 指定されたユーザーのアイテムのとき削除可能
     * 
     * @param User $user
     * @param Item $item
     * @return bool
     */
    public function destroy(User $user, Item $item)
    {
        return $user->id === $item->user_id;
    }
}
