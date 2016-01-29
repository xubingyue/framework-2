<?php
/**
 * This file is part of Notadd.
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2015, iBenchu.org
 * @datetime 2016-01-29 16:18
 */
namespace Notadd\Article\Observers;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Notadd\Article\Models\Article;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Class ArticleObserver
 * @package Notadd\Article\Observers
 */
class ArticleObserver {
    /**
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $file;
    /**
     * ArticleObserver constructor.
     * @param \Illuminate\Filesystem\Filesystem $file
     */
    public function __construct(Filesystem $file) {
        $this->file = $file;
    }
    /**
     * @param \Notadd\Article\Models\Article $article
     */
    public function creating(Article $article) {
        $thumbImage = $article->getAttribute('thumb_image');
        if($thumbImage) {
            if($thumbImage instanceof UploadedFile) {
                $hash = hash_file('md5', $thumbImage->getPathname(), false);
                $dictionary = $this->pathSplit($hash, '4,4,4', Collection::make([
                    'upload'
                ]))->implode(DIRECTORY_SEPARATOR);
                if(!$this->file->isDirectory(app_path($dictionary))) {
                    $this->file->makeDirectory(app_path($dictionary), 0777, true, true);
                }
                $thumbImage->move($dictionary, Str::substr($hash, 12, 20) . '.' . $thumbImage->getClientOriginalExtension());
                $article->setAttribute('thumb_image', $this->pathSplit($hash, '4,4,4,20', Collection::make([
                    'upload'
                ]))->implode('/') . '.' . $thumbImage->getClientOriginalExtension());
            }
        }
    }
    protected function pathSplit($path, $dots, $data = null) {
        $dots = explode(',', $dots);
        $data = $data ? $data : new Collection();
        $offset = 0;
        foreach($dots as $dot) {
            $data->push(Str::substr($path, $offset, $dot));
            $offset += $dot;
        }
        return $data;
    }
    /**
     * @param \Notadd\Article\Models\Article $article
     */
    public function updating(Article $article) {
        $thumbImage = $article->getAttribute('thumb_image');
        if($thumbImage) {
            if($thumbImage instanceof UploadedFile) {
                $hash = hash_file('md5', $thumbImage->getPathname(), false);
                $dictionary = $this->pathSplit($hash, '4,4,4', Collection::make([
                    'upload'
                ]))->implode(DIRECTORY_SEPARATOR);
                if(!$this->file->isDirectory(app_path($dictionary))) {
                    $this->file->makeDirectory(app_path($dictionary), 0777, true, true);
                }
                $thumbImage->move($dictionary, Str::substr($hash, 12, 20) . '.' . $thumbImage->getClientOriginalExtension());
                $article->setAttribute('thumb_image', $this->pathSplit($hash, '4,4,4,20', Collection::make([
                    'upload'
                ]))->implode('/') . '.' . $thumbImage->getClientOriginalExtension());
            }
        }
    }
}