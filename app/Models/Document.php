<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'category_id', 'source', 'access', 'created_by', 'path'];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function hasPermission(int $userId): bool
    {
        return $this->usersPermissions()
            ->where('user_id', $userId)
            ->exists();
    }

    public function permissionForUser(int $userId): string|null
    {

        $permission = $this->usersPermissions()
            ->where('user_id', $userId)
            ->select('permission_id')->first();
        if ($permission == null) {
            return null;
        } else {

            return  Permission::find($permission->permission_id)->name;
        }
    }
    public function isPrivate(): bool
    {
        if ($this->access == 'private') {
            if ($this->created_by == Auth::user()->id || $this->usersPermissions()->where('user_id', Auth::user()->id)->exists()) {
                return true;
            }
            return true;
        }
        return false;
    }

    public function usersPermissions(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "document_user_permissions", "document_id")
            ->withPivot('permission_id');
    }



    public function canDownload(): bool
    {
        $currentUser = Auth::user()->id;
        //peut telecharger si j'ai une permission read ou write ou je suis proprietaire ou l'acces au document est public
        if ($this->hasPermission($currentUser) || $this->created_by == $currentUser || $this->access == 'public') {
            return \true;
        }
        return \false;
    }

    public function canUpdate(): bool
    {
        $currentUser = Auth::user()->id;

        if ($this->created_by == $currentUser || $this->permissionForUser($currentUser) == 'read-write') {
            return true;
        }

        return false;
    }

    public function canAddUser(): bool
    {
        $currentUser = Auth::user()->id;

        return $currentUser && $this->created_by === $currentUser;
    }

    public function canDelete(): bool
    {
        $currentUser = Auth::user()->id;

        return $currentUser && $this->created_by === $currentUser;
    }
}
