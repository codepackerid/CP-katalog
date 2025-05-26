/**
 * Text Rotation Animation
 * Adapted from React component to vanilla JavaScript
 */
document.addEventListener('DOMContentLoaded', function() {
  // Text rotation container
  const textRotateContainers = document.querySelectorAll('.text-rotate');
  
  textRotateContainers.forEach(container => {
    // Get texts from data attribute
    const textsJSON = container.getAttribute('data-texts');
    if (!textsJSON) return;
    
    const texts = JSON.parse(textsJSON);
    if (!texts.length) return;
    
    // Get configuration options
    const rotationInterval = parseInt(container.getAttribute('data-interval') || '2000');
    const staggerDuration = parseFloat(container.getAttribute('data-stagger') || '0.03');
    const staggerFrom = container.getAttribute('data-stagger-from') || 'first';
    
    // Current text index
    let currentIndex = 0;
    
    // Create text elements
    texts.forEach((text, index) => {
      const textSpan = document.createElement('span');
      textSpan.className = 'text-rotate-item absolute font-semibold transition-all duration-500';
      textSpan.textContent = text;
      textSpan.style.opacity = index === 0 ? '1' : '0';
      textSpan.style.transform = index === 0 ? 'translateY(0)' : 'translateY(150px)';
      container.appendChild(textSpan);
    });
    
    const textElements = container.querySelectorAll('.text-rotate-item');
    
    // Split text into characters if needed
    textElements.forEach(element => {
      if (container.getAttribute('data-split-by') === 'characters') {
        const text = element.textContent || '';
        element.textContent = '';
        
        // Split into characters
        const characters = Array.from(text);
        characters.forEach((char, charIndex) => {
          const charSpan = document.createElement('span');
          charSpan.className = 'text-rotate-char inline-block';
          charSpan.textContent = char;
          
          // Calculate stagger delay
          let delay = 0;
          if (staggerFrom === 'first') {
            delay = charIndex * staggerDuration;
          } else if (staggerFrom === 'last') {
            delay = (characters.length - 1 - charIndex) * staggerDuration;
          } else if (staggerFrom === 'center') {
            const center = Math.floor(characters.length / 2);
            delay = Math.abs(center - charIndex) * staggerDuration;
          } else if (staggerFrom === 'random') {
            const randomIndex = Math.floor(Math.random() * characters.length);
            delay = Math.abs(randomIndex - charIndex) * staggerDuration;
          }
          
          charSpan.style.transitionDelay = `${delay}s`;
          element.appendChild(charSpan);
        });
      }
    });
    
    // Rotation function
    function rotateText() {
      // Hide current text
      if (textElements[currentIndex]) {
        textElements[currentIndex].style.opacity = '0';
        textElements[currentIndex].style.transform = 'translateY(-150px)';
      }
      
      // Move to next text
      currentIndex = (currentIndex + 1) % texts.length;
      
      // Show next text
      if (textElements[currentIndex]) {
        textElements[currentIndex].style.opacity = '1';
        textElements[currentIndex].style.transform = 'translateY(0)';
      }
      
      // Schedule next rotation
      setTimeout(rotateText, rotationInterval);
    }
    
    // Start rotation after initial delay
    setTimeout(rotateText, rotationInterval);
  });
});
