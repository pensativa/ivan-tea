//Прокрутка к якорю меню

var anchors = [].slice.call(document.querySelectorAll('a[href*="#"]'));
var animationTime = 500;
var framesCount = 20;

anchors.forEach(function(item) {
  item.addEventListener('click', function(e) {
    e.preventDefault();

    let coordY = document.querySelector(item.getAttribute('href')).getBoundingClientRect().top + window.pageYOffset;

    let scroller = setInterval(function() {
      let scrollBy = coordY / framesCount;

      if(scrollBy > window.pageYOffset - coordY && window.innerHeight + window.pageYOffset < document.body.offsetHeight) {
        window.scrollBy(0, scrollBy);
      } else {
        window.scrollTo(0, coordY);
        clearInterval(scroller);
      }
    }, animationTime / framesCount);
  });
});

//Callback popap

var openPopap = document.querySelector('.button--catalog');
var closePopap = document.querySelector('.callback__clouse--contacts');
var popap = document.querySelector('.callback--contacts');

popap.classList.remove('open');

openPopap.addEventListener('click', function(evet) {
  evet.preventDefault();
  popap.classList.add('open');
});

closePopap.addEventListener('click', function(evet) {
  evet.preventDefault();
  popap.classList.remove('open');
});

var openPopapTwo = document.querySelector('.button--review');
var closePopapTwo = document.querySelector('.callback__clouse--review');
var popapTwo = document.querySelector('.callback--review');

popapTwo.classList.remove('open');

openPopapTwo.addEventListener('click', function(evet) {
  evet.preventDefault();
  popapTwo.classList.add('open');
});

closePopapTwo.addEventListener('click', function(evet) {
  evet.preventDefault();
  popapTwo.classList.remove('open');
});

