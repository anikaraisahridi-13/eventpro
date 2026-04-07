document.querySelectorAll(".btn").forEach(btn=>{
 btn.addEventListener("mouseover",()=>{
  btn.style.transform="scale(1.08)";
 });
 btn.addEventListener("mouseleave",()=>{
  btn.style.transform="scale(1)";
 });
});