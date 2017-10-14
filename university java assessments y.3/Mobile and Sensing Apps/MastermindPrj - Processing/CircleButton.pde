//Created on: 12/03/2017 by 40270585
//code was based on the example from:
//http://processingjs.org/learning/topic/buttons/
//it's responsible for handling active circle buttons
class CircleButton extends Button{ 
  
  CircleButton(float ix, float iy, float isize, color icolor, color ihighlight){
    x = ix;
    y = iy;
    size = isize;
    basecolor = icolor;
    highlightcolor = ihighlight;
    currentcolor = basecolor;
  }

  boolean over(){
    if( overCircle(x, y, size) ){
      over = true;
      return true;
    } 
    else {
      over = false;
      return false;
    }
  }

  void display(){
    stroke(255);
    fill(currentcolor);
    ellipse(x, y, size, size);
  }
  
  void setColor(color selected){
    stroke(255);
    fill(selected);
    ellipse(this.x, this.y, this.size, this.size);
  }
}