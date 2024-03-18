document.getElementById('toggleButton').addEventListener('click', function() {
    var sky = document.getElementById('sky');
    sky.classList.toggle('night');
    sky.classList.toggle('day');
  });