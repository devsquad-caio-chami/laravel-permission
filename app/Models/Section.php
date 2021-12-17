<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Section extends Model
{
    use HasFactory;
    use UsesTenantConnection;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
