/**
 * Tubelight Navbar JavaScript - adapted from React component
 */
document.addEventListener('DOMContentLoaded', function() {
  // Get navbar elements
  const navLinks = document.querySelectorAll('.navbar-link');
  const indicator = document.querySelector('.navbar-indicator');
  
  // Set initial active state
  let activeLink = document.querySelector('.navbar-link.active');
  
  // Function to update active link and move indicator
  function updateActiveLink(link) {
    // Remove active class from all links
    navLinks.forEach(navLink => {
      navLink.classList.remove('active');
      navLink.classList.remove('bg-muted');
      navLink.classList.remove('text-primary');
    });
    
    // Add active class to current link
    link.classList.add('active');
    link.classList.add('bg-muted');
    link.classList.add('text-primary');
    
    // Move indicator
    moveIndicator(link);
  }
  
  // Function to move the indicator with animation
  function moveIndicator(link) {
    if (!indicator) return;
    
    // Set position and dimensions based on active link
    const rect = link.getBoundingClientRect();
    const navbarRect = link.parentElement.getBoundingClientRect();
    
    // Calculate relative position
    const left = rect.left - navbarRect.left;
    
    // Apply styles with animation
    indicator.style.transition = 'transform 0.3s ease, width 0.3s ease';
    indicator.style.width = `${rect.width}px`;
    indicator.style.transform = `translateX(${left}px)`;
    
    // Show the light effect at the top
    const light = document.querySelector('.navbar-light');
    if (light) {
      light.style.left = `${left + rect.width/2}px`;
    }
  }
  
  // Add click event listeners
  navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      // Only preventDefault if it's a hash link
      if (this.getAttribute('href') === '#') {
        e.preventDefault();
      }
      
      updateActiveLink(this);
    });
  });
  
  // Initialize indicator position
  if (activeLink && indicator) {
    moveIndicator(activeLink);
  }
  
  // Handle resize events
  window.addEventListener('resize', function() {
    const isMobile = window.innerWidth < 768;
    const navbar = document.querySelector('.tubelight-navbar');
    
    if (navbar) {
      if (isMobile) {
        navbar.classList.add('bottom-0');
        navbar.classList.remove('top-0');
      } else {
        navbar.classList.remove('bottom-0');
        navbar.classList.add('top-0');
      }
    }
    
    // Reposition indicator
    if (activeLink && indicator) {
      moveIndicator(activeLink);
    }
  });
  
  // Trigger resize event on load
  window.dispatchEvent(new Event('resize'));
});
