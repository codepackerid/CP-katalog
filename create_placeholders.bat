@echo off
setlocal EnableDelayedExpansion
echo Creating placeholder images...

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
    echo Creating placeholder for !titles[%%i]!...
    
    echo Placeholder for !titles[%%i]! > "storage\app\public\projects\!filenames[%%i]!"
)

echo.
echo Placeholder images created successfully!
echo The real HTML placeholders will be created when you run generate_dummy_projects.bat
echo.
pause
endlocal 