<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tag;

use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
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
     * 指定されたユーザーのタグのとき削除可能
     * 
     * @param User $user
     * @param Tag $tag
     * @return bool
     */
    public function destroy(User $user, Tag $tag)
    {
        return $user->id === $tag->user_id;
    }

    /**
     * 指定されたユーザーのタグのとき編集可能
     * 
     * @param User $user
     * @param Tag $tag
     * @return bool
     */
    public function update(User $user, Tag $tag)
    {
        return $user->id === $tag->user_id;
    }
}
