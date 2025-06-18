@echo off
echo Creating project placeholder images...

rem Create the storage directories if they don't exist
mkdir storage\app\public\projects 2>nul

rem Create placeholder images for each project
echo ^<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg"^>^<rect width="800" height="600" fill="#4F46E5"/^>^<text x="400" y="300" font-family="Arial" font-size="30" text-anchor="middle" fill="white"^>E-Learning Platform^</text^>^</svg^> > storage\app\public\projects\elearning-platform.jpg
echo ^<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg"^>^<rect width="800" height="600" fill="#10B981"/^>^<text x="400" y="300" font-family="Arial" font-size="30" text-anchor="middle" fill="white"^>Marketplace App^</text^>^</svg^> > storage\app\public\projects\marketplace-app.jpg
echo ^<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg"^>^<rect width="800" height="600" fill="#F59E0B"/^>^<text x="400" y="300" font-family="Arial" font-size="30" text-anchor="middle" fill="white"^>Travel App^</text^>^</svg^> > storage\app\public\projects\travel-app.jpg
echo ^<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg"^>^<rect width="800" height="600" fill="#EC4899"/^>^<text x="400" y="300" font-family="Arial" font-size="30" text-anchor="middle" fill="white"^>Portfolio Website^</text^>^</svg^> > storage\app\public\projects\portfolio-website.jpg
echo ^<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg"^>^<rect width="800" height="600" fill="#8B5CF6"/^>^<text x="400" y="300" font-family="Arial" font-size="30" text-anchor="middle" fill="white"^>AI Image Generator^</text^>^</svg^> > storage\app\public\projects\ai-image-generator.jpg
echo ^<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg"^>^<rect width="800" height="600" fill="#06B6D4"/^>^<text x="400" y="300" font-family="Arial" font-size="30" text-anchor="middle" fill="white"^>Inventory Management System^</text^>^</svg^> > storage\app\public\projects\inventory-system.jpg
echo ^<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg"^>^<rect width="800" height="600" fill="#EF4444"/^>^<text x="400" y="300" font-family="Arial" font-size="30" text-anchor="middle" fill="white"^>2D Platformer Game^</text^>^</svg^> > storage\app\public\projects\platformer-game.jpg
echo ^<svg width="800" height="600" xmlns="http://www.w3.org/2000/svg"^>^<rect width="800" height="600" fill="#3B82F6"/^>^<text x="400" y="300" font-family="Arial" font-size="30" text-anchor="middle" fill="white"^>Weather App^</text^>^</svg^> > storage\app\public\projects\weather-app.jpg

echo Placeholder images created successfully.
echo Running storage:link command to make images accessible...
php artisan storage:link

echo Done! 