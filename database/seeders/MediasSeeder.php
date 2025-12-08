<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;

class MediasSeeder extends Seeder
{
    public function run(): void
    {
        Media::create([
            
                'chemin' => 'media1.jpg',
                'description' => 'Image illustrative',
                'contenu_id' => 1,
                'type_media_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            Media::create([
                'chemin' => 'video1.mp4',
                'description' => 'Vidéo explicative',
                'contenu_id' => 2,
                'type_media_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            Media::create([
                'chemin' => 'audio1.mp3',
                'description' => 'Audio podcast',
                'contenu_id' => 3,
                'type_media_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            Media::create([
                'chemin' => 'doc1.pdf',
                'description' => 'Document PDF',
                'contenu_id' => 4,
                'type_media_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            Media::create([
                'chemin' => 'https://example.com',
                'description' => 'Lien externe',
                'contenu_id' => 5,
                'type_media_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            
        ]);

    }
}