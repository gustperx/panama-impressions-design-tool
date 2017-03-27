<?php

namespace App\Modules\Auth;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }
    
        
    public function update(User $user, array $data)
    {
        return $user->update($data);
    }

    public function trash(array $trash_ids)
    {
        foreach ($trash_ids as $id) {

            $this->user->findOrFail($id)->delete();
        }
    }
    
    public function restore(array $restore_ids)
    {
        foreach ($restore_ids as $id) {

            $this->user->onlyTrashed()->findOrFail($id)->restore();
        }
    }
    
    public function destroy(array $destroy_ids)
    {
        foreach ($destroy_ids as $id) {

            $this->user->onlyTrashed()->findOrFail($id)->forceDelete();
        }
    }
    
    public function permitted(array $permitted_ids)
    {
        foreach ($permitted_ids as $id) {

            $this->user->findOrFail($id)->update(['status' => 'active']);
        }
    }
    
    public function banned(array $banned_ids)
    {
        foreach ($banned_ids as $id) {

            $this->user->findOrFail($id)->update(['status' => 'banned']);
        }
    }
}