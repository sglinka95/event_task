<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'start_time',
        'end_time',
        'event_organizer'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function organizer()
    {
        return $this->belongsTo(User::class, 'event_organizer', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($event) {
            $event->slug = $event->generateSlug($event->name);

            $event->save();
        });
    }

    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($matches) {
                    return $matches[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
