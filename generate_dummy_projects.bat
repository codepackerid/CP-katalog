@echo off
setlocal EnableDelayedExpansion
echo Creating dummy projects...

REM Make sure MySQL is running first
echo Please make sure MySQL is running before proceeding.
pause

REM Check if storage link exists
if not exist "public\storage" (
    echo Creating storage link...
    php artisan storage:link
)

REM Create storage directory for projects
if not exist "storage\app\public\projects" (
    echo Creating projects directory...
    mkdir "storage\app\public\projects"
)

REM Define project titles and colors
set "titles[1]=E-Learning Platform"
set "titles[2]=Marketplace App"
set "titles[3]=Travel App"
set "titles[4]=Portfolio Website"
set "titles[5]=AI Image Generator"
set "titles[6]=Inventory Management System"
set "titles[7]=2D Platformer Game"
set "titles[8]=Weather App"

set "filenames[1]=elearning-platform.jpg"
set "filenames[2]=marketplace-app.jpg"
set "filenames[3]=travel-app.jpg"
set "filenames[4]=portfolio-website.jpg"
set "filenames[5]=ai-image-generator.jpg"
set "filenames[6]=inventory-system.jpg"
set "filenames[7]=platformer-game.jpg"
set "filenames[8]=weather-app.jpg"

set "colors[1]=#3490dc"
set "colors[2]=#f6993f"
set "colors[3]=#38c172"
set "colors[4]=#e3342f"
set "colors[5]=#9561e2"
set "colors[6]=#f66d9b"
set "colors[7]=#6cb2eb"
set "colors[8]=#ffed4a"

REM Create placeholder HTML files
echo Creating placeholder image files...

for /L %%i in (1,1,8) do (
    set "title=!titles[%%i]!"
    set "filename=!filenames[%%i]!"
    set "color=!colors[%%i]!"
    
    echo Creating placeholder for !title!...
    
    (
        echo ^<!DOCTYPE html^>
        echo ^<html^>
        echo ^<head^>
        echo     ^<title^>!title! - Placeholder^</title^>
        echo     ^<style^>
        echo         body {
        echo             margin: 0;
        echo             padding: 0;
        echo             display: flex;
        echo             flex-direction: column;
        echo             justify-content: center;
        echo             align-items: center;
        echo             width: 800px;
        echo             height: 450px;
        echo             background-color: !color!;
        echo             color: white;
        echo             font-family: Arial, sans-serif;
        echo             text-align: center;
        echo         }
        echo         h1 {
        echo             font-size: 24px;
        echo             margin-bottom: 10px;
        echo         }
        echo         p {
        echo             font-size: 16px;
        echo         }
        echo     ^</style^>
        echo ^</head^>
        echo ^<body^>
        echo     ^<h1^>!title!^</h1^>
        echo     ^<p^>Dummy Project^</p^>
        echo     ^<p^>Click to edit this project^</p^>
        echo ^</body^>
        echo ^</html^>
    ) > "storage\app\public\projects\!filename!"
)

REM Run PHP artisan command to run the seeder
echo Running database seeder...
php artisan db:seed --class=ProjectSeeder

echo.
echo Dummy projects created successfully!
echo You can edit these projects by logging in as one of the users.
echo.
pause
endlocal 