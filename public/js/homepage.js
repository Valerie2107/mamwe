window.addEventListener('scroll', function() {
    var elements = document.querySelectorAll('.text');
    
    elements.forEach(function(element, index) {
      var rect = element.getBoundingClientRect();
      
      if(rect.top >= 0 && rect.bottom <= window.innerHeight) {
        if(index % 2 === 0) {
          element.classList.add('text-slide-in-from-right');
        } else {
          element.classList.add('text-slide-in-from-left');
        }
      }
    });
  });  