@echo off
echo Downloading project images...

mkdir storage\app\public\projects 2>nul

:: Unduh gambar menggunakan curl
curl -o storage\app\public\projects\elearning.jpg "https://images.unsplash.com/photo-1610116306796-6fea9f4fae38?w=800&h=600&fit=crop"
curl -o storage\app\public\projects\marketplace.jpg "https://images.unsplash.com/photo-1556740738-b6a63e27c4df?w=800&h=600&fit=crop"
curl -o storage\app\public\projects\travel.jpg "https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=800&h=600&fit=crop"
curl -o storage\app\public\projects\portfolio.jpg "https://images.unsplash.com/photo-1522542550221-31fd19575a2d?w=800&h=600&fit=crop"
curl -o storage\app\public\projects\ai-generator.jpg "https://images.unsplash.com/photo-1617791160505-6f00504e3519?w=800&h=600&fit=crop"
curl -o storage\app\public\projects\inventory.jpg "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&h=600&fit=crop"
curl -o storage\app\public\projects\game.jpg "https://images.unsplash.com/photo-1511512578047-dfb367046420?w=800&h=600&fit=crop"
curl -o storage\app\public\projects\weather.jpg "https://images.unsplash.com/photo-1504608524841-42fe6f032b4b?w=800&h=600&fit=crop"

echo Images downloaded successfully!

:: Update database dengan file gambar baru
echo Updating database with new image paths...
php artisan tinker --execute="
    DB::table('projects')->where('id', 1)->update(['image' => 'projects/elearning.jpg']);
    DB::table('projects')->where('id', 2)->update(['image' => 'projects/marketplace.jpg']);
    DB::table('projects')->where('id', 3)->update(['image' => 'projects/travel.jpg']);
    DB::table('projects')->where('id', 4)->update(['image' => 'projects/portfolio.jpg']);
    DB::table('projects')->where('id', 5)->update(['image' => 'projects/ai-generator.jpg']);
    DB::table('projects')->where('id', 6)->update(['image' => 'projects/inventory.jpg']);
    DB::table('projects')->where('id', 7)->update(['image' => 'projects/game.jpg']);
    DB::table('projects')->where('id', 8)->update(['image' => 'projects/weather.jpg']);
    echo 'Database updated successfully!';
"

echo Done! 