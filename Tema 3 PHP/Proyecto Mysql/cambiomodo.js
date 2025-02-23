
// Get the link element to modify the stylesheet
const stylesheetLink = document.getElementById('stylesheet');

// Get the toggle button
const button = document.getElementById('botonestilo');

// Check if a style is saved in localStorage and apply it
const savedStyle = localStorage.getItem('selectedStyle');
if (savedStyle) {
  stylesheetLink.href = savedStyle;
}

// Add an event listener to the button to toggle between styles
button.addEventListener('click', () => {
  const currentStyle = stylesheetLink.href;

  // Switch between stylesheets based on the current one
  if (currentStyle.includes('templates/light.css')) {
    stylesheetLink.href = 'templates/dark.css';
    localStorage.setItem('selectedStyle', 'templates/dark.css'); // Save to localStorage
  } else {
    stylesheetLink.href = 'templates/light.css';
    localStorage.setItem('selectedStyle', 'templates/light.css'); // Save to localStorage
  }
});