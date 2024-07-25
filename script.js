document.addEventListener('DOMContentLoaded', function() {
  const videos = document.querySelectorAll('video');
  let currentVideoIndex = 0;

  function playCurrentVideo() {
      videos[currentVideoIndex].play();
  }

  function pauseCurrentVideo() {
      videos[currentVideoIndex].pause();
  }

  function scrollToNextVideo() {
      pauseCurrentVideo();
      currentVideoIndex = (currentVideoIndex + 1) % videos.length;
      videos[currentVideoIndex].scrollIntoView({ behavior: 'smooth' });
      playCurrentVideo();
  }

  function scrollToPreviousVideo() {
      pauseCurrentVideo();
      currentVideoIndex = (currentVideoIndex - 1 + videos.length) % videos.length;
      videos[currentVideoIndex].scrollIntoView({ behavior: 'smooth' });
      playCurrentVideo();
  }

  function handleIntersection(entries) {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              const videoIndex = Array.from(videos).indexOf(entry.target);
              if (videoIndex !== currentVideoIndex) {
                  pauseCurrentVideo();
                  currentVideoIndex = videoIndex;
                  playCurrentVideo();
              }
          } else {
              entry.target.pause();
          }
      });
  }

  const observer = new IntersectionObserver(handleIntersection, {
      threshold: 0.5
  });

  videos.forEach((video, index) => {
      observer.observe(video);

      video.addEventListener('click', function() {
          if (this.paused) {
              this.play();
          } else {
              this.pause();
          }
      });

      video.addEventListener('ended', function() {
          scrollToNextVideo();
      });
  });

  window.addEventListener('keydown', function(e) {
      if (e.key === 'ArrowDown') {
          scrollToNextVideo();
      } else if (e.key === 'ArrowUp') {
          scrollToPreviousVideo();
      }
  });

  if (videos.length > 0) {
      playCurrentVideo();
  }
});


