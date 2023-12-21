let r = 0;
let g = 0;
let b = 0;
let w = [];
// default value
let rgb_start = 0;
let rgb_stop = 256;
let rgb = 8;

// custom value
rgb_start = 0;
rgb_stop = 256;
rgb = 8;

// rgb normalizer
const nor = (a) => 
{
  if (!(a > rgb_start && a < rgb_stop)){
    a = (a<=rgb_start)? rgb_start: rgb_stop;
  }
  return a;
}

// simple rgb generator
const newColor = (a) =>{
  r = a[0];
  g = a[1];
  b = a[2];
  if      ((r<rgb_stop) && (g === rgb_start) && (b === rgb_start)) {
    r+=rgb;
  }
  else if ((r === rgb_stop) && (g<rgb_stop) && (b === rgb_start)) {
    g+=rgb;
  }
  else if ((r > rgb_start) && (g === rgb_stop) && (b === rgb_start)) 
  {
    r-=rgb;
  }
  else if ((r === rgb_start) && (g === rgb_stop) && (b < rgb_stop)) 
  {
    b+=rgb;
  }
  else if ((r === rgb_start) && (g > rgb_start) && (b === rgb_stop)) 
  {
    g-=rgb;
  }
  else if ((r<rgb_stop) && (g === rgb_start) && (b === rgb_stop)) 
  {
    r+=rgb;
  }
  else if ((r === rgb_stop) && (g === rgb_start) && (b > rgb_start)) 
  {
    b-=rgb;
  }
  
  r = nor(r);
  g = nor(g);
  b = nor(b);

  a[0] = r;
  a[1] = g;
  a[2] = b;
  return a

}
  let stalagtite_color = [rgb_stop , rgb_stop, rgb_start];
  let body_color  = [rgb_stop * 0.75, rgb_stop, rgb_start];
  let stalagmite_color = [rgb_stop * 0.5 , rgb_stop, rgb_start];
  
  setInterval(function() {
    stalagtite_color = newColor(stalagtite_color);
    document.getElementById('stalagtite').style.fill = 
    `rgb(${stalagtite_color[0]}, ${stalagtite_color[1]}, ${stalagtite_color[2]}`
    
    body_color = newColor(body_color);
    document.body.style.backgroundColor = `rgb(${body_color[0]}, ${body_color[1]}, ${body_color[2]}`
    
    stalagmite_color = newColor(stalagmite_color);
    document.getElementById('stalagmite').style.fill = 
    `rgb(${stalagmite_color[0]}, ${stalagmite_color[1]}, ${stalagmite_color[2]}`
  
  }, 20);