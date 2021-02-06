<?php

namespace App;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    protected string $title;
    protected Carbon $date;
    protected string $slug;
    protected string $excerpt;
    protected string $body;

    public function __construct(string $title, Carbon $date, string $slug, string $excerpt, string $body)
    {
        $this->title = $title;
        $this->date = $date;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->body = $body;
    }

    public static function fromSlug(string $slug): self
    {
        try {
            $content = Storage::disk('content')->get($slug . '.md');
        } catch (FileNotFoundException $e) {
            abort(404);
        }

        $metadata = YamlFrontMatter::parse($content);

        return new self($metadata->title, Carbon::parse($metadata->date), $slug, $metadata->excerpt, $metadata->body());
    }

    public static function all()
    {
        $files = Storage::disk('content')->files();

        return Collection::make($files)->map(function ($filename) {
            return self::fromSlug(Str::before($filename, '.md'));
        });
    }

    public function title(): string
    {
        return $this->title;
    }

    public function date(): Carbon
    {
        return $this->date;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function excerpt(): string
    {
        return $this->excerpt;
    }

    public function body(): string
    {
        return $this->body;
    }
}
