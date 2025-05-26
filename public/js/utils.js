/**
 * Utility function to conditionally join class names
 * @param  {...string} classes - List of class names or conditional class objects
 * @returns {string} - Joined class string
 */
function cn(...classes) {
  return classes.filter(Boolean).join(' ');
}

// Add CSS variables for colors
function addVariablesForColors() {
  const colors = {
    'white': '#ffffff',
    'black': '#000000',
    'transparent': 'transparent',
    'blue-300': '#93c5fd',
    'blue-400': '#60a5fa',
    'blue-500': '#3b82f6',
    'indigo-300': '#a5b4fc',
    'violet-200': '#ddd6fe'
  };

  // Add colors as CSS variables
  Object.entries(colors).forEach(([key, val]) => {
    document.documentElement.style.setProperty(`--${key}`, val);
  });
}

// Initialize color variables when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  addVariablesForColors();
});
