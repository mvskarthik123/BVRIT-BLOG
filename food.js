document.addEventListener("DOMContentLoaded", function() {
  function isInViewport(element) {
    var rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function handleScroll() {
    var elements = document.querySelectorAll('.o1,.o,.i3');
    elements.forEach(function(element) {
      if (isInViewport(element)) {
        element.classList.add('active');
      }
    });
  }

  window.addEventListener('scroll', handleScroll);
  handleScroll();
});
