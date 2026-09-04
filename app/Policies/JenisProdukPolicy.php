<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JenisProduk;

class JenisProdukPolicy
{
    /**
     * Admin dan kasir boleh melihat daftar jenis produk.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'kasir']);
    }

    /**
     * Admin dan kasir boleh melihat detail.
     */
    public function view(
        User $user,
        JenisProduk $jenisProduk
    ): bool {
        return $user->hasAnyRole(['admin', 'kasir']);
    }

    /**
     * Hanya admin yang boleh membuat.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Hanya admin yang boleh mengedit.
     */
    public function update(
        User $user,
        JenisProduk $jenisProduk
    ): bool {
        return $user->hasRole('admin');
    }

    /**
     * Hanya admin yang boleh menghapus.
     */
    public function delete(
        User $user,
        JenisProduk $jenisProduk
    ): bool {
        return $user->hasRole('admin');
    }
}
