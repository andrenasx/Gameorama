const body = document.body;
const foot = document.querySelector(".footer-wrapper");
const scrollUp = "scroll-up";
const scrollDown = "scroll-down";
let lastScroll = 0;
 
window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  const scrollMaxY = window.scrollMaxY || (body.scrollHeight - body.clientHeight);
  
  if (currentScroll <= 0) {
    body.classList.remove(scrollUp);
    return;
  }
  if(currentScroll>=scrollMaxY){
    body.classList.remove(scrollDown);
    body.classList.add(scrollUp);
    return;
  }

  if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) {
    // down
    body.classList.remove(scrollUp);
    body.classList.add(scrollDown);
  } else if (currentScroll < lastScroll && body.classList.contains(scrollDown)) {
    // up
    body.classList.remove(scrollDown);
    body.classList.add(scrollUp);
  }
  lastScroll = currentScroll;
});