/**
 * Animated Hero Section JavaScript
 * Adapted from React component to vanilla JavaScript
 */
document.addEventListener('DOMContentLoaded', function() {
  // Animation settings
  const titles = ["inovatif", "kreatif", "berkualitas", "modern", "canggih"];
  let titleNumber = 0;
  const titleElements = document.querySelectorAll('.animated-title');
  
  // Set initial state
  if (titleElements.length > 0) {
    titleElements[0].style.opacity = '1';
    titleElements[0].style.transform = 'translateY(0)';
  }
  
  // Function to update the animated title
  function updateTitle() {
    titleElements.forEach((element, index) => {
      if (index === titleNumber) {
        // Show current title with animation
        element.style.opacity = '1';
        element.style.transform = 'translateY(0)';
      } else {
        // Hide other titles
        const direction = titleNumber > index ? -150 : 150;
        element.style.opacity = '0';
        element.style.transform = `translateY(${direction}px)`;
      }
    });
    
    // Increment title number or reset to 0
    titleNumber = (titleNumber === titles.length - 1) ? 0 : titleNumber + 1;
    
    // Schedule next update
    setTimeout(updateTitle, 2000);
  }
  
  // Start the animation
  setTimeout(updateTitle, 2000);
});
