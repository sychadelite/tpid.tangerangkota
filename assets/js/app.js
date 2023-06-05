/* VARIABLES */
let previousScroll = 0

/* FUNCTIONS */
function onLoad(event) {
  onScroll();

  // AOS
  AOS.init();

  // FancyBox
  Fancybox.bind(document.querySelector('section[id="main-news"]'), '[data-fancybox="gallery"]', {
    hideScrollbar: false
  });

  Fancybox.bind(document.querySelector('section[id="gallery"]'), '[data-fancybox="gallery"]', {
    hideScrollbar: false
  });

  // ACCORDION BEHAVIOR
  const accordionButtons = document.querySelectorAll('.accordion-header button[data-mdb-target^="#panelStayOpenCollapse"]');

  accordionButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      // initSticky();
      // Hide other accordion bodies
      const accordionBodies = document.querySelectorAll('.accordion[id^="accordionPanelStayOpen"] .accordion-collapse');
      accordionBodies.forEach(body => {
        if (body.id !== button.getAttribute('data-mdb-target').slice(1)) {
          // Use jQuery's slideUp() method for smooth collapse
          $(body).slideUp(function () {
            // Callback function after slideUp is complete
            $(body).removeClass('show'); // Remove 'show' class after collapsing
            // Remove inline style 'display: none'
            if (body.style.removeProperty) {
              body.style.removeProperty('display');
            } else {
              body.style.removeAttribute('display');
            }
          });
        } else {
          initSticky();
        }
      });
    });
  });
}

function onScroll() {
  /* TOPNAV */
  const offsetPage = window.pageYOffset;
  const topnav = document.getElementById('topnav');
  if (window.location.pathname !== '/') {
    topnav.classList.remove('bg-transparent');
    topnav.classList.add('bg-primary');
    return true;
  }
  if (offsetPage > previousScroll) {
    // scrolling to bottom
    topnav.classList.remove('bg-transparent');
    topnav.classList.add('bg-primary');
  } else {
    if (offsetPage < 10) {
      // reached top
      topnav.classList.remove('bg-primary');
      topnav.classList.add('bg-transparent');
    } else {
      // scrolling to top
      topnav.classList.remove('bg-transparent');
      topnav.classList.add('bg-primary');
    }
  }
  previousScroll = offsetPage
}

function refTo(id) {
  setTimeout(() => {
    const element = document.getElementById(id);
    const elementPosition = getElementPosition(element);

    const elementTop = elementPosition.top; // Top position relative to the page
    const elementLeft = elementPosition.left; // Left position relative to the page

    window.scrollTo({
      top: elementTop - ((window.innerHeight - 500) / 2),
      behavior: 'smooth' // Optional: Use smooth scrolling effect
    });
  }, 300);
}

function getElementPosition(element) {
  let offsetTop = 0;
  let offsetLeft = 0;

  while (element) {
    offsetTop += element.offsetTop;
    offsetLeft += element.offsetLeft;
    element = element.offsetParent;
  }

  return { top: offsetTop, left: offsetLeft };
}

/* EVENTS */
window.onload = onLoad(this);
window.addEventListener('scroll', onScroll);