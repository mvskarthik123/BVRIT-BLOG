document.addEventListener("DOMContentLoaded", function() {
  /* Function to check if an element is in the viewport */
  function isInViewport(element) {
    var rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  /* Function to handle scroll event */
  function handleScroll() {
    var elements = document.querySelectorAll('.ltc,.rtc,.o');
    elements.forEach(function(element) {
      if (isInViewport(element)) {
        element.classList.add('active');
      }
    });
  }

  /* Add scroll event listener */
  window.addEventListener('scroll', handleScroll);

  /* Initial check for elements on page load */
  handleScroll();
});



