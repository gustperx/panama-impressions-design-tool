<?php

namespace App\Modules\Auth;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserStorage
{
    private $storage;

    public function __construct()
    {
        $this->storage = Storage::disk(env('STORAGE_DISK'));
    }

    public function avatar(User $user, $avatar)
    {
        // delete avatar
        $this->storage->delete($user->avatar);
        
        // save new avatar
        $resize = Image::make($avatar)->resize(300, 300)->encode('jpg');

        $hash = md5($resize->__toString());

        $path = trans('files.users.avatars', ['user' => $user->id, 'file' => $hash.".jpg"]);

        // Storage::put($path, $contents, $visibility = null)
        $this->storage->put($path, $resize->__toString());

        return $path;
    }

}