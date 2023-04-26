<?php

namespace App\Services\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageTrait {

    /**
     * @param $image
     * @param path
     * @param $name
     * @param int $quality
     * @return false|string
     */
    public function uploadImage($image, $path, $name, $quality = 100) {
        $original_path = "/public/$path";

        if(isset($name)) {
            $original_path = "/public/$path/$name";
        }

        $image_name = $this->createName();

        $contents = file_get_contents($image->getRealPath());
        $create_image = @imagecreatefromstring($contents);

        if ($create_image) {
            imagepalettetotruecolor($create_image);

            Storage::makeDirectory("$original_path/");

            imagewebp($create_image, Storage::path("$original_path/$image_name.webp"), $quality);
            $contents = file_get_contents(Storage::path("$original_path/$image_name.webp"));

            if(Storage::disk('local')->put("$original_path/$image_name.webp", $contents, 'public')) {
                return "/storage/$path/$name/$image_name.webp";
            }
        }

        return false;
    }

    /**
     * @param null $name
     * @return string
     */
    public function createName($name = null): string
    {
        $time = time();

        if(empty($name)) {
            return  $time;
        }

        return $name;
    }
}
