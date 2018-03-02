<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $table = "images";
    protected $guarded  = ['id'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function isActive()
    {
        if ($this->active === 1) {
            return true;
        }
        return false;
    }

    public function update(array $attributes = array(), array $options = array())
    {
        if( array_key_exists( 'file', $attributes ) ) {
            $this->deleteFile();
            $this->uploadFile( $attributes[ 'file' ], $attributes[ 'file_name' ] );
        }
        parent::update( $attributes, $options );
    }


    protected function deleteFile()
    {
        if( file_exists( $this->getFullPath() ) ) {
            unlink( $this->getFullPath() );
        }
    }

    public function uploadFile($file, $fileName = '')
    {
        if( $fileName == '' ) {
            $fileName = $this->file_name;
        }
        $file->move( public_path( $this->imageable->getImagePath() ), $fileName );
    }

    public function fileExists()
    {
        return file_exists( $this->getFullPath() );
    }

}
